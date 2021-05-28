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
}
