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
                <h1 class="m-0">Create Surat Keluar</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Surat Keluar</li>
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
                <h3 class="card-title">Tambah Nomor Surat Keluar</h3>
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
              <form method="post" action="<?php echo base_url(); ?>suratkeluar/save">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_project">ID Project</label>
                    <select name="id_project" id="id_project" class="form-control" onchange="autofill();">
                      <option selected disabled>---Pilih ID Project---</option>
                      <?php
                      foreach ($project as $row) { ?>
                        <option name="id_project" value="<?php echo $row->id_project; ?>"><?php echo $row->tahun; ?>/<?php echo $row->inisial_pt ?>/<?php echo $row->no_urut_projek ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_instansi">Instansi</label>
                    <input type="text" name="id_instansi" id="id_instansi" class="form-control" readonly required>
                  </div>
                  <div class="form-group">
                    <label for="id_pt">Perusahaan</label>
                    <input type="text" name="id_pt" id="id_pt" class="form-control" readonly required>
                  </div>

                  <div class="form-group">
                    <label for="no_surat">No Surat</label>
                    <input type="number" name="no_surat" id="no_surat" class="form-control" placeholder="Enter No Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="jenis_surat">Jenis Surat</label>
                    <select name="jenis_surat" id="jenis_surat" class="form-control">
                      <option selected disabled>---Pilih Perusahaan---</option>
                      <?php foreach ($jenissurat as $row) { ?>
                        <option value=" <?php echo $row->idmst_kodesurat; ?> "><?php echo $row->nama_kodesurat; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control">
                      <option selected disabled>---Pilih Bulan---</option>
                      <?php
                      foreach ($bulan as $row) {
                      ?>
                        <option value="<?php echo $row->idmst_bulan; ?>"><?php echo $row->bulan_romawi; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Enter Tahun Format YY" required oninput="cek(this.value)">
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
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript">
        function autofill() {
          var id = $('#id_project').val();
          $.ajax({
            method: "POST",
            url: '<?php echo base_url("suratkeluar/cariproject"); ?>',
            dataType: 'JSON',
            data: {
              id: id
            },
            async: false,
            success: function(data) {
              console.log(id)
              $.each(data, function(id, id_instansi, id_pt) {
                $('[name = "id_instansi"]').val(data.inisial_instansi);
                $('[name = "id_pt"]').val(data.inisial_pt);
              })
            }
          });
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