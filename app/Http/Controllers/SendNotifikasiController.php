<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Http\Request;

class SendNotifikasiController extends Controller
{
    //
    public function broadcast()
    {
        $notifikasi = UtilsHelper::pushNotifikasiSave(54, 0);
        $getNotifikasi = UtilsHelper::sendNotification($notifikasi);

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim',
            'data' => $getNotifikasi,
        ]);
    }
}
