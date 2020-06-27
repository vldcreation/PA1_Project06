<!DOCTYPE html>
<html>
<head>
<style>
  .warning{
    color : red;
    font-size : 14px;
    font-family : arial;
  }
</style>
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
        <!-- <div class="text-center">
        <label for="attention" class="warning">Disclaimer: Hanya bisa digunakan oleh civitas IT Del.</label>
        </div> -->

      <p class="login-box-msg">Isi Data Diri dengan lengkap</p>

      <?php 
      // Notifikasi error
      // if(isset($message_error)){
      //   echo '<p class="alert alert-warning">'.$message_error.'</p>';
      // }

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
          <input type="text" title="Nama Lengkap Anda" value="<?php if(isset($_POST['nama'])) echo $_POST['nama']; ?>" name="nama" class="form-control" placeholder="Nama Lengkap">
          <?=form_error('nama', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input title="Email Anda" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" type="text" name="email" class="form-control" placeholder="Email">
          <?=form_error('email', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input type="text" title="Nim anda" name="NIM" class="form-control" value="<?php if(isset($_POST['NIM'])) echo $_POST['NIM']; ?>" placeholder="NIM">
          <?=form_error('NIM', '<small class="text-danger">', '</small>');?>
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
          <?=form_error('prodi', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
        <textarea title="Motivasi anda" class="form-control text-area" name="Motivasi" rows="3" placeholder="Motivasi Anda..."></textarea>
          </textarea>
          <?=form_error('Motivasi', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input title="Username untuk akun" type="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" class="form-control" placeholder="Username">
          <?=form_error('username', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input title="Password untuk akun" type="password" name="password" class="form-control" placeholder="Password">
          <?=form_error('password', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input title="Confirm Password" type="password" name="confirm_pass" class="form-control" placeholder="Konfirmasi Password">
          <?=form_error('confirm_pass', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="form-group">
          <input title="Bantuan untuk ingat password" type="text" name="pasword_hint" class="form-control" placeholder="Password Hint anda">
        </div>
        <div class="row">
          <div class="col-12">
            <div>
                <input name="check" required="required" class="form-check-input checkbox" type="checkbox" id="defaultCheck1"
                           title="I Agree" onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
                           <label class=" form-check-label" for="defaultCheck1">
                           Saya Setuju.
                        </label>
                        <p class="terms" style="font-size:14px">Dengan daftar anda menyetujui <i>privasi dan persyaratan ketentuan
                            yang berlaku </i> .</p>
                            <?=form_error('check', '<small class="text-danger">', '</small>');?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
          <button type="submit" name="submit" id="btnsubmit"
                        class="btn btn-block btn-info btn-submit">Daftar
                        Sekarang!</button>
          </div>
          <div class="col-6">
            <a href="<?php echo base_url('loginmember');?>" class="btn btn-info btn-block">Login</a>
          </div>
          <!-- /.col -->
        </div>
      
      <?php echo form_close();  ?>

      
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
<!-- Check box harus di centang dulu -->
<script>
    $('.tab1_btn').prop('disabled', !$('.tab1_chk:checked')
        .length);
    $('input[type=checkbox]').click(function() {
        if ($('.tab1_chk:checkbox:checked').length > 0) {
            $('.btn-submit').prop('disabled', false);
        } else {
            $('.btn-submit').prop('disabled', true);
        }
    });
    </script>
</body>
</html>