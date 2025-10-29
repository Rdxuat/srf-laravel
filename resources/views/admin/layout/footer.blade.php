<!-- START: Template JS-->
<script src="{{asset('library/dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/moment/moment.js')}}"></script>
<script src="{{asset('library/dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>    
<script src="{{asset('library/dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- END: Template JS-->

<!-- START: APP JS-->
<script src="{{asset('library/dist/js/app.js')}}"></script>
<!-- END: APP JS-->

<!-- START: Page Vendor JS-->
<script src="{{asset('library/dist/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/morris/morris.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/starrr/starrr.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.canvaswrapper.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.colorhelpers.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.saturated.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.browser.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.drawSeries.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.uiConstants.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.legend.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-flot/jquery.flot.pie.js')}}"></script>        
<script src="{{asset('library/dist/vendors/chartjs/Chart.min.js')}}"></script>  
<script src="{{asset('library/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js')}}"></script>
<script src="{{asset('library/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
<script src="{{asset('library/dist/vendors/apexcharts/apexcharts.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page JS-->
<script src="{{asset('library/dist/js/home.script.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('library/dist/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/jszip/jszip.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('library/dist/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="{{asset('library/dist/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('library/custom/custom.js')}}"></script>
<!-- END: Page JS-->

<!-- START: Page Vendor JS-->
<script src="{{asset('library/dist/vendors/summernote/summernote-bs4.js')}}"></script> 
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="{{asset('library/dist/js/summernote.script.js')}}"></script>
<!-- END: Page Script JS-->

<script src="{{asset('library/dist/js/datatable.script.js')}}"></script>
<script src="/library/dist/js/toaster.min.js"></script>
    <script>
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "timeOut": "5000"
        };
        @if(session('success'))
          toastr.success("{{ session('success') }}");
        @endif
        @if(session('error'))
          toastr.error("{{ session('error') }}");
        @endif
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
          @endforeach
        @endif
      </script>
</body>

<!-- END: Body-->
</html>
