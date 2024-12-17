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
<<<<<<< HEAD
        $getNotifikasi = [];
        foreach ($notifikasi as $key => $jsonData) {
            $getNotifikasi[] = UtilsHelper::sendNotification($jsonData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim sebanyak ' . count($getNotifikasi) . ' notifikasi',
=======
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
        $getNotifikasi = UtilsHelper::sendNotification($notifikasi);

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim',
<<<<<<< HEAD
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
            'data' => $getNotifikasi,
        ]);
    }
}
