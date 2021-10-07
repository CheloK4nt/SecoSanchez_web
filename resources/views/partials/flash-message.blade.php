<style>
    .alert-success {
            background-color: rgb(225, 225, 225) !important;
            color: rgb(85, 85, 85);
            border-color: white !important;
            text-align: center;
        }
</style>

@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <strong>{{ $message }}</strong>

</div>

@endif

<script>
    window.setTimeout(function(){
        $(".alert-success").fadeTo(1500,0).slideDown(1000,function(){
            $(this).remove();
        });
    }, 5000);

</script>




{{-- @if ($errors->any())

<div class="alert alert-danger">

    <button type="button" class="close" data-dismiss="alert">×</button>

    Please check the form below for errors

</div>

@endif --}}
