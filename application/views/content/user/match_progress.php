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

                <section class="content">
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>List Barang Tidak Cocok</h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="tbMatchProgressUser" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th hidden>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Expired Date</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $no = 1;
                                                foreach ($jmlBarang as $b) : 
                                                      $originalDate = $b->exp_date;
                                                      $newDate = date("m/d/Y", strtotime($originalDate)); ?>
                                                    <tr>
                                                        <td hidden><?= $no++?></td>
                                                        <td><?= $b->nama_barang ?></td>
                                                        <td><?= $newDate ?></td>
                                                        <?php
                                                        if ($b->hasil == 'match') {
                                                            echo '<td>
                                                            <a href="#" class="btn btn-success btn-sm">
                                                                <i class="fa fa-solid fa-check"><h3 hidden>&nbsp;MATCH</h3></i>
                                                            </a>
                                                        </td>';
                                                        } else {
                                                            echo '<td>
                                                            <a href="#" class="btn btn-danger btn-sm " data-toggle="modal">
                                                                <i class="fa fa-solid fa-ban"><h3 hidden>&nbsp;NOT MATCH</h3></i>
                                                            </a>
                                                        </td>';
                                                        }
                                                        ?>
                                                        <!-- <td>
                                                            <a href="#" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modalOpname<?= $b->id_opname ?><?= $b->id_opname ?>">
                                                                <i class="fa fa-solid fa-pencil-alt"></i>
                                                            </a>
                                                        </td> -->
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