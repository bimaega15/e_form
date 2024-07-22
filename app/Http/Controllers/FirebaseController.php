<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirebaseController extends Controller
{
    //
    protected $messaging;
    public function __construct()
    {
        $this->messaging = app('firebase')->createMessaging();
    }

    public function refreshToken()
    {
        $refreshToken = UtilsHelper::generateAccessToken();
        return response()->json($refreshToken);
    }

    public function saveToken(Request $request)
    {
        $fcmToken = $request->input('fcmToken');
        $data = [
            'fcm_token' => $fcmToken,
            'user_id' => Auth::user()->id,
            'status' => 1,
        ];

        $accessToken = AccessToken::first();
        $dataFcmToken = $accessToken->fcm_token;
        $dataDb = json_decode($dataFcmToken, true) ?? [];
        if ($dataFcmToken) {
            $filterToken = array_filter($dataDb, function ($value) use ($fcmToken) {
                return trim($value['fcm_token']) == $fcmToken;
            });
            if (count($filterToken) == 0) {
                array_push($dataDb, $data);
                $accessToken->update([
                    'fcm_token' => json_encode($dataDb)
                ]);
            } else {
                foreach ($dataDb as $key => $tokenData) {
                    if ($tokenData['fcm_token'] == $fcmToken) {
                        $tokenData['status'] = 1;
                    }
                    $dataDb[$key] = $tokenData;
                }

                $accessToken->update([
                    'fcm_token' => json_encode($dataDb)
                ]);
            }
        } else {
            array_push($dataDb, $data);
            $accessToken->update([
                'fcm_token' => json_encode($dataDb)
            ]);
        }
        $subscribed = $this->subscribeToTopic();

        session()->put('fcmToken', $fcmToken);
        return response()->json([
            'status' => 'success',
            'message' => 'Token saved successfully.',
            'data' => [
                'token' => $dataDb,
                'subscribed' => $subscribed,
            ],
        ]);
    }

    private function subscribeToTopic()
    {
        $fields = [];
        $accessToken = AccessToken::first();
        $fcmToken = json_decode($accessToken->fcm_token, true) ?? [];
        $filterActive = array_filter($fcmToken, function ($item) {
            return $item['status'] == 1;
        });
        foreach ($filterActive as $key => $item) {
            $fields[] = $item['fcm_token'];
        }

        $registrationTokens = $fields;
        $topic = 'pengajuan';
        return $this->messaging->subscribeToTopic($topic, $registrationTokens);
    }
}
