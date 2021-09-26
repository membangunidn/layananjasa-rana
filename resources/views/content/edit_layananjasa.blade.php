@extends('app.front')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-transparent bg-white">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Seller</h5>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Seller</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Layanan Jasa</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Tambah Layanan Jasa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container mt-10">
            
            @include('components.flashmsg')

            <div class="card card-custom card-stretch">
                <form class="form" method="post" action="{{url('seller/update-layananjasa/'.$layananjasa->idlayanan)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header py-3">
                        <div class="card-toolbar">
                            <h3 class="card-label font-weight-bolder text-dark">Informasi Personal</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah Informasi Personal Kamu</span>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Display Jasa</label>
                            <div class="col-lg-9 col-xl-6">
                               <input type="file" name="i_displaylayanan" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Nama Layanan Jasa <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg" name="i_layanan" type="text" value="{{ $layananjasa->layanan }}">
                                @error('i_layanan')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Kategori Jasa <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <select name="i_kategori" class="form-control form-control-lg">
                                    <option value="">-- Silahkan Pilih --</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->idkategori}}" {{ $layananjasa->idkategori == $item->idkategori ? 'selected' : null }} >{{$item->kategorijasa}}</option>
                                    @endforeach
                                </select>
                                @error('i_kategori')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <textarea name="i_deskripsilayanan" id="" class="form-control form-control-lg" cols="30" rows="10"><?php echo $layananjasa->deskripsilayanan ?></textarea>
                                @error('i_deskripsilayanan')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Harga Jasa <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="number" name="i_harga" class="form-control form-control-lg"  placeholder="" value="{{ $layananjasa->hargalayanan }}">
                                @error('i_harga')
                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Aktif? <span class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <span class="switch">
                                    <label>
                                        <input type="checkbox" onclick="go_aktif()" id="isaktif" name="i_isaktif" value="{{ $layananjasa->isaktif }}"/>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2 float-right">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                        <a href="{{url('seller/layananjasa')}}" class="btn btn-secondary mr-2 float-right">
                            <i class="fas fa-angle-left"></i>
                            Batal & Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">

        
        const aktif = $("#isaktif").val();
        if(aktif == 1) {
            $('#isaktif').attr("checked", true)
        }
        
        function go_aktif(){
            if(document.getElementById('isaktif').checked == true) {
                $('#isaktif').attr("checked", false).val(1)
            }
            else if (document.getElementById('isaktif').checked == false) { // kondisi awal mati dan klik untuk nyalakan
                $('#isaktif').attr("checked", false).val(0)
            }
        }

        
    </script>
@endpush