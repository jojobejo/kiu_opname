<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .chartCus {
            height: 20px;
            width: 50px;
        }

        #chart-wrapper {
            display: inline-block;
            position: relative;
            width: 100%;
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
                                <?php
                                foreach ($selisihVivo as $s) {
                                    $match = $s->match;
                                    $not   = $s->not;
                                    $total = $s->total;

                                    $vM = ($match / $total) * 100;
                                    $vN = ($not / $total) * 100;

                                    $dataPointsVivo = array(
                                        array("label" => "Match", "y" => $vM),
                                        array("label" => "Not Match", "y" => $vN)
                                    );
                                }
                                ?>

                                <?php
                                foreach ($selisihFaktur as $a) {
                                    $matchF = $a->match;
                                    $notF   = $a->not;
                                    $totalF = $a->total;

                                    $pM = ($matchF / $totalF) * 100;
                                    $pN = ($notF / $totalF) * 100;

                                    $dataPoints = array(
                                        array("label" => "Match", "y" => $pM),
                                        array("label" => "Not Match", "y" => $pN),
                                    );
                                }
                                ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">

                                            <div id="chartContainer" style="height: 450px; width: 100%;"></div>
                                        </div>
                                        <div class="col-sm">
                                            <div id="chartContainer1" style="height: 450px; width:100%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="card mt-2">
                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                                <div class="row">
                                    <h3 class="card-title">
                                        <i class="fas fa-table mr-1"></i>
                                        List Match - Not Match Barang
                                    </h3>

                                </div>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#revenue-chart" data-toggle="tab">List Fifo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#sales-chart" data-toggle="tab">List All Barang</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane" id="revenue-chart">
                                        <a type="button" class="btn btn-success m-2 ml-3" href="<?php echo base_url('C_Admin/C_summaryOpaname/excelFifo') ?>">
                                            <i class="fas fa-file-excel"></i>&nbsp;
                                            Export Data To Excel
                                        </a>
                                        <div class="col-8 ml-2">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">TOTAL BARANG : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($total, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">BARANG MATCH : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($match, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">BARANG NOT MATCH : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($not, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Expired Date</th>
                                                    <th>Faktur Pending</th>
                                                    <th>Saldo Buku Zahir</th>
                                                    <th>Box Saldo Buku</th>
                                                    <th>Box Saldo Pcs</th>
                                                    <th>Saldo Fisik</th>
                                                    <th>Box Fisik</th>
                                                    <th>Pcs Fisik</th>
                                                    <th>Sektor</th>
                                                    <th>Selisih</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="chart tab-pane active" id="sales-chart">
                                        <a type="button" class="btn btn-success m-2 ml-3" href="<?php echo base_url('C_Admin/C_summaryOpaname/excelAllBarang') ?>">
                                            <i class="fas fa-file-excel"></i>&nbsp;
                                            Export Data To Excel
                                        </a>
                                        <div class="col-8 ml-2">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">TOTAL BARANG : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($totalF, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">BARANG MATCH : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($matchF, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="row">
                                                        <h6 class="font-weight-bold">BARANG NOT MATCH : </h6>
                                                        &nbsp;
                                                        <h6><?= json_encode($notF, JSON_NUMERIC_CHECK) ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Saldo Buku</th>
                                                    <th>Faktur Pending</th>
                                                    <th>Saldo Fisik</th>
                                                    <th>Selisih</th>
                                                    <th>Sektor</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
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

    <?php
    foreach ($selisihVivo as $s) {
        $match = $s->match;
        $not   = $s->not;
        $total = $s->total;

        $vM = ($match / $total) * 100;
        $vN = ($not / $total) * 100;

        $dataPointsVivo = array(
            array("label" => "Match", "y" => $vM),
            array("label" => "Not Match", "y" => $vN)
        );
    }
    ?>

    <?php
    foreach ($selisihFaktur as $a) {
        $match = $a->match;
        $not   = $a->not;
        $total = $a->total;

        $pM = ($match / $total) * 100;
        $pN = ($not / $total) * 100;

        $dataPoints = array(
            array("label" => "Match", "y" => $pM),
            array("label" => "Not Match", "y" => $pN),
        );
    }
    ?>

    <script>
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainer", {

                title: {
                    text: "Count By All Barang"
                },
                legend: {
                    maxWidth: 500,
                    itemWidth: 170
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    yValueFormatString: "#,##0.00\"%\"",
                    legendText: "{indexLabel}: {y}",
                    dataPoints: [{
                            y: <?= $pM ?>,
                            indexLabel: "Match"
                        },
                        {
                            y: <?= $pN ?>,
                            indexLabel: "Not Match"
                        },

                    ]
                }]
            });

            var chart2 = new CanvasJS.Chart("chartContainer1", {
                title: {
                    text: "Count By Exp Date"
                },
                legend: {
                    maxWidth: 500,
                    itemWidth: 200
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    yValueFormatString: "#,##0.00\"%\"",
                    legendText: "{indexLabel}: {y}",
                    dataPoints: [{
                            y: <?= $vM ?>,
                            indexLabel: "Match"
                        },
                        {
                            y: <?= $vN ?>,
                            indexLabel: "Not Match"
                        },
                    ]
                }]
            });

            chart1.render();
            chart2.render();
        }
    </script>