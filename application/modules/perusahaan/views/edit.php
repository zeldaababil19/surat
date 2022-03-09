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
                <h1 class="m-0">Perusahaan</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Perusahaan</li>
                  <li class="breadcrumb-item active">create</li>

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
                <h3 class="card-title">Tambah Data Perusahaan</h3>
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
              <form method="post" action="<?php echo base_url(); ?>perusahaan/update">
                <div class="card-body">
                  <input type="hidden" name="idmst_pt" id="idmst_pt" value="<?php echo $pt->idmst_pt ?>">
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" value="<?php echo $pt->nama_pt ?>" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Enter Perusahaan" required>
                  </div>
                  <div class="form-group">
                    <label for="inisial_perusahaan">Inisial Perusahaan</label>
                    <input type="text" value="<?php echo $pt->inisial_pt ?>" class="form-control" id="inisial_perusahaan" name="inisial_perusahaan" placeholder="Enter Inisial Perusahaan" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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