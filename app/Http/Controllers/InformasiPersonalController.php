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

    /** Menjadi Penyedia Jasa */

    public function list_menjadipenyediajasa() {
        return view('content.list_menjadipenyediajasa');
    }

    public function store_menjadipenyediajasa(Request $request) {
        $validate = [
            'i_nik' => 'NIK',
            'i_npwp' => 'Jenis Kelamin',
            'i_alamatlengkap' => 'Nomor HP',
            'i_domisilikota' => 'Domisili Kota',
            'i_pendidikanterakhir' => 'Pendidikan Terakhir',
            'i_jeniskeahlian' => 'Jenis Keahlian',
            'i_pengalamankerja' => 'Pengalaman Kerja',
        ];
        
        $this->validate($request, [
            'i_sertifikasi' => 'image|nullable|max:2048',
            'i_nik' => 'required|min:13|numeric',
            'i_npwp' => 'required',
            'i_alamatlengkap' => 'required',
            'i_domisilikota' => 'required',
            'i_pendidikanterakhir' => 'required',
            'i_jeniskeahlian' => 'required',
            'i_pengalamankerja' => 'required',
        ], Yin::Check(), $validate);

        $paramUpdate = [
            'nik' => $request->i_nik,
            'npwp' => $request->i_npwp,
            'alamatlengkap' => $request->i_alamatlengkap,
            'idlokasi' => $request->i_domisilikota,
            'idjenjang' => $request->i_jenjangpendidikan,
            'idjeniskeahlian' => $request->i_jeniskeahlian,
            'pengalamankerja' => $request->i_pengalamankerja,
            'isajukan' => 1,
            'updated_at' => $this->date()
        ];

        if($request->file('i_sertifikasi')) {
            
        }else {
            
        }
    }
}
