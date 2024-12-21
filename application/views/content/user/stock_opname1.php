<body class="hold-transition sidebar-mini layout-fixed">
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Opname</h3>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('useropname'); ?>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select class="form-control" name="nama_isi" id="nama_isi" style="width: 100%;">
                            </select>
                            <input type="text" class="form-control" name="nm_isi" id="nm_isi" hidden>
                            <input type="text" class="form-control" name="kode_barang" id="kode_barang" hidden>
                            <input type="number" class="form-control" name="dimensi" id="dimensi" value="0" hidden>
                        </div>
                        <div class="form-group">
                            <label for="">Qty Pcs</label>
                            <input type="number" class="form-control" name="qty_pcs" id="qty_pcs" value="0">
                        </div>
                        <div class="form-group">
                            <label for="">Qty Box</label>
                            <input type="number" class="form-control" name="qty_box" id="qty_box" value="0">
                        </div>
                        <div class="form-group">
                            <label for="">Sektor</label>
                            <input type="number" class="form-control" name="sektor_isi" id="sektor_isi">
                        </div>
                        <div class="form-group">
                            <label for="">Expired Date</label>
                            <input type="date" class="form-control" name="exp_isi" id="exp_isi">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">SAVE</button>
                        </form>
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