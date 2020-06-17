<!--
@Project: Learnify
@Author/Programmer: Syauqi Zaidan Khairan Khalaf
@URL: syauqi.js.org
Author E-mail: Zaidanline67@Gmail.com

@About-Learnify :
Web Edukasi Open Source yang
dibuat oleh Syauqi Zaidan Khairan Khalaf.
Learnify adalah Web edukasi yang dilengkapi video, materi, dan soal ( Coming soon )
yang didesign semenarik dan sesimple mungkin. Learnify dibuat ditujukan agar para siswa
dan guru dapat terus belajar dan mengajar dimana saja dan kapan saja.
-->

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="<?=base_url('assets/upload/image/'.$site->icon)?>" type="image/png" >
    <title><?= $site->namaweb?> - Admin Login</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?=base_url('assets/')?>stisla-assets/node_modules/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>stisla-assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>stisla-assets/css/components.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <!-- Main Content -->
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <a href="<?=base_url('')?>"> <img src="<?=base_url('assets/')?>/upload/image/logo.png" site alt="logo"
                                width="150" class=" mb-5 mt-2"></a>
                        <h4 class="text-dark font-weight-normal">Selamat datang di <span
                                class="font-weight-bold"><?= $site->namaweb?></span>
                        </h4>
                        <p class="text-muted">Silahkan masukan Username dan Password yang valid untuk masuk ke halaman dasbor Admin Del Cloud Club.</p>
                            <?php 
                      // Notifikasi error
                      echo validation_errors('<p class="alert alert-warning">','</p>');

                      // Form open 
                      echo form_open(base_url('loginadmin'));
                      ?>
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control" name="username" tabindex="1"
                                    required autofocus>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="4"
                                    required>
                            </div>
                            <br>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-block btn-success btn-lg btn-icon icon-right"
                                    tabindex="4">
                                    Masuk
                                </button>
                            </div>
                            <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="<?=base_url('assets/')?>images/login-bg2.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold text-white">Selamat datang!</h1>
                                <h5 class="font-weight-normal text-muted-transparent text-white">Silahkan login untuk
                                    masuk ke
                                    halaman admin.</h5>
                            </div>
                            Copyright by &copy; <a class="text-light bb"
                                target="_blank" href="<?php echo $site->website ?>">DelCloudClub</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Main Content -->

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
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>

    <?php if ($this->session->flashdata('success-reg')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Kamu berhasil daftar!',
        text: 'Silahkan Cek Email Kamu, Buat Verifikasi!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('login-success')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Kamu berhasil daftar!',
        text: 'Sekarang login yuk!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('success-verify')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Email Telah Diverifikasi!',
        text: 'Sekarang login yuk!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('success-logout')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Kamu berhasil logout!',
        text: 'Selamat tinggal, Sampai jumpa lagi!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('fail-login')): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal login!',
        text: 'Silahkan Periksa Kembali Email dan Password Kamu!',
        showConfirmButton: false,
        timer: 2500
    });
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('fail-email')): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Email Belum Diverifikasi!',
        text: 'Silahkan Cek Email Kamu Dahulu!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('fail-pass')): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Password Salah!',
        text: 'Silahkan Periksa Kembali Password Kamu!',
        showConfirmButton: false,
        timer: 2500
    });
    </script>
    <?php endif;?>

    <?php if ($this->session->flashdata('not-login')): ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Harap Login Terlebih Dahulu !',
        text: 'Silahkan Login Dahulu !',
        showConfirmButton: false,
        timer: 2500
    });
    </script>
    <?php endif;?>
    <!-- end sweetalert -->


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?=base_url('assets/')?>stisla-assets/js/stisla.js"></script>
    <!-- Template JS File -->
    <script src="<?=base_url('assets/')?>stisla-assets/js/scripts.js"></script>
    <script src="<?=base_url('assets/')?>stisla-assets/js/custom.js"></script>
    <!-- Page Specific JS File -->
</body>

</html>