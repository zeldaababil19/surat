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
                <h1 class="m-0">Create Data Payment Request</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Payment Request</li>
                  <li class="breadcrumb-item active">Data PR</li>
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
                <h3 class="card-title">Create Data Payment Request</h3>
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
              <form method="post" action="<?php echo base_url(); ?>datapr/save" enctype='multipart/form-data'>
                <div class="table-responsive">
                  <table class="table table-bordered dynamic_field" id="dynamic_field">
                    <tr>
                      <td>
                        <input type="" name="id" id="id" value="<?php echo $suratkeluar->idnmr_surat ?>">
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