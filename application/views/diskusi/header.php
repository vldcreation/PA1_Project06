<?php  $this->load->model('user_model') ?>
<div class="container">
    <div class="row">
        <p class="btn-group">
    <a href="<?php echo base_url('diskusi/tambah') ?>" class="btn btn-primary btn-lg">
    <i class="fa fa-plus"></i> Buat Topik Diskusi baru</a>

    <a href="<?php echo base_url('diskusi/viewall') ?>" class="btn btn-info btn-lg">
    <i class="fa fa-home"></i> Lihat Semua Diskusi</a>

    <a href="<?php echo base_url('diskusi/mytopik/'); ?>" class="btn btn-warning btn-lg">
    <i class="fa fa-file-text"></i> Lihat Topik Diskusi Saya</a>
    </p>
    </div>
</div>