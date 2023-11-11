<?php

namespace Modules\Master\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Http\Requests\CreatePostMenuRequest;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $createTree = UtilsHelper::createStructureTree();
        if ($request->ajax()) {
            $createTree = UtilsHelper::createStructureTree();
            return view('master::menu.renderTree', compact('createTree'))->render();
        }

        return view('master::menu.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $daftarMenu = Menu::all();
        return view('master::menu.form', compact('daftarMenu'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostMenuRequest $request)
    {
        //
        $data = $request->except(['menu_root']);

        $insertMenu = Menu::create($data);
        $menu_id = $insertMenu->id;

        $menu_root = $request->input('menu_root');
        if ($menu_root != null) {
            $getMenu = Menu::find($menu_root);
            $getMenuChildren = json_decode($getMenu->children_menu, 1);
            $getMenuChildren = implode(',', $getMenuChildren);

            $children_menu_update = $menu_id;
            if ($getMenuChildren != null) {
                $children_menu_update = $getMenuChildren . ',' . $menu_id;
            }
            $children_menu_update = explode(',', $children_menu_update);
            $children_menu_update = json_encode($children_menu_update);

            $getMenu->children_menu = $children_menu_update;
            $getMenu->is_node = 1;
            $getMenu->is_children = 0;
            $getMenu->save();
        }

        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('master::menu.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $daftarMenu = Menu::all();
        $menuRootId = Menu::where('children_menu', 'like', '%' . $id . '%')->first();
        $menuChildren = json_encode($menu->children_menu);
        return view('master::menu.form', compact('menu', 'daftarMenu', 'menuRootId', 'menuChildren'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostMenuRequest $request, $id)
    {
        //
        $data = $request->except(['menu_root', '_method']);

        Menu::find($id)->update($data);
        $menu_id = $id;

        $menu_root = $request->input('menu_root');
        if ($menu_root != null) {
            $getMenu = Menu::find($menu_root);
            $getMenuChildren = json_decode($getMenu->children_menu, 1);
            $getMenuChildren = implode(',', $getMenuChildren);

            $children_menu_update = $menu_id;
            if ($getMenuChildren != null) {
                $children_menu_update = $getMenuChildren . ',' . $menu_id;
            }
            $children_menu_update = explode(',', $children_menu_update);
            $children_menu_update = json_encode($children_menu_update);

            $getMenu->children_menu = $children_menu_update;
            $getMenu->is_node = 1;
            $getMenu->is_children = 0;
            $getMenu->save();
        }

        $queryLike = Menu::where('children_menu', 'like', '%' . $id . '%')
            ->where('id', '!=', $menu_root)->first();
        if ($queryLike != null) {
            if ($queryLike->id != $menu_id) {
                $getMenuLike = $queryLike->children_menu;
                $explodeData = json_decode($getMenuLike, true);

                $resultData = array_filter($explodeData, function ($value) use ($id) {
                    return $value !== $id;
                });
                $implodeData = null;
                $isNode = 0;
                $isChildren = 1;

                if (count($resultData) > 0) {
                    $implodeData = json_encode($resultData);
                    $isNode = 1;
                    $isChildren = 0;
                }
                $queryLike->children_menu = $implodeData;
                $queryLike->is_node = $isNode;
                $queryLike->is_children = $isChildren;
                $queryLike->save();
            }
        }


        return response()->json('Berhasil mengubah data', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    private function flattenData($data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            $result[] = $item["id"];
            if (isset($item["children"])) {
                $result = array_merge($result, $this->flattenData($item["children"]));
            }
        }

        return $result;
    }

    private function flattenDataUpdate($data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            $result[] = $item["id"];
            Menu::find($item['id'])->update([
                'children_menu' => null,
                'is_node' => 0,
                'is_children' => 1
            ]);

            if (isset($item["children"])) {
                $implodeChildren =  $item['children'];
                $resultArrayId = [];
                foreach ($implodeChildren as $key => $value) {
                    $resultArrayId[] = $value['id'];
                }
                $implodeChildren = json_encode($resultArrayId);
                Menu::find($item['id'])->update([
                    'children_menu' => $implodeChildren,
                    'is_node' => 1,
                    'is_children' => 0
                ]);

                $result = array_merge($result, $this->flattenDataUpdate($item["children"]));
            }
        }

        return $result;
    }

    public function destroy($id)
    {
        //
        $nestedTree = json_decode(request()->input('nestedTree'), true);
        $dataFlatten = (array) $this->flattenData($nestedTree);
        $getDataMenu = Menu::find($id);
        $arrayMerge = [];
        if ($getDataMenu->children_menu != null) {
            $childrenMenu = json_decode($getDataMenu->children_menu, true);
            $arrayMerge = array_merge([$id], $childrenMenu);
        } else {
            $arrayMerge = [$id];
        }

        $result = array_filter($dataFlatten, function ($value) use ($arrayMerge) {
            $dataFilter = true;
            if (in_array($value, $arrayMerge)) {
                $dataFilter = false;
            };
            return $dataFilter;
        });
        $someId = array_values($result);
        foreach ($someId as $key => $value) {
            $getMenu = Menu::find($value);
            if ($getMenu) {
                $getMenu->no_menu = $key + 1;
                $getMenu->save();
            }
        }

        // check is node
        $queryLike = Menu::where('children_menu', 'like', '%' . $id . '%')
            ->first();
        if ($queryLike != null) {
            $childrenMenuData = json_decode($queryLike->children_menu, true);
            $resultData = array_filter($childrenMenuData, function ($value) use ($id) {
                return $value !== $id;
            });
            $implodeData = null;
            $isNode = 0;
            $isChildren = 1;
            if (count($resultData) > 0) {
                $implodeData = json_encode($resultData);
                $isNode = 1;
                $isChildren = 0;
            }

            $menuUpdate = Menu::find($queryLike->id);
            $menuUpdate->children_menu = $implodeData;
            $menuUpdate->is_node = $isNode;
            $menuUpdate->is_children = $isChildren;
            $menuUpdate->save();
        }

        Menu::whereIn('id', $arrayMerge)->delete();
        return response()->json('Berhasil menghapus list menu');
    }

    public function renderTree()
    {
        $createTree = UtilsHelper::createStructureTree();
        return view('master::menu.renderTreeAction', compact('createTree'))->render();
    }

    public function dataTable()
    {
        $data = Menu::where('is_children', 1)->get();
        return response()->json($data);
    }

    public function sortAndNested()
    {
        $nestedTree = json_decode(request()->input('nestedTree'), true);
        $dataFlatten = (array) $this->flattenData($nestedTree);
        foreach ($dataFlatten as $key => $value) {
            $getMenu = Menu::find($value);
            if ($getMenu) {
                $getMenu->no_menu = $key + 1;
                $getMenu->save();
            }
        }

        (array) $this->flattenDataUpdate($nestedTree);
        return response()->json('Berhasil sort and nested list menu');
    }
}
