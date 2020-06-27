<?php

$nav_layanan = $this->nav_model->nav_layanan();
?>
</style>
<?php include "header.php" ?>

<section class="bg-single-events">
  <div class="container">
    <div class="row">
      <div class="single-events">
        <div class="row">
          <div class="col-md-8">
            <div class="single-event-item">
              <?php if($berita->gambar != "" || $berita->gambar != NULL) { ?>
                <div class="single-event-img">
                  <img style="width: 100%;height: 450px;" src="<?php echo base_url('assets/upload/image/' . $berita->gambar); ?>" alt="single-event-img-1" class="img-responsive" />
                </div>
              <?php } ?>
              <!-- .single-event-img -->
              <div class="single-event-content">
                <h3><?php echo $berita->judul_berita; ?></h3><hr>
                <?php echo $berita->isi; ?>
              </div>
              <!-- .single-event-content -->
            </div>
            <!-- .single-event-item -->

            <!-- Bagan Organisasi -->
          <!-- End Bagan -->

                <!-- Quotes -->
            <div class="tittle margin-20"><span>Quotes For You </span></div>
            <div class="single-event-content margin-20" style="text-align:center">
            <?php foreach($quotes as $quotes) : ?>
                <div class="giant-quotes-quote">
                  <blockquote>
                  <span><?= $quotes->title_quotes; ?></span>
                    <p><?= $quotes->body_quotes ?></p>
                    <p class="footer-quotes"><?= $quotes->footer_quotes ?></p>
                    <cite><?= $quotes->author_quotes ?></cite>
                  </blockquote>
                </div>
            <?php endforeach; ?>
            </div>
              <!-- end Quotes -->

          </div>
          <!-- .col-md-8 -->

          <!-- Sekilas -->
          <div class="col-md-4">
              <div class="sidebar">
                <div class="widget">
                <h2 style="font-size : 25px;" class="sidebar-widget-title"><span>Sekilas</span></h2><hr>
                <p style="text-indent: 25px;"> <?php echo $berita->isi; ?> </p>
                </div>
              </div>
          </div>
             
          <!-- Jadwal Agenda -->
          <div class="col-md-4 margin-20">
                                <div class="sidebar">
                                    <div class="widget">
                                    <h2 style="font-size : 25px;" class="sidebar-widget-title"><span>Jadwal Agenda Terkini</span></h2>
                                        <div class="widget-content">
                                            <ul class="popular-news-option">
                                            <?php if($total < 1) {?>
                                                <div class="alert alert-info">
                                                Tidak ada agenda saat ini
                                                </div>
                                            <?php } else { ?>
                                                <?php foreach($agenda as $agenda) { ?>
                                                    <li>
                                                        <div class="popular-news-img" style="width: 80px; height: 100px;">
                                                        <div class="agendaku">
                                                            <a href="<?php echo base_url('agenda/detail/'.$agenda->id_agenda) ?>">
                                                            <div class="tanggal">
                                                            <?php echo date('d',strtotime($agenda->mulai)) ?>
                                                            </div>
                                                            <div class="tahun">
                                                            <?php echo date('M Y',strtotime($agenda->mulai)) ?>
                                                            </div>
                                                            </a>
                                                        </div>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                        <div class="popular-news-contant">
                                                            <h5><a href="<?php echo base_url('agenda/detail/' . $agenda->id_agenda); ?>"><?php echo $agenda->nama; ?></a></h5>
                                                            <p>
                                                                <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($agenda->mulai)); ?>
                                                            </p>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                    </li>
                                                <?php } } ?>
                                            </ul>

                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                </div>
                                <!-- .sidebar -->
                            </div>
                            <!-- END JADWAL AGENDA -->


<!-- LINIMASA -->
          <div class="col-md-4 margin-20">
              <div class="sidebar">
                <div class="widget">
                <h2 style="font-size : 25px;" class="sidebar-widget-title"><span>Lini masa</span></h2><hr>
                <ul>
                  <?php foreach($nav_layanan as $timeline) : ?>

                    <li class="sub-active"><a href="<?php echo base_url('news/read/'.$timeline->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $timeline->judul_berita ?></a></li>

                  <?php  endforeach; ?>
                </ul>
                </div>
              </div>
          </div>
          <!-- ENDA LINIMASA -->

        </div>
        <!-- .row -->
      </div>
      <!-- .single-events -->
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->
</section>