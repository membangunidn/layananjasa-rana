@extends('app.front')

@section('content')
<div class="col-12">
        
    <table id="dt" class="table w-100">
      <thead>
        <tr>
          <th>nama</th>
          <th>gender</th>
          <th>email</th>
          <th>address</th>
        </tr>
      </thead>
    </table>
  </div>
@endsection

@push('js')
<script type="text/javascript">
		
    $(document).ready(function() {
        $("#dt thead").hide();
    var dt = $('#dt').DataTable({
           ajax: "https://itmilenial.com/onepage/generate_user",
          bInfo: false,
     pageLength: 8,
   lengthChange: false,
    deferRender: true,
     processing: true,
     language: {  
          paginate: {
              previous: "<",
              next: ">"
          },
        },
        columns: [
            {
                render: function (data, type, row, meta) { 
                  var html =
                  '<div class="card shadow">'+
                                        '  <img src="'+row.avatar+'" class="card-img-top">'+
                                        '  <div class="card-body">'+
                  '    <div class="card-text">Nama : '+row.name+'</div>'+
                  '    <div class="card-text">Kontak : '+row.phone+'</div>'+
                                        '  </div>'+
                                        '</div>';
                  return html;
                }
            },
            {
              data :"name", visible: false
            }
        ]
    });

   dt.on('draw', function(data){
    $('#dt tbody').addClass('row');
    $('#dt tbody tr').addClass('col-lg-3 col-md-4 col-sm-12');
   });
    });
</script>
@endpush