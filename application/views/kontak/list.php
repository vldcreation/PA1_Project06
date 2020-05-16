<!-- Start Contact us Section -->
<section class="bg-contact-us">
    <div class="container">
        <div class="row">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="contact-title">HUBUNGI KAMI</h3>
                        <form action="#" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nameId" name="name" placeholder="Full Name">
                                    </div>
                                    <!-- .form-group -->
                                </div>
                                <!-- .col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="emailId" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <!-- .col-md-6 -->
                            </div>
                            <!-- .row -->
                            <div class="form-group">
                                <input type="text" class="form-control" id="subjectId" name="subject" placeholder="Subject">
                            </div>
                            <textarea class="form-control text-area" rows="3" placeholder="Message"></textarea>
                            <button type="submit" class="btn btn-default">Send Email</button>
                        </form>
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
                                    <div class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img src="<?php echo base_url('assets/upload/image/Data Kontak/viktor.jpg') ?>" alt="recent-project-img-1" class="img img-fluid img-thumbnail">
                                        <div class="project-plus">
                                            <a href="<?php echo base_url('assets/upload/image/viktor.jpg') ?>" data-rel="lightcase:myCollection"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="recent-project-content">
                                            <p><a href="https://github.com/vldcreation">Project Manager & PIC Programmer</a></p>
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


<!-- STart Maps Section -->
<style type="text/css" media="screen">
    iframe {
        width: 100%;
        height: auto;
        min-height: 400px;
    }
</style>
<div id="map"><?php echo $site->google_map; ?></div>
<!-- End Maps Section -->