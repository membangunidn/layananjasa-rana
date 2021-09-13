<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Validator;
use App\User;
use App\Transaksi;
use App\Helpers\Cstm;
use App\Helpers\Yin;
use App\Helpers\SendEmail;
use App\LayananJasa;

class TransaksiController extends Controller
{
    public function pesanlayanan(Request $request) {
        $validate = [
            'i_catatan' => 'Catatan',
            'i_namapemesan' => 'Nama',
            'i_emailpemesan' => 'Email',
            'i_nomorhp' => 'No HP',
            'i_lokasi' => 'Lokasi',
            'i_alamatlengkap' => 'Alamat Lengkap',
        ];

        $this->validate($request, [
            'i_catatan' => 'required',
            'i_namapemesan' => 'required',
            'i_emailpemesan' => 'required|email',
            'i_nomorhp' => 'required',
            'i_lokasi' => 'required',
            'i_alamatlengkap' => 'required',
        ], Yin::Check(), $validate);


        $record = [
            'invoice' => 'INV'.rand(14, 999999999).'JS'.rand(10, 999),
            'idpenyediajasa' => $request->i_idpenjual,
            'idcustomer' => Auth::user()->id,
            'namacustomer' => $request->i_namapemesan,
            'emailcustomer' => $request->i_emailpemesan,
            'nohpcustomer' => $request->i_nomorhp,
            'idlokasicustomer' => $request->i_lokasi,
            'alamatcustomer' => $request->i_alamatlengkap,
            'idlayanan' => $request->i_idlayanan,
            'harga' => $request->i_harga,
            'status' => 'P',
            'requested_at' => $this->date(),
            'catatan' => $request->i_catatan
        ];

        Transaksi::insert($record);
        return redirect('akun/riwayat-pesanan')->with('sukses', 'Berhasil menambahkan layanan jasa');
    
    }
    
    public function tes(){
        return view('email.email_ordered');
    }
}
