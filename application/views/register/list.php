<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style type="text/css" media="screen">
    .login-box {
      min-width: 40% !important;
    }
  </style>
</head>
<body class="hold-transition login-page" >
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a href="<?php echo base_url() ?>"><img src="<?php echo $this->website->icon(); ?>" alt="<?php echo $this->website->namaweb(); ?>" class="img img-responsive img-thumbnail" style="max-width: 30%; height: auto;"></a>
        <br>
        <h2 style="font-weight: bold; font-size: 18px; margin-top: 20px;"><?php echo $this->website->namaweb() ?></h2>
      </div>

      <p class="login-box-msg">Isi Data Diri dengan lengkap</p>

      <?php 
      // Notifikasi error
      echo validation_errors('<p class="alert alert-warning">','</p>');

      // Form open 
      echo form_open(base_url('registrasi/member'));
       ?>

      <div class="row">
        <div class="form-control col-md-6">
          <label>Tanggal Daftar</label>
          <input title="Di set secara otomatis" readonly disabled="disabled" type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
        </div>
        <div class="form-control col-md-6">
        <label>Jam Daftar</label>
        <input title="Di set secara otomatis" readonly disabled="disabled" type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s'); } ?>">
        </div>
      </div> <br>
        <div class="form-group">
          <input type="text" title="Nama Lengkap Anda" name="nama" class="form-control" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
          <input title="Email Anda" type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="text" title="Nim anda" name="NIM" class="form-control" placeholder="NIM">
        </div>
        <div class="form-group">
          <select title="Prodi Anda" selected name="Prodi" class="form-control" required>
            <option value="NULL" selected>--Select Prodi--</option>
            <option value="S1 Informatika">S1 Informatika</option>
            <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
            <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
            <option value="S1 Bioteknologi">S1 Bioteknologi</option>
            <option value="S1 Manajemen Rekayasa">S1 Manajemen Rekayasa</option>
            <option value="D3 Teknologi Informasi">D3 Teknologi Informasi</option>
            <option value="D4 Teknologi Rekayasa Perangkat Lunak">D4 Teknologi Rekayasa Perangkat Lunak</option>
            <option value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
          </select>
        </div>
        <div class="form-group">
        <textarea title="Motivasi anda" class="form-control text-area" name="Motivasi" rows="3" placeholder="Motivasi Anda..."></textarea>
          </textarea>
        </div>
        <div class="form-group">
          <input title="Username untuk akun" type="username" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
          <input title="Password untuk akun" type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
          <input title="Confirm Password" type="password" name="confirm_pass" class="form-control" placeholder="Konfirmasi Password">
        </div>
        <div class="form-group">
          <input title="Bantuan untuk ingat password" type="text" name="pasword_hint" class="form-control" placeholder="Password Hint anda">
        </div>
        <div class="row">
          <div class="col-12">
            <div class="checkbox icheck">
              <label>
                <input title="Set session" type="checkbox"> Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Registrasi</button>
          </div>
          <div class="col-6">
            <a href="<?php echo base_url('loginmember');?>" class="btn btn-info btn-block btn-lg">Login</a>
          </div>
          <!-- /.col -->
        </div>
      
      <?php echo form_close(); ?>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- SWEETALERT -->
<?php if($this->session->flashdata('sukses')) { ?>
<script>
  swal("Berhasil", "<?php echo $this->session->flashdata('sukses'); ?>","success")
</script>
<?php } ?>

<?php if($this->session->flashdata('warning')) { ?>
<script>
  swal("Oops...", "<?php echo $this->session->flashdata('warning'); ?>","warning")
</script>
<?php } ?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>