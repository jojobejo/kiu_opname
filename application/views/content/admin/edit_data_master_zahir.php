<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/images/Karisma.png') ?>" alt="AdminLTELogo" height="150" width="200">
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
                                <div class="card-header">
                                    <h2 class="card-title">Edit Data barang Zahir</h2>
                                </div>
                                <div>

                                    <?php foreach ($barang as $b) :
                                        $originalDate = $b->exp_date;
                                        $newDate = date("m/d/Y", strtotime($originalDate)); ?>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('C_Admin/Data_zahir/editBarang'); ?>
                                            <div class="form-group" hidden>
                                                <div class="row">
                                                    <label class="col-sm-2" for="id_bar">id barang<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $b->id_barang ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Kode Pending<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="<?= $b->kode_pending ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Kode Barang<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="<?= $b->kode_barang ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Nama Barang <span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="<?= $b->nama_barang ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Qty<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="number" id="qty_isi" name="qty_isi" value="<?= $b->qty ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Expired Date<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="date_isi" name="date_isi" value="<?= $b->exp_date  ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 " for="id_bar">Keterangan<span class="required">*</span></label>
                                                    <div class="col-sm-9"><input class="form-control" type="text" id="sktor_terkait_isi" name="sktor_terkait_isi" value="<?= $b->keterangan  ?>" /></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <a href="<?= base_url('data_zahir') ?>" type="button" class="btn btn-default">Close</a>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    <?php endforeach; ?>
                                </div>
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