<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\TransactionApprovel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function getUsersProfile(Request $request)
    {
        try {
            $search = $request->input('search');
            $limit = 10;
            $page = $request->input('page');
            $endPage = $page * $limit;
            $firstPage = $endPage - $limit;
    
            $transaction_id = $request->input('transaction_id');
            $getTransactionApprovel = TransactionApprovel::where('transaction_id', $transaction_id)->get()->count();
            $setJabatan = UtilsHelper::setJabatan($getTransactionApprovel);
    
            $myUserId = Auth::id();
    
            $data = User::join('profile', 'profile.users_id', '=', 'users.id')
                ->where('users.id', '!=', $myUserId)
                ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id');
            $countData = User::join('profile', 'profile.users_id', '=', 'users.id')
                ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id');
    
            if ($setJabatan != null && $setJabatan != '') {
                $data->where('nama_jabatan', 'like', '%' . $setJabatan . '%');
                $countData->where('nama_jabatan', 'like', '%' . $setJabatan . '%');
            }
    
            if ($search != null && $setJabatan != '') {
                $data->where('nama_profile', 'like', '%' . $search . '%')
                    ->orWhere('nama_jabatan', 'like', '%' . $search . '%');
            }
    
            $data = $data->offset($firstPage)
                ->limit($limit)
                ->get();
    
            $result = [];
            foreach ($data as $key => $v_data) {
                $result['results'][] =
                    [
                        'id' => $v_data->users_id,
                        'text' =>  $v_data->nama_profile . ' | ' . $v_data->nama_jabatan,
                    ];
            }
            if ($search != null && $search != '') {
                $countData = count($result);
            } else {
                $countData = $countData->get()->count();
            }

            if($data->count() == 0){
                $countData = $data->count();
                $result['results'] = null;
            }
    
            $result['count_filtered'] = $countData;
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Terjadi kesalahan',
                'result' => $e->getMessage()
            ], 400);
        }
    }
}
