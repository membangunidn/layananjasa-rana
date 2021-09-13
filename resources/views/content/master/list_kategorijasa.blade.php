@extends('app.front')

@section('content')
<div class="subheader py-2 py-lg-6 subheader-transparent bg-white">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">Master</h5>
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Master</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Kategori Jasa</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Daftar Kategori Jasa</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column-fluid">
    <div class="container mt-10">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-toolbar float-right">
                            <button id="tombol_tambah" class="btn btn-light-primary font-weight-bolder">
                                <i class="la la-plus"></i>Tambah Kategori</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover" id="table-ss"  width="100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kategori Layanan Jasa</th>
                                        <th>Aksi</th>
                                    </tr>                            
                                </thead>
                                <tbody>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah --}}
<div class="modal fade" id="modal_tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_tambah" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 id="modal_title">FORM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kategori
                        <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="i_kodekategori" id="i_kodekategori" placeholder="Masukkan Kode Kategori">
                        <span class="fv-help-block i_kodekategori" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <label>Kategori Layanan Jasa
                        <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="i_kategorijasa" id="i_kategorijasa" placeholder="Masukkan Nama Kategori Jasa">
                        <span class="fv-help-block i_kategorijasa" style="color:red"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="act" id="act" value="add">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" id="tombol_simpan" class="btn btn-primary font-weight-bold tombol-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal hapus --}}
<div class="modal fade" id="modal_hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_hapus" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Apakah kamu yakin ingin menghapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="idhapus" name="idhapus">
                    <button type="button" class="btn btn-light-info btn-sm font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" id="act_hapus" class="btn btn-info btn-sm font-weight-bold tombol-submit">Iya</button>
                </div>
            </form>
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
                ajax: url + 'master/kategori-jasa/load',
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'kodekategori'},
                    {data: 'kategorijasa'},
                    {data: 'aksi', orderable: false, searchable: false}
                ],
                language: {
                    processing: `<div class="d-flex justify-content-center">
                                    <i class="d-flex spinner spinner-primary spinner-lg mr-15"></i>
                                    Mohon Tunggu ..
                                </div>`,
                },
                columnDefs: [
                    {"targets": [0, 3], "className": "text-center",}
                ],
            });

            $('#tombol_tambah').click(function() {
                $('#form_tambah').trigger("reset");
                $('#modal_tambah').modal('show')
                $('#modal_title').text('Form Kategori Jasa')
                $('.fv-help-block').text(null);
            })

            // action untuk simpan data
            $('#tombol_simpan').click(function(e) {
                e.preventDefault();
                const act = $('#act').val()
                // simpan data
                if(act == 'add') {
                    $.ajax({
                        url: url + 'master/kategori-jasa',
                        type: "POST",
                        data: $('#form_tambah').serialize(),
                        success: function(response) {
                            
                            if (response.status == true) {
                                $('#form_tambah').trigger("reset");
                                $('#modal_tambah').modal('hide');
                                toastr.success(response.msg, "Sukses");
                                table.draw()
                            } else {
                                $('.i_kodekategori').text(response.msg.i_kodekategori ? response.msg.i_kodekategori[0] : null)
                                $('.i_kategorijasa').text(response.msg.i_kategorijasa ? response.msg.i_kategorijasa[0] : null)
                            }
                        },
                        error: function (data) {
                            toastr.warning(data, "Error");
                        }
                    });
                } 
                // ubah data
                else {
                    $.ajax({
                        url: url + 'master/kategori-jasa',
                        type: "PUT",
                        data: $('#form_tambah').serialize(),
                        success: function(response) {
                            
                            if (response.status == true) {
                                $('#form_tambah').trigger("reset");
                                $('#modal_tambah').modal('hide');
                                toastr.success(response.msg, "Sukses");
                                table.draw()
                            } else {
                                $('.i_kodekategori').text(response.msg.i_kodekategori ? response.msg.i_kodekategori[0] : null)
                                $('.i_kategorijasa').text(response.msg.i_kategorijasa ? response.msg.i_kategorijasa[0] : null)
                            }
                        },
                        error: function (data) {
                            toastr.warning(data, "Error");
                        }
                    });
                }
            })

            // tombol edit
            $(document).on('click','#tombol_edit', function() {
                $('#form_edit').trigger("reset");
                $('#modal_tambah').modal('show')
                $('.fv-help-block').text(null);
                $('#modal_title').text('Form Update Kategori Jasa')

                $('#val_kodekue').attr('disabled', true);

                $('#tombol-submit').remove('#tombol_simpan')
                
                const i_kodekategori = $(this).data('kodekategori');
                const i_kategorijasa = $(this).data('kategorijasa');
                const id = $(this).data('id');

                $('#i_kodekategori').val(i_kodekategori)
                $('#i_kategorijasa').val(i_kategorijasa)
                $('#id').val(id)
                $('#act').val('edit');

            })

            // modalhapus
            $(document).on('click','#tombol_hapus', function() {
                $('#form_hapus').trigger("reset");
                $('#modal_hapus').modal('show')
                $('#idhapus').val($(this).data('id'))
            })


            $('#act_hapus').click(function(e){
                e.preventDefault();

                $.ajax({
                    url: url + 'master/kategori-jasa',
                    type: "DELETE",
                    data: $('#form_hapus').serialize(),
                    success: function(response) {
                        
                        $('#form_hapus').trigger("reset");
                        $('#modal_hapus').modal('hide');
                        
                        toastr.success(response.msg, "Sukses");
                        table.draw()
                    },
                    error: function (data) {
                        toastr.warning(data, "Error");
                    }
                });
            })
            
        })
    </script>
@endpush