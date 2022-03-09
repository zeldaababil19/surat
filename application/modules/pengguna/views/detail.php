<?php
// $this->load->view('partials/main');
// $this->load->view('partials/sidebar');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
            <li class="breadcrumb-item active">detail</li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- isinya disini -->

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail Data Pengguna</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
        if (validation_errors() != false) {
        ?>
          <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
          </div>
        <?php
        }
        ?>
        <form method="" action="">
          <div class="card-body">
            <input type="hidden" name="id" id="id" value="<?php echo $pengguna->id ?>">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?php echo $pengguna->username ?>" id="username" name="username" placeholder="Enter Username" required disabled>
            </div>
            <div class="form-group">
              <label for="nama_pengguna">Nama Pengguna</label>
              <input type="text" class="form-control" value="<?php echo $pengguna->nama_pengguna ?>" id="nama_pengguna" name="nama_pengguna" placeholder="Enter Nama Pengguna" required disabled>
            </div>
            <div class="form-group">
              <label for="password">Role</label>
              <select name="role" id="role" class="form-control" disabled>
                <option value="administrator" <?php if ($pengguna->role == 'administrator') : echo 'selected';
                                              endif ?>>Administrator</option>
                <option value="pengguna" <?php if ($pengguna->role == 'pengguna') : echo 'selected';
                                          endif ?>>Pengguna</option>
              </select>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="button" class="btn btn-success" onclick="history.back(-1)" value="Kembali">Kembali</button>
          </div>
        </form>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
// $this->load->view('partials/footer');
// $this->load->view('partials/end');
?>