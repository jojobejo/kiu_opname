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
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <h3>SOP - Penggunaan Aplikasi</h3>
                            </div>
                            <div class="">
                                
                                <p style="font-size: larger;">1. User Masuk pada menu opname terlebih dahulu</p>
                                <p style="font-size: larger;">2. Checker melakukan pengecekan dan menginputkan barang sesuai dengan hitungan yang dilakukan oleh pelaksana </p>
                                <p style="font-size: larger;">3. pastikan cheker melakukan input data menyesuaikan nama barang dan expired date</p>
                                <p style="font-size: larger;">4. checker dapat melakukan penambahan data expired date pada menu opname dengan cara klik tombol hijau pada nama barang yang akan ditambahakan datanya</p>
                                <p style="font-size: larger;">5. inputkan kuantitas yang telah dilakukan peritungan dan sesuaikan dengan satuan , jika menghitung box input hitungan stock opname pada kolom box , jika menghitung pcs input hitungan stock opname pada kolom pcs</p>
                                <p style="font-size: larger;">6. lakukan penginputan stock opname barang hingga selesai sesuai dengan area yang telah dibatasi</p>
                                <p style="font-size: larger;">7. lakukan pengecekan match progress pada saat setelah melakukan semua penginputan pada area yang telah ditentukan</p>
                                <p style="font-size: larger;">8. bila terdapat tanda silang merah maka tim area wajib menghitung kembali barang tersebut</p>
                                <p style="font-size: larger;">9. penghitungan kembali atau revisi perhitungan dapat dilakukan dengan cara tekan tombol tanda silang merah kemudian edit inputan tersebut sesuai dengan revisi hitungan stock opname yang telah dilakukan</p>
                                <p style="font-size: larger;">10. bila tanda centang hijau maka data opname match</p>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">

                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
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