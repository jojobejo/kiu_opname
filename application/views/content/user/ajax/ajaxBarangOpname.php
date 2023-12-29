<script>
    var table;
    var table_server_barang;
    $(document).ready(function() {

        table = $('#table').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('u_list_barang1') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

        table_server_barang = $('#getBarang').DataTable({
            "lengthChange": false,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('getBarangServer') ?>",
                "type": "POST"
            }

        });
    })

    function addOpname(id) {
        save_method = 'update';
        $('#form_add_opname')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('getBarangOpname') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[id="id_isi"]').val(data.id_master_barang);
                $('[id="kode_isi"]').val(data.kode_barang);
                $('[id="pending_isi"]').val(data.kode_pending);
                $('[id="dimensi_isi"]').val(data.hasil_dimensi);
                $('[id="nama_isi"]').val(data.nama_barang);
                $('[id="box_isi"]').val();
                $('[id="pcs_isi"]').val();
                $('[id="date_isi"]').val(data.exp_date);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Input Data Opname'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function addExpOpname(id) {
        save_method = 'update';
        $('#form_add_exp')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('getBarangOpname') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[id="kode_isi"]').val(data.kode_barang);
                $('[id="pending_isi"]').val(data.kode_pending);
                $('[id="nama_isi"]').val(data.nama_barang);
                $('[id="panjang_isi"]').val(data.panjang);
                $('[id="lebar_isi"]').val(data.lebar);
                $('[id="tinggi_isi"]').val(data.tinggi);
                $('[id="dimensi_isi"]').val(data.hasil_dimensi);
                $('[id="box_isi"]').val();
                $('[id="pcs_isi"]').val();
                $('[id="date_isi"]').val();
                $('#modal_form_exp').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Input Exp Data Opname'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>