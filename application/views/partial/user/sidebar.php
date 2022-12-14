  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('def_user') ?>" class="brand-link">
      <img src="<?php echo base_url("assets/images/Karisma.png") ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Stock Opname</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image mt-4">
          <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama_user')?></a>
          <a href="#" class="d-block">Area Sektor : <?php echo $this->session->userdata('sektor')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('u_opname') ?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Opname
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('u_match_progress') ?>" class="nav-link">
              <i class="nav-icon fas fa-spinner"></i>
              <p>
                Match Progress
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('u_list_barang') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                  List Barang 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>