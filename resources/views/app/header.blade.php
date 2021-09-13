<header id="site_header" class="header ">
    <div class="container d-flex justify-content-between align-items-stretch">
        <a href="{{url('')}}" class="header-brand">
            <img alt="logo" src="{{asset('front/front/img/logotukang.png')}}" class="h-50px h-md-60px">
        </a>
        <div class="d-flex align-items-stretch">
            <div class="menu-wrapper" id="site_menu_wrapper">
                <div class="menu menu-mobile" id="site_menu">
                    <ul class="menu-nav">
                        <li class="menu-item {{Request::segment(0) == 'home' ? 'menu-item-active' : null }}">
                            <a href="{{url('')}}" class="menu-link">
                                <span class="menu-text">Home</span>
                            </a>
                        </li>
                        <li class="menu-item {{Request::segment(1) == 'layanan' ? 'menu-item-active' : null }}">
                            <a href="{{url('layanan')}}" class="menu-link">
                                <span class="menu-text">Layanan</span>
                            </a>
                        </li>

                        @if (Auth::check() AND (Auth::user()->role->role == 'ADMIN' OR Auth::user()->role->role == 'SELLER'))
                        <li class="menu-item menu-item-submenu menu-item-rel {{Request::segment(1) == 'seller' ? 'menu-item-active' : null }}" data-menu-toggle="hover">
                            <a href="#" class="menu-link">
                                <span class="menu-text">Layanan Jasa</span>
                                <i class="menu-ver-arrow menu-toggle"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item {{Request::segment(2) == 'add-layananjasa' ? 'menu-item-active' : null }}">
                                        <a href="{{url('seller/add-layananjasa')}}" class="menu-link">
                                            <span class="menu-text">Tambah Jasa</span>
                                        </a>
                                    </li>
                                    <li class="menu-item {{Request::segment(2) == 'layananjasa' ? 'menu-item-active' : null }}">
                                        <a href="{{url('seller/layananjasa')}}" class="menu-link">
                                            <span class="menu-text">Daftar layanan Jasa</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @endif
                        @if (Auth::check() AND Auth::user()->role->role == 'ADMIN')
                        <li class="menu-item menu-item-submenu menu-item-rel {{Request::segment(1) == 'master' ? 'menu-item-active' : null }}" data-menu-toggle="hover">
                            <a href="#" class="menu-link">
                                <span class="menu-text">Master</span>
                                <i class="menu-ver-arrow menu-toggle"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item {{Request::segment(2) == 'lokasi' ? 'menu-item-active' : null }}">
                                        <a href="{{url('master/lokasi')}}" class="menu-link">
                                            <span class="menu-text">Lokasi</span>
                                        </a>
                                    </li>
                                    <li class="menu-item {{Request::segment(2) == 'jenjang-pendidikan' ? 'menu-item-active' : null }}">
                                        <a href="{{url('master/jenjang-pendidikan')}}" class="menu-link">
                                            <span class="menu-text">Jenjang Pendidikan</span>
                                        </a>
                                    </li>
                                    <li class="menu-item {{Request::segment(2) == 'kategori-jasa' ? 'menu-item-active' : null }}">
                                        <a href="{{url('master/kategori-jasa')}}" class="menu-link">
                                            <span class="menu-text">Kategori Jasa</span>
                                        </a>
                                    </li>
                                    <li class="menu-item {{Request::segment(2) == 'jenis-keahlian' ? 'menu-item-active' : null }}">
                                        <a href="{{url('master/jenis-keahlian')}}" class="menu-link">
                                            <span class="menu-text">Jenis Keahlian</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <ul class="topbar">

                {{-- mobile icons --}}
                <li class="topbar-wrapper d-flex align-items-center">
                    <button class="btn btn-icon btn-active-primary d-flex d-lg-none" id="site_menu_wrapper_mobile_toggle">
                        <span class="svg-icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                                <title>Stockholm-icons / Text / Menu</title>
                                <desc>Created with Sketch.</desc>
                                <defs/>
                                <g id="Stockholm-icons-/-Text-/-Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"/>
                                    <rect id="Rectangle-20" fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                                    <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                    </button>         
                </li>

                @if (Auth::check())
                {{-- bell --}}
                {{-- <li class="topbar-wrapper dropdown dropdown-hover mr-10">
                    <div class="topbar-item topbar-item-user cursor-pointer" data-toggle="dropdown">    
                        <span class="avatar">
                            <i class="flaticon2-bell-4"></i><span class="label label-sm label-rounded label-danger">5</span>
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-anim-up dropdown-menu-right dropdown-menu-md p-0">
                        <ul class="nav flex-column nav-btn">
                            
                            <li class="nav-header d-flex mt-0 mt-lg-3">
                                <span class="font-weight-bold text-muted font-size-4 mr-2">Hello,</span>
                                <span class="font-weight-bolder text-dark font-size-2">{{Auth::user()->biodata->namalengkap}}</span>
                            </li>
                                
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('akun/informasi-akun')}}">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                                            <g id="Stockholm-icons-/-Design-/-Penamp;ruller" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">
                                    Informasi Akun
                                </span>
                                </a>
                            </li>
 
                            <li class="nav-separator mt-3 mb-1"></li>
                            
                            <li class="nav-footer mb-0 mb-lg-1">
                                <a class="btn btn-light-warning font-weight-bolder" href="{{url('logout')}}">
                                    Sign Out
                                </a>
                                
                            </li>
                            
                        </ul>
                    </div>    
                </li> --}}

                <li class="topbar-wrapper dropdown dropdown-hover">
                    <div class="topbar-item topbar-item-user cursor-pointer" data-toggle="dropdown">    
                        <span class="avatar">
                            <img alt="photo" src="{{Auth::user()->biodata->avatar != null ? url('uploads/avatar/'.Auth::user()->biodata->avatar) : url('assets/media/users/blank.png')}}">
                        </span>      
                    </div>
                    <div class="dropdown-menu dropdown-menu-anim-up dropdown-menu-right dropdown-menu-md p-0">
                        <ul class="nav flex-column nav-btn">
                            
                            <li class="nav-header d-flex mt-0 mt-lg-3">
                                <span class="font-weight-bold text-muted font-size-4 mr-2">Hello,</span>
                                <span class="font-weight-bolder text-dark font-size-2">{{Auth::user()->biodata->namalengkap}}</span>
                            </li>
                                
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('akun/informasi-akun')}}">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                                            <g id="Stockholm-icons-/-Design-/-Penamp;ruller" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">
                                    Informasi Akun
                                </span>
                                </a>
                            </li>
 
                            <li class="nav-separator mt-3 mb-1"></li>
                            
                            <li class="nav-footer mb-0 mb-lg-1">
                                <a class="btn btn-light-warning font-weight-bolder" href="{{url('logout')}}">
                                    Sign Out
                                </a>
                                
                            </li>
                            
                        </ul>
                    </div>    
                </li>
                @else 
                <li class="topbar-wrapper">
                    <div class="topbar-item">
                        <a href="{{url('sign_in')}}" class="font-weight-bolder active">Login</a><span class="ml-3 mr-3">|</span>
                        <a href="{{url('sign_up')}}" class="font-weight-bolder">Register</a>
                    </div>   
                </li>
                @endif
                
            </ul> 
        </div>
    
    </div>
</header>   