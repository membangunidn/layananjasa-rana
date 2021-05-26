@extends('app.front')

@section('content')
<div class="card card-custom card-stretch">
    <div class="card card-custom mb-12">
        <div class="card-body" style="background-color:#DAF0FD;">
            <div class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-500px p-10 p-md-20">
                <h1 class="font-weight-bolder text-dark">Search Goods</h1>
                <div class="font-size-h4 mb-8">Get Amazing Gadgets</div>
                <!--begin::Form-->
                
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-row bg-white rounded">
                    <div class="p-2">
                        <div class="flex-center py-2 px-6 bg-white rounded border border-warning">
                            <input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Search Goods">
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex-center py-2 px-6 bg-white rounded border border-warning">
                            <input type="text" class="form-control border-0 font-weight-bold pl-2" placeholder="Search Goods">
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex-center py-2 px-6 bg-white">
                            <button class="btn btn-primary btn-lg"> 
                                Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center 
                bgi-position-x-left bgi-size-cover" 
                style="background-image: url(assets/media/svg/illustrations/progress.svg);">
            
            </div> --}}
        </div>
    </div>
</div>
@endsection