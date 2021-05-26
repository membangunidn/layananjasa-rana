<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;
use Hash;
use Validator;
use App\Helpers\Yin;
use App\User;
use App\Biodata;


class AuthController extends Controller
{
    public function signup(){
        if (Auth::check()) { 
            return redirect('akun/informasi-personal');
        }
        return view('auth.v_signup');
    }
    
    public function signin(){
        if (Auth::check()) { 
            return redirect('akun/informasi-personal');
        }
        return view('auth.v_signin');
    }

    /** Proses */

    public function proses_signup(Request $request) {

        $validate = [
            'i_namalengkap' => 'Nama Lengkap',
            'i_email' => 'Email',
            'i_password' => 'Password',
            'i_passconf' => 'Konfirmasi Password'
        ];
        
        $this->validate($request, [
            'i_namalengkap' => 'required',
            'i_email' => 'required|email',
            'i_password' => 'min:6|required_with:i_passconf|same:i_passconf',
            'i_passconf' => 'required|min:6'
        ], Yin::Check(), $validate);

        DB::beginTransaction();
        try {
            $user = [
                'email' => $request->i_email,
                'password' => Hash::make($request->i_password),
                'hint' => $request->i_password,
                'idrole' => 3,
                'created_at' => $this->date()
            ];
            $id = User::insertGetId($user);
    
            $biodata = [
                'iduser' => $id,
                'namalengkap' => $request->i_namalengkap,
                'created_at' => $this->date()
            ];
    
            Biodata::insert($biodata);
            
            DB::commit();
            return redirect('sign_in')->with('sukses', 'Akun kamu berhasil didaftarkan');

        } catch(Exception $e) {
            DB::rollBack();
            return redirect('sign_up')->with('gagal', 'Gagal mendaftarkan akun');
        } 

    }

    public function proses_signin(Request $request) {
        $data = [
            'email' => $request->i_email,
            'password' => $request->i_password,
        ];

        Auth::attempt($data);
        if(Auth::check()) {

            $user = User::where('email', $request->i_email)->first();
            session([
                'data' => $user
            ]);
            $data = [
                'status' => true,
                'data' => $user
            ];
            return response()->json($data, 201);
            // return redirect('sign_in')->with('sukses', 'Perubahan data Kategori Barang berhasil');
        } else {
            $data = [
                'status' => false,
                'data' => null
            ];
            return response()->json($data, 201);
        }
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('sign_in');
        }
        return redirect('sign_in');
    }

    public function ye() {
        // Yin::debug(Auth::user()->ro);
    }

}
