<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LayananJasa;
use App\Kategori;
use App\Biodata;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    
    public function layanan(Request $request) {

        $layanan = DB::table('layanan as lj')
            ->select('lj.*', 'b.idlokasi', 'b.namalengkap', 'l.lokasi', 
                        'l.slug as lokasislug', 'k.kategorijasa', 'k.slug as kategorislug')
            ->LeftJoin('kategorijasa as k', 'lj.idkategori', '=', 'k.idkategori')
            ->LeftJoin('biodata as b', 'lj.iduser', '=', 'b.iduser')
            ->LeftJoin('lokasi as l', 'b.idlokasi', '=', 'l.idlokasi')
            ->where(array('lj.isaktif' => 1))->paginate(5);

        if(isset($request->qkategori)){
            $layanan =  $this->cari_byLayananAndKota($request->qkategori, $request->qkota);
        } else {
            $request->session()->forget('urlsearchparam');

        }

        $kategori = Kategori::all();
        return view('content.home.view_layanan', compact('layanan', 'kategori'));
    }

    private function cari_byLayananAndKota($kategori, $kota = null) {
        
        $query = DB::table('layanan as lj')
                ->select('lj.*', 'b.idlokasi', 'b.namalengkap', 'l.lokasi', 
                            'l.slug as lokasislug', 'k.kategorijasa', 'k.slug as kategorislug')
                ->LeftJoin('kategorijasa as k', 'lj.idkategori', '=', 'k.idkategori')
                ->LeftJoin('biodata as b', 'lj.iduser', '=', 'b.iduser')
                ->LeftJoin('lokasi as l', 'b.idlokasi', '=', 'l.idlokasi');

    
        if($kota != null){
            $sql = $query->where(array('k.slug' => $kategori, 'l.slug' => $kota, 'lj.isaktif' => 1))->paginate(5);
            // create session url
            session(['urlsearchparam' => '&qkategori='.$kategori.'&qkota='.$kota]);
        } else {
            // create session url
            session(['urlsearchparam' => '&qkategori='.$kategori]);
            $sql = $query->where(array('k.slug' => $kategori, 'lj.isaktif' => 1))->paginate(5);
        }


        return $sql;
    }
}
