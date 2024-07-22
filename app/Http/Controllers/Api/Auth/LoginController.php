<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\FirebaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginController;
use App\Models\AccessToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class LoginController extends Controller
{
    protected $messaging;
    public function __construct()
    {
        $this->messaging = app('firebase')->createMessaging();
    }

    public function index(Request $request)
    {
        try {
            //
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ], [
                'required' => ':attribute wajib diisi',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'invalid form validation',
                    'result' => $validator->errors()
                ], 400);
            }

            $email = $request->input('email');
            $password = $request->input('password');
            $fcmToken = $request->input('fcmToken');

            $checkEmail = User::where('email', $email)->first();
            if ($checkEmail) {
                if (Hash::check($password, $checkEmail->password)) {
                    $token = $checkEmail->createToken($checkEmail->id)->plainTextToken;
                    $getRoles = $checkEmail->roles()->get();
                    $getRoles = $getRoles[0];

                    $result = [
                        'users' => $checkEmail,
                        'roles' => $getRoles,
                        'token' => $token
                    ];
                    if ($fcmToken != null) {
                        $firebaseController = new FirebaseController();
                        $firebaseController->setActiveFcmToken($request, $checkEmail->id);
                    }
                    return response()->json([
                        'status' => 200,
                        'message' => "Berhasil login",
                        "result" => $result
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Password anda salah'
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Username anda salah'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => "Terjadi kesalahan data",
                "result" => $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $fcmToken = $request->input('fcmToken');
        $accessToken = AccessToken::first();
        $dataFcmToken = $accessToken->fcm_token;
        $dataDb = json_decode($dataFcmToken, true) ?? [];
        if ($dataDb) {
            foreach ($dataDb as $key => $tokenData) {
                if ($tokenData['fcm_token'] == $fcmToken) {
                    $tokenData['status'] = 0;
                }
                $dataDb[$key] = $tokenData;
            }

            $accessToken->update([
                'fcm_token' => json_encode($dataDb)
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil logout'
        ], 200);
    }
}
