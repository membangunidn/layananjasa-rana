@extends('app.front')

@push('css')
<link rel="stylesheet" href="{{asset('front/front/css/home.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="mt-10">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-custom gutter-b">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-size-h4 font-weight-bolder text-dark">Cari Layanan Jasamu</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mt-3">
                                    <div class="form-group mb-8">
                                        <label class="font-weight-bolder">Layanan Jasa</label>
                                        <select name="qkategori" id="layanan" class="form-control form-control-solid form-control-lg">
                                            <option value="" {{session()->get('qkategori') == null ? 'selected' : null }} >Semua Kategori</option>
                                            @foreach ($kategori as $v)
                                                <option value="{{$v->slug}}" {{session()->get('qkategori') == $v->slug ? 'selected' : null }} >{{$v->kategorijasa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-8">
                                        <label class="font-weight-bolder">Kota</label>
                                        <select name="qkota" id="domisilikota" class="form-control form-control-solid form-control-lg">
                                            <option value="" {{session()->get('qkota') == null ? 'selected' : null }} >Semua Kota</option>
                                            @foreach ($kota as $l)
                                                <option value="{{$l->slug}}" {{session()->get('qkota') == $l->slug ? 'selected' : null }} >{{$l->lokasi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-warning font-weight-bolder mr-2 px-8"><i class="fas fa-search"></i> TEMUKAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                         
                            <div class="mb-11">
                                {{-- <div class="d-flex justify-content-between align-items-center mb-7">
                                    <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Layanan Jasa</h2>
                                </div> --}}
                                
                                <div class="infoCards container" style="margin-top:-70px;">
                                    <div class="row">
                                        {{-- show services --}}
                                        @if ($layanan->count() == 0)
                                    
                                        @endif
                                        @foreach ($layanan as $i => $v)
                                            @if ($v->isaktif == 1)
                                            <div class="col-md-6 mt-10">
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
                                                        
                                                        <a href="{{url('pesanlayanan/'.$v->slug)}}" class="_button _button_bottom">
                                                            Pesan Sekarang
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>   
                                                
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
									<div class="d-flex flex-wrap mr-3">
                                        {{$layanan->links('pagination/v1')}}
									</div>
									
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
       
    </script>
@endpush