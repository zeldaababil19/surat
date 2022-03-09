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
              <h1 class="m-0">Master Perusahaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Perusahaan</li>
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
          <main class="container" role="main">
            <div class="card">
              <div class="card-header">Data Perusahaan</div>
              <div class="card-body">
                <a href="<?php echo base_url(); ?>perusahaan/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama Perusahaan</th>
                      <th>Inisial Perusahaan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pt as $row) {
                    ?>
                      <tr>
                        <td widtd="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_pt; ?></td>
                        <td><?php echo $row->inisial_pt; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>perusahaan/edit/<?php echo $row->idmst_pt; ?>" class="btn btn-warning">Edit</a>
                          <a data-delete-url="<?php echo base_url(); ?>perusahaan/delete/<?php echo $row->idmst_pt; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </main>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    // $this->load->view('partials/footer');
    ?>

    <?php
    // $this->load->view('partials/end');
    ?>