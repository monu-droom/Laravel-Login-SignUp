<!-- Main Footer -->
  <footer class="main-footer">
    <div>Copyright &copy; 2021 <a href="#">OwO</a></div>
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- PAGE SCRIPTS -->
<!-- <script src="{{ asset('assets/dist/js/pages/dashboard2.js') }}"></script> -->
<!-- DataTables -->
{{-- <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/seller/demo/datatables-demo.js') }}"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/js/seller/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/js/seller/bootstrap-select.min.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> 
<!-- page script -->



<!-- Lazy load of a page and images start -->
<script type="text/javascript">
   $(".lazy-load div").slice(10).hide();
     var mincount = 10;
     var maxcount = 20;
     $(window).scroll(function () {
         if ($(window).scrollTop() + $(window).height() >= $(document).height() - 50) {
             $(".lazy-load div").slice(mincount, maxcount).slideDown(1400);

             mincount = mincount + 10;
             maxcount = maxcount + 10

         }
     });
</script>
<!-- Lazy load of a page and images end -->

<!-- Show image name on upload bs4 start -->
<script>
// Add the following code if you want the name of the file appear on select
$("body").on("change", ".custom-file-input", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<!-- Show image name on upload bs4 end -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable( {
          scrollX: true,
          dom: 'lBfrtip',
          buttons: [
            {
              extend: 'pdf',
              text: 'Export In PDF'
            },
            {
              extend: 'excel',
              text: 'Export In Excel'
            },
            'print',
          ],
          "aLengthMenu": [[10, 25, 50, 75, -1], [10, 25, 50, 75, "All"]],
          "pageLength": 10,
      } );
} );
</script>
<script>
  $('#myModal').click({
    backdrop: 'static',
    keyboard: false
});
</script>
</body>
</html>