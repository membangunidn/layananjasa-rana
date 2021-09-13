<div class="d-flex flex-column-fluid">
    <div class="container mt-10">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex mb-9">
                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                        <div class="symbol symbol-50 symbol-lg-120">
                            <img style="border-radius:5px;" src="{{Auth::user()->biodata->avatar != null ? url('uploads/avatar/'.Auth::user()->biodata->avatar) : url('assets/media/users/blank.png')}}" alt="image" width="120" height="120">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between flex-wrap mt-1">
                            <div class="d-flex mr-3">
                                <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{Auth::user()->biodata->namalengkap}}</a>
                                <a href="#">
                                    <i class="flaticon2-correct text-success font-size-h5"></i>
                                </a>
                            </div>
                            <div class="my-lg-0 my-3">
                                <a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">ask</a>
                                <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">hire</a>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mt-1">
                            <div class="d-flex flex-column flex-grow-1 pr-8">
                                <div class="d-flex flex-wrap mb-4">
                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{Auth::user()->email}}</a>
                                    <a href="#" class="text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 text-red">
                                    <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{Auth::user()->role->alias}}</a>
                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                    <i class="flaticon2-placeholder mr-2 font-size-lg"></i>Indonesia</a>
                                </div>
                                <span class="font-weight-bold text-dark-50">I distinguish three main text objectives could be merely to inform people.</span>
                                <span class="font-weight-bold text-dark-50">A second could be persuade people.You want people to bay objective</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-solid"></div>
                <div class="d-flex align-items-center flex-wrap mt-8">
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'informasi-personal' ? 'text-primary' : 'text-muted'}} flaticon-user display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/informasi-personal')}}" class="font-weight-bolder">
                            <div class="{{Request::segment(2) == 'informasi-personal' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column">
                                <span class="font-weight-bolder font-size-sm">Informasi Personal</span>
                            </div>
                        </a>
                    </div>
                   
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'informasi-akun' ? 'text-primary' : 'text-muted'}} flaticon2-user-1 display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/informasi-akun')}}" class="font-weight-bolder">
                            <div class="{{Request::segment(2) == 'informasi-akun' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column">
                                <span class="font-weight-bolder font-size-sm">Informasi Akun</span>
                            </div>
                        </a>
                    </div>
                    
                    @if (Auth::user()->idrole == 2 or Auth::user()->idrole == 1)
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'histori-transaksi' ? 'text-primary' : 'text-muted'}} flaticon-list display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/histori-transaksi')}}" class="font-weight-bolder">
                            <div class="{{Request::segment(2) == 'histori-transaksi' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column">
                                <span class="font-weight-bolder font-size-sm">Transaksi</span>
                            </div>
                        </a>
                    </div>
                        
                    @endif

                    {{-- jika rolenya adalah user --}}
                    @if (Auth::user()->idrole == 3)
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'riwayat-pesanan' ? 'text-primary' : 'text-muted'}} flaticon-list display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/riwayat-pesanan')}}" class="font-weight-bolder">
                            <div class="{{Request::segment(2) == 'riwayat-pesanan' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column">
                                <span class="font-weight-bolder font-size-sm">Riwayat Pesanan</span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'menjadi-penyedia-jasa' ? 'text-primary' : 'text-muted'}} flaticon-folder display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/menjadi-penyedia-jasa')}}">
                            <div class="{{Request::segment(2) == 'menjadi-penyedia-jasa' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column flex-lg-fill">
                                <span class="font-weight-bolder font-size-sm">Menjadi Penyedia Jasa</span>
                            </div>
                        </a>
                    </div>
                        
                    @elseif (Auth::user()->idrole == 1)
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'lihat-pengajuan' ? 'text-primary' : 'text-muted'}} flaticon-clock-2 display-4 font-weight-bold"></i>
                        </span>
                        <a href="{{url('akun/lihat-pengajuan')}}">
                            <div class="{{Request::segment(2) == 'lihat-pengajuan' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column flex-lg-fill">
                                <span class="font-weight-bolder font-size-sm">Lihat Pengajuan</span>
                            </div>
                        </a>
                    </div>
                    @else 
                    
                    @endif
                    {{-- <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="{{Request::segment(2) == 'ganti-password' ? 'text-primary' : 'text-muted'}} flaticon-settings display-4 font-weight-bold"></i>
                        </span>
                        <div class="{{Request::segment(2) == 'ganti-password' ? 'text-primary-75' : 'text-dark-75'}} d-flex flex-column">
                            <span class="font-weight-bolder font-size-sm">Ganti Password</span>
                        </div>
                    </div> --}}
                   
                </div>
            </div>
        </div>   
    </div>
</div>