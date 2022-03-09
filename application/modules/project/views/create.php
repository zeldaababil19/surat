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
                <h3 class="card-title">Tambah Data Project</h3>
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
              <form method="post" action="<?php echo base_url(); ?>project/save">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_project">Nama Project</label>
                    <input type="text" class="form-control" id="nama_project" name="nama_project" placeholder="Enter Project" required>
                  </div>
                  <div class="form-group">
                    <label for="no_urut_projek">No Urut Project</label>
                    <input type="number" name="no_urut_projek" id="no_urut_projek" class="form-control" placeholder="Enter No Urut Project" required>
                  </div>
                  <div class="form-group">
                    <label for="pt">Perusahaan</label>
                    <select name="pt" id="pt" class="form-control">
                      <option selected disabled>---Pilih Perusahaan---</option>
                      <?php foreach ($pt as $row) { ?>
                        <option value=" <?php echo $row->idmst_pt; ?> "><?php echo $row->nama_pt; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="instansi">Instansi</label>
                    <select name="instansi" id="instansi" class="form-control">
                      <option selected disabled>---Pilih Instansi---</option>
                      <?php foreach ($instansi as $row) { ?>
                        <option value=" <?php echo $row->idmst_instansi; ?> "><?php echo $row->nama_instansi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Enter Tahun Format YY" required oninput="cek(this.value)">
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" placeholder="Enter Keterangan"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <script type="text/javascript">
        function cek(a) {
          if (a.length > 2) {
            var apa = $("#tahun").val().substring(0, 2);
            $("#tahun").val(apa);
          }
          console.log(a.length);
        }
      </script>

      <?php if ($this->session->flashdata('message')) : ?>
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
          })
        </script>
      <?php endif ?>
      <?php
      // $this->load->view('partials/footer');
      // $this->load->view('partials/end');
      ?>