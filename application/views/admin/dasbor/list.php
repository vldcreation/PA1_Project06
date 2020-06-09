<!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-newspaper-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Berita</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->berita()->total; ?>
          <small>Post</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">File Unduhan</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->download()->total; ?>
        <small>File</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-image"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Galeri</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->galeri()->total; ?>
        <small>File</small>
        </span>
        
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->


  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-lock"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pengguna</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->user()->total; ?>
          <small>User</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-lock"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Member</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->member()->total; ?>
          <small>User</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Agenda</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->agenda()->total; ?>
        <small>List</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-film"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Video</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->video()->total; ?>
        <small>Content</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
 
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-quote-left" aria-hidden="true"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kutipan </span>
        <span class="info-box-number"><?php echo $this->dasbor_model->quotes()->total; ?>
        <small>Kutipan </small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

