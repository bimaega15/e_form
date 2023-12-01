<?php

namespace App\Http\Helpers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

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
                <a href="' . route('master.menu.edit', $menu_item->id) . '" class="btn btn-warning btn-edit btn-sm" style="padding: 0 5px;">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                ';
            $buttonDelete = '
                <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/menu/' . $menu_item->id . '?_method=delete') . '" style="padding: 0 5px;">
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
        $numberProduct = Product::all()->count();

        $increment = '0001';
        if ($numberProduct > 0) {
            $latestProduct = Product::latest()->first();

            $latestDate = $latestProduct->created_at;

            if ($latestDate) {
                $latestDate = $latestDate->format('Ymd');
            }

            if ($latestDate == $tanggal) {
                $increment = str_pad((int)substr($latestProduct->code, -4) + 1, 4, '0', STR_PAD_LEFT);
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
}
