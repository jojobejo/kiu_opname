<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .chartCus {
            height: 20px;
            width: 50px;
        }
    </style>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/images/Karisma.png') ?>" alt="AdminLTELogo" height="150" width="300">
        </div>

        <?php $this->load->view('partial/user/navbar') ?>
        <?php $this->load->view('partial/user/sidebar') ?>

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
                <div class="container-fluids">
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <a href="<?= base_url('u_match_progress') ?>" class="btn btn-primary mr-3"><i class="fas fa-home"></i></a>
                                        <h3>Detail Inputer</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $this->load->view('content/user/modal/modalinputer') ?>
                                    <table id="tbMatchProgressUser" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Expired Date</th>
                                                <th>Qty</th>
                                                <th>PCS</th>
                                                <th>BOX</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail_opname as $l) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $l->nama_barangs ?></td>
                                                    <td><?= $l->exp_date ?></td>
                                                    <td><?= $l->qty ?></td>
                                                    <td><?= $l->stock_pcs ?></td>
                                                    <td><?= $l->stock_box ?></td>
                                                    <div class="row">
                                                        <td>
                                                            <a href="#" class="btn btn-sm btn-warning mr-1" data-target="#editopname<?= $l->id_opname ?>" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-target="#hapus<?= $l->id_opname ?>" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </div>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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