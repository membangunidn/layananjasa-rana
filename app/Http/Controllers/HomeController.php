<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LayananJasa;
use App\Kategori;
use App\Biodata;
use App\Lokasi;
use Illuminate\Support\Facades\DB;

use App\Helpers\Cstm;
use App\Helpers\SendEmail;


class HomeController extends Controller {
    
    public function layanan(Request $request) {

        $layanan =  $this->cari_byLayananAndKota($request->qkategori, $request->qkota);
        $kategori = Kategori::all();
        $kota = Lokasi::all();

        return view('content.home.view_layanan', compact('layanan', 'kategori', 'kota'));
    }

    private function cari_byLayananAndKota($kategori = null, $kota = null) {
        
        $query = DB::table('layanan as lj')
                ->select('lj.*', 'b.idlokasi', 'b.namalengkap', 'l.lokasi', 
                            'l.slug as lokasislug', 'k.kategorijasa', 'k.slug as kategorislug')
                ->LeftJoin('kategorijasa as k', 'lj.idkategori', '=', 'k.idkategori')
                ->LeftJoin('biodata as b', 'lj.iduser', '=', 'b.iduser')
                ->LeftJoin('lokasi as l', 'b.idlokasi', '=', 'l.idlokasi');


        if($kategori == null and $kota != null) {
            $sql = $query->where(array('l.slug' => $kota, 'lj.isaktif' => 1))->orderby('idlayanan', 'desc')->paginate(6);
            // create session url
            session([
                'urlsearchparam' => '&qkota='.$kota,
                'qkategori' => null,
                'qkota' => $kota
            ]); 
        }
        if($kategori != null and $kota == null) {
            $sql = $query->where(array('k.slug' => $kategori, 'lj.isaktif' => 1))->orderby('idlayanan', 'desc')->paginate(6);
            // create session url
            session([
                'urlsearchparam' => '&qkategori='.$kota,
                'qkategori' => $kategori,
                'qkota' => null
            ]); 
        }
        if($kategori != null and $kota != null) {
            $sql = $query->where(array('k.slug' => $kategori, 'l.slug' => $kota, 'lj.isaktif' => 1))->orderby('idlayanan', 'desc')->paginate(6);
            // create session url
            session([
                'urlsearchparam' => '&qkategori='.$kategori.'&qkota='.$kota,
                'qkategori' => $kategori,
                'qkota' => $kota
            ]);
        }
        else {
            $sql = $query->orderby('idlayanan', 'desc')->paginate(6);
            session()->forget(['urlsearchparam', 'qkota', 'qkategori']);
        }

        return $sql;
    }

    public function index_home() {
        $layanan = DB::table('layanan as lj')
                ->select('lj.*', 'b.idlokasi', 'b.namalengkap', 'l.lokasi', 
                            'l.slug as lokasislug', 'k.kategorijasa', 'k.slug as kategorislug')
                ->LeftJoin('kategorijasa as k', 'lj.idkategori', '=', 'k.idkategori')
                ->LeftJoin('biodata as b', 'lj.iduser', '=', 'b.iduser')
                ->LeftJoin('lokasi as l', 'b.idlokasi', '=', 'l.idlokasi')
                ->orderBy('lj.idlayanan', 'desc')
                ->limit(6)->get();

        return view('content.home', compact('layanan'));
    }

    public function testemail() {
        $x = SendEmail::doTestEmail();

        return $x;
    }
}
