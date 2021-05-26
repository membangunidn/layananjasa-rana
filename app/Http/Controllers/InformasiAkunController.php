<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Hash;
use Validator;
use App\Helpers\Yin;
use App\User;

class InformasiAkunController extends Controller
{
    public function index() {
        return view('content.list_informasiakun');
    }

    public function update(Request $request) {
        $validate = [
            'i_password' => 'Password',
            'i_passconf' => 'Konfirmasi Password'
        ];
        
        $this->validate($request, [
            'i_password' => 'min:6|required_with:i_passconf|same:i_passconf',
            'i_passconf' => 'required|min:6'
        ], Yin::Check(), $validate);

        $paramUpdate = [
            'password' => Hash::make($request->i_password),
            'hint' => $request->i_password,
            'updated_at' => $this->date()
        ];
        User::where('id', Auth::user()->id)->update($paramUpdate);
        return redirect('akun/informasi-akun')->with('sukses', 'Berhasil merubah informasi Akun');
    }
}
