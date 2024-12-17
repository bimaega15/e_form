<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessToken;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class FirebaseController extends Controller
{
    //
<<<<<<< HEAD
    public function saveToken(Request $request)
    {
        try {
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
                    return $value['fcm_token'] == $fcmToken;
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
=======
    public function setActiveFcmToken($request, $userId = null)
    {
        $fcmToken = $request->input('fcmToken');
        $data = [
            'fcm_token' => $fcmToken,
            'user_id' => $userId != null ? $userId : Auth::id(),
            'status' => 1,
        ];

        $accessToken = AccessToken::first();
        $dataFcmToken = $accessToken->fcm_token;
        $dataDb = json_decode($dataFcmToken, true) ?? [];
        if ($dataFcmToken) {
            $filterToken = array_filter($dataDb, function ($value) use ($fcmToken) {
                return $value['fcm_token'] == $fcmToken;
            });
            if (count($filterToken) == 0) {
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
                array_push($dataDb, $data);
                $accessToken->update([
                    'fcm_token' => json_encode($dataDb)
                ]);
<<<<<<< HEAD
            }

=======
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

        return $dataDb;
    }
    public function saveToken(Request $request)
    {
        try {
            $dataDb = $this->setActiveFcmToken($request);
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
            return response()->json([
                'status' => '200',
                'message' => 'Token berhasil disimpan',
                'result' => $dataDb,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }
}
