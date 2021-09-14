@extends('app.front')

@push('css')
<link rel="stylesheet" href="{{asset('front/front/css/home.css')}}">
<link rel="stylesheet" href="{{asset('front/front/css/contactus.css')}}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('content')

<section class="container">
    <div class="landing">
        <div class="flex flex-row justify-content-center flex-center">
            <h1 class="font-weight-bold" style="font-size:3vw" data-aos="fade-right" data-aos-duration="500">
                <strong>Mudah Membangun</strong>
                <br>
                <span class="spanText">Bersama Kami</span>
            </h1>
            <h3 data-aos="fade-left" data-aos-duration="1000" class="mt-10">
                Tentukan kebutuhan anda, temukan solusinya
            </h3>
            <a data-aos="fade-up-right" data-aos-duration="1000" 
                class="btn btn-primary btn-circle mt-10 font-weight-boldest aos-init aos-animate" href="#">
                Tentang Kami
            </a>
        </div>
        <div class="landingImage" data-aos="zoom-in">
            <img src="{{ asset('assets/images/4786.jpg') }}" width="100%">
        </div>
    </div>
</section>

<section class="container pb-10">
    <div class="d-flex flex-column text-center mb-8 mt-15 mt-lg-12 mb-lg-14">
        
        <h3 class="font-size-lg-18 font-size-9 text-dark-50 font-weight-bold pb-3 line-height-lg">
            Temukan Penyedia <span class="text-primary ml-1 font-weight-bolder">Jasa Terpercaya</span><br>
            Untuk Memenuhi Segala Kebutuhan Anda <span class="text-dark font-weight-bolder">di Membangun.id</span>
        </h3>
        
    </div>
    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0 pr-lg-15">
            <div class="slider slider-v2 pr-lg-15 slider-initiazlied">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="label label-light-primary label-inline py-2 px-5 font-size-2 font-weight-bolder">Text Tutorials</span>
                    <div class="d-flex ml-2">
                        <button class="slider-btn slider-btn-prev" id="tutorials_slider_1_prev" aria-controls="tutorials_slider_1" tabindex="-1" data-controls="prev" disabled="">
                            <span class="svg-icon svg-icon-sm">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                
                                    <g id="Stockholm-icons-/-Navigation-/-Arrow-left" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                        <rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                        <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                                    </g>
                                </svg>
                            </span>
                        </button>

                        <button class="slider-btn slider-btn-next" id="tutorials_slider_1_next" aria-controls="tutorials_slider_1" tabindex="-1" data-controls="next">
                            <span class="svg-icon svg-icon-sm">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                                    <g id="Stockholm-icons-/-Navigation-/-Arrow-right" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                        <rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>



                <div class="tns-outer" id="tutorials_slider_1-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">
                        slide
                         <span class="current">1</span>  of 3</div>
                         <div id="tutorials_slider_1-mw" class="tns-ovh tns-ah" style="height: 292px;">
                            <div class="tns-inner" id="tutorials_slider_1-iw">
                                <div id="tutorials_slider_1" data-autoplay="false" data-slider="true" data-items="1" data-auto-height="true" data-loop="false" data-nav="false" data-prev-button="#tutorials_slider_1_prev" data-next-button="#tutorials_slider_1_next" class="  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" style="transition-duration: 0s; transform: translate3d(0%, 0px, 0px);">

    
                <div class="slider-box tns-item tns-slide-active" id="tutorials_slider_1-item0">
            
            <span class="d-block font-weight-bold pb-2 pt-13 font-size-4 text-muted">Metronic File Structure</span>

            
            <a href="https://keenthemes.com/tutorials/an-overview-of-metronics-file-structure" class="mb-6 d-block text-dark text-hover-primary font-weight-bolder slider-title font-size-11">An Overview of Metronic's File Structure</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 line-height-lg font-size-4">
                </p><p>Having some trouble familiarizing with Metronic's Bootstrap Admin Template files? Check this article out as we dig in and list down all of Metronic's files and folders and what each of them do.</p>
            <p></p>

            
            <a href="https://keenthemes.com/tutorials/an-overview-of-metronics-file-structure" class="btn font-weight-bolder btn-primary mr-3 my-5">Read More</a>
        </div>
                <div class="slider-box tns-item" id="tutorials_slider_1-item1" aria-hidden="true" tabindex="-1">
            
            <span class="d-block font-weight-bold pb-2 pt-13 font-size-4 text-muted">Keen File Structure</span>

            
            <a href="https://keenthemes.com/tutorials/an-overview-of-keens-file-structure" class="mb-6 d-block text-dark text-hover-primary font-weight-bolder slider-title font-size-11">An Overview of Keen's File Structure</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 line-height-lg font-size-4">
                </p><p>Having some trouble familiarizing with Keen's Bootstrap Admin Template files? Check this article out as we dig in and list down all of Keen's files and folders and what each of them do.</p>
            <p></p>

            
            <a href="https://keenthemes.com/tutorials/an-overview-of-keens-file-structure" class="btn font-weight-bolder btn-primary mr-3 my-5">Read More</a>
        </div>
                <div class="slider-box tns-item" id="tutorials_slider_1-item2" aria-hidden="true" tabindex="-1">
            
            <span class="d-block font-weight-bold pb-2 pt-13 font-size-4 text-muted">Gulp Installation Article</span>

            
            <a href="https://keenthemes.com/tutorials/metronic-bootstrap-admin-installation-with-gulp" class="mb-6 d-block text-dark text-hover-primary font-weight-bolder slider-title font-size-11">Metronic Bootstrap Admin Installation with Gulp</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 line-height-lg font-size-4">
                Having trouble trying to get Metronic running on your local machine? Check this out. We have outlined how to set up your local machine from downloading, installation and running Metronic in 4 quick and easy steps.
            </p>

            
            <a href="https://keenthemes.com/tutorials/metronic-bootstrap-admin-installation-with-gulp" class="btn font-weight-bolder btn-primary mr-3 my-5">Read More</a>
        </div>
            

        </div></div></div></div>

        </div>
        </div>
        

        
        <div class="col-lg-4">
            
            <div class="slider slider-v2 slider-initiazlied">
        <div class="d-flex justify-content-between align-items-center pb-5">
            
            <span class="label label-light-primary label-inline py-2 px-5 font-size-2 font-weight-bolder">Video Tutorials</span>

            
            <div class="d-flex ml-2">
                
                <button class="slider-btn slider-btn-prev" id="tutorials_slider_2_prev" aria-controls="tutorials_slider_2" tabindex="-1" data-controls="prev" disabled="">
                    <span class="svg-icon svg-icon-sm">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                            <g id="Stockholm-icons-/-Navigation-/-Arrow-left" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                <rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "></path>
                            </g>
                        </svg>
                    </span>
                </button>

                
                <button class="slider-btn slider-btn-next" id="tutorials_slider_2_next" aria-controls="tutorials_slider_2" tabindex="-1" data-controls="next">
                    <span class="svg-icon svg-icon-sm">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="">
                            <g id="Stockholm-icons-/-Navigation-/-Arrow-right" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                <rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                            </g>
                        </svg>
                    </span>
                </button>
            </div>
        </div>


        <div class="tns-outer" id="tutorials_slider_2-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">1</span>  of 3</div><div id="tutorials_slider_2-mw" class="tns-ovh tns-ah" style="height: 400px;"><div class="tns-inner" id="tutorials_slider_2-iw"><div id="tutorials_slider_2" data-autoplay="false" data-slider="true" data-items="1" data-nav="false" data-loop="false" data-auto-height="true" data-prev-button="#tutorials_slider_2_prev" data-next-button="#tutorials_slider_2_next" class="  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" style="transition-duration: 0s; transform: translate3d(0%, 0px, 0px);">

    
            <div class="pt-10 tns-item tns-slide-active" id="tutorials_slider_2-item0">
            
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item rounded-lg" src="https://www.youtube.com/embed/44YrR1ueDJk" allowfullscreen=""></iframe>
            </div>

            
            <a href="https://keenthemes.com/tutorials/metronic8-overview" class="d-block mt-8 mb-4 text-dark font-size-6 font-weight-bolder text-hover-primary">Introducing Metronic 8 - Bootstrap 5 Admin Dashboard Theme</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 font-size-4 line-height-lg">
                In this video, we discuss Metronic's latest version, Metronic 8.
            </p>
        </div>
            <div class="pt-10 tns-item" id="tutorials_slider_2-item1" aria-hidden="true" tabindex="-1">
            
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item rounded-lg" src="https://www.youtube.com/embed/x61yGt_xjp8" allowfullscreen=""></iframe>
            </div>

            
            <a href="https://keenthemes.com/tutorials/keen-build-assets-with-gulp" class="d-block mt-8 mb-4 text-dark font-size-6 font-weight-bolder text-hover-primary">Keen Build Assets with Gulp</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 font-size-4 line-height-lg">
                Learn how to customize and compile Keen Bootstrap Admin Theme's assets via Gulp in the latest version 2 and above.
            </p>
        </div>
            <div class="pt-10 tns-item" id="tutorials_slider_2-item2" aria-hidden="true" tabindex="-1">
            
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item rounded-lg" src="https://www.youtube.com/embed/8ipj_BunNpE" allowfullscreen=""></iframe>
            </div>

            
            <a href="https://keenthemes.com/tutorials/install-keen-with-webpack" class="d-block mt-8 mb-4 text-dark font-size-6 font-weight-bolder text-hover-primary">Install Keen with Webpack</a>

            
            <p class="font-weight-normal text-dark mb-3 p-0 font-size-4 line-height-lg">
                Learn how to install Keen via Webpack in the latest version 2 and above
            </p>
        </div>
    
        </div></div></div></div>
        </div>
            
        </div>
        
    </div>
</section>


<section class="section" id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Here You Can Make A contactus Or Just walkin to our cafe</h2>
                    </div>
                    <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
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