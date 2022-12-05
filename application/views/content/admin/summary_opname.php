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
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">By Exp-Date</a></li>
                                        <li class="nav-item"><a class="nav-link active" href="#pending" data-toggle="tab">Summary All</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timeline">
                                            <?php
                                            foreach ($selisihVivo as $s) {
                                                $match = $s->match;
                                                $not   = $s->not;
                                            }
                                            ?>
                                            <div class="d-flex justify-content-center">
                                                <canvas id="chartVivo" class="chartCus"></canvas>
                                                <script>
                                                    var xValues = ["Data Klop", "Data Tidak Klop"];
                                                    var yValues = [<?php echo json_encode($match) ?>, <?php echo json_encode($not) ?>];
                                                    var barColors = [
                                                        "#00aba9",
                                                        "#b91d47"
                                                    ];

                                                    new Chart("chartVivo", {
                                                        type: "doughnut",
                                                        data: {
                                                            labels: xValues,
                                                            datasets: [{
                                                                backgroundColor: barColors,
                                                                data: yValues
                                                            }]
                                                        },
                                                        options: {
                                                            title: {
                                                                display: true,
                                                                text: "Diagram Count Selisih By Expired Date"
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="card mt-5">
                                                        <div class="card-header">
                                                            <h3>List Barang Tidak EXP</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="example2" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th hidden>id</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Qty Box Zahir</th>
                                                                        <th>Qty Box Fisik</th>
                                                                        <th>Qty Pcs Zahir</th>
                                                                        <th>Qty Pcs Fisik</th>
                                                                        <th>Expired Date</th>
                                                                        <th>Hasil</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($listVivo as $b) : ?>
                                                                        <tr>
                                                                            <td hidden><?= $b->id_opname ?></td>
                                                                            <td><?= $b->nama_barang ?></td>
                                                                            <td><?= $b->stok_box ?></td>
                                                                            <td><?= $b->stok_box1 ?></td>
                                                                            <td><?= $b->stok_pcs ?></td>
                                                                            <td><?= $b->stok_pcs1 ?></td>
                                                                            <td><?= $b->exp_date ?></td>
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
                                                                            <td>
                                                                                <a href="#" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modalOpname<?= $b->id_barang ?><?= $b->id_barang ?>">
                                                                                    <i class="fa fa-solid fa-pencil-alt"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="pending">
                                            <?php
                                            foreach ($selisihFaktur as $s) {
                                                $match = $s->match;
                                                $not   = $s->not;
                                            }
                                            ?>
                                            <div class="d-flex justify-content-center">
                                                <canvas id="chartfaktur" class="chartCus"></canvas>
                                                <script>
                                                    var xValues = ["Data Klop", "Data Tidak Klop"];
                                                    var yValues = [<?php echo json_encode($match) ?>, <?php echo json_encode($not) ?>];
                                                    var barColors = [
                                                        "#00aba9",
                                                        "#b91d47"
                                                    ];

                                                    new Chart("chartfaktur", {
                                                        type: "doughnut",
                                                        data: {
                                                            labels: xValues,
                                                            datasets: [{
                                                                backgroundColor: barColors,
                                                                data: yValues
                                                            }]
                                                        },
                                                        options: {
                                                            title: {
                                                                display: true,
                                                                text: "Diagram Count Selisih By Expired Date"
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="card mt-5">
                                                        <div class="card-header">
                                                            <h3>List Barang With Faktur Pending</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="example3" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th hidden>id</th>
                                                                        <th>Kode Barang</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Qty</th>
                                                                        <th>Qty Opname</th>
                                                                        <th>Hasil</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($listPending as $b) : ?>
                                                                        <tr>
                                                                            <td hidden><?= $b->id_barang ?></td>
                                                                            <td><?= $b->kode_barang ?></td>
                                                                            <td><?= $b->nama_barang ?></td>
                                                                            <td><?= $b->total ?></td>
                                                                            <td><?= $b->qty_b ?></td>
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
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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