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
use App\Lokasi;

use DataTables;

class LokasiController extends Controller
{

    public function load_table(Request $request) {

        if(empty($request->ajax())) {
            abort(404);
        }

        $lokasi = Lokasi::orderBy('idlokasi', 'DESC')->get(); 
        return DataTables::of($lokasi)
            ->addColumn('aksi', function ($lokasi) {
                $pilih = "
                        <button id='tombol_edit' class='btn btn-icon btn-light-info btn-sm mr-2'
                            data-kodelokasi = '".$lokasi->kodelokasi."'
                            data-lokasi= '".$lokasi->lokasi."'
                            data-id='".$lokasi->idlokasi."'
                            >
                            <i class='far fa-edit'></i>
                        </button>
                        <button id='tombol_hapus'
                                class='btn btn-icon btn-light-warning btn-sm mr-2'
                                data-id = '".$lokasi->idlokasi."'
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
        return view('content.master.list_lokasi');
    }
    
    public function store(Request $request) {

        $rules = [
            'i_kodelokasi' => 'required|max:5',
            'i_lokasi' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodelokasi' => $request->i_kodelokasi,
            'lokasi' => $request->i_lokasi,
            'created_by' => Auth::user()->biodata->namalengkap,
            'created_at' => $this->date()
        ];

        Lokasi::insert($data);
        $param = ['status' => true,'msg' => 'Berhasil menambahkan data Lokasi'];
        return response()->json($param, 200);
    }

    public function update(Request $request) {

        $rules = [
            'i_kodelokasi' => 'required|max:5',
            'i_lokasi' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodelokasi' => $request->i_kodelokasi,
            'lokasi' => $request->i_lokasi,
            'created_by' => Auth::user()->biodata->namalengkap,
            'updated_at' => $this->date()
        ];

        Lokasi::where('idlokasi', $request->id)->update($data);
        $param = ['status' => true,'msg' => 'Berhasil mengubah data Lokasi'];
        return response()->json($param, 200);
    }

    public function destroy(Request $request) {
        $id = $request->idhapus;
        $res = Lokasi::where('idlokasi', $id)->delete();
        $param = [
            'status' => true,
            'msg' => 'Berhasil menghapus data lokasi'
        ];
        return response()->json($param, 201);
    }
}
