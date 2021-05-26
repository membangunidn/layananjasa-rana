<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Validator;
use App\Helpers\Yin;
use App\User;
use App\Kategori;

use DataTables;

class KategoriController extends Controller
{
    public function load_table(Request $request) {

        if(empty($request->ajax())) {
            abort(404);
        }

        $kategori = Kategori::orderBy('idkategori', 'DESC')->get(); 
        return DataTables::of($kategori)
            ->addColumn('aksi', function ($kategori) {
                $pilih = "
                        <button id='tombol_edit' class='btn btn-icon btn-light-info btn-sm mr-2'
                            data-kodekategori = '".$kategori->kodekategori."'
                            data-kategorijasa= '".$kategori->kategorijasa."'
                            data-id='".$kategori->idkategori."'
                            >
                            <i class='far fa-edit'></i>
                        </button>
                        <button id='tombol_hapus'
                                class='btn btn-icon btn-light-warning btn-sm mr-2'
                                data-id = '".$kategori->idkategori."'
                                >
                            <i class='far fa-trash-alt'></i>
                        </button>";
                return $pilih;
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function index() {
        return view('content.master.list_kategorijasa');
    }

    public function store(Request $request) {

        $rules = [
            'i_kodekategori' => 'required|max:10',
            'i_kategorijasa' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodekategori' => $request->i_kodekategori,
            'kategorijasa' => $request->i_kategorijasa,
            'created_by' => Auth::user()->biodata->namalengkap,
            'created_at' => $this->date()
        ];

        Kategori::insert($data);
        $param = ['status' => true,'msg' => 'Berhasil menambahkan data Kategori Jasa'];
        return response()->json($param, 200);
    }

    public function update(Request $request) {

        $rules = [
            'i_kodekategori' => 'required|max:10',
            'i_kategorijasa' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodekategori' => $request->i_kodekategori,
            'kategorijasa' => $request->i_kategorijasa,
            'created_by' => Auth::user()->biodata->namalengkap,
            'updated_at' => $this->date()
        ];

        Kategori::where('idkategori', $request->id)->update($data);
        $param = ['status' => true,'msg' => 'Berhasil mengubah data Kategori Jasa'];
        return response()->json($param, 200);
    }

    public function destroy(Request $request) {
        $id = $request->idhapus;
        $res = Kategori::where('idkategori', $id)->delete();
        $param = [
            'status' => true,
            'msg' => 'Berhasil menghapus data Kategori Jasa'
        ];
        return response()->json($param, 201);
    }
}
