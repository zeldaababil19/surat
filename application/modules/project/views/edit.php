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
                <h1 class="m-0">Project</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Project</li>
                  <li class="breadcrumb-item active">Update</li>

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
                <h3 class="card-title">Detail Data Project</h3>
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
              <form method="post" action="<?php echo base_url(); ?>project/update">
                <div class="card-body">
                  <input type="hidden" name="id_project" id="id_project" value="<?php echo $project->id_project; ?>">
                  <div class="form-group">
                    <label for="id_projek_pt">ID Project</label>
                    <input type="text" value="<?php echo $project->id_projek_pt ?>" class="form-control" id="id_projek_pt" name="id_projek_pt" placeholder="Enter Id Project" required disabled>
                  </div>
                  <div class="form-group">
                    <label for="no_urut_projek">No Urut Project</label>
                    <input type="number" name="no_urut_projek" value="<?php echo $project->no_urut_projek ?>" id="no_urut_projek" class="form-control" placeholder="Enter No Urut Project" required>
                  </div>
                  <div class="form-group">
                    <label for="pt">Perusahaan</label>
                    <input type="text" value="<?php echo $project->inisial_pt ?>" class="form-control" placeholder="Enter Perusahaan" required disabled>
                    <select name="pt" id="pt" class="form-control">
                      <option selected disabled>---Pilih Perusahaan---</option>
                      <?php foreach ($pt as $row) { ?>
                        <option value=" <?php echo $row->idmst_pt; ?> "><?php echo $row->nama_pt; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="instansi">Instansi</label>
                    <input type="text" value="<?php echo $project->inisial_instansi ?>" class="form-control" placeholder="Enter Instansi" required disabled>
                    <select name="instansi" id="instansi" class="form-control">
                      <option selected disabled>---Pilih Instansi---</option>
                      <?php foreach ($instansi as $row) { ?>
                        <option value=" <?php echo $row->idmst_instansi; ?> "><?php echo $row->nama_instansi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label for="pt">Perusahaan</label>
                    <input type="text" value="<?php echo $project->inisial_pt ?>" class="form-control" id="pt" name="pt" placeholder="Enter Perusahaan" required>
                  </div>
                  <div class="form-group">
                    <label for="instansi">Instansi</label>
                    <input type="text" value="<?php echo $project->inisial_instansi ?>" class="form-control" id="instansi" name="instansi" placeholder="Enter Instansi" required>
                  </div> -->
                  <div class="form-group">
                    <label for="nama_project">Nama Project</label>
                    <input type="text" value="<?php echo $project->nama_projek ?>" class="form-control" id="nama_project" name="nama_project" placeholder="Enter Nama Project" required>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" value="<?php echo $project->tahun_projek ?>" class="form-control" id="tahun" name="tahun" placeholder="Enter Tahun" required>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" value="<?php echo $project->keterangan ?? '' ?>" class="form-control" id="keterangan" name="keterangan" placeholder="Enter Keterangan">
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