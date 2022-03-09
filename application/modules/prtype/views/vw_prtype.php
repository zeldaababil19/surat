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
              <h1 class="m-0">Master PR Type</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">PR Type</li>
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
              <div class="card-header">Data PR Type</div>
              <div class="card-body">
                <a href="<?php echo base_url(); ?>prtype/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nama PR Type</th>
                      <th>Color</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($prtype as $row) {
                    ?>
                      <tr>
                        <td width="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_pr; ?></td>
                        <td><?php echo $row->color; ?>
                          <div style="border: 0; padding: 10px; background-color: <?php echo $row->color; ?>; text-align: left;"></div>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>prtype/edit/<?php echo $row->idmst_pr; ?>" class="btn btn-warning">Edit</a>
                          <a data-delete-url="<?php echo base_url(); ?>prtype/delete/<?php echo $row->idmst_pr; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
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