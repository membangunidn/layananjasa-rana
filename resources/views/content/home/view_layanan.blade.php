@extends('app.front')

@section('content')
<div class="d-flex flex-column-fluid">
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
                                            @foreach ($kategori as $v)
                                                <option value="{{$v->slug}}">{{$v->kategorijasa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-8">
                                        <label class="font-weight-bolder">Kota</label>
                                        <select name="qkota" id="domisilikota" class="form-control form-control-solid form-control-lg">
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
                                <div class="d-flex justify-content-between align-items-center mb-7">
                                    <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Layanan Jasa</h2>
                                </div>
                                
                                <div class="row">
                                
                                    {{-- show services --}}
                                    @foreach ($layanan as $i => $v)
                                        <div class="col-md-4 col-lg-12 col-xxl-4 mb-3">
                                            <div class="card card-custom card-shadowless">
                                                <div class="card-body p-0">
                                                    <div class="overlay">
                                                        <div class="overlay-wrapper rounded bg-light text-center">
                                                            <img src="{{asset('jasa/'.$v->displaylayanan)}}" class="mw-100 w-200px">
                                                        </div>
                                                        <div class="overlay-layer">
                                                            <a href="{{url('layanan/detail/'.$v->slug)}}" class="btn font-weight-bolder btn-sm btn-warning mr-2">Lihat Detail</a>
                                                            <a href="#" class="btn font-weight-bolder btn-sm btn-light-warning">Gunakan Jasa ini</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                        <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-warning mb-1">{{ $v->layanan }}</a>
                                                        <span class="font-size-lg">{{ 'Rp. '.number_format($v->hargalayanan, 2) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

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
        $('#domisilikota').select2({
            
            ajax: { 
                url: url + 'ajax/find_lokasi',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        cari: params.term
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