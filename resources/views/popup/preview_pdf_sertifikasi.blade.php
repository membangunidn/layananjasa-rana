<div class="callout callout-info">
    <center>
    <label><strong> -----Dokumen Sertifikasi <b class="ml-1 text-primary">{{$data->namalengkap}}</b> ----- </strong></label>
    </center>
</div>

<style>
    .loader {
        border: 6px solid #f3f3f3; /* Light grey */
        border-top: 6px solid #7189f3; /* Blue */
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 0.8s linear infinite;
        margin-top:150px;
    }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div style="margin-top:10px;">
    <div id="loading" class="loading" style="height: 100%; display: none;">
        <div class="loading-content">
            <center><div class="loader"></div></center>
            <h4 class="text-center" style="color: black; font-weight: bold;">Mohon tunggu...</h4>
        </div>
    </div>
    <embed id="pdf" src="{{asset('uploads/sertifikasi/'.$data->sertifikasi)}}" frameborder="0" width="100%" height="650" "="">
</div>

<script>
    $(document).ready(function(){
        $("#pdf").on("load", function () {
            $('#loading').fadeOut(); 
        });
    })
</script>