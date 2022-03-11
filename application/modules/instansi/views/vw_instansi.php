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
              <h1 class="m-0">Master Instansi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Instansi</li>
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
              <div class="card-header">Data Instansi</div>
              <div class="card-body">
                <a href="<?php echo base_url(); ?>instansi/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama Instansi</th>
                      <th>Inisial Instansi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($instansi as $row) {
                    ?>
                      <tr>
                        <td width="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_instansi; ?></td>
                        <td><?php echo $row->inisial_instansi; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>instansi/edit/<?php echo $row->idmst_instansi; ?>" class="btn btn-warning">Edit</a>
                          <a data-delete-url="<?php echo base_url(); ?>instansi/delete/<?php echo $row->idmst_instansi; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
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