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
                                <div class="card-header">
                                    <h3 class="card-title">List Barang</h3>
                                </div>
                                <div>
                                    <?php $this->load->view('content/admin/modal/modaBarang') ?>

                                    <button type="button" class="btn btn-primary m-2 ml-3" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data Barang
                                    </button>

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Lokasi</th>
                                                    <th>Stok</th>
                                                    <th>Gudang</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($barang as $b) : ?>
                                                    <tr>
                                                        <td><?= $b->nama_barang ?></td>
                                                        <td><?= $b->sektor ?></td>
                                                        <td><?= $b->stok_barang ?> </td>
                                                        <td><?= $b->nama_gudang ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#editModal<?php echo $b->id_barang ?>">
                                                                <i class="fa fa-solid fa-pencil-alt"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#hapus<?php echo $b->id_barang ?>">
                                                                <i class="fa fa-solid fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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