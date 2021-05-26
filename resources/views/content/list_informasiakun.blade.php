@extends('app.front')

@section('content')
    @include('components.v_account')

    <div class="d-flex flex-column-fluid">
        <div class="container mt-10">
            
            @include('components.flashmsg')

            <div class="card card-custom card-stretch">
                <form class="form" method="post" action="{{url('akun/informasi-akun')}}" enctype="multipart/form-data">
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
                            <h3 class="card-label font-weight-bolder text-dark">Informasi Akun</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah Data Informasi Akun Kamu</span>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" readonly type="text" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" type="password" name="i_password" value="{{Auth::user()->hint}}">
                                @error('i_password')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Password Konfirmasi <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" type="password" name="i_passconf" value="">
                                <span class="form-text text-muted">Masukkan password konfirmasi kamu.</span>
                                @error('i_passconf')
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