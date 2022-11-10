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
                <div class="container-fluids">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="align-center">STOK OPNAME</h3>
                                </div>
                                <!-- CARD BODY -->
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="" class="control-label align-left">Nama Barang</label>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <select class="form-control select2" style="width: 100%;" id="id_barang" name="id_barang">
                                                        <option value="&nbsp"></option>
                                                        <?php foreach ($barang as $key) : ?>
                                                            <option value="<?php echo $key->id_barang ?>"><?php echo $key->nama_barang ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="" class="control-label align-left">Nama Gudang</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="" name="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./CARD BODY -->

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