<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}} <a href="javascript:void(0)" target="_blank">Developer</a>. All rights reserved.</span>
    {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> --}}
  </div>
</footer>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
</script>
