<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Http\Requests\CreatePostNoteRequest;
use App\Models\Note;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Note::query();
            return DataTables::eloquent($data)
                ->addColumn('tanggal_notes', function ($row) {
                    $dateNow = $row->tanggal_notes;
                    $tanggal = Carbon::parse($dateNow);
                    $formattedDate = $tanggal->format('d/m/Y');
                    return $formattedDate;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('master.notes.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/notes/' . $row->id . '?_method=delete') . '">
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
                ->rawColumns(['action', 'tanggal_notes', 'keterangan_notes'])
                ->toJson();
        }
        return view('master::note.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('master::note.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostNoteRequest $request)
    {
        //
        $request->request->add([
            'users_id' => Auth::id()
        ]);
        Note::create($request->all());
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('master::note.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $notes = Note::find($id);
        return view('master::note.form', compact('notes'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostNoteRequest $request, $id)
    {
        //
        $request->request->add([
            'users_id' => Auth::id()
        ]);
        $data = $request->except(['_method']);
        Note::find($id)->update($data);
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
        Note::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }
}
