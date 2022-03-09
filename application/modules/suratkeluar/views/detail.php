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
                <h1 class="m-0">Surat Keluar</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Surat Keluar</li>
                  <li class="breadcrumb-item active">Detail</li>

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
                <h3 class="card-title">Detail Data Surat Keluar</h3>
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
                  <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->no_urut_projek ?>/<?php echo $suratkeluar->nomor_surat; ?>/<?php echo $suratkeluar->inisial_pt; ?>/<?php echo $suratkeluar->kode_surat ?>/<?php echo $suratkeluar->inisial_instansi ?>/<?php echo $suratkeluar->bulan_romawi ?>/<?php echo $suratkeluar->tahun ?>" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Enter nomor Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="id_projek">ID Project</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->no_urut_projek ?>" class="form-control" id="id_projek" name="id_projek" placeholder="Enter Id Project" required>
                  </div>
                  <div class="form-group">
                    <label for="no_urut_surat">No Urut Surat Keluar</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->nomor_surat ?>" class="form-control" id="no_urut_surat" name="no_urut_surat" placeholder="Enter No Urut Surat Keluar" required>
                  </div>
                  <div class="form-group">
                    <label for="pt">Perusahaan</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->inisial_pt ?>" class="form-control" id="pt" name="pt" placeholder="Enter Perusahaan" required>
                  </div>
                  <div class="form-group">
                    <label for="jenis_surat">Jenis Surat Keluar</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->nama_kodesurat ?>" class="form-control" id="jenis_surat" name="jenis_surat" placeholder="Enter Jenis Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="instansi">Instansi</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->inisial_instansi ?>" class="form-control" id="instansi" name="instansi" placeholder="Enter Instansi" required>
                  </div>
                  <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->bulan_romawi ?>" class="form-control" id="bulan" name="bulan" placeholder="Enter Bulan" required>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" disabled value="<?php echo $suratkeluar->tahun ?>" class="form-control" id="tahun" name="tahun" placeholder="Enter Tahun" required>
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