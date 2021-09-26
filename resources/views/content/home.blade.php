@extends('app.front')

@push('css')
<link rel="stylesheet" href="{{asset('front/front/css/home.css')}}">
<link rel="stylesheet" href="{{asset('front/front/css/contactus.css')}}">
<link rel="stylesheet" href="{{asset('front/front/css/landing.css')}}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('content')

<section class="section" id="landing-atas" sytle="margin-top:-120px; !important">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center float-right">
                <div class="left-text-content contactus-inside">
                    <div class="section-heading">
                        <h3 class="font-size-lg-18 font-size-9 font-weight-boldest pb-3 line-height-lg" style="color:#fff">
                            Temukan Penyedia <span class="text-primary ml-1 font-weight-bolder">Jasa Terpercaya</span><br>
                            Untuk Memenuhi Segala Kebutuhan Anda <span class="font-weight-bolder" style="color:#ffc107">di Membangun.id</span>
                        </h3>
                    </div>
                    <h3 class="mt-10 font-weight-bolder" style="color:black">
                        Tentukan kebutuhan anda, temukan solusinya 
                    </h3>
                    <a href="#contactus"
                        class="btn btn-secondary btn-warning mt-10 font-weight-boldest" href="#">
                        Contact Us
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="container pb-10">
    <div class="d-flex flex-column text-center mb-8 mt-15 mt-lg-12 mb-lg-14">
        
        <h3 class="font-size-lg-18 font-size-9 font-weight-bold pb-3 line-height-lg">
            <span class="text-primary ml-l font-weight-bolder">Layanan Kami</span><br>
            Membangun.id menawarkan jasa tukang yang dapat membantumu
        </h3>
        
        <div class="infoCards container" style="margin-top:-70px;">
            <div class="row">
                @if ($layanan->count() == 0)
            
                @endif
                @foreach ($layanan as $i => $v)
                    @if ($v->isaktif == 1)
                    <div class="col-md-4 mt-10">
                        <div class="card">
                            <div style="height: 150px;background-image: url('{{asset('jasa/'.$v->displaylayanan)}}');
                                border-top-left-radius: 10px;border-top-right-radius: 10px;background-position: center;
                                background-repeat: no-repeat;
                                background-size: cover;">
                            </div>
                            <div class="cardContent">
                                <a href="{{url('pesanlayanan/'.$v->slug)}}" style="color:#333">
                                    <h3>{{ $v->layanan }}</h3>
                                    <p>{{ Str::limit($v->deskripsilayanan, 75) }}</p>
                                </a>
                                
                                <a href="{{url('pesanlayanan/'.$v->slug)}}" class="_button _button_bottom" style="border-radius:10px;">
                                    Mulai {{ 'Rp. '.number_format($v->hargalayanan, 2) }}
                                </a>
                            </div>
                        </div>
                    </div>   
                        
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="d-flex flex-column text-center mb-1 mt-15 mt-lg-12">
    <h3 class="font-size-lg-18 font-size-9 font-weight-bold pb-3 line-height-lg">
        <span class="ml-1 font-weight-bolder">Contact Us</span><br>
    </h3>
</div>
<section class="section" id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h2>Tertarik menggunakan jasa membangun.id?</h2>
                    </div>
                    <p>Kami siap memberikan jasa tukang bangunan terbaik dengan biaya terjangkau. 
                        Silahkan hubungi kami untuk survay lokasi dan konsultasi. 
                        Setelah peninjauan, akan kami berikan perhitungan rancangan anggaran biaya proyek anda. </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">089631844058</a><br><a href="#"> 081230464561</a></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">membangunidn@gmail.com</a><br><a href="#">membangunidn@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="container content-space-t-3 content-space-t-lg-5 mt-10">
   
        <div class="w-lg-75 text-center mx-lg-auto">
            <h3 class="font-size-lg-18 font-size-9 font-weight-bold pb-3 line-height-lg">
                <span class="ml-1 font-weight-bolder">About Us</span><br>
            </h3>
        </div>
  
        <div class="row gx-3">
          <div class="col mb-3">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-5.jpg') }}); height: 15rem;"></div>
          </div>
          <!-- End Col -->
  
          <div class="col-3 d-none d-md-block mb-3">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-2.jpg') }}); height: 15rem;"></div>
          </div>
          <!-- End Col -->
          
          <div class="col mb-3">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-3.jpg') }}); height: 15rem;"></div>
          </div>
          <!-- End Col -->
  
          <div class="w-100"></div>
  
          <div class="col mb-3 mb-md-0">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-11.jpg') }}); height: 15rem;"></div>
          </div>
          <!-- End Col -->
          
          <div class="col-4 d-none d-md-block mb-3 mb-md-0">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-1.jpg') }}); height: 15rem;"></div>
          </div>
          <!-- End Col -->
          
          <div class="col">
            <div class="bg-img-start" style="background-image: url({{ url('assets/images/bg-6.jpg') }}); height: 15rem;"></div>
          </div>
        </div>

        <div class="row justify-content-lg-between mt-10">
          <div class="col-lg-12">
            <p  style="font-size:14px;!important">Membangun.idn merupakan penyedia jasa tukang bangunan dan konstruksi yang mengerjakan proyek bangunan baru maupun renovasi. 
                Kami menyediakan berbagai layanan jasa, mulai dari bangun rumah baru, perbaikan instalasi listrik, pemasangan keramik, dan lainnya.</p>
            <p  style="font-size:14px;!important">Membangun.idn akan menjawab kebutuhan anda dengan pelayanan cepat tanggap. 
                Sampaikan konsep rumah idaman anda dan konsultasikan kebutuhan anda bersama membangun.idn</p>
          </div>
        </div>
</section>



@endsection

@push('js')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush