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

            <?php $this->load->view('content/admin/modal/modal_stock_controller') ?>
            <?php if ($this->session->userdata('nama_user') == 'admin') : ?>
                <section class="content">
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <?php foreach ($status_tracing as $s) :
                                            $qtyzahir   = $s->master;
                                            $qtypending = $s->pending;
                                            $qtyall  = $qtyzahir + $qtypending;
                                            $selisih = ($s->opname - $qtyall);
                                        ?>
                                            <h3>Stock Controller - <?= $s->nama_barang ?> </h3>

                                        <?php endforeach; ?>
                                        <a href="<?= base_url('stock_controller') ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-home"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table id="table_stock_controller" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>nama_barang</th>
                                                    <th>Exdate</th>
                                                    <th>Saldo Fisik</th>
                                                    <th>Saldo Pending</th>
                                                    <th>Saldo Buku</th>
                                                    <th>Stock Box</th>
                                                    <th>Stock Pcs</th>
                                                    <th>Keterangan</th>
                                                    <th>Sektor</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($detail_tracinng as $d) :
                                                    $qtyall = $d->qty_pending + $d->qty_saldo;
                                                ?>
                                                    <tr>
                                                        <td><?= $d->nama_barang ?></td>
                                                        <td><?= $d->exp_date ?></td>
                                                        <td><?= $d->qty_opname ?></td>
                                                        <td><?= $d->qty_pending ?></td>
                                                        <td><?= $qtyall ?></td>
                                                        <td><?= $d->stock_box ?></td>
                                                        <td><?= $d->stock_pcs ?></td>
                                                        <td><?= $d->keterangan ?></td>
                                                        <td><?= $d->sektor ?></td>
                                                        <?php if ($d->hasil == 'match') : ?>
                                                            <td><a href="#" class="btn btn-sm btn-success btn-block"><i class="fas fa-check-circle"></i></a></td>
                                                        <?php else : ?>
                                                            <td><a href="#" class="btn btn-sm btn-danger btn-block"><i class="fas fa-times-circle"></i></a></td>
                                                        <?php endif; ?>
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
            <?php elseif ($this->session->userdata('nama_user') == 'admin-it') : ?>
                <section class="content">
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <?php foreach ($status_tracing as $s) :
                                            $qtyzahir   = $s->master;
                                            $qtypending = $s->pending;
                                            $qtyall  = $qtyzahir + $qtypending;
                                            $selisih = ($s->opname - $qtyall);
                                        ?>
                                            <h3>Stock Controller - <?= $s->nama_barang ?> </h3>
                                            <h5>|| Saldo Fisik : <?= $s->opname ?> </h5>
                                            <h5>|| Saldo Buku : <?= $qtyall ?></h5>
                                            <h5>|| Selisih : <?= $selisih ?></h5>
                                        <?php endforeach; ?>
                                        <a href="<?= base_url('stock_controller') ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-home"></i></a>
                                        <a href="#" class="btn btn-sm btn-block btn-info" data-toggle="modal" data-target="#adjustment"><i class="fas fa-plus-circle"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table id="table_stock_controller" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>nama_barang</th>
                                                    <th>Exdate</th>
                                                    <th>Saldo Fisik</th>
                                                    <th>Saldo Zahir</th>
                                                    <th>Saldo Pending</th>
                                                    <th>Saldo All</th>
                                                    <th>Stock Box</th>
                                                    <th>Stock Pcs</th>
                                                    <th>Keterangan</th>
                                                    <th>Selisih</th>
                                                    <th>Hasil</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($detail_tracinng as $d) :
                                                    $qtyall = $d->qty_pending + $d->qty_saldo;
                                                ?>
                                                    <tr>
                                                        <td><?= $d->nama_barang ?></td>
                                                        <td><?= $d->exp_date ?></td>
                                                        <td><?= $d->qty_opname ?></td>
                                                        <td><?= $d->qty_saldo ?></td>
                                                        <td><?= $d->qty_pending ?></td>
                                                        <td><?= $qtyall ?></td>
                                                        <td><?= $d->stock_box ?></td>
                                                        <td><?= $d->stock_pcs ?></td>
                                                        <td><?= $d->keterangan ?></td>
                                                        <td><?= $d->selisih ?></td>
                                                        <?php if ($d->hasil == 'match') : ?>
                                                            <td><a href="#" class="btn btn-sm btn-success btn-block"><i class="fas fa-check-circle"></i></a></td>
                                                        <?php else : ?>
                                                            <td><a href="#" class="btn btn-sm btn-danger btn-block"><i class="fas fa-times-circle"></i></a></td>
                                                        <?php endif; ?>
                                                        <td><a href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_opname ?>" class="btn btn-md btn-block btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
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
            <?php endif; ?>

            <!-- Main content -->


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