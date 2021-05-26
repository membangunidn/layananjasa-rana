@extends('app.front')

@push('css')
<link href="{{asset('assets/css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="d-flex justify-content-center">
    <div class="login-content mt-10">
        <div class="d-flex flex-center">
            <div class="login-form login-signin">
                @include('components.flashmsg')
                <form class="form" method="POST" action="{{url('sign_up')}}" >
                    @csrf
                    <div class="pb-13 pt-lg-0 pt-5">
                        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                            Mendaftar ke Membangun.id</h3>
                        <span class="text-muted font-weight-bold font-size-h4">Pastikan form yang kamu isi sudah benar
                        </span>
                    </div>
                    
                    <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Nama Lengkap <span style="color:red">*</span></label>
                        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                        type="text" name="i_namalengkap" value={{old('i_namalengkap')}}>
                        @error('i_namalengkap')
                            <span class="fv-help-block" style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group fv-plugins-icon-container">
                        <label class="font-size-h6 font-weight-bolder text-dark">Email <span style="color:red">*</span></label>
                        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                        type="text" name="i_email" value={{old('i_email')}}>
                        @error('i_email')
                            <span class="fv-help-block" style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group fv-plugins-icon-container">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password <span style="color:red">*</span></label>
                        </div>
                        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                        type="password" name="i_password" value={{old('i_password')}}>
                        <div class="fv-plugins-message-container"></div>
                        @error('i_password')
                            <span class="fv-help-block" style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group fv-plugins-icon-container">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">Konfirmasi Password <span style="color:red">*</span></label>
                        </div>
                        <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                        type="password" name="i_passconf" value={{old('i_passconf')}}>
                        <div class="fv-plugins-message-container"></div>
                        @error('i_passconf')
                            <span class="fv-help-block" style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                   
                    <div class="pb-lg-0 pb-4">
                        <button type="submit" id="kt_login_signin_submit" 
                            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                            Daftar</button>
                        <button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
                            Daftar dengan Google
                        </button>
                    </div>
                    <input type="hidden"><div></div>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection