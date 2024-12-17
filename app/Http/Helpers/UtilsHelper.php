<?php

namespace App\Http\Helpers;

use App\Models\AccessToken;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Ramsey\Uuid\Uuid;

use Google\Client as GoogleClient;
use GuzzleHttp\Client;
use Google\Service\SecurityCommandCenter\Access;

class UtilsHelper
{
    public static function myProfile($users_id = null)
    {
        if ($users_id == null) {
            $users_id = Auth::id();
        }
        $getUser = User::with('profile', 'profile.jabatan', 'profile.unit')->find($users_id);
        return $getUser;
    }
    public static function getRoles()
    {
        $myRoles = UtilsHelper::myProfile()->roles;
        $roles = '';
        if (count($myRoles) > 0) {
            $roles = $myRoles[0]->name;
        };
        return $roles;
    }
    public static function getCheckJabatan($users_id)
    {
        if ($users_id == null) {
            return false;
        }

        $getUser = User::with('profile', 'profile.jabatan', 'profile.unit')->find($users_id);
        $setJabatan = $getUser->profile->jabatan->nama_jabatan;
        $checkJabatan = $setJabatan == 'Direktur' || $setJabatan == 'Direktur Jenderal';
        return $checkJabatan;
    }
    public static function uploadFile($file, $lokasi, $id = null, $table = null, $nameAttribute = null)
    {
        if ($file != null) {
            // delete file
            UtilsHelper::deleteFile($id, $table, $lokasi, $nameAttribute);

            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload =  public_path() . '/upload/' . $lokasi . '/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            if ($id == null) {
                $name = 'default.png';
            } else {
                $data = DB::table($table)->where('id', $id)->first();
                $setData = (array) $data;
                $name = $setData[$nameAttribute];
            }
        }

        return $name;
    }

    public static function deleteFile($id = null, $table = null, $lokasi = null, $name = null)
    {
        if ($id != null) {
            $data = DB::table($table)->where('id', '=', $id)->first();
            $setData = (array) $data;
            $gambar = public_path() . '/upload/' . $lokasi . '/' . $setData[$name];
            if (file_exists($gambar)) {
                if ($setData[$name] != 'default.png') {
                    File::delete($gambar);
                }
            }
        }
    }

    public static function handleSidebar($treeData)
    {
        $pushData = [];
        function hiddenTree($data, $parentId = null)
        {
            $pushData = [];
            foreach ($data as $index => $item) {
                if ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                    $childIds = $item['children'];
                    $pushData[] = $childIds;
                    hiddenTree($data, $childIds);
                }
            }
            return $pushData;
        }
        $pushData = hiddenTree($treeData, null);
        $flattenedArray = [];
        foreach ($pushData as $subArray) {
            $flattenedArray = array_merge($flattenedArray, $subArray);
        }
        $hiddenData = [];
        foreach ($flattenedArray as $key => $value) {
            $hiddenData[$value] = $value;
        }

        return $hiddenData;
    }

    public static function createStructureTree()
    {
        $daftarMenu = Menu::orderBy('no_menu', 'asc')->orderBy('id', 'asc')->get();
        $listMenu = [];
        foreach ($daftarMenu as $key => $value) {
            if ($value->is_node == '1') {
                if ($value->children_menu != null || $value->children_menu != '') {
                    $explodeMenu = json_decode($value->children_menu, true);
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => $explodeMenu
                    ];
                } else {
                    $listMenu[] = [
                        'id' => $value->id,
                        'children' => null
                    ];
                }
            } else {
                $listMenu[] = [
                    'id' => $value->id,
                    'children' => null,
                ];
            }
        }
        return $listMenu;
    }

    public static function menuFilterById($id)
    {
        $menu = Menu::find($id);
        return $menu;
    }

    public static function renderSidebar($data, $parentId = null, $pushData = null)
    {
        foreach ($data as $index => $item) {
            if (isset($pushData[$item['id']])) {
                if ($pushData[$item['id']]) {
                    continue;
                }
            }

            $menuData = UtilsHelper::menuFilterById($item['id']);


            $urlUri = UtilsHelper::getUrlPermission();
            if (isset($urlUri[$menuData->link_menu])) {
                $convertData = $urlUri[$menuData->link_menu];
                $itemId = $item['id'];

                $getDataPermission = Permission::where('name', 'like', '%' . $convertData . '%')->first();
                if ($getDataPermission == null) {
                    continue;
                }

                $checkPermission = Auth::user()->hasPermissionTo($convertData);
                if (!$checkPermission) {
                    continue;
                }
            }

            $btnClassSpecified = '';
            if ($menuData->link_menu == 'logout') {
                $btnClassSpecified = 'btn-logout';
            }

            if ($item['children'] === null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                <li>
                    <a href="' . url($menuData->link_menu) . '" class="side-menu ' . $btnClassSpecified . '">
                        <div class="side-menu__icon"> ' . $menuData->icon_menu . ' </div>
                        <div class="side-menu__title"> ' . $menuData->nama_menu . ' </div>
                    </a>
                </li>
    
                ';
            } elseif ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                $hasVisibleChildren = false;

                // Loop melalui anak-anak untuk memeriksa izin dan menghitung yang visible
                foreach ($item['children'] as $childId) {
                    $childMenuData = UtilsHelper::menuFilterById($childId);

                    if (isset($urlUri[$childMenuData->link_menu])) {
                        $childConvertData = $urlUri[$childMenuData->link_menu];
                        $childCheckPermission = Auth::user()->hasPermissionTo($childConvertData);

                        if ($childCheckPermission) {
                            $hasVisibleChildren = true;
                            break;
                        }
                    }
                }

                if ($hasVisibleChildren) {
                    echo '
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> ' . $menuData->icon_menu . ' </div>
                            <div class="side-menu__title">
                                ' . $menuData->nama_menu . '
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">';
                    $childIds = $item['children'];
                    UtilsHelper::renderSidebar($data, $childIds);
                    echo '
                        </ul>
                    </li>';
                }
            }
        }
    }

    public static function renderTree($data, $parentId = null, $pushData = null)
    {
        echo  '
            <ol class="dd-list">';
        foreach ($data as $index => $item) {
            if (isset($pushData[$item['id']])) {
                if ($pushData[$item['id']]) {
                    continue;
                }
            }

            $menu_item = UtilsHelper::menuFilterById($item['id']);
            $buttonUpdate = '
                <a href="' . route('master.menu.edit', $menu_item->id) . '" class="btn btn-warning btn-edit btn-sm" style="padding: 5px 5px;">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                ';
            $buttonDelete = '
                <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/menu/' . $menu_item->id . '?_method=delete') . '" style="padding: 5px 5px;">
                    <i class="fa-solid fa-trash"></i>
                </button>
                ';

            if ($item['children'] === null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content p-0">
                        <div class="flex justify-between items-center" style="justify-content: space-between;">
                            <div>
                                <a href="' . url($menu_item->link_menu) . '">
                                ' . $menu_item->icon_menu . ' &nbsp; ' . $menu_item->nama_menu . '
                                </a>
                            </div>
                            <div>
                                ' . $buttonUpdate . '
                                ' . $buttonDelete . '
                            </div>
                        </div>
                    </div>
                </li>
                ';
            } elseif ($item['children'] !== null && ($parentId === null || in_array($item['id'], $parentId))) {
                echo  '
                    <li class="dd-item dd3-item" data-id="' . $item['id'] . '">
                        <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content p-0">
                                <div class="flex justify-between items-center" style="justify-content: space-between;">
                                <div>
                                    <a href="' . url($menu_item->link_menu) . '">
                                    ' . $menu_item->icon_menu . ' &nbsp; ' . $menu_item->nama_menu . '
                                    </a>
                                </div>
                                <div>
                                    ' . $buttonUpdate . '
                                    ' . $buttonDelete . '
                                </div>
                            </div>
                        </div>';
                $childIds = $item['children'];
                UtilsHelper::renderTree($data, $childIds);
                echo '
                    </li>
                ';
            }
        }
        echo  '
            </ol>';
    }

    public static function tanggalBulanTahunKonversi($tanggal)
    {
        $tanggalWaktu = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal);
        $tanggalIndonesia = $tanggalWaktu->isoFormat('D MMMM Y', 'Do MMMM Y');
        return $tanggalIndonesia;
    }

    public static function limitText($text, $limit = 100, $row)
    {
        if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit);
            $text .= '... <a href="' . route("website.blogs.edit",  $row->id) . '" class="isi_berita_detail text-info font-weight-bold" data-id="' . $row->id . '">Lihat Detail</a>';
        }
        return $text;
    }

    public static function limitTextGlobal($text, $limit = 100)
    {
        if (strlen($text) > $limit) {
            $text = substr($text, 0, $limit);
            $text .= '...';
        }
        return $text;
    }

    public static function settingApp()
    {
        return Setting::first();
    }

    public static function generateCodeProduct()
    {
        $code = 'PRD';
        $tanggal = date('Ymd');
        $numberProduct = Product::count();
        $increment = '0001';

        if ($numberProduct > 0) {
            $latestProduct = Product::latest('created_at')->first();

            if ($latestProduct) {
                $latestDate = $latestProduct->created_at->format('Ymd');

                // Mengonversi tanggal menjadi timestamp untuk perbandingan
                $tanggalTimestamp = strtotime($tanggal);
                $latestDateTimestamp = strtotime($latestDate);

                if ($tanggalTimestamp >= $latestDateTimestamp) {
                    $codeProduct = $latestProduct->code_product;
                    $lastIncrement = (int)preg_replace('/\D/', '', substr($codeProduct, -4));
                    $increment = str_pad($lastIncrement + 1, 4, '0', STR_PAD_LEFT);
                }
            }
        }

        $newCode = $code . '-' . $tanggal . '-' . $increment;
        return $newCode;
    }

    public static function insertPermissions()
    {
        $countPermissions = Permission::all()->count();
        if ($countPermissions > 0) {
            DB::table('permissions')->delete();
        }

        $routes = \Route::getRoutes();
        $routesName = [];
        foreach ($routes as $route) {
            if (!str_contains($route->getName(), 'unisharp')) {
                if (!str_contains($route->getName(), 'sanctum')) {
                    if (!str_contains($route->getName(), 'ignition')) {
                        if ($route->getName() != null) {
                            $routesName[] = [
                                'name' => $route->getName(),
                                'guard_name' => 'web'
                            ];
                        }
                    }
                }
            }
        }
        Permission::insert($routesName);
    }

    public static function getUrlPermission()
    {
        $routes = \Route::getRoutes();
        $routeUri = [];
        foreach ($routes as $route) {
            if (!str_contains($route->getName(), 'unisharp')) {
                if (!str_contains($route->getName(), 'sanctum')) {
                    if (!str_contains($route->getName(), 'ignition')) {
                        if ($route->getName() != null) {
                            $routeUri[$route->uri()] = $route->getName();
                        }
                    }
                }
            }
        }
        return $routeUri;
    }

    public static function formatDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('j F Y');
        return $formattedDate;
    }

    public static function formatDateLaporan($tanggal_transaction)
    {
        if ($tanggal_transaction == null || $tanggal_transaction == '-') {
            return '-';
        }
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::parse($dateNow);
        $formattedDate = $tanggal->format('d/m/Y');
        return $formattedDate;
    }

    public static function formatHumansDate($tanggal_transaction)
    {
        $dateNow = $tanggal_transaction;
        $tanggal = Carbon::createFromFormat('Y-m-d', $dateNow);
        $formattedDate = $tanggal->diffForHumans();
        return $formattedDate;
    }

    public static function forwardUsers($users_id = null)
    {
        if ($users_id == null) {
            return '-';
        }
        $getUser = User::with('profile', 'profile.jabatan', 'profile.unit')->find($users_id);
        return $getUser;
    }

    public static function autoNumberTransaction()
    {
        try {
            //code...
            $number = Transaction::orderBy('id', 'desc')->first();
            $getAutoNumber = null;
            if ($number != '' && $number != null) {
                $getCodeProduct = ($number->code_transaction);
                $explode = explode('-', $getCodeProduct);
                $explodeEnd = end($explode);
                $getCodeProduct = $explodeEnd;
                $getCodeProduct = (int)  $getCodeProduct;
                $getCodeProduct++;
                $dateNow = date('Y-m-d');
                $getAutoNumber = 'REQ-' . $dateNow . '-' . sprintf("%03s", $getCodeProduct);
            } else {
                $dateNow = date('Y-m-d');
                $getAutoNumber = 'REQ-' . $dateNow . '-' . '001';
            }

            return $getAutoNumber;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function setJabatan($countTransactionApprove)
    {
        $forwardLetter = 'Atasan';
        switch ($countTransactionApprove) {
            case 0:
                $forwardLetter = 'Bod';
                break;
            case 1:
                $forwardLetter = 'Finance';
                break;
            case 2:
                $forwardLetter = 'Direktur';
                break;
            default:
                $forwardLetter = 'Atasan';
                break;
        }

        return $forwardLetter;
    }

    public static function userTtdLaporan($jabatan, $namaProfile, $users_id, $usersid_atasan, $item)
    {
        switch ($jabatan) {
            case 'Bod':
                return [
                    'nama_profile' => $namaProfile,
                    'result' => $item
                ];
                break;
            case 'Finance':
                return [
                    'nama_profile' => $namaProfile,
                    'result' => $item
                ];
                break;
            case 'Direktur':
                return [
                    'nama_profile' => $namaProfile,
                    'result' => $item
                ];
                break;
            default:
                if ($users_id == $usersid_atasan) {
                    return [
                        'nama_profile' => $namaProfile,
                        'result' => $item
                    ];
                } else {
                    return '-';
                }
                break;
        }
    }

    public static function transactionApprovelTtd($transactionApprovel, $getTransaction, $dataNamaJabatan)
    {
        foreach ($transactionApprovel as $key => $item) {
            $namaJabatan = ucwords(strtolower($item->users->profile->jabatan->nama_jabatan));
            if ($dataNamaJabatan == 'Atasan') {
                $namaJabatan = 'Atasan';
            }
            $profile = ($item->users->profile->nama_profile);
            $users_id = $item->users_id;
            $rowDataJabatan = UtilsHelper::userTtdLaporan($namaJabatan, $profile, $users_id, $getTransaction->users->profile->usersid_atasan, $item);
            if ($rowDataJabatan != '-') {
                $rowData[$namaJabatan] = $rowDataJabatan;
            }
        }
        return isset($rowData[$dataNamaJabatan]) ? $rowData[$dataNamaJabatan] : '-';
    }

    public static function integerMonth($month)
    {
        switch ($month) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
            default:
                return 'Januari';
                break;
        }
    }

    public static function monthData()
    {
        return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    }

    public static function stringMonth($month)
    {
        switch ($month) {
            case 'Januari':
                return 1;
                break;
            case 'Februari':
                return 2;
                break;
            case 'Maret':
                return 3;
                break;
            case 'April':
                return 4;
                break;
            case 'Mei':
                return 5;
                break;
            case 'Juni':
                return 6;
                break;
            case 'Juli':
                return 7;
                break;
            case 'Agustus':
                return 8;
                break;
            case 'September':
                return 9;
                break;
            case 'Oktober':
                return 10;
                break;
            case 'November':
                return 11;
                break;
            case 'Desember':
                return 12;
                break;
            default:
                return 1;
                break;
        }
    }

    public static function pushNotifikasiSave($transaction_id, $num = 0, $isTopic = false, $userIdFcm = 0)
    {
        // to notifikasi
        $uuidV4 = (string) Uuid::uuid4();
        $getTransaksi = Transaction::with('users.profile.jabatan', 'usersReview.profile.jabatan')->find($transaction_id, [
            'id',
            'code_transaction',
            'purpose_transaction',
            'users_id',
            'status_transaction',
            'users_id_review',
            'tanggal_transaction',
        ]);
        $namaProfile = $getTransaksi->users->profile->nama_profile . ' ' . '(' . $getTransaksi->users->profile->jabatan->nama_jabatan . ')';
        $namaApprovel = $getTransaksi->usersReview->profile->nama_profile . ' ' . '(' . $getTransaksi->usersReview->profile->jabatan->nama_jabatan . ')';
        $purposeTransaction = $getTransaksi->purpose_transaction;

        $message = '';
        $title = '';
        if ($getTransaksi->status_transaction == 'menunggu') {
            $title = 'Pengajuan Baru';
            $statusDibuat = $num == 0 ? 'dibuat' : ($num == 1 ? 'diubah' : ($num == 2 ? 'dihapus' : ''));
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' telah di ' . $statusDibuat . ' oleh ' . $namaProfile . ' dengan tujuan ' . $purposeTransaction . ' dengan status ' . $getTransaksi->status_transaction . ' dan menunggu approval dari ' . $namaApprovel;
        }
        if ($getTransaksi->status_transaction == 'ditolak') {
            $title = 'Pengajuan Ditolak';
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' dengan tujuan ' . $purposeTransaction . ' telah di tolak oleh ' . $namaApprovel;
        }
        if ($getTransaksi->status_transaction == 'disetujui') {
            $title = 'Pengajuan Disetujui';
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' dengan tujuan ' . $purposeTransaction . ' telah di setujui oleh ' . $namaApprovel;
        }
        if ($getTransaksi->status_transaction == 'selesai') {
            $title = 'Pengajuan Selesai';
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' dengan tujuan ' . $purposeTransaction . ' telah selesai';
        }
        if ($getTransaksi->status_transaction == 'direvisi') {
            $title = 'Pengajuan Direvisi';
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' dengan tujuan ' . $purposeTransaction . ' telah direvisi oleh ' . $namaApprovel;
        }
        if ($num == 2) {
            $title = 'Pengajuan Dihapus';
            $message = 'Pengajuan dengan code ' . $getTransaksi->code_transaction . ' dengan tujuan ' . $purposeTransaction . ' telah dihapus oleh ' . $namaProfile;
        }

        $pushNotifikasi = [
            'title' => $title,
            'body' => $message,
            'key' => strval($getTransaksi->id) . '-' . strval($num),
            'uuid' => strval($getTransaksi->id),
            'image' => $getTransaksi->users->profile->gambar_profile,
            'nama' => $namaProfile,
            'code' => $getTransaksi->code_transaction,
            'message' => $message,
            'num' => strval($num),
            'tanggal_transaction' => UtilsHelper::formatDate($getTransaksi->tanggal_transaction),
            'users_id_view' => $isTopic ? strval(Auth::id()) : strval($userIdFcm),
        ];

        $notification = [
            'title' => $title,
            'body' => $message
        ];

        $accessToken = AccessToken::first();
        $fcmToken = json_decode($accessToken->fcm_token, true) ?? [];
        $filterActive = array_filter($fcmToken, function ($item) {
            return $item['status'] == 1;
        });
        $fields = [];
        if ($isTopic) {
            $fields = [
                'message' => [
                    'topic' => 'pengajuan',
                    'notification' => $notification,
                    'data' => $pushNotifikasi
                ],
            ];
        } else {
            $getUsersToken = AccessToken::first();
            $fcmToken = json_decode($getUsersToken->fcm_token, true);
            $usersActive = array_filter($fcmToken, function ($item) use ($userIdFcm) {
                return $item['user_id'] == $userIdFcm && $item['status'] == 1;
            });
            $getDataFcm = array_values($usersActive);
            if (count($getDataFcm) > 0) {
                $fields = [
                    'message' => [
                        'token' => $getDataFcm[0]['fcm_token'],
                        'notification' => $notification,
                        'data' => $pushNotifikasi
                    ],
                ];
            }
        }

        // foreach ($filterActive as $key => $item) {
        //     $fields[] = [
        //         'message' => [
        //             'token' => $item['fcm_token'],
        //             'notification' => $notification,
        //             'data' => $pushNotifikasi
        //         ],
        //     ];
        // }
        return $fields;
    }

    public static function isTokenExpired($accessToken)
    {
        $token = json_decode($accessToken->token, true);
        $expires_in = $token['expires_in'];
        $expires_at = Carbon::parse($accessToken->created_at)->addSeconds($expires_in);

        return Carbon::now()->greaterThanOrEqualTo($expires_at);
    }

    public static function generateAccessToken()
    {
        $path = public_path('firebase_credentials.json');
        $credentials = json_decode(file_get_contents($path), true);

        $client = new GoogleClient();
        $client->setAuthConfig($credentials);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $accessToken = AccessToken::first();
        if ($accessToken) {
            if (UtilsHelper::isTokenExpired($accessToken)) {
                $token = $client->fetchAccessTokenWithAssertion();
                $accessToken->update([
                    'token' => json_encode($token),
                ]);
            } else {
                $token = json_decode($accessToken->token, true);
            }
        } else {
            $token = $client->fetchAccessTokenWithAssertion();
            AccessToken::create([
                'token' => json_encode($token),
            ]);
        }
        return $token;
    }

    public static function sendNotification($jsonData)
    {

        $generateToken = UtilsHelper::generateAccessToken();
        $client = new Client();
        $token = $generateToken['access_token'];
        $url = 'https://fcm.googleapis.com/v1/projects/pushnotifikasi-d1aac/messages:send';

        if (count($jsonData) == 0) {
            return [
                'success' => false,
                'message' => 'Data not found'
            ];
        }

        $tokenId = 'eform-3c473';
        $generateToken = UtilsHelper::generateAccessToken();
        $client = new Client();
        $token = $generateToken['access_token'];
        $url = 'https://fcm.googleapis.com/v1/projects/' . $tokenId . '/messages:send';


        try {
            // Lakukan request POST ke API eksternal
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
                'json' => $jsonData,
            ]);

            // Ambil respon dari API eksternal
            $responseData = json_decode($response->getBody()->getContents(), true);

            // Return response sukses
            return [
                'success' => true,
                'data' => $responseData
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public static function formatUang($nominal)
    {
        return number_format($nominal, 0, '.', ',');
    }
}
