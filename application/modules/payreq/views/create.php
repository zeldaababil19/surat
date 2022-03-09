      <?php
      // $this->load->view('partials/main');
      // $this->load->view('partials/sidebar');
      ?>
      <!-- BS Stepper -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Create Payment Request</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Payment Request</li>
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
                <h3 class="card-title">Create Payment Request</h3>
              </div>
              <?php
              if (validation_errors() != false) {
              ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors(); ?>
                </div>
              <?php
              }
              ?>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here  -->
                    <div class="step btn" data-target="#logins-part" onclick="stepper.previous()">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Payment Request</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step btn" data-target="#information-part" onclick="stepper.next()">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-label">Data PR</span>
                        <span class="bs-stepper-circle">2</span>
                      </button>
                    </div>
                  </div>

                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="post" action="<?php echo base_url(); ?>payreq/save" enctype='multipart/form-data'>
                      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <!-- ini page 1 -->
                        <div class="form-group">
                          <label for="suratkeluar">Nomor Surat</label>
                          <select name="suratkeluar" id="suratkeluar" class="form-control">
                            <option selected disabled>---Pilih Nomor Surat Keluar---</option>
                            <?php
                            foreach ($suratkeluar as $row) { ?>
                              <option name="suratkeluar" value="<?php echo $row->idnmr_surat; ?>"><?php echo $row->no_urut_projek ?>/<?php echo $row->nomor_surat; ?>/<?php echo $row->inisial_pt; ?>/<?php echo $row->kode_surat ?>/<?php echo $row->inisial_instansi ?>/<?php echo $row->bulan_romawi ?>/<?php echo $row->tahun ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="pr_date">PR Date</label>
                          <input type="text" name="pr_date" id="pr_date" class="form-control" required value="<?php $tgl = date('Y-m-d H:i:s');
                                                                                                              echo $tgl ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="req_name">Requestor Name</label>
                          <input type="text" name="req_name" id="req_name" class="form-control" required value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="pr_type">PR Type</label>
                          <select name="pr_type" id="pr_type" class="form-control">
                            <option selected disabled>---Pilih PR Type---</option>
                            <?php foreach ($prtype as $row) { ?>
                              <option value="<?php echo $row->idmst_pr; ?> "><?php echo $row->nama_pr; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="rec_name">Receiver Name</label>
                          <input type="text" name="rec_name" id="rec_name" class="form-control" placeholder="Enter Receiver Name" required>
                        </div>
                        <div class="form-group">
                          <label for="pay_date">Payment Due Date</label>
                          <input type="date" name="pay_date" id="pay_date" class="form-control" placeholder="Enter Payment Due Date" required>
                        </div>
                        <div class="form-group">
                          <label for="pay_method">Payment Method</label>
                          <select name="pay_method" id="pay_method" class="form-control">
                            <option selected disabled>---Pilih Payment Method---</option>
                            <?php
                            foreach ($payment as $row) {
                            ?>
                              <option value="<?php echo $row->idmst_payment; ?>"><?php echo $row->nama_payment; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="bank">Bank Account</label>
                          <input type="text" name="bank" id="bank" class="form-control" placeholder="Enter Bank Account">
                        </div>
                        <!-- sampai sini -->
                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>


                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <!-- ini page 2 -->
                        <div class="container">
                          <div class="form-group">
                            <!-- <form name="add_name" id="add_name"> -->
                            <div class="table-responsive">
                              <table class="table table-bordered dynamic_field" id="dynamic_field">
                                <tr>
                                  <td>

                                    <div class="form-group">
                                      <label for="invoice_number">Invoice Number</label>
                                      <input type="text" name="invoice_number[]" id="invoice_number" class="form-control" placeholder="Enter Invoice Number">
                                    </div>
                                    <div class="form-group">
                                      <label for="po">PO Number</label>
                                      <input type="text" name="po[]" id="po" class="form-control" placeholder="Enter PO Number">
                                    </div>
                                    <div class="form-group">
                                      <label for="deskripsi">Deskripsi</label>
                                      <textarea name="deskripsi[]" id="deskripsi" cols="30" rows="" class="form-control" placeholder="Enter Deskripsi" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="quantity">Quantity</label>
                                      <input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Enter Quantity" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="amount">Amount</label>
                                      <input type="number" name="amount[]" id="amount" class="form-control" placeholder="Enter Quantity" required>
                                    </div>

                                  </td>
                                  <td width="5%"><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button></td>
                                </tr>
                              </table>
                            </div>
                            <!-- </form> -->
                          </div>
                        </div>
                        <button class="btn btn-secondary" type="button" onclick="stepper.previous()">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- sampai sini -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Create Payment Request
              </div>
            </div>

          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- BS-Stepper -->
      <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>

      <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
      </script>

      <script>
        $(document).ready(function() {
          var i = 1;
          $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><div class="form-group"><label for="invoice_number">Invoice Number</label><input type="text" name="invoice_number[]" id="invoice_number" class="form-control" placeholder="Enter Invoice Number"></div><div class="form-group"><label for="po">PO Number</label><input type="text" name="po[]" id="po" class="form-control" placeholder="Enter PO Number"></div><div class="form-group"><label for="deskripsi">Deskripsi</label><textarea name="deskripsi[]" id="deskripsi" cols="30" rows="" class="form-control" placeholder="Enter Deskripsi" required></textarea></div><div class="form-group"><label for="quantity">Quantity</label><input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Enter Quantity" required></div><div class="form-group"><label for="amount">Amount</label><input type="number" name="amount[]" id="amount" class="form-control" placeholder="Enter Quantity" required></div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fas fa-minus"></i></button></td></tr>');
          });
          $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
          });
          $('#submit').click(function() {
            $.ajax({
              url: "name.php",
              method: "POST",
              data: $('#add_name').serialize(),
              success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
              }
            });
          });
        });
      </script>

      <?php
      // $this->load->view('partials/footer');
      // $this->load->view('partials/end');
      ?>