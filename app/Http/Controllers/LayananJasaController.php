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

use App\Helpers\Cstm;

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
                $pilih = "<a href=".url('http://localhost:8000/seller/layananjasa/edit/'.$jasa->idlayanan)." id='tombol_hapus'
                                class='btn btn-icon btn-primary btn-sm'
                                data-id = '".$jasa->idlayanan."'
                                >
                            <i class='far fa-edit'></i>
                        </a>";
                return $pilih;
            })
            ->addColumn('gambar', function ($jasa) {
                $img = url('jasa').'/'.$jasa->displaylayanan;
                $gambar = 
                    '<span style="width: 250px;">
                        <div class="d-flex align-items-center">     
                            <div class="symbol symbol-50 symbol-sm flex-shrink-0">                
                                <div class="symbol-label">                                
                                    <img class="align-self-end" style="border-radius:5px;" width="120" height="80" src="'.$img.'"alt="photo">                            
                            </div>                        
                        </div>                        
                        <a href="'.url('seller/detail-layananjasa').'/'.$jasa->slug.'" class="text-muted font-weight-bold text-hover-primary">                   
                        <div class="ml-4">                            
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                        '.$jasa->layanan.'
                                    </div>                       
                                </div>     
                            </a>               
                        </div>
                    </span>';
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
            'slug' => Cstm::slug($request->i_layanan),
            'created_at' => $this->date()
        ];

        if($request->file('i_displaylayanan') != null){

            $image = $request->file('i_displaylayanan');
            $image_name = 'PXL-'.sha1(md5($image.time())).'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/jasa", $image_name);

            $param['displaylayanan'] = $image_name;
            LayananJasa::insert($param);
            return redirect('seller/layananjasa')->with('sukses', 'Berhasil menambahkan layanan jasa');


        }else{
            LayananJasa::insert($param);
            return redirect('seller/layananjasa')->with('sukses', 'Berhasil menambahkan layanan jasa');
        }
    }

    public function detail(Request $request, $slug) {
        $layanan = LayananJasa::where('slug', $slug)->first();
        Yin::debug($layanan);
    }

    public function edit(LayananJasa $layananjasa) {

        if($layananjasa->iduser != Auth::user()->id){
            abort(403);
        }
        $kategori = Kategori::orderBy('kategorijasa', 'asc')->get();
        return view('content.edit_layananjasa', compact('kategori', 'layananjasa'));
    }

    public function update(Request $request, $idlayanan){

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

        $paramUpdate = [
            'idkategori' => $request->i_kategori,
            'layanan' => $request->i_layanan,
            'deskripsilayanan' => $request->i_deskripsilayanan,
            'hargalayanan' => $request->i_harga,
            'isaktif' => $request->i_isaktif == 1 ? 1 : 0,
            'slug' => Cstm::slug($request->i_layanan),
            'updated_at' => $this->date()
        ];

        if($request->file('i_displaylayanan') != null){

            $cekimage = LayananJasa::where('idlayanan', $idlayanan)->first();
            if(File::exists(public_path('jasa/'.$cekimage->displaylayanan))){
                File::delete(public_path('jasa/'.$cekimage->displaylayanan));
            }

            $image = $request->file('i_displaylayanan');
            $image_name = 'PXL-'.sha1(md5($image.time())).'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/jasa", $image_name);

            $paramUpdate['displaylayanan'] = $image_name;
            LayananJasa::where('idlayanan', $idlayanan)->update($paramUpdate);
            return redirect('seller/layananjasa')->with('sukses', 'Berhasil mengubah layanan jasa');


        }else{
            LayananJasa::where('idlayanan', $idlayanan)->update($paramUpdate);
            return redirect('seller/layananjasa')->with('sukses', 'Berhasil mengubah layanan jasa');
        }
    }
}
