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
use App\JenisKeahlian;

use DataTables;

class JenisKeahlianController extends Controller
{
    public function load_table(Request $request){

        if(!$request->ajax()) {
            abort(404);
        }

        $jk = JenisKeahlian::orderBy('idkeahlian', 'DESC')->get(); 
        return DataTables::of($jk)
            ->addColumn('aksi', function ($jk) {
                $pilih = "
                        <button id='tombol_edit' class='btn btn-icon btn-light-info btn-sm mr-2'
                            data-jeniskeahlian = '".$jk->jeniskeahlian."'
                            data-id='".$jk->idkeahlian."'
                            >
                            <i class='far fa-edit'></i>
                        </button>
                        <button id='tombol_hapus'
                                class='btn btn-icon btn-light-warning btn-sm mr-2'
                                data-id = '".$jk->idkeahlian."'
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
        return view('content.master.list_jeniskeahlian');
    }

    public function store(Request $request) {
        $rules = [
            'i_jeniskeahlian' => 'required|max:50',
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'jeniskeahlian' => $request->i_jeniskeahlian,
            'created_by' => Auth::user()->biodata->namalengkap,
            'created_at' => $this->date()
        ];

        JenisKeahlian::insert($data);
        $param = ['status' => true,'msg' => 'Berhasil menambahkan data Lokasi'];
        return response()->json($param, 200);
    }

    public function update(Request $request) {
        $rules = [
            'i_jeniskeahlian' => 'required|max:50',
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'jeniskeahlian' => $request->i_jeniskeahlian,
            'created_by' => Auth::user()->biodata->namalengkap,
            'updated_at' => $this->date()
        ];

        JenisKeahlian::where('idkeahlian', $request->id)->update($data);
        $param = ['status' => true,'msg' => 'Berhasil mengubah data Lokasi'];
        return response()->json($param, 200);
    }

    public function destroy(Request $request) {
        $id = $request->idhapus;
        $res = JenisKeahlian::where('idkeahlian', $id)->delete();
        $param = [
            'status' => true,
            'msg' => 'Berhasil menghapus data lokasi'
        ];
        return response()->json($param, 201);
    }
}
