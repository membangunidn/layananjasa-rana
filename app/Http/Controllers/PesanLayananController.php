<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Exception;
use Validator;
use App\Helpers\Yin;
use App\Biodata;
use App\Lokasi;
use App\LayananJasa;
use App\User;

use App\Helpers\Cstm;

class PesanLayananController extends Controller
{
    public function pesanlayanan($slug){

        $layanan = LayananJasa::where('slug', $slug)->first();
        $fee = 20/100 * $layanan->hargalayanan;
        if($layanan) {
            $lokasi = Lokasi::all();
            return view('content.pesan.v_pesanlayanan', compact('layanan', 'lokasi', 'fee'));
        }
        else {
            abort(404);
        }

    }
}
