


<!-- Start Upcoming Events Section -->


<section class="bg-blog-style-2">
<div class="container">
<div class="row">
<div class="blog-style-2">
<div class="upcoming-events">
<div class="section-header">
    <h2>Diskusi Terbaru</h2>
</div>
<!-- .section-header -->
<div class="row">
        <!-- Search form -->
        <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        <div class="col-md-4" style="padding-bottom:10px;">
            <form action="<?php echo base_url('diskusi/search'); ?>">
                    <input name="s" class="form-control" id="all-serach" type="text" autofocus autocomplete="ON" placeholder="<?php if(isset($keyword)) echo $keyword ; else echo "Cari Topik Diskusi"; ?>" aria-label="Search" >
            </form>
        </div>
        <div class="col-md-8">
        <?php if(isset($total)) { if($total < 1) { ?>
        <div class="alert alert-info"> Tidak ada data untuk pencarian : <span style="font-weight:bold"> <?php echo $keyword; ?> </span> </div>
    <?php } else {  ?>
        <div class="alert-info"> Total Pencarian untuk <span style="font-weight : bold;"><?= $keyword; ?></span> : ( <?= $total ?> ) </div>
    <?php } } ?>
    <?php foreach($diskusi as $diskusi) { ?>
        <div class="event-items">
            <div class="event-img">
                <a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>"><img style="width:570px;height:300px;" src="<?php if(isset($diskusi->gambar_diskusi) && ($diskusi->gambar_diskusi) != "") { echo base_url('assets/upload/image/diskusi/' . $diskusi->gambar_diskusi); } else  { echo base_url('assets/upload/image/diskusi/default.png'); } ?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
                <div class="date-box">
                    <h3><?php echo date('d', strtotime($diskusi->tanggal_diskusi)); ?></h3>
                    <h5><?php echo date('M', strtotime($diskusi->tanggal_diskusi)); ?></h5>
                </div>
                <!-- .date-box -->
            </div>
            <!-- .event-img -->
            <div class="events-content">
                <div style="min-height: 120px !important;">
                <h3><a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>"><?php echo $diskusi->judul_diskusi; ?></a></h3>
                <ul class="meta-post">
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('H:i', strtotime($diskusi->tanggal_diskusi)); ?></li>
                    <li> <a href="<?php if($diskusi->id_users != 1) { echo base_url('info/member/detail_other/'.md5(url_title($diskusi->penulis_diskusi,'dash',TRUE))); } ?> "><i class="fa fa-user"></i> <?php echo $diskusi->penulis_diskusi; ?></a></li>
                    <li><i class="fa fa-comments-o" arial-hidden="true"></i> <?php echo $diskusi->jlh_komentar; ?></li>
                </ul>
                </div>
                <p class="text-justify"><?php echo character_limiter(strip_tags($diskusi->isi_diskusi), 200); ?></p>
                <a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
            </div>
            <!-- .events-content -->
        </div>
        <!-- .events-items -->

       
    
    <?php } ?>
     <!-- Pagin -->
     <div class="load-more-option">
                            <?php if(isset($pagin)) { echo $pagin; }  ?>
    </div>
    </div>
    <!-- .col-md-6 -->

    

    <!-- .col-md-8 -->
    <div class="col-md-4">
                                <div class="sidebar">
                                    <div class="widget">
                                        <h2 style="font-size : 25px;" class="sidebar-widget-title"><span>Diskusi Terpopuler</span></h2>
                                        <div class="widget-content">
                                            <ul class="popular-news-option">
                                                <?php foreach($populer as $populer) { ?>
                                                    <li>
                                                        <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                            <a href="#"><img src="<?php if($populer->gambar_diskusi=="") { echo base_url('assets/upload/image/diskusi/default2.jpg'); }else{ echo base_url('assets/upload/image/diskusi/'.$populer->gambar_diskusi); } ?>" alt="popular-news-img-1" /></a>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                        <div class="popular-news-contant">
                                                            <h5><a href="<?php echo base_url('diskusi/read/' . $populer->slug_diskusi); ?>"><?php echo $populer->judul_diskusi; ?></a></h5>
                                                            <p>
                                                                <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($populer->tanggal_diskusi)); ?> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $populer->hits; ?> Viewer</a>
                                                            </p>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                    </li>
                                                <?php } ?>
                                            </ul>

                                        </div>
                                        <!-- .widget-content -->
                                    </div>
                                </div>
                                <!-- .sidebar -->
                            </div>
</div>
<!-- .row -->
</div>
<!-- .upcoming-events -->
</div>
<!-- blog style 2 -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</section>


<!-- End Upcoming Events Section -->
