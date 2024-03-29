    <?php
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Nomor Surat Keluar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Surat Keluar</li>
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
              <div class="card-header">Data Surat Keluar</div>
              <div class="card-body">
                <a href="<?php echo base_url(); ?>suratkeluar/create" class="btn btn-success">Create</a>
                <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Jenis Surat</th>
                      <th>Nomor Surat</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($suratkeluar as $row) {
                    ?>
                      <tr>
                        <td width="5%"><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_kodesurat ?></td>
                        <td><?php echo $row->no_urut_projek ?>/<?php echo $row->nomor_surat; ?>/<?php echo $row->inisial_pt; ?>/<?php echo $row->kode_surat ?>/<?php echo $row->inisial_instansi ?>/<?php echo $row->bulan_romawi ?>/<?php echo $row->tahun ?></td>
                        <td><?php echo $row->createAt; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>suratkeluar/detail/<?php echo $row->idnmr_surat; ?>" class="btn btn-info">Detail</a>
                          <a data-delete-url="<?php echo base_url(); ?>suratkeluar/delete/<?php echo $row->idnmr_surat; ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
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