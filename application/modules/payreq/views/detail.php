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
                <h1 class="m-0">Payment Request</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Payment Request</li>
                  <li class="breadcrumb-item active">Detail</li>

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
                <h3 class="card-title">Detail Data Payment Request</h3>
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
              
            </div>

          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


      <?php
      // $this->load->view('partials/footer');
      // $this->load->view('partials/end');
      ?>