<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/plugins/flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/flot/plugins/jquery.flot.pie.js') ?>"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    var table1;
    var table2;

    //serverside-table-listvivo
    table1 = $('#example2').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo site_url('getServerFifo') ?>",
        "type": "POST"
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    //serversid-table-Allbarang
    table2 = $('#example3').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo site_url('getServerListSummaryAllBarang') ?>",
        "type": "POST"
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

</body>

</html>