@extends('app.front')

@section('content')
    
    @include('components.v_account')
    <div class="d-flex flex-column-fluid" style="margin-top:-80px;">
        <div class="container mt-10">
            
            <div class="card-body">
                <div class="input-group mb-5">
                    <input id="search" class="form-control input-sm" placeholder="Cari Kata Kunci " type="text" value="">
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="table-ss" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Layanan</th>
                                <th class="text-center">Invoice</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>                            
                        </thead>
                        <tbody>
        
                        </tbody>
                    </table>
                </div>
                
            </div>
              
        </div>
    </div>


@endsection

@push('js')
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
    <script>
        var table = $('#table-ss').DataTable({
                serverSide: true,
                processing: true,
                dom: 'rtp',
                ajax: url + 'akun/riwayat-pesanan/load',
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'layananjasa.layanan'},
                    {data: 'invoice'},
                    {data: 'harga'},
                    {data: '_status'},
                    {data: 'aksi', orderable: false, searchable: false}
                ],
                language: {
                    processing: `<div class="d-flex justify-content-center">
                                    <i class="d-flex spinner spinner-primary spinner-lg mr-15"></i>
                                    Mohon Tunggu ..
                                </div>`,
                },
                columnDefs: [
                    {"targets": [0, 5], "className": "text-center",}
                ],
            });

            $('#search').on( 'keyup', function () {
                table.search( this.value ).draw();
            });
    </script>
@endpush