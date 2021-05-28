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
use App\LayananJasa;
use App\Kategori;
use DataTables;

class LayananJasaController extends Controller
{

    public function load_table(Request $request) {
        if(!$request->ajax()){
            abort(404);
        }

        $jasa = DB::select("SELECT l.*, k.kategorijasa FROM layanan l 
                    LEFT JOIN kategorijasa k using(idkategori) 
                    WHERE l.iduser = " . Auth::user()->id . " ORDER BY l.idlayanan desc");
        return DataTables::of($jasa)
            ->addColumn('aksi', function ($jasa) {
                $pilih = "
                        <button id='tombol_hapus'
                                class='btn btn-icon btn-light-warning btn-sm mr-2'
                                data-id = '".$jasa->idlayanan."'
                                >
                            <i class='far fa-trash-alt'></i>
                        </button>";
                return $pilih;
            })
            ->addColumn('gambar', function ($jasa) {
                $img = url('jasa').'/'.$jasa->displaylayanan;
                $gambar = '
                <div class="symbol symbol-50 symbol-lg-120">
                            <img style="border-radius:5px;" src="'.$img.'" alt="image" width="120" height="80">
                        </div>';
                return $gambar;
            })
            ->editColumn('isaktif', function($jasa) {

                if($jasa->isaktif == 0) {
                    $html = '
                        <span class="switch">
                            <label>
                                <input type="checkbox" onclick="go_aktif('.$jasa->idlayanan.')" id="isaktif'.$jasa->idlayanan.'"/>
                                <span></span>
                            </label>
                        </span>';
                } else {
                    $html = '
                    <span class="switch">
                        <label>
                            <input type="checkbox" onclick="go_aktif('.$jasa->idlayanan.')" checked="checked" id="isaktif'.$jasa->idlayanan.'"/>
                            <span></span>
                        </label>
                    </span>';
                }

                return $html;
            })
            ->editColumn('hargalayanan', function($jasa) {
                return 'Rp. '.number_format($jasa->hargalayanan, 2);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi', 'gambar', 'isaktif'])
            ->make(true);

        
    }

    public function isaktif(Request $request){

        if(!$request->ajax()){
            abort(404);
        }
        
        $update = LayananJasa::where('idlayanan', $request->idlayanan)->update([
            'isaktif' => $request->val_isaktif
        ]);

        return response()->json([
            'response' => $update,
            'msg' => 'Berhasil Mengaktifkan Layanan Jasa'
        ], 200);
    }

    public function list() {
        return view('content.list_layananjasa');
    }

    public function add() {
        $kategori = Kategori::orderBy('kategorijasa', 'asc')->get();
        return view('content.add_layananjasa', compact('kategori'));
    }

    public function store(Request $request) {
        
        $validate = [
            'i_displaylayanan' => 'Display Jasa',
            'i_layanan' => 'Layanan Jasa',
            'i_kategori' => 'Kategori Jasa',
            'i_deskripsilayanan' => 'Deskripsi Layanan',
            'i_harga' => 'Harga',
        ];
        
        $this->validate($request, [
            'i_displaylayanan' => 'image|nullable|max:2048',
            'i_layanan' => 'required',
            'i_kategori' => 'required',
            'i_deskripsilayanan' => 'required',
            'i_harga' => 'required|numeric',
        ], Yin::Check(), $validate);

        $param = [
            'iduser' => Auth::user()->id,
            'idkategori' => $request->i_kategori,
            'layanan' => $request->i_layanan,
            'deskripsilayanan' => $request->i_deskripsilayanan,
            'hargalayanan' => $request->i_harga,
            'isaktif' => $request->i_isaktif == 1 ? 1 : 0,
            'created_at' => $this->date()
        ];

        if($request->file('i_displaylayanan') != null){

            $image = $request->file('i_displaylayanan');
            $image_name = 'PXL-'.sha1(md5($image.time())).'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/jasa", $image_name);

            $param['displaylayanan'] = $image_name;
            LayananJasa::insert($param);
            return redirect('seller/add-layananjasa')->with('sukses', 'Berhasil menambahkan layanan jasa');


        }else{
            LayananJasa::insert($param);
            return redirect('seller/add-layananjasa')->with('sukses', 'Berhasil menambahkan layanan jasa');
        }
    }
}
