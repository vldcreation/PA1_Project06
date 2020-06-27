

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
<!-- Start Contact us Section -->
<section class="bg-contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="contact-title">HUBUNGI KAMI</h3>

                        <?php 

                        // Notifikasi sukses 
                        if($this->session->flashdata('sukses')) { 
                            echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        } 
                        // Notifikasi error
                        echo validation_errors('<p class="alert alert-warning">','</p>');

                        // Form open 
                        echo form_open(base_url('kontak/send'));
                        ?>
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <input autofocus type="text" class="form-control" id="nameId" name="name" placeholder="Nama Lengkap">
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="emailId" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <!-- .col-md-6 -->
                            </div>
                            <!-- .row -->
                            <div class="form-group">
                                <input type="text" class="form-control" id="subjectId" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                            <textarea title="Motivasi anda" class="form-control text-area" id="messageId" name="body" rows="3" placeholder="Isi Pesan..."></textarea>
                            </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Send Email</button>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-md-4">
                        <h3 class="contact-title">KONTAK KAMI</h3>
                        <ul class="contact-address">
                            <li>
                                <i class="flaticon-placeholder"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->alamat; ?></p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-vibrating-phone"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->telepon; ?></p>
                                    <p><?php echo $site->hp; ?></p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-message"></i>
                                <div class="contact-content">
                                    <p><?php echo $site->email; ?></p>
                                    <p><?php echo $site->email_cadangan; ?></p>
                                </div>
                            </li>
                        </ul>
                        <!-- .contact-address -->
                        <ul class="social-icon-rounded contact-social-icon">
                            <li><a href="<?php echo $site->facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->instagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->google_plus; ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!-- .col-md-4 -->

                    <!-- DEVELOPER -->
                    <div class="recent-project photo-gallery">
                        <div class="section-header">
                            <h2><?php //echo $title ?> Developer </h2>
                        </div>
                        <div class="portfolio-items portfolio-items-home3">

                        <!-- project manager-->
                            <div class="item kegiatan" data-category="Kegiatan">
                                <div class="item-inner">
                                <h4>Vicktor Desrony</h4>
                                    <div class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img src="<?php echo base_url('assets/upload/image/Data Kontak/viktor.jpg') ?>" alt="recent-project-img-1" class="img img-fluid img-thumbnail">
                                        <div class="project-plus">
                                            <a href="<?php echo base_url('assets/upload/image/viktor.jpg') ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="recent-project-content">
                                            <p><a href="https://github.com/vldcreation">Project Manager & PIC Programmer<br></a></p>
                                        </div>
                                        <!-- .latest-port-content -->
                                    </div>
                                    <!-- /.portfolio-img -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                        <!--End Project Manager -->
                        
                        <!--PIC ANALYS-->
                            <div class="item kegiatan" data-category="Kegiatan">
                                <div class="item-inner">
                                <h4>Ester Hutabarat</h4>
                                    <div class="portfolio-img">
                                    <!-- Project Manager -->
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img src="<?php echo base_url('assets/upload/image/Data Kontak/ester.png') ?>" alt="recent-project-img-1" class="img img-fluid img-thumbnail">
                                        <div class="project-plus">
                                            <a href="<?php echo base_url('assets/upload/image/ester.png') ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="recent-project-content">
                                            <p><a href="#">PIC Analys</a></p>
                                        </div>
                                        <!-- .latest-port-content -->
                                    </div>
                                    <!-- /.portfolio-img -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                        <!--End PIC ANALYS -->

                        <!--PIC Programmer -->
                            <div class="item kegiatan" data-category="Kegiatan">
                                <div class="item-inner">
                                <h4>Vicktor Desrony</h4>
                                    <div class="portfolio-img">
                                    <!-- Project Manager -->
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img src="<?php echo base_url('assets/upload/image/Data Kontak/viktor.jpg') ?>" alt="recent-project-img-1" class="img img-fluid img-thumbnail">
                                        <div class="project-plus">
                                            <a href="<?php echo base_url('assets/upload/image/viktor.jpg') ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="recent-project-content">
                                            <p><a href="#">PIC Designer</a></p>
                                        </div>
                                        <!-- .latest-port-content -->
                                    <!--End Project Manager -->
                                    </div>
                                    <!-- /.portfolio-img -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->
                        <!--PIC Programmer -->

                        </div>
                        <!-- .isotope-items -->
                        <div class="load-more-option">
                            <?php if(isset($pagin)) { echo $pagin; }  ?>
                        </div>
                        <!-- .load-more-option -->
                    </div>
                    <!-- .recent-project -->
                    <!-- END DEVELOPER -->
                </div>
                <!-- .row -->
            </div>
            <!-- .contact-us -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- End Contact us Section -->


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

<!-- STart Maps Section -->
<style type="text/css" media="screen">
    iframe {
        width: 100%;
        height: auto;
        min-height: 400px;
    }
</style>
<div id="map"><iframe src="<?php echo $site->google_map; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
<!-- End Maps Section -->