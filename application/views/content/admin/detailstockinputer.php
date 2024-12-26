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
                <div class="container-fluids">
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Stock Controller</h3>
                                </div>
                                <div class="card-body">
                                    <table id="table_stock_controller" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nama_barang</th>
                                                <th>Exdate</th>
                                                <th>Saldo Fisik</th>
                                                <th>Stock Box</th>
                                                <th>Stock Pcs</th>
                                                <th>Keterangan</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($detail_tracinng as $d) : ?>
                                                <tr>
                                                    <td><?= $d->nama_barang ?></td>
                                                    <td><?= $d->exp_date ?></td>
                                                    <td><?= $d->qty ?></td>
                                                    <td><?= $d->stock_box ?></td>
                                                    <td><?= $d->stock_pcs ?></td>
                                                    <td><?= $d->keterangan ?></td>
                                                    <td><a href="#" class="btn btn-sm btn-block btn-warning" data-target="#revisiqty<?= $d->id_opname ?>" data-togle="modal"><i class="fas fa-pencil-alt"></i></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <!-- <?php foreach ($stock_controller as $s) : ?>
                                                <tr>
                                                    <td><?= $s->nama_barang ?></td>
                                                    <td><?= $s->qtypending ?></td>
                                                    <td><?= $s->qtymaster ?></td>
                                                    <td><?= $s->saldo_all ?></td>
                                                    <td><?= $s->qtyopname ?></td>
                                                    <td><?= $s->selisih ?></td>
                                                    <?php if ($s->hasil == 'match') : ?>
                                                        <td><a href="#" class="btn btn-sm btn-block btn-success"><i class="fas fa-check-circle"></i></a></td>
                                                    <?php else : ?>
                                                        <td><a href="#" class="btn btn-sm btn-block btn-danger"><i class="fas fa-times-circle"></i></a></td>
                                                    <?php endif; ?>
                                                    <td><a href="<?= base_url('detail_stock_controller/' . $s->kode_barang) ?>" class="btn btn-sm btn-block btn-info"><i class="fas fa-eye"></i></a></td>
                                                </tr>
                                            <?php endforeach; ?> -->
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