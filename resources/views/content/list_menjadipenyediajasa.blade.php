@extends('app.front')

@section('content')
    
    @include('components.v_account')

    <div class="d-flex flex-column-fluid">
        <div class="container mt-10">
            
            @include('components.flashmsg')

            @if (Auth::user()->biodata->isajukan == 1)
            <div class="alert alert-primary">
                @if(Auth::user()->biodata->isapprove == 0)
                Anda telah mengajukan sebagai <b class="ml-1">penyedia jasa</b>, Mohon tunggu status anda masih 
                    <span class="label label-warning label-inline font-weight-bolder mr-2 ml-1"> Pending</span>  
                @elseif(Auth::user()->biodata->isapprove == 1)
                Selamat, status pengajuan anda
                    <span class="label label-success label-inline font-weight-bolder mr-2 ml-1"> Disetujui</span> 
                @elseif(Auth::user()->biodata->isapprove == 2)
                Anda telah mengajukan sebagai <b class="ml-1">penyedia jasa</b>, Mohon tunggu status anda masih 
                    <span class="label label-danger label-inline font-weight-bolder mr-2 ml-1"> Ditolak</span> 
                @endif
            </div>
            @endif

            <div class="card card-custom card-stretch">
                @if (Auth::user()->biodata->isajukan != 1) 
                    <form class="form" method="post" action="{{url('akun/menjadi-penyedia-jasa')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column float-right">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-paper-plane"></i>
                                    Ajukan Permintaan
                                </button>
                            </div>
                            <div class="card-toolbar">
                                <h3 class="card-label font-weight-bolder text-dark">Ajukan Menjadi Penyedia Jasa</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Isikan Form dibawah ini.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">NIK (KTP) <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg" type="number" onKeyPress="if(this.value.length==16) return false;" name="i_nik" value="{{Auth::user()->biodata->nik}}">
                                    <span class="form-text text-muted">Sertakan nomor KTP kamu.</span>
                                    @error('i_nik')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">NPWP</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg" name="i_npwp" onKeyPress="if(this.value.length==15) return false;" maxlength="15" type="number">
                                    @error('i_npwp')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <textarea class="summernote" id="kt_summernote_1" name="i_alamatlengkap"></textarea>
                                    @error('i_alamatlengkap')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Domisili Kota <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <select name="i_domisili" class="form-control" id="domisilikota">
                                    <option value="">--Pilih Domisili Kota --</option>
                                    </select>
                                    @error('i_domisili')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Pendidikan Terakhir<span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <select name="i_pendidikanterakhir" class="form-control form-control-lg" id="jenjanpendidikan">
                                    <option value="">--Pilih Pendidikan Terakhir --</option>
                                    </select>
                                    @error('i_pendidikanterakhir')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Jenis Keahlian<span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                <select name="i_jeniskeahlian" class="form-control form-control-lg" id="jeniskeahlian">
                                    <option value="">--Pilih Jenis Keahlian --</option>
                                </select>
                                @error('i_jeniskeahlian')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Sertifikasi<span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                <input type="file" name="i_sertifikasi" class="form-control form-control-lg">
                                <span class="form-text text-muted">File sertifikasi, CV (bila ada) jadikan 1 berupa PDF</span>
                                @error('i_sertifikasi')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Pengalaman Kerja<span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <textarea name="i_pengalamankerja" class="form-control summernote" id="kt_summernote_1" cols="10" rows="1"></textarea>
                                    @error('i_pengalamankerja')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">Info Kontak</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Nomor HP <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="i_nomorhp" class="form-control form-control-lg" onKeyPress="if(this.value.length==13) return false;" value="" placeholder="Nomor Handphone">
                                    </div>
                                    @error('i_nomorhp')
                                        <span class="fv-help-block" style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label class="col-3">NIK (KTP)</label>
                                    <div class="col-6"> {{$biodata->nik}} </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">NPWP</label>
                                    <div class="col-9"> {{$biodata->npwp}} </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Nomor HP</label>
                                    <div class="col-9"> {{$biodata->notelp}} </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Domisili Kota</label>
                                    <div class="col-9"> {{$biodata->lokasi}} </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Pendidikan Terakhir</label>
                                    <div class="col-9"> {{$biodata->jenjangpendidikan}} </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Jenis Keahlian</label>
                                    <div class="col-9"> {{$biodata->jeniskeahlian}} </div>                            
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-3">Sertifikasi</label>
                                    <div class="col-9"> 
                                        <span style="cursor:pointer" id="goviewpdf" 
                                            class="label label-primary label-inline font-weight-bolder mr-2">Lihat disini</span>    
                                    </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Alamat Lengkap</label>
                                    <div class="col-9"> <?= $biodata->alamat ?> </div>                            
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Pengalaman Kerja</label>
                                    <div class="col-9"> <?= $biodata->pengalamankerja ?> </div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>  

@endsection

@if (Auth::user()->biodata->isajukan != 1) 
    @push('js')
    <script src="{{asset('assets/js/pages/crud/forms/editors/summernote.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

    <script>
        $('#domisilikota').select2({
            ajax: { 
                url: url + 'ajax/cari_lokasi',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                    cari: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        }); 

        $('#jenjanpendidikan').select2({
            ajax: { 
                url: url + 'ajax/cari_pendidikan',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                    cari: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        }); 

        $('#jeniskeahlian').select2({
            ajax: { 
                url: url + 'ajax/cari_jeniskeahlian',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                    cari: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        }); 
    </script>
    @endpush
@else 
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN' : _token
                    }
                })

                $(document).on('click', '#goviewpdf', function(){
                    const iduser = {{Auth::user()->id}}
                    $.ajax({
                        type: "POST",
                        url : url + 'ajax/popup_pdfsertifikasi',
                        data : {'iduser' : iduser},
                        success: function(data) {
                            bootbox.dialog({
                                backdrop: true,
                                message: data,
                                size: "extra-large",
                                buttons: {
                                    danger: {
                                        label: "Tutup",
                                        className: "btn-danger",
                                        callback: function() {
                                        
                                        }
                                    },
                                }
                            });
                        }
                    })
                })
            })
        </script>
    @endpush
@endif