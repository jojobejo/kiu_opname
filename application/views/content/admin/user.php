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
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">
                                    <h4>List User</h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <?php $this->load->view('content/admin/modal/modalUser') ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">
                                            <i class="fas fa-plus"></i>
                                            Tambah User Baru
                                        </button>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama User</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Sektor</th>
                                                <th>Team Opname</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($user as $s) : ?>
                                                <tr>
                                                    <td><?= $s->nama_user ?></td>
                                                    <td><?= $s->username?></td>
                                                    <td><?= $s->role?></td>
                                                    <td><?= $s->sektor?></td>
                                                    <td><?= $s->team_opname?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modalEditUser<?= $s->id_user?>">
                                                            <i class="fa fa-solid fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modalHapus<?= $s->id_user?>">
                                                            <i class="fa fa-solid fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                <?php endforeach; ?>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

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