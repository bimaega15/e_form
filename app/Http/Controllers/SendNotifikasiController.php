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
        $getNotifikasi = [];
        foreach ($notifikasi as $key => $jsonData) {
            $getNotifikasi[] = UtilsHelper::sendNotification($jsonData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Notifikasi berhasil dikirim sebanyak ' . count($getNotifikasi) . ' notifikasi',
            'data' => $getNotifikasi,
        ]);
    }
}
