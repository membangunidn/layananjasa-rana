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
                                <i class="fas fa-save"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                        <div class="card-toolbar">
                            <h3 class="card-label font-weight-bolder text-dark">Informasi Personal</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah Informasi Personal Kamu</span>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper" style="background-image: url({{Auth::user()->biodata->avatar != null ? url('avatar/'.Auth::user()->biodata->avatar) : url('assets/media/users/blank.png')}})"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="i_avatar">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Format berupa Jpg, Jpeg, PNG</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" readonly type="text" value="{{Auth::user()->biodata->namalengkap}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="i_jeniskelamin" class="form-control form-control-lg">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="L" {{Auth::user()->biodata->jeniskelamin == 'L' ? 'selected' : null }}>Laki - Laki</option>
                                    <option value="P" {{Auth::user()->biodata->jeniskelamin == 'P' ? 'selected' : null }}>Perempuan</option>
                                </select>
                                @error('i_jeniskelamin')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
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
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
@endpush