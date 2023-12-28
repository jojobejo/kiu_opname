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
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/plugins/flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/flot/plugins/jquery.flot.pie.js') ?>"></script>


<script>
  $(function() {

    var dbzahir;
    var dbtracking;

    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    dbzahir = $('#dbzahir').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo site_url('getZahir') ?>",
        "type": "POST"
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    dbtracking = $('#dbtracking').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "order": [],


      "ajax": {
        "url": "<?php echo site_url('serverInputer') ?>",
        "type": "POST"
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    }).column(0).visible(false).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });

  function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 
    var url;

    if (save_method == 'add') {
      url = "<?php echo site_url('person/ajax_add') ?>";
    } else {
      url = "<?php echo site_url('opnameEdited') ?>";
    }

    // ajax adding data to database
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data) {

        if (data.status) //if success close modal and reload ajax table
        {
          $('#modal_form').modal('hide');
          window.location.reload();
        }

        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled', false); //set button enable 


      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error adding / update data');
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled', false); //set button enable 

      }
    });
  }

  function edit_opname(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url: "<?php echo site_url('editOpname') ?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="id_isi"]').val(data.id_opname);
        $('[name="dimensi_isi"]').val(data.hasil_dimensi);
        $('[name="kode_barang"]').val(data.kode_barang);
        $('[name="nama_barang"]').val(data.nama_barang);
        $('[name="sektor_i"]').val(data.sektor);
        $('[name="kode_pending"]').val(data.kode_pending);
        $('[name="exp_date"]').val(data.exp_date);
        $('[name="qty_isi"]').val(data.stok_box1 * data.hasil_dimensi + data.stok_pcs1);
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }

  function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
  }
</script>

</body>

</html>