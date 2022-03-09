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
                <h1 class="m-0">Kode Surat</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Kode Surat</li>
                  <li class="breadcrumb-item active">update</li>

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
                <h3 class="card-title">Detail Data Kode Surat</h3>
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
              <form method="post" action="<?php echo base_url(); ?>kodesurat/update">
                <div class="card-body">
                  <input type="hidden" name="idmst_kodesurat" id="idmst_kodesurat" value="<?php echo $kodesurat->idmst_kodesurat; ?>">
                  <div class="form-group">
                    <label for="nama_kodesurat">Nama Kode Surat</label>
                    <input type="text" value="<?php echo $kodesurat->nama ?>" class="form-control" id="nama_kodesurat" name="nama_kodesurat" placeholder="Enter Kode Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="kode_surat">Kode Surat</label>
                    <input type="text" value="<?php echo $kodesurat->kode_surat ?>" class="form-control" id="kode_surat" name="kode_surat" placeholder="Enter Kode Surat" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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