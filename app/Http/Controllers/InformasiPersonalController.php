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
use App\Biodata;

use Illuminate\Support\Facades\Storage;

class InformasiPersonalController extends Controller
{
    public function index() {
        return view('content.list_informasipersonal');
    }

    public function update(Request $request) {
        $validate = [
            'i_avatar' => 'Avatar',
            'i_jeniskelamin' => 'Jenis Kelamin',
            'i_nomorhp' => 'Nomor HP',
            'i_nik' => 'NIK'
        ];
        
        $this->validate($request, [
            'i_avatar' => 'image|nullable|max:2048',
            'i_jeniskelamin' => 'required',
            'i_nomorhp' => 'min:11|required|numeric',
            'i_nik' => 'required|min:13|numeric'
        ], Yin::Check(), $validate);

        $paramUpdate = [
            'jeniskelamin' => $request->i_jeniskelamin,
            'notelp' => $request->i_nomorhp,
            'nik' => $request->i_nik,
            'updated_at' => $this->date()
        ];

        if($request->file('i_avatar') != null){

            $cekimage = Biodata::where('iduser', Auth::user()->id)->first();
            if(File::exists(public_path('avatar/'.$cekimage->avatar))){
                File::delete(public_path('avatar/'.$cekimage->avatar));
            }


            $image = $request->file('i_avatar');
            $image_name = 'PXL-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/avatar", $image_name);

            $paramUpdate['avatar'] = $image_name;
            Biodata::where('iduser', Auth::user()->id)->update($paramUpdate);
            return redirect('akun/informasi-personal')->with('sukses', 'Berhasil merubah informasi personal');


        }else{
            Biodata::where('iduser', Auth::user()->id)->update($paramUpdate);
            return redirect('akun/informasi-personal')->with('sukses', 'Berhasil merubah informasi personal');
        }
    }
}
