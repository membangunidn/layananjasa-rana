@extends('app.front')

@section('breadcrumb')
    
@endsection

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container">
        @include('components.flashmsg')
        <div class="mt-10">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Form Pemesanan Jasa</h3>
                        </div>
                        <form method="post" action="{{url('transaksi')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-8">
                                    <div class="alert alert-custom alert-default" role="alert">
                                        <div class="alert-text">
                                            pastikan layanan jasa yang kakak pesan sudah sesuai dengan kebutuhan kakak
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <b style="font-size:20px;">Catatan</b>
                                <div class="row mt-3">
                                    <div class="col-lg-12" style="font-size:15px;">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <textarea name="i_catatan" class="form-control" 
                                                placeholder="masukkan keterangan tambahan pada jasa"></textarea>
                                                @error('i_catatan')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <hr>
                                <b style="font-size:20px;">Detail Kontak</b>
                                <div class="row mt-7">
                                    <div class="col-lg-12" style="font-size:15px;">
                                        <div class="row mb-3">
                                            <div class="col-lg-3">Nama</div>
                                            <div class="col-lg-9">
                                                <input type="text" name="i_namapemesan" class="form-control" placeholder="masukkan nama kakak">
                                                @error('i_namapemesan')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="row mb-3">
                                            <div class="col-lg-3">Email</div>
                                            <div class="col-lg-9">
                                                <input type="email" name="i_emailpemesan" class="form-control" placeholder="masukkan email kakak">
                                                @error('i_emailpemesan')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">Nomor Handphone</div>
                                            <div class="col-lg-9">
                                                <input type="number" name="i_nomorhp" class="form-control" placeholder="masukkan no hp kakak">
                                                @error('i_nomorhp')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <hr>
                                <b style="font-size:20px;">Lokasi Service</b>
                                <div class="row mt-7">
                                    <div class="col-lg-12" style="font-size:15px;">
                                        <div class="row mb-3">
                                            <div class="col-lg-3">Lokasi</div>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="i_lokasi">
                                                    @foreach ($lokasi as $l)
                                                        <option value="{{$l->idlokasi}}">{{$l->lokasi}}</option>
                                                    @endforeach
                                                </select>
                                                @error('i_lokasi')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">Alamat Lengkap</div>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="i_alamatlengkap" rows="5" placeholder="masukkan alamat lengkap, rt, rw, kelurahan nomor rumah"></textarea>
                                                @error('i_alamatlengkap')
                                                    <span class="fv-help-block" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>    
                                </div>


                                <hr>
                                <b style="font-size:20px;">Detail Layanan Jasa</b>
                                <div class="row mt-7">
                                    <div class="col-lg-12" style="font-size:15px; font-weight:bold">
                                        <div class="row mb-2">
                                            <div class="col-lg-3">Layanan</div>
                                            <div class="col-lg-9">{{$layanan->layanan}}</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-3">Estimasi Harga</div>
                                            <div class="col-lg-9" style="color:red">
                                                {{ 'Rp. '. number_format($layanan->hargalayanan + $fee, 2)}}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <input type="hidden" name="i_harga" value="{{$layanan->hargalayanan}}">
                            <input type="hidden" name="i_layanan" value="{{$layanan->layanan}}">
                            <input type="hidden" name="i_idpenjual" value="{{$layanan->iduser}}">
                            <input type="hidden" name="i_idlayanan" value="{{$layanan->idlayanan}}">
                            <input type="hidden" name="i_fee" value="{{$fee}}">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning btn-block mr-2">Pesan Jasa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection