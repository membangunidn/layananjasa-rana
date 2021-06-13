@extends('app.front')

@push('css')
<link href="{{asset('assets/css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="d-flex justify-content-center">
        <div class="login-content mt-10">
            <div class="d-flex flex-column-fluid flex-center">
                <div class="login-form login-signin">
                    @include('components.flashmsg')
                    <form method="post" id="form_signin">
                        @csrf
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                                Login ke Membangun.id</h3>
                            <span class="text-muted font-weight-bold font-size-h4">Baru disini?
                            <a href="{{url('sign_up')}}" class="text-primary font-weight-bolder">
                                Buat akunmu</a></span>
                        </div>

                        <div id="notifikasi">

                        </div>
                        
                        <div class="form-group fv-plugins-icon-container">
                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                            type="email" name="i_email" autocomplete="off">
                        <div class="fv-plugins-message-container"></div></div>

                        <div class="form-group fv-plugins-icon-container">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                {{-- <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" 
                                id="kt_login_forgot">Forgot Password ?</a> --}}
                            </div>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" 
                            type="password" name="i_password" autocomplete="off">
                        <div class="fv-plugins-message-container"></div></div>
                       
                        <div class="pb-lg-0 pb-4">
                            <button type="button" id="buttonlogin" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                Masuk</button>
                            <button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
                            Masuk dengan google</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : _token
            }
        })

        $('#buttonlogin').click(function(e){
            e.preventDefault()

            mm.blok();

            $.ajax({
                url : url + 'sign_in',
                type : "POST",
                data : $('#form_signin').serialize(),
                success : function(res) {
                    if(res.status == 1) {
                        location.href = url + 'akun/informasi-personal'
                        mm.unblok()
                    } else if(res.status == 2) {
                        var html = `<div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">Akun Kamu belum aktif</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>`
                        $('#notifikasi').html(html)
                        mm.unblok()
                    }
                    else {
                        var html = `<div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">Email dan Password kamu salah!</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>`
                        $('#notifikasi').html(html)
                        mm.unblok()
                    }
                },
                error : function(err) {

                }
            })
        });

    </script>
@endpush