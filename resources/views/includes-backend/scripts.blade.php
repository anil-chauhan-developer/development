
<script src="{{asset('backend/js/admin/jtable/jquery-1.6.4.min.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <script src="{{asset('backend/js/select2.js')}}"></script>

  <!-- Custom js for this page-->
  <script src="{{asset('backend/js/dashboard.js')}}"></script>
  <script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendors/tinymce/themes/modern/theme.js')}}"></script>

<script src="{{asset('vendors/lightgallery/js/lightgallery-all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('backend/js/admin/themes/redmond/jquery-ui-1.8.16.custom.css')}}">
<link rel="stylesheet" href="{{asset('backend/js/admin/jtable/themes/lightcolor/red/jtable.css')}}">

<script src="{{asset('backend/js/admin/jquery-ui-1.8.16.custom.min.js')}}"></script>
<script src="{{asset('backend/js/admin/jtable/jquery.jtable.js')}}"></script>
<script src="{{ asset('backend/js/parsley.js')}}"></script>
<script src="{{ asset('backend/js/file-upload.js')}}"></script>
<script src="{{ asset('backend/js/timepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
  </script>
<script>
var webURL = "{{ config('app.url')}}";
</script>
