<div class="card card-custom gutter-b example example-compact">
    <div class="card-body">
        <div class="form-group mb-8">
            <div class="alert alert-custom alert-default" role="alert">
                <div class="alert-icon">
                    
                </div>
                <div class="alert-text">
                ------------------------------  Detail, Biodata {{$userp->biodata->namalengkap}} ------------------------------
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Nama Lengkap</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->biodata->namalengkap}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Jenis Kelamin</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->biodata->jeniskelamin == 'L' ? 'Laki - Laki' : 'Perempuan'}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Email</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>NIK</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->biodata->nik}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>No Telp</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->biodata->notelp}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>NPWP</b></label>
                    </div>
                    <div class="col-lg-7">
                        {{$userp->biodata->npwp}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Domisili Wilayah</b></label>
                    </div>
                    <div class="col-lg-7">
                        <?= $userp->biodata->lokasi->lokasi ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Keahlian</b></label>
                    </div>
                    <div class="col-lg-7">
                        <?= $userp->biodata->keahlian->jeniskeahlian ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Alamat Lengkap</b></label>
                    </div>
                    <div class="col-lg-7">
                        <?= $userp->biodata->alamat ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <label class="text-bold"><b>Pengalaman Kerja</b></label>
                    </div>
                    <div class="col-lg-7">
                        <?= $userp->biodata->pengalamankerja ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <span style="width: 250px;">
                            <div class="d-flex align-items-center">								
                                <div class="symbol symbol-100 symbol-sm flex-shrink-0">									
                                    <img src="{{url('uploads/avatar/'.$userp->biodata->avatar)}}" 
                                    style="width:150; height:150; border-radius:9px" alt="photo">								
                                </div>							
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>