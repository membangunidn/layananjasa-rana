<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function list_riwayatpesanan(){
        return view('content.list_riwayatpesanan');
    }
}
