  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin') ?>" class="brand-link">
      <img src="<?php echo base_url("assets/images/Karisma.png") ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Stock Opname</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('list_barang') ?>" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                List Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('opname') ?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Opname
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('match_progress') ?>" class="nav-link">
              <i class="nav-icon fas fa-spinner"></i>
              <p>
                Match Progress
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('opname') ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan Akhir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('user') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('log_out') ?>" class="nav-link">
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