<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Exception;
use Validator;
use App\Helpers\Yin;
use App\Biodata;
use App\Lokasi;
use App\Jenpen;
use App\User;
use App\LayananJasa;
use App\Kategori;
use App\JenisKeahlian;


class AjaxController extends Controller
{
    public function cari_lokasi(Request $request){

        if(!$request->ajax()) {
            abort(404);
        }

        $keyword = $request->cari;
        $lokasi = Lokasi::where('kodelokasi', 'LIKE', '%'.$keyword. '%')
            ->orWhere('lokasi', 'LIKE', '%'.$keyword.'%')
            ->orderBy('lokasi', 'asc')->limit(15)->get();

        $a_data = [];
        foreach($lokasi as $i => $v) {
            $a_data[] = array("id"=>$v->idlokasi, "text"=>$v->kodelokasi.' - '.$v->lokasi);
        }
        return response()->json($a_data, 201);
    }

    public function cari_pendidikan(Request $request) {
        if(!$request->ajax()) {
            abort(404);
        }

        $keyword = $request->cari;
        $jenjang = Jenpen::where('kodejenjang', 'LIKE', '%'.$keyword. '%')
            ->orWhere('jenjangpendidikan', 'LIKE', '%'.$keyword.'%')
            ->orderBy('kodejenjang', 'asc')->limit(5)->get();

        $a_data = [];
        foreach($jenjang as $i => $v) {
            $a_data[] = array("id"=>$v->idjenjang, "text"=>$v->kodejenjang.' - '.$v->jenjangpendidikan);
        }

        return response()->json($a_data, 201);
    }

    public function cari_jeniskeahlian(Request $request) {
        if(!$request->ajax()) {
            abort(404);
        }

        $keyword = $request->cari;
        $jk = JenisKeahlian::where('jeniskeahlian', 'LIKE', '%'.$keyword. '%')
            ->orderBy('idkeahlian', 'asc')->limit(15)->get();

        $a_data = [];
        foreach($jk as $i => $v) {
            $a_data[] = array("id"=>$v->idkeahlian, "text"=>$v->jeniskeahlian);
        }

        return response()->json($a_data, 201);
    }

    public function popup_pdfsertifikasi(Request $request) {
        $data = Biodata::where('iduser', $request->iduser)->first();
        return view('popup.preview_pdf_sertifikasi', compact('data'));
    }

    public function update_status(Request $request) {

        if($request->val == 1) {
            User::where('id', $request->id)->update(['idrole' => 2]);
        }
        $data = [
            'isapprove' => $request->val
        ];
        $response = Biodata::where('iduser', $request->id)->update($data);
        return response()->json([
            'msg' => 'Berhasil mengubah status',
            $response
        ], 201);
    }
}
