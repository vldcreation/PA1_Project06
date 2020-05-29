
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
echo form_open_multipart(base_url('diskusi/tambah'));
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-header">
    <h2>Tambah Topik Diskusi</h2>
</div>
</div>
<div class="col-md-12">

<div class="form-group form-group-lg">
<label>Judul diskusi</label>
<input type="text" name="judul_diskusi" class="form-control" placeholder="Judul diskusi" required = "required" value="<?php echo set_value('judul_diskusi')?>">
</div>

</div>

<div class="col-md-6">

<div class="form-group form-group-lg">

<div class="row">
  <div class="col-md-6">
    <label>Tanggal Publish</label>
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-6">
  <label>Jam Publish</label>
  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s'); } ?>">
  </div>
</div>
</div>

</div>

<div class="col-md-6">
    <div class="form-group form-group-lg">
        <label>Upload gambar</label>
        <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
    </div>
</div>

<div class="col-md-12">

<div class="form-group">
<label>Isi diskusi</label>
<textarea name="isi_diskusi" id="isi" rows="3" class="form-control konten" placeholder="Isi diskusi"><?php echo set_value('isi') ?></textarea>
</div>

<div class="form-group">
<label>Link / website yang terkait dengan diskusi</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website') ?>">
</div>

<div class="form-group">
<button type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">Simpan Data</button>
<button type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">Reset</button>
</div>

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">

//Tinymce Script for label textarea
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
<?php
// Form close
echo form_close();
?>