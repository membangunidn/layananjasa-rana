<div class="container">
    <div class="form-group mb-8">
        <div class="alert alert-custom alert-default" role="alert">
            <div class="alert-icon">
                
            </div>
            <div class="alert-text text-center">
             Detail, Pemesanan {{$trx->invoice}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Nama Customer</b></label>
                </div>
                <div class="col-lg-7">
                    {{$trx->namacustomer}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Email Customer</b></label>
                </div>
                <div class="col-lg-7">
                   {{ $trx->emailcustomer }}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>No Telp</b></label>
                </div>
                <div class="col-lg-7">
                    {{$trx->nohpcustomer}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Domisili Wilayah</b></label>
                </div>
                <div class="col-lg-7">
                    <?= $trx->lokasi->lokasi ?>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Alamat Lengkap</b></label>
                </div>
                <div class="col-lg-7">
                    {{ $trx->alamatcustomer }}
                </div>
            </div>

            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Layanan</b></label>
                </div>
                <div class="col-lg-7">
                    {{$trx->layananjasa->layanan}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold" style="color:red"><b>Catatan</b></label>
                </div>
                <div class="col-lg-7">
                    {{ $trx->catatan }}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Penyedia Jasa</b></label>
                </div>
                <div class="col-lg-7">
                    {{ $trx->seller->namalengkap }}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Notelp Penyedia Jasa</b></label>
                </div>
                <div class="col-lg-7">
                    {{ $trx->seller->notelp }}
                </div>
            </div>

            <div class="row">
                <hr>
            </div>

            {{-- @if ()
                
            @endif --}}

            <div class="row">
                <div class="col-lg-5">
                    <label class="text-bold"><b>Harga Jasa</b></label>
                </div>
                <div class="col-lg-7">
                    {{ 'Rp '.number_format($trx->harga, 2) }}
                </div>

                @if (Auth::user()->role->role == 'ADMIN')
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Fee Admin</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{ 'Rp '.number_format($trx->fee_jasa, 2) }}
                    </div>
                @endif

                <div class="col-lg-5">
                    <label class="text-bold"><b>Total Pembayaran</b></label>
                </div>
                <div class="col-lg-7">
                    @if (Auth::user()->role->role == 'ADMIN')
                    {{ 'Rp '.number_format($trx->harga + $trx->fee_jasa, 2) }}
                    @else
                    {{ 'Rp '.number_format($trx->harga, 2) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    