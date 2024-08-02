<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Http\Helpers\UtilsHelper;
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirebaseController extends Controller
{
    //
<<<<<<< HEAD
=======
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

>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
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
<<<<<<< HEAD
                return $value['fcm_token'] != $fcmToken;
            });
            if (count($filterToken) > 0) {
=======
                return trim($value['fcm_token']) == $fcmToken;
            });
            if (count($filterToken) == 0) {
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
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
<<<<<<< HEAD
=======
        $subscribed = $this->subscribeToTopic();
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e

        session()->put('fcmToken', $fcmToken);
        return response()->json([
            'status' => 'success',
            'message' => 'Token saved successfully.',
<<<<<<< HEAD
            'data' => $dataDb,
        ]);
    }
=======
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
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
}
