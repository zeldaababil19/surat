<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url(); ?>/assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Surat</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($this->session->userdata('role') == 'administrator') {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>perusahaan" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Master Perusahaan
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>instansi" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                    Master Instansi
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>kodesurat" class="nav-link">
                  <i class="nav-icon fas fa-envelope-open"></i>
                  <p>
                    Master Kode Surat
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>prtype" class="nav-link">
                  <i class="nav-icon fas fa-wallet"></i>
                  <p>
                    Master PR Type
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>payment" class="nav-link">
                  <i class="nav-icon fas fa-credit-card"></i>
                  <p>
                    Master Payment
                  </p>
                </a>
              </li>

            </ul>
          </li>
          <!-- <ul> -->

          <!-- </ul> -->
        <?php
        } ?>
        <hr>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>project" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Master Project
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="<?php echo base_url('suratkeluar'); ?>" class="nav-link">
            <i class="nav-icon fas fa-envelope-open-text"></i>
            <p>
              Nomor Surat Keluar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('payreq'); ?>" class="nav-link">
            <i class="nav-icon fas fa-wallet"></i>
            <p>
              Create Payment Request
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Master Pengguna
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>pengguna" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  List Pengguna
                </p>
              </a>
            </li>
          </ul>
        </li>
        <hr>
        <hr>
        <li class="nav-item">
          <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>