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
use App\Jenpen;

use DataTables;

class JenjangPendidikanController extends Controller
{
    public function load_table(Request $request) {

        if(empty($request->ajax())) {
            abort(404);
        }

        $jenpen = Jenpen::orderBy('idjenjang', 'DESC')->get(); 
        return DataTables::of($jenpen)
            ->addColumn('aksi', function ($jenpen) {
                $pilih = "
                        <button id='tombol_edit' class='btn btn-icon btn-light-info btn-sm mr-2'
                            data-kodejenjang = '".$jenpen->kodejenjang."'
                            data-jenjangpendidikan= '".$jenpen->jenjangpendidikan."'
                            data-id='".$jenpen->idjenjang."'
                            >
                            <i class='far fa-edit'></i>
                        </button>
                        <button id='tombol_hapus'
                                class='btn btn-icon btn-light-warning btn-sm mr-2'
                                data-id = '".$jenpen->idjenjang."'
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
        return view('content.master.list_jenjangpendidikan');
    }

    public function store(Request $request) {

        $rules = [
            'i_kodejenjang' => 'required|max:5',
            'i_jenjangpendidikan' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodejenjang' => $request->i_kodejenjang,
            'jenjangpendidikan' => $request->i_jenjangpendidikan,
            'created_by' => Auth::user()->biodata->namalengkap,
            'created_at' => $this->date()
        ];

        Jenpen::insert($data);
        $param = ['status' => true,'msg' => 'Berhasil menambahkan data Lokasi'];
        return response()->json($param, 200);
    }

    public function update(Request $request) {

        $rules = [
            'i_kodejenjang' => 'required|max:5',
            'i_jenjangpendidikan' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, Yin::withValidator());
        if($validator->fails()){
            $param = ['status' => false,'msg' => $validator->errors()];
            return response()->json($param, 200);
        }

        $data = [
            'kodejenjang' => $request->i_kodejenjang,
            'jenjangpendidikan' => $request->i_jenjangpendidikan,
            'created_by' => Auth::user()->biodata->namalengkap,
            'updated_at' => $this->date()
        ];

        Jenpen::where('idjenjang', $request->id)->update($data);
        $param = ['status' => true,'msg' => 'Berhasil mengubah data Jenjang Pendidikan'];
        return response()->json($param, 200);
    }

    public function destroy(Request $request) {
        $id = $request->idhapus;
        $res = Jenpen::where('idjenjang', $id)->delete();
        $param = [
            'status' => true,
            'msg' => 'Berhasil menghapus data lokasi'
        ];
        return response()->json($param, 201);
    }
}
