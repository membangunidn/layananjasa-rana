<style>
    body{
        margin-top:20px;
        color: #484b51;
    }
    .text-secondary-d1 {
        color: #728299!important;
    }
    .page-header {
        margin: 0 0 1rem;
        padding-bottom: 1rem;
        padding-top: .5rem;
        border-bottom: 1px dotted #e2e2e2;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-align: center;
        align-items: center;
    }
    .page-title {
        padding: 0;
        margin: 0;
        font-size: 1.75rem;
        font-weight: 300;
    }
    .brc-default-l1 {
        border-color: #dce9f0!important;
    }

    .ml-n1, .mx-n1 {
        margin-left: -.25rem!important;
    }
    .mr-n1, .mx-n1 {
        margin-right: -.25rem!important;
    }
    .mb-4, .my-4 {
        margin-bottom: 1.5rem!important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0,0,0,.1);
    }

    .text-grey-m2 {
        color: #888a8d!important;
    }

    .text-success-m2 {
        color: #86bd68!important;
    }

    .font-bolder, .text-600 {
        font-weight: 600!important;
    }

    .text-110 {
        font-size: 110%!important;
    }
    .text-blue {
        color: #478fcc!important;
    }
    .pb-25, .py-25 {
        padding-bottom: .75rem!important;
    }

    .pt-25, .py-25 {
        padding-top: .75rem!important;
    }
    .bgc-default-tp1 {
        background-color: rgba(121,169,197,.92)!important;
    }
    .bgc-default-l4, .bgc-h-default-l4:hover {
        background-color: #f3f8fa!important;
    }
    .page-header .page-tools {
        -ms-flex-item-align: end;
        align-self: flex-end;
    }

    .btn-light {
        color: #757984;
        background-color: #f5f6f9;
        border-color: #dddfe4;
    }
    .w-2 {
        width: 1rem;
    }

    .text-120 {
        font-size: 120%!important;
    }
    .text-primary-m1 {
        color: #4087d4!important;
    }

    .text-danger-m1 {
        color: #dd4949!important;
    }
    .text-blue-m2 {
        color: #68a3d5!important;
    }
    .text-150 {
        font-size: 150%!important;
    }
    .text-60 {
        font-size: 60%!important;
    }
    .text-grey-m1 {
        color: #7b7d81!important;
    }
    .align-bottom {
        vertical-align: bottom!important;
    }

</style>

<div class="px-0">
    <div class="row mt-4">
        <div class="col-12 col-lg-10 offset-lg-1">
           

            <hr class="row brc-default-l1 mx-n1 mb-4" />

            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                        <span class="text-600 text-110 text-blue align-middle">{{ $trx['namacustomer'] }}</span>
                    </div>
                    <div class="text-grey-m2">
                        <div class="my-1">
                            {{ $trx['alamatcustomer'] }}
                        </div>
                        <div class="my-1">
                            <i class="fa fa-phone fa-flip-horizontal text-secondary"></i> 
                            <b class="text-600">{{ $trx['nohpcustomer'] }}</b></div>
                    </div>
                </div>
                <!-- /.col -->

                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                    <hr class="d-sm-none" />
                    <div class="text-grey-m2">
                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                            Invoice
                        </div>

                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                            <span class="text-600 text-90">ID:</span> {{ '#'.$trx['invoice'] }}
                        </div>

                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                            <span class="text-600 text-90">Issue Date:</span> {{ Tanggal::only_tanggal($trx['requested_at'], false) }}
                        </div>

                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                            <span class="text-600 text-90">Status:</span> 
                            @if ($trx['status'] == 'P')
                                <span class="badge badge-warning badge-pill ">Pending</span>
                            @else
                            <span class="badge badge-success badge-pill ">Lunas</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <div class="mt-4">
                <div class="row text-600 text-white bgc-default-tp1 py-25">
                    <div class="d-none d-sm-block col-1">#</div>
                    <div class="col-9 col-sm-5">Layanan</div>
                    <div class="d-none d-sm-block col-4">Catatan</div>
                   
                    <div class="col-2">Amount</div>
                </div>

                <div class="text-95 text-secondary-d3">
                    <div class="row mb-2 mb-sm-0 py-25">
                        <div class="d-none d-sm-block col-1">1</div>
                        <div class="col-9 col-sm-5">{{ $trx['layananjasa']['layanan'] }}</div>
                        <div class="d-none d-sm-block col-4">{{ $trx['catatan'] }}</div>
                        <div class="col-2 text-secondary-d2">{{ number_format($trx['harga'], 2) }}</div>
                    </div>

                    
                </div>

                <div class="row border-b-2 brc-default-l2"></div>

                <div class="row mt-3">
                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        
                    </div>

                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                        <div class="row my-2">
                            <div class="col-7 text-right">
                                SubTotal
                            </div>
                            <div class="col-5">
                                <span class="text-120 text-secondary-d1">{{ number_format($trx['harga'], 2) }}</span>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-7 text-right">
                                Fee
                            </div>
                            <div class="col-5">
                                <span class="text-110 text-secondary-d1">{{ number_format(25000, 2) }}</span>
                            </div>
                        </div>

                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                            <div class="col-7 text-right">
                                Total
                            </div>
                            <div class="col-5">
                                <span class="text-150 text-success-d3">{{ number_format($trx['harga'] + 25000, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>