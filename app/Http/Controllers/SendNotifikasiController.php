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
<<<<<<< HEAD
        $getNotifikasi = [];
        foreach ($notifikasi as $key => $jsonData) {
            $getNotifikasi[] = UtilsHelper::sendNotification($jsonData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim sebanyak ' . count($getNotifikasi) . ' notifikasi',
=======
        $getNotifikasi = UtilsHelper::sendNotification($notifikasi);

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim',
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
            'data' => $getNotifikasi,
        ]);
    }
}
