@extends('app.front')

@section('content')
    
    @include('components.v_account')

    <div class="d-flex flex-column-fluid">
        <div class="container mt-10">
            
            @include('components.flashmsg')

            <div class="card card-custom card-stretch">
                <form class="form" method="post" action="{{url('akun/informasi-personal')}}" enctype="multipart/form-data">
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
                                <input class="form-control form-control-lg" type="number" name="i_nik" value="{{Auth::user()->biodata->nik}}">
                                <span class="form-text text-muted">Sertakan nomor KTP kamu.</span>
                                @error('i_nik')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">NPWP</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" name="i_npm" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <textarea class="summernote" id="kt_summernote_1"name="i_alamatlengkap"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Domisili Kota <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                               <select name="i_domisili" class="form-control" id="domisilikota">
                                   <option value="">--Pilih Domisili Kota --</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Pendidikan Terakhir<span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                               <select name="i_pendidikanterakhir" class="form-control form-control-lg" id="jenjanpendidikan">
                                   <option value="">--Pilih Pendidikan Terakhir --</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Jenis Keahlian<span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                               <select name="i_jeniskeahlian" class="form-control form-control-lg" id="">
                                   <option value="">--Pilih Jenis Keahlian --</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Sertifikasi<span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                               <input type="file" name="i_sertifikasi" class="form-control form-control-lg">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Pengalaman Kerja<span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <textarea name="i_pengalamankerja" class="form-control summernote" id="kt_summernote_1" cols="10" rows="1"></textarea>
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
                                    <input type="number" name="i_nomorhp" class="form-control form-control-lg" value="{{Auth::user()->biodata->notelp}}" placeholder="Nomor Handphone">
                                </div>
                                @error('i_nomorhp')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  

@endsection

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
</script>
@endpush