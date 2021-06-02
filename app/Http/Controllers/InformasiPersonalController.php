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
use App\Lokasi;
use App\Jenpen;
use App\User;

use App\Helpers\Cstm;
use DataTables;

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
            if(File::exists(public_path('uploads/avatar/'.$cekimage->avatar))){
                File::delete(public_path('uploadsavatar/'.$cekimage->avatar));
            }


            $image = $request->file('i_avatar');
            $image_name = 'PXL-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(\base_path() ."/public/uploads/avatar", $image_name);

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
        $biodata = Cstm::getBiodataPengajuan(Auth::user()->id);
        return view('content.list_menjadipenyediajasa', compact('biodata'));
    }

    public function store_menjadipenyediajasa(Request $request) {
        $validate = [
            'i_nik' => 'NIK',
            'i_npwp' => 'NPWP',
            'i_alamatlengkap' => 'Alamat Lengkap',
            'i_domisilikota' => 'Domisili Kota',
            'i_pendidikanterakhir' => 'Pendidikan Terakhir',
            'i_jeniskeahlian' => 'Jenis Keahlian',
            'i_pengalamankerja' => 'Pengalaman Kerja',
            'i_domisili' => 'Domisili Kota',
            'i_sertifikasi' => 'Sertifikasi',
            'i_nomorhp' => 'Nomor Handphone'
        ];
        
        $this->validate($request, [
            'i_sertifikasi' => 'required|mimes:pdf|nullable|max:5000',
            'i_nik' => 'required|min:13|numeric',
            'i_npwp' => 'required|min:14|numeric',
            'i_alamatlengkap' => 'required',
            'i_domisili' => 'required',
            'i_pendidikanterakhir' => 'required',
            'i_jeniskeahlian' => 'required',
            'i_pengalamankerja' => 'required',
            'i_nomorhp' => 'required|min:11'
        ], Yin::Check(), $validate);

        $paramUpdate = [
            'nik' => $request->i_nik,
            'npwp' => $request->i_npwp,
            'alamat' => $request->i_alamatlengkap,
            'idlokasi' => $request->i_domisili,
            'idjenjang' => $request->i_pendidikanterakhir,
            'pengalamankerja' => $request->i_pengalamankerja,
            'idkeahlian' => $request->i_jeniskeahlian,
            'notelp' => $request->i_nomorhp,
            'isajukan' => 1,
            'updated_at' => $this->date()
        ];


        $image = $request->file('i_sertifikasi');
        $image_name = 'PXL-'.md5(sha1(time())).'.'.$image->getClientOriginalExtension();
        $image->move(\base_path() ."/public/uploads/sertifikasi", $image_name);

        $paramUpdate['sertifikasi'] = $image_name;
        Biodata::where('iduser', Auth::user()->id)->update($paramUpdate);
        return redirect('akun/menjadi-penyedia-jasa')->with('sukses', 'Berhasil Mengajukan menjadi penyedia jasa');
        
    }

    /** Lihat pengajuan */

    public function load_tablepengajuan(Request $request) {
        $userp = User::with('biodata','lokasi')->whereHas('biodata', function($biodata){
            $biodata->where('biodata.isajukan', '=' , 1);
        })->get();

        return DataTables::of($userp)
            ->addColumn('aksi', function ($userp) {
                $html = "
                        <button id='tombol_edit' class='btn btn-icon btn-light-primary btn-sm'
                            data-id='".$userp->iduser."'
                            >
                            <i class='far fa-edit'></i>
                        </button>
                        <button id='tombol_edit' class='btn btn-icon btn-light-info btn-sm'
                            data-id='".$userp->iduser."'
                            >
                            <i class='far fa-eye'></i>
                        </button>
                        ";
                return $html;
            })
            ->addColumn('sertifikasi', function($userp){
                $html = '<span style="cursor:pointer" class="label font-weight-bolder label-light-info label-inline" 
                            data-id="'.$userp->id.'" id="get-pdfsertifikasi">Lihat Disini</span>';
                return $html;
            })
            ->addColumn('pengguna', function($userp){
                $html = '<span style="width: 250px;">
                            <div class="d-flex align-items-center">								
                            <div class="symbol symbol-40 symbol-sm flex-shrink-0 avatar">									
                                <img class="" src="'. asset('uploads/avatar/'.$userp->biodata->avatar).'" alt="photo">								
                            </div>								
                                <div class="ml-4">									
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">'.$userp->biodata->namalengkap.'
                                    </div>									
                                    <a href="#" class="text-muted text-hover-primary" style="font-size:12px">
                                    '.$userp->email.'</a>								
                                </div>							
                            </div>
                        </span>';
                return $html;
            })
            ->addColumn('status', function($userp) {

                if($userp->biodata->isapprove == 0) {
                    $html = '<span style="cursor:pointer" onclick="modalStatus('.$userp->id.', 0)" class="label label-warning label-inline font-weight-bolder">Pending</span>';
                }
                else if($userp->biodata->isapprove == 1) {
                    $html = '<span style="cursor:pointer" onclick="modalStatus('.$userp->id.', 1)" class="label label-success label-inline font-weight-bolder">Disetujui</span>';
                }
                else if($userp->biodata->isapprove == 2) {
                    $html = '<span style="cursor:pointer" onclick="modalStatus('.$userp->id.', 2)" class="label label-danger label-inline font-weight-bolder">Ditolak</span>';
                }
                return $html;
            })
            ->addIndexColumn()
            ->rawColumns(['aksi', 'pengguna', 'status', 'sertifikasi'])
            ->make(true);
    }

    public function list_lihatpengajuan() {
        return view('content.list_lihatpengajuan');
    }
}
