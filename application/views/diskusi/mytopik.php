


<!-- Start Upcoming Events Section -->
<!-- Load Database -->
<?php
$this->load->database(); 
$this->load->model('diskusi_model');
?>
<?php include "header.php" ?>
<section class="bg-upcoming-events">
<div class="container">
<div class="row">
<div class="upcoming-events">
<div class="section-header">
    <h2>Diskusi Terbaru</h2>
</div>
<!-- .section-header -->
<div class="row">
<?php if(isset($total)) { if($total < 1) { ?>
        <div class="alert alert-info"> Belum ada data saat ini   <a href="<?php echo base_url('diskusi/tambah'); ?>" class="btn btn-primary btn-sm" style="float:right" >Buat Topik</a>  </div>
    <?php } } ?>
    <?php foreach($diskusi as $diskusi) {    
    ?>
    <?php if(isset($useraktif)){ ?>
    <?php
      if($diskusi->penulis_diskusi == $useraktif){    
    ?>
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
                    <li><a href="<?php echo base_url('diskusi/delete/'.$diskusi->id_diskusi); ?>" onclick="confirmation(event)"><i class="fa fa-trash" ></i>Hapus</a></li>
                    <li><a href="<?php echo base_url('diskusi/edit/'.$diskusi->id_diskusi); ?>"><sub><i class="fa fa-pencil"></i></sub> Edit</a></li>
                </ul>
                </div>
                <p class="text-justify"><?php echo character_limiter(strip_tags($diskusi->isi_diskusi), 200); ?></p>
                <a href="<?php echo base_url('diskusi/read/' . $diskusi->slug_diskusi); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
            </div>
            <!-- .events-content -->
        </div>
        <!-- .events-items -->
    </div>
        
    <?php }
        elseif($diskusi->penulis_diskusi && $diskusi->penulis_diskusi == ""){
    ?>
    <div class="col-md-12">
    <div class="event-items">
    <div class="alert alert-info" role="alert">
        Topik Belum ada...<a href="<?php echo base_url('diskusi/tambah'); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Buat Topik</a>
    </div>
    </div>
    </div>
        <?php break; }}}?>
    <!-- .col-md-6 -->
</div>
<!-- .row -->
</div>

<!-- Back -->
<div class="col-md-12">
<a href="<?php echo base_url('diskusi') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<!-- .upcoming-events -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</section>
<?php include "footer.php" ?>


<!-- End Upcoming Events Section -->
