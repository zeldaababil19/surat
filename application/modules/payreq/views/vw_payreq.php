    <?php

    use SebastianBergmann\Environment\Console;

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Payment Request</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Payment Request</li>
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
              <div class="card-header">
                <h3 class="card-title">Data Payment Request</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="<?php echo base_url(); ?>payreq/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Nomor Surat</th>
                      <th>Requestor Name</th>
                      <th>PR Type</th>
                      <th>Receiver Name</th>
                      <th>Due Date</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($payreq as $row) {
                    ?>
                      <tr style="background-color: <?php echo $row->color ?>;">
                        <td width="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->no_urut_projek; ?>/<?php echo $row->nomor_surat; ?>/<?php echo $row->inisial_pt; ?>/<?php echo $row->kode_surat ?>/<?php echo $row->inisial_instansi ?>/<?php echo $row->bulan_romawi ?>/<?php echo $row->tahun ?></td>
                        <td><?php echo $row->requestor_name; ?></td>
                        <td><?php echo $row->nama_pr ?></td>
                        <td><?php echo $row->receiver_name ?></td>
                        <td><?php echo $row->due_date ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>payreq/create/<?php echo $row->idpayreq; ?>" class="btn btn-success">Tambah Data PR</a>
                          <a href="<?php echo base_url(); ?>payreq/export/<?php echo $row->idpayreq; ?>" class="btn btn-primary">Cetak</a>
                          <a href="<?php echo base_url(); ?>payreq/detail/<?php echo $row->idpayreq; ?>" class="btn btn-info">Detail</a>
                          <a href="<?php echo base_url(); ?>payreq/edit/<?php echo $row->idpayreq; ?>" class="btn btn-warning">Edit</a>
                          <a data-delete-url="<?php echo base_url(); ?>payreq/delete/<?php echo $row->idpayreq; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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