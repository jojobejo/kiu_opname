<script>
    $(document).ready(function() {

        $("#nm_isi").select2({
            placeholder: "Masukan Nama Barang",
            theme: "bootstrap4",
            allowClear: true,
            minimumInputLenght: 1,
            language: {
                inputTooShort: function(args) {

                    return "2 or more symbol.";
                },
                noResults: function() {
                    return "Not Found.";
                },
                searching: function() {
                    return "Searching...";
                }
            },
            minimumInputLenght: 1,
            ajax: {
                url: '<?= base_url('selectbarang') ?>',
                type: "post",
                dataType: 'json',
                delay: 200,

                data: function(params) {
                    return {
                        nama_barang: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_barang,
                                id: item.kode_barang
                            }
                        })
                    };
                }
            }
        });

        $("#nm_isi").on("change", function() {
            var namabarang = $("#nm_isi").val();
            $.ajax({
                url: "<?= base_url('get_data_barang') ?>",
                type: "POST",
                data: {
                    namabarang: namabarang
                },
                dataType: "JSON",
                cache: false,
                success: function(data) {
                    $.each(data, function(nama_barang, kode_barang, hasil_dimensi) {
                        $("#nama_barang").val(data.nama_barang);
                        $("#kode_barang").val(data.kode_barang);
                        $("#dimensi").val(data.hasil_dimensi);
                    });
                }
            });
        });

        $('#nm_isi').change(function() {
            var kodebarang = $('#nm_isi').val();
            $.ajax({
                url: "<?php echo site_url('get_exp'); ?>",
                method: "POST",
                data: {
                    kodebarang: kodebarang
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '<option value="2222-12-12">2222-12-12</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].exp_date + '>' + data[i].exp_date + '</option>';
                    }
                    $('#exp_isi').html(html);
                }
            });
            return false;
        });


    });
</script>