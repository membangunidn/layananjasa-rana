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

use App\Helpers\Cstm;
use App\Helpers\SendEmail;


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
                'created_at' => $this->date(),
                'isaktif' => 0,
            ];
            $id = User::insertGetId($user);
    
            $biodata = [
                'iduser' => $id,
                'namalengkap' => $request->i_namalengkap,
                'created_at' => $this->date()
            ];

            // save temporary
            $token = sha1(md5(sha1(base64_encode($request->i_email))));
            $verifikasi = [
                'token' => $token,
                'email' => $request->i_email,
                'created_at' => $this->date()
            ];
            DB::table('verifikasi')->insert($verifikasi);
            SendEmail::doVerifikasiRegister($request->i_email, $token);

            Biodata::insert($biodata);
            
            DB::commit();
            return redirect('sign_in')->with('sukses', 'Silahkan cek email, untuk mengaktifkan akun');

        } catch(Exception $e) {
            DB::rollBack();
            return redirect('sign_up')->with('gagal', 'Gagal Mendaftarkan akun');
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
            if($user->isaktif == 0) {
                $data = [
                    'status' => 2,
                    'data' => null
                ];
                Auth::logout();
                return response()->json($data, 201);
            } else {
                session([
                    'data' => $user
                ]);
                $data = [
                    'status' => 1,
                    'data' => $user
                ];
                return response()->json($data, 201);
            }
        } else {
            $data = [
                'status' => 0,
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

    public function verifikasiakun($token) {
        
        $userverifikasi = DB::table('verifikasi')->where('token', $token)->first();
        if(!$userverifikasi){
            abort(404);
        }
        else {
            User::where('email', $userverifikasi->email)->update(['isaktif' => 1]);
            DB::table('verifikasi')->where('token', $token)->delete();

            return redirect('sign_in')->with('sukses', 'Berhasil verifikasi akun, silahkan login');

        }
    }

}
