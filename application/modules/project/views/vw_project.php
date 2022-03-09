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
              <h1 class="m-0">Master Project</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project</li>
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
              <div class="card-header">Data Project</div>
              <div class="card-body">
                <a href="<?php echo base_url(); ?>project/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Id Project</th>
                      <th>Nama Project</th>
                      <th>Instansi</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($project as $row) {
                    ?>
                      <tr>
                        <td width="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->tahun; ?>/<?php echo $row->inisial_pt; ?>/<?php echo $row->no_urut_projek ?></td>
                        <td><?php echo $row->nama_projek; ?></td>
                        <td><?php echo $row->inisial_instansi; ?></td>
                        <td><?php echo $row->keterangan; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>project/detail/<?php echo $row->id_project; ?>" class="btn btn-info">Detail</a>
                          <a href="<?php echo base_url(); ?>project/edit/<?php echo $row->id_project; ?>" class="btn btn-warning">Edit</a>
                          <a data-delete-url="<?php echo base_url(); ?>project/delete/<?php echo $row->id_project; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
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