@extends('app.front')

@section('content')
    
    @include('components.v_account')
    <div class="d-flex flex-column-fluid" style="margin-top:auto">
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

    {{-- modal change statu --}}
    <div class="modal fade" id="modal_ganti" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form_tambah" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 id="modal_title">Ganti Status Pengajuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4" style="cursor:pointer;" onclick="changeStatus(0)">
                                <div class="small-box" style="background-color:yellow">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-center mt-14 text-white">Pending</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="cursor:pointer;" onclick="changeStatus(1)">
                                <div class="small-box" style="background-color:blue">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-center mt-14 text-white">Disetujui</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="cursor:pointer;" onclick="changeStatus(2)">
                                <div class="small-box" style="background-color:red">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-center mt-14 text-white">Ditolak</h3>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : _token
            }
        })

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

        $(document).on('click', '#tombol_detail', function() {
            const invoice = $(this).data('invoice')

            mm.blok();
            $.ajax({
                url : url + 'akun/riwayat-pesanan/detail',
                method: "POST",
                data: {invoice : invoice},
                success: (response) => {
                    mm.unblok();
                    bootbox.dialog({
                        backdrop: true,
                        message: response,
                        size: "xl",
                        buttons: {
                            danger: {
                                label: "Tutup",
                                className: "btn-danger",
                                callback: function() {
                                
                                }
                            },
                        }
                    });
                },
                error: (xhr) => {
                    mm.notifikasi_error(xhr);
                }
            })
        })
    </script>
@endpush