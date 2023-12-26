<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/images/Karisma.png') ?>" alt="AdminLTELogo" height="150" width="300">
        </div>

        <?php $this->load->view('partial/admin/navbar') ?>
        <?php $this->load->view('partial/admin/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Zahir</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart('C_Admin/Data_zahir/addBarang'); ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Panjang Dimensi<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="number" id="panjang_isi" name="panjang_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Lebar Dimensi<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="number" id="lebar_isi" name="lebar_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Tinggi Dimensi<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="number" id="tinggi_isi" name="tinggi_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Qty<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="number" id="qty_isi" name="qty_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="text" id="date_isi" name="date_isi" value="" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right" for="id_bar">Keterangan Input <span class="required">*</span></label>
                                                <div class="col-sm-8"><input class="form-control" type="text" id="keterangan_isi" name="keterangan_isi" value="" /></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="<?= base_url('data_zahir') ?>" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                    <!-- /.modal-content -->



                                    <!-- /.card-header -->
                                    <div class="card-body">

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                        </div>
                    </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://kiu.co.id">PT.KARISMA INDOARGO UNIVERSAL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->