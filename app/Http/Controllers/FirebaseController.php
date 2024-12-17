<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Http\Helpers\UtilsHelper;
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
use App\Http\Helpers\UtilsHelper;
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirebaseController extends Controller
{
    //
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
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

<<<<<<< HEAD
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
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
<<<<<<< HEAD
                return $value['fcm_token'] != $fcmToken;
            });
            if (count($filterToken) > 0) {
=======
                return trim($value['fcm_token']) == $fcmToken;
            });
            if (count($filterToken) == 0) {
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
                return trim($value['fcm_token']) == $fcmToken;
            });
            if (count($filterToken) == 0) {
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
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
<<<<<<< HEAD
=======
        $subscribed = $this->subscribeToTopic();
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
        $subscribed = $this->subscribeToTopic();
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8

        session()->put('fcmToken', $fcmToken);
        return response()->json([
            'status' => 'success',
            'message' => 'Token saved successfully.',
<<<<<<< HEAD
<<<<<<< HEAD
            'data' => $dataDb,
        ]);
    }
=======
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
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
<<<<<<< HEAD
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
}
