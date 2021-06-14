@extends('app.front')

@section('content')
    @include('components.v_account')

    <div class="d-flex flex-column-fluid">
        <div class="container mt-10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="table-ss">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pengguna</th>
                                <th>Domisili</th>
                                <th>NPWP</th>
                                <th>Sertifikasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>                            
                        </thead>
                        <tbody class="datatable-body">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script type="text/javascript">

        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : _token
            }
        })

        var table = $('#table-ss').DataTable({
            serverSide: true,
            processing: true,
            ajax: url + 'akun/lihat-pengajuan/load',
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'pengguna'},
                {data: 'biodata.lokasi.lokasi'},
                {data: 'biodata.npwp'},
                {data: 'sertifikasi', orderable: false, searchable: false},
                {data: 'status'},
                {data: 'aksi', orderable: false, searchable: false}
            ],
            language: {
                processing: `<div class="d-flex justify-content-center">
                                <i class="d-flex spinner spinner-primary spinner-lg mr-15"></i>
                                Mohon Tunggu ..
                            </div>`,
            }
        });


        $(document).on('click', '#get-pdfsertifikasi', function(){
            $.ajax({
                method: "POST",
                url : url + 'ajax/popup_pdfsertifikasi',
                data : {'iduser' : $(this).data('id')},
                success: function(data){
                    bootbox.dialog({
                        backdrop: true,
                        message: data,
                        size: "extra-large",
                        buttons: {
                            danger: {
                                label: "Tutup",
                                className: "btn-danger",
                                callback: function() {
                                
                                }
                            },
                        }
                    });
                }
            })                
        })

        function changeStatus(val) {
            const id = $('#id').val()

            $.ajax({
                method : "PUT",
                url : url + 'ajax/update_status',
                data : {'id' : id, 'val' : val},
                success: function(data) {
                    toastr.success(data.msg, "Sukses");
                    table.draw()
                    $('#modal_ganti').modal('hide')
                }
            })
        }

        function modalStatus(id, val) {
            $('#modal_ganti').modal('show')
            $('#id').val(id)
        }

        $(document).on('click', '#tombol_detail', function() {
            const id = $(this).data('id');
            
            $.ajax({
                method: "POST",
                url : url + 'akun/lihat-pengajuan/popup',
                data : {'iduser' : id},
                success: function(data){
                    bootbox.dialog({
                        backdrop: true,
                        message: data,
                        size: "extra-large",
                        buttons: {
                            danger: {
                                label: "Tutup",
                                className: "btn-danger",
                                callback: function() {
                                
                                }
                            },
                        }
                    });
                }
            }) 
        })

    </script>
@endpush