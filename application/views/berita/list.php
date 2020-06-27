<section class="bg-blog-style-2">
            <div class="container">
                <div class="row">
                    <div class="blog-style-2">
                    <div class="upcoming-events">
                        <div class="section-header">
                            <h2>Berita Terbaru</h2>
                        </div>
                        <div class="row">
                         <!-- Search form -->
                            <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            <div class="col-md-4" style="padding-bottom:10px;">
                                <form action="<?php echo base_url('news/search'); ?>">
                                        <input name="s" class="form-control" id="all-serach" type="text" autofocus autocomplete="ON" placeholder="<?php if(isset($keyword)) echo $keyword ; else echo "Cari Topik Berita"; ?>" aria-label="Search" >
                                </form>
                            </div>
                            <div class="col-md-8">
                            <?php if(isset($total)) { if($total < 1) { ?>
                                    <div class="alert alert-info"> Tidak ada data untuk pencarian : <span style="font-weight : bold;"> <?php echo $keyword; ?> </span> </div>
                                <?php } else {  ?>
                                    <div class="alert-info"> Total Pencarian untuk <span style="font-weight : bold;"><?= $keyword; ?></span> : ( <?= $total ?> ) </div>
                                <?php } } ?>
                                <?php foreach($berita as $berita) { ?>
                                <div class="blog-items">
                                    <div class="blog-img" style="width:770px;height:370px;">
                                        <a href="<?php echo base_url('berita/' . $berita->slug_berita); ?>"><img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="blog-img-10" class="img-responsive" /></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4><a href="<?php echo base_url('berita/' . $berita->slug_berita); ?>"><?php echo $berita->judul_berita; ?></a></h4>
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($berita->tanggal_publish)); ?></li>
                                                <li><i class="fa fa-user"></i> <?php echo $berita->nama; ?></li>
                                                <!-- <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $berita->hits; ?> Viewer</a></li> -->
                                            </ul>
                                            <p class="text-justify"><?php echo character_limiter(strip_tags($berita->isi), 200); ?></p>
                                            <a href="<?php echo base_url('berita/' . $berita->slug_berita); ?>"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                                        </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <?php }  ?>
                                <!-- Pagin -->
                                    <div class="load-more-option">
                                                            <?php if(isset($pagin)) { echo $pagin; }  ?>
                                    </div>
                                                                <!-- .pagination_option -->
                            </div>
                            <!-- .col-md-8 -->
                            <div class="col-md-4">
                                <div class="sidebar">
                                    <div class="widget">
                                    <h2 style="font-size : 25px;" class="sidebar-widget-title"><span>Berita Terpopuler</span></h2>
                                        <div class="widget-content">
                                            <ul class="popular-news-option">
                                                <?php foreach($populer as $populer) { ?>
                                                    <li>
                                                        <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                            <a href="#"><img src="<?php if($populer->gambar=="") { echo base_url('assets/upload/image/thumbs/'.$site->icon); }else{ echo base_url('assets/upload/image/thumbs/'.$populer->gambar); } ?>" alt="popular-news-img-1" /></a>
                                                        </div>
                                                        <!-- .popular-news-img -->
                                                        <div class="popular-news-contant">
                                                            <h5><a href="<?php echo base_url('berita/' . $populer->slug_berita); ?>"><?php echo $populer->judul_berita; ?></a></h5>
                                                            <p>
                                                                <i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($populer->tanggal_publish)); ?> <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $populer->hits; ?> Viewer</a>
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
                            <!-- .col-md-4 -->
                        </div>
                        <!-- .row -->
                        </div>
                        <!-- Upcoming event -->
                    </div>
                    <!-- .blog-style-2 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
