var url = $('meta[name="url"]').attr('content')
var _token = $('meta[name="_token"]').attr('content')

var mm = {

    isLoading: function(elementClass){
        $(elementClass).addClass('spinner spinner-right spinner-white pr-15').text('Mohon tunggu')
    },
    blok: function () {
        $.blockUI({
            message: '<div class="d-flex justify-content-center"><i class="spinner spinner-track spinner-primary mr-15"></i>  <span class="text-muted" style="font-size:14px; color:blue">Silahkan tunggu . . .</span> </div>',
            css: {
                border: 'none',
                padding: '10px',
                backgroundColor: 'white',
                '-webkit-border-radius': '5px',
                '-moz-border-radius': '5px',
                opacity: 1
            },
            baseZ: 10080
        });
    },
    unblok: function () {
        $.unblockUI();
    },
    notifikasi_error: (xhr) => {

        var data = JSON.parse(xhr.responseText)
        var message = '';
        var count = 0;
        $.each(data.errors, function (index, value) { 
            if (!count) {
            message += `${value[0]}`;
            }
            count++;
        });
    
        if (!message.length) {
            message = `${data.message}`;
        }
    
        if(message == 'CSRF token mismatch.'){
            message = 'CSRF token anda tidak valid'
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            setTimeout(() => {
                location.reload()
            }, 3000)
        }
    
        toastr.error(message, 'Oppsss..');
    }
}
