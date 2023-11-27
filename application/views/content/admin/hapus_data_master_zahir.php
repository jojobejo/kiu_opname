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
                                            <h3>!!!Anda akan menghapus data !!! </h3>
                                            <br>
                                            <h3><?php echo $b->nama_barang ?></h3>
                                            <br>
                                            <h3>Data yang sudah terhapus tidak dapat di kembalikan lagi</h3>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <a href="<?= base_url('data_zahir') ?>" type="button" class="btn btn-default">Close</a>
                                            <a class="btn btn-danger" href="<?php echo base_url("C_Admin/Data_zahir/hapusBarang/$b->id_barang") ?>">Hapus</a>
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