<!-- Mockup Tampilan Komentar -->
<style type='text/css'>
/* CSS Comments myabdurrahim.com */
.   h4 {
    font-size: 16px;
}
.comments .avatar-image-container {
    max-height: 50px;
    width: 50px;
}
.comments .avatar-image-container img {
    border-radius: 50px;
    border:3px solid #dadada;
    width: 40px;
    height: 40px;
    margin-right: 100px;
    max-width: 50px;
}
.comments .comment-block{
    border: 1px solid #dadada;
    background: #fdfdfd;
    padding: 10px;
    font-size: 14px;
    border-radius: 10px 0px 10px 0px;
    margin-left: 60px;
}
.comments .comment-block::after {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    left: -14px;
    top: 16px;
    border: 7px solid;
    border-color: transparent #fdfdfd transparent transparent;
}
.comments .comment-block::before {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    top: 15px;
    left: -16px;
    border: 8px solid;
    border-color: transparent #dadada transparent transparent;
}
.comments .comment-header,
.comments .comments-content .comment-thread,
.comments .continue a {
    font-size: 14px;
}
.comments .comment-header {
    background: #37988e;
    padding: 5px;
    border-radius: 10px 0px 0px 0px;
}
.comments .comment-content {
    font-size: 14px;
}
.comments .comments-content .comment-content {
    margin-bottom: 10px;
}
.comments .comments-content .datetime{
    font-size: 12px;
    float:right;
    margin-right: 10px;
    padding-top: 5px;
}
.comments .comments-content .user {
    font-style:normal;
    font-weight:bold;
    font-size: 16px;
}
.comments .comments-content .user a,
.comments .comments-content .datetime a {
    color: #fff;
}
.comments .comment .comment-actions a {
    margin-top: 30px;
    background: #37988e;
    color: #fff;
    padding: 5px;
    margin: 3px;
}
.comments .continue a {
    display:inline;
    background: #37988e;
    color: #fff;
    padding: 5px;
    text-align: center;
    font-weight: normal;
}
.comments .continue a:hover {
    text-decoration: none;
    background: #277971;
}
.comments .comment .comment-actions a:hover{
    text-decoration: none;
    background: #277971;
}
</style>


 <!-- Mockup Tampilan Komentar -->
<style type='text/css'>
/* CSS Comments myabdurrahim.com */
.comments h4 {
    font-size: 16px;
}
.comments .avatar-image-container {
    max-height: 50px;
    width: 50px;
}
.comments .avatar-image-container img {
    border-radius: 50px;
    border:3px solid #dadada;
    width: 40px;
    height: 40px;
    margin-right: 100px;
    max-width: 50px;
}
.comments .comment-block{
    border: 1px solid #dadada;
    background: #fdfdfd;
    padding: 10px;
    font-size: 14px;
    border-radius: 10px 0px 10px 0px;
    margin-left: 60px;
}
.comments .comment-block::after {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    left: -14px;
    top: 16px;
    border: 7px solid;
    border-color: transparent #fdfdfd transparent transparent;
}
.comments .comment-block::before {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    top: 15px;
    left: -16px;
    border: 8px solid;
    border-color: transparent #dadada transparent transparent;
}
.comments .comment-header,
.comments .comments-content .comment-thread,
.comments .continue a {
    font-size: 14px;
}
.comments .comment-header {
    background: #37988e;
    padding: 5px;
    border-radius: 10px 0px 0px 0px;
}
.comments .comment-content {
    font-size: 14px;
}
.comments .comments-content .comment-content {
    margin-bottom: 10px;
}
.comments .comments-content .datetime{
    font-size: 12px;
    float:right;
    margin-right: 10px;
    padding-top: 5px;
}
.comments .comments-content .user {
    font-style:normal;
    font-weight:bold;
    font-size: 16px;
}
.comments .comments-content .user a,
.comments .comments-content .datetime a {
    color: #fff;
}
.comments .comment .comment-actions a {
    margin-top: 30px;
    background: #37988e;
    color: #fff;
    padding: 5px;
    margin: 3px;
}

.hehe{
    margin-top: 30px;
    background: #37988e;
    color: #fff;
    padding: 5px;
    margin: 3px;
}

.comments .continue a {
    display:inline;
    background: #37988e;
    color: #fff;
    padding: 5px;
    text-align: center;
    font-weight: normal;
}
.comments .continue a:hover {
    text-decoration: none;
    background: #277971;
}
.comments .comment .comment-actions a:hover{
    text-decoration: none;
    background: #277971;
}
</style>

<section class="bg-single-blog">
    <div class="container">
        <div class="row">
            <div class="single-blog">
                <div class="row">
                    <div class="col-md-8">

                        <div class="blog-items">
                            <?php if($diskusi->gambar_diskusi !="") { ?>
                                <div class="blog-img" style="width:770px;height:370px;">
                                    <a href="#"><img src="<?php echo base_url('assets/upload/image/'.$diskusi->gambar_diskusi) ?>" alt="blog-img-10" class="img-responsive" /></a>
                                </div>
                            <?php } ?>
                            <!-- .blog-img -->
                            <div class="blog-content-box">
                                <div class="meta-box">
                                    <div class="event-author-option">
                                        <div class="event-author-name">
                                            <p>Author : <a href="#"> <?php echo $diskusi->penulis_diskusi; ?></a></p>
                                        </div>
                                        <!-- .author-name -->
                                    </div>
                                    <!-- .author-option -->
                                    <ul class="meta-post">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($diskusi->tanggal_diskusi)); ?></li>
                                        <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $diskusi->hits; ?> Viewer</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $diskusi->jlh_komentar; ?> Response</a></li>
                                    </ul>
                                </div>
                                <!-- .meta-box -->
                                <div class="blog-content">
                                    <h4><?php echo $diskusi->judul_diskusi; ?></h4>

                                    <p class="text-justify"><?php echo $diskusi->isi_diskusi; ?></p>
                                </div>
                                <!-- .blog-content -->
                                
                                <?php foreach($komentar as $komentar) : ?>
                                <!-- Komentar -->
                                <?php if($diskusi->id_diskusi == $komentar->id_post) {?>
                                    <?php if($diskusi->id_users == $komentar->id_penulis){ ?>
                                        <div class="comments">
                                            <div class="comments avatar-image-container">
                                                <img src="<?php echo base_url('assets/upload/user/thumbs/64/'.$komentar->pp_penulis)?>" alt="">
                                            </div>
                                            <div class="comments comment-block">
                                            <div class="comments comment-header">
                                                <h4><?php echo $komentar->penulis_komentar ?></h4>
                                            </div>
                                            <div class="comments comments-content">
                                                <p><?php echo $komentar->isi_komentar; ?></p>
                                            </div>
                                            <div class="comment-actions">
                                                <a class ="hehe" href="#">Balas</a>
                                                <a class ="hehe" href="#">Hapus</a>
                                            </div>
                                            </div>
                                        
                                    <?php } else { ?>
                                        <div class="comments avatar-image-container">
                                                <img src="<?php echo base_url('assets/upload/user/thumbs/64/'.$komentar->pp_penulis)?>" alt="">
                                        </div>
                                        <div class="comments comment-block">
                                            <div class="comments comment-header">
                                                <h4><?php echo $komentar->penulis_komentar ?></h4>
                                            </div>
                                            <div class="comments comments-content">
                                                <p><?php echo $komentar->isi_komentar; ?></p>
                                            </div>
                                            <div class="comment-actions">
                                                <a class ="hehe" href="#">Balas</a>
                                                <a class ="hehe" href="#">Hapus</a>
                                            </div>
                                            </div>
                                    </div>
                                <?php }} ?>
                                <?php endforeach; ?>
                                <!-- .blog-content -->

                            </div>
                            <!-- Comman blog Content -->
                            <div class="blog-content-box">
                                <!-- Commant-COntent -->
                                <div class="blog-content">
                                    <button class="btn btn-info btn-sm" id="commenelements"><i class="fa fa-comment-o"></i> Tambah Komentar</button>
                                </div>
                            </div>
                            <!-- .blog-content-box -->
                            <!-- Form Comment elements -->
                            <?php
                            // Validasi error
                            echo validation_errors('<div class="alert alert-warning">','</div>');

                            // Error upload
                            if(isset($error)) {
                                echo '<div class="alert alert-warning">';
                                echo $error;
                                echo '</div>';
                            }
?>
                            <form action="<?php echo base_url('diskusi/comment') ?>" method="post" id="inputelements">
                            <div class="form-group" >
                            <input type="hidden" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy" readonly>
                            <input type="hidden" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s'); } ?>" readonly>
                            <input type="hidden" name="id_post" value="<?= $diskusi->id_diskusi ?>">
                            <input type="hidden" name="penulis_post" value="<?= $diskusi->penulis_diskusi ?>">
                            <input type="hidden" name="slug_diskusi" value="<?= $diskusi->slug_diskusi ?>">   
                                <label>Tulis Komentar</label>
                                <textarea name="isi_komentar" autofocus required='required' id="isi" rows="3" class="form-control konten" placeholder="Tulis Balasan"><?php echo set_value('isi') ?></textarea>
                            
                            <button type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">Komentar</button>
                            <button type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">Reset</button>
                            </div>
                            </form>

                        </div>
                        <!-- .blog-items -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h4 class="sidebar-widget-title">diskusi Lainnya</h4>
                                <div class="widget-content">
                                    <ul class="popular-news-option">
                                        <?php foreach($listing as $listing) { ?>
                                            <li>
                                                <div class="popular-news-img" style="width: 80px; height: 80px;">
                                                    <a href="#"><img src="<?php if($listing->gambar_diskusi=="") { echo base_url('assets/upload/image/thumbs/'.$site->icon); }else{ echo base_url('assets/upload/image/diskusi/'.$listing->gambar_diskusi); } ?>" alt="popular-news-img-1" /></a>
                                                </div>
                                                <!-- .popular-news-img -->
                                                <div class="popular-news-contant">
                                                    <h5><a href="<?php echo base_url('diskusi/read/' . $listing->slug_diskusi); ?>"><?php echo $listing->judul_diskusi; ?></a></h5>
                                                    <p><?php echo date('d M Y', strtotime($listing->tanggal_diskusi)); ?></p>
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
            <!-- .single-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>

<!-- Tinymce Script for label textarea -->
<!--  -->

<!-- Helper Show Hide Form elements -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#commenelements").click(function(){
    $("#inputelements").toggle();
  });
});
</script>

