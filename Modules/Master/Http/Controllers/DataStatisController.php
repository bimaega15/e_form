<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Http\Requests\CreatePostDataStatisRequest;
use App\Models\DataStatis;
use DataTables;
use Illuminate\Support\Facades\Config;

class DataStatisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public $jenis_ref;
    public function __construct()
    {
        $this->jenis_ref = Config::get('datastatis.jenis_referensi');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DataStatis::query();
            return DataTables::eloquent($data)
                ->addColumn('jenisreferensi_datastatis', function ($row) {
                    $output = '';
                    $getData = $this->jenis_ref;
                    $output = $getData[$row->jenisreferensi_datastatis];
                    return $output;
                })
                ->addColumn('parentid_datastatis', function ($row) {
                    $output = '';
                    $getData = DataStatis::find($row->parentid_datastatis);
                    $output = ($getData != null ? $getData->nama_datastatis : '-');
                    return $output;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('master.dataStatis.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/dataStatis/' . $row->id . '?_method=delete') . '">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                </div>
                ';

                    return $button;
                })
                ->rawColumns(['action', 'parentid_datastatis'])
                ->toJson();
        }
        return view('master::dataStatis.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $jenisReferensi = $this->jenis_ref;
        return view('master::dataStatis.form', compact('jenisReferensi'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostDataStatisRequest $request)
    {
        //
        $insert = DataStatis::create($request->all());
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('master::dataStatis.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $dataStatis = DataStatis::find($id);
        $jenisReferensi = $this->jenis_ref;
        $parentStatis = DataStatis::find($dataStatis->parentid_datastatis);

        return view('master::dataStatis.form', compact('dataStatis', 'jenisReferensi', 'parentStatis'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostDataStatisRequest $request, $id)
    {
        //
        $data = $request->except(['_method']);
        DataStatis::find($id)->update($data);
        return response()->json('Berhasil mengubah data', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        DataStatis::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }

    // out of method
    public function parentStatis(Request $request)
    {
        $jenisreferensi_datastatis = $request->input('jenisreferensi_datastatis');
        $search = $request->input('search');
        $limit = 10;
        $page = $request->input('page');
        $endPage = $page * $limit;
        $firstPage = $endPage - $limit;

        $data = DataStatis::select();
        $countData = DataStatis::all()->count();

        if ($jenisreferensi_datastatis != null) {
            $data->where('jenisreferensi_datastatis', '=',  $jenisreferensi_datastatis);
            $countData = DataStatis::where('jenisreferensi_datastatis', $jenisreferensi_datastatis)->get()->count();
        }

        if ($search != null) {
            $data->where('nama_datastatis', 'like', '%' . $search . '%')
                ->orWhere('kode_datastatis', 'like', '%' . $search . '%')
                ->orWhere('jenisreferensi_datastatis', 'like', '%' . $search . '%');
        }
        $data = $data->offset($firstPage)
            ->limit($limit)
            ->get();

        $result = [];
        foreach ($data as $key => $v_data) {
            $result['results'][] =
                [
                    'id' => $v_data->id,
                    'text' =>  $v_data->nama_datastatis,
                ];
        }
        if ($search != null) {
            $countData = count($result);
        }

        $result['count_filtered'] = $countData;
        return $result;
    }

    public function migrasi()
    {
        $jsonData = file_get_contents('data/timezone.json');
        $data = json_decode($jsonData, true);
        $setDb = [];
        foreach ($data as $key => $value) {
            $code = 'ZN' . str_pad($key + 1, 3, '0', STR_PAD_LEFT);
            $setDb[] = [
                'kode_datastatis' => $code,
                'nama_datastatis' => $value,
                'jenisreferensi_datastatis' => 'zona_waktu',
                'parentid_datastatis' => null
            ];
        }
        $createData = DataStatis::insert($setDb);
        return response()->json('Berhasil menambahkan ' . count($setDb));
    }
}
