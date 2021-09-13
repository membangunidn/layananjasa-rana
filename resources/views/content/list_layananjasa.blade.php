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
                        <a href="" class="text-muted">Daftar Layanan Jasa</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="d-flex">
    <div class="container mt-10">
        <div class="input-group">
            <input id="search" class="form-control input-sm" placeholder="Cari Kata Kunci " type="text" value="">
        </div>
        <div class="table-responsive" style="overflow-y: hidden;">
            <table class="table table-borderless table-hover" id="table-ss" width="100%">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Informasi Layanan Jasa</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>                            
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript">

        $(document).ready(function() {
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : _token
                }
            })

            var table = $('#table-ss').DataTable({
                serverSide: true,
                processing: true,
                dom: 'rtp',
                ajax: url + 'seller/layananjasa/load',
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'gambar'},
                    {data: 'kategorijasa'},
                    {data: 'hargalayanan'},
                    {data: 'isaktif'},
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

        })

        function go_aktif(id) {
            if(document.getElementById('isaktif'+id).checked == true) {
                const val = 1;
                $.ajax({
                    url : url + 'seller/layananjasa/isaktif',
                    method: 'GET',
                    data: {'val_isaktif' : val, 'idlayanan' : id},
                    dataType: 'JSON',
                    success :function(res) {
                        toastr.info(res.msg, "Berhasil");
                    }
                })
            }
            else if (document.getElementById('isaktif'+id).checked == false) { // kondisi awal mati dan klik untuk nyalakan
                const val = 0;
                $.ajax({
                    url : url + 'seller/layananjasa/isaktif',
                    method: 'GET',
                    data: {'val_isaktif' : val, 'idlayanan' : id},
                    dataType: 'JSON',
                    success :function(res) {
                        toastr.info(res.msg, "Berhasil");
                    }
                })
            }
        }
    </script>
@endpush