


<!-- Start Upcoming Events Section -->


<section class="bg-upcoming-events">
<div class="container">
<div class="row">
<div class="upcoming-events">
<div class="section-header">
    <h2>Diskusi Terbaru</h2>
</div>
<!-- .section-header -->
<div class="row">
    <?php foreach($diskusi as $diskusi) { ?>
    <div class="col-md-6">
        <div class="event-items">
            <div class="event-img">
                <a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>"><img style="width:570px;height:300px;" src="<?php echo base_url('assets/upload/image/diskusi/' . $diskusi->gambar_diskusi); ?>" alt="upcoming-events-img-1" class="img-responsive" /></a>
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
                    <li><i class="fa fa-user"></i> <?php echo $diskusi->penulis_diskusi; ?></li>
                    <li><i class="fa fa-comments-o" arial-hidden="true"></i> <?php echo $diskusi->jlh_komentar; ?></li>
                </ul>
                </div>
                <p class="text-justify"><?php echo character_limiter(strip_tags($diskusi->isi_diskusi), 200); ?></p>
                <a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
            </div>
            <!-- .events-content -->
        </div>
        <!-- .events-items -->
    </div>
    <?php } ?>
    <!-- .col-md-6 -->
</div>
<!-- .row -->
</div>
<!-- .upcoming-events -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</section>


<!-- End Upcoming Events Section -->
