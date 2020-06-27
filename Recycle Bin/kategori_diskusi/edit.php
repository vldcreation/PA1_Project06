  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/kategori_diskusi/edit/'.$kategori->id_kategori_diskusi));
?>

<div class="form-group">
<label for="nama_kategori_diskusi">Nama Kategori <span style="color:red">*</span></label>
<input type="text" name="nama_kategori_diskusi" class="form-control" placeholder="Nama kategori" value="<?php echo $kategori->nama_kategori_diskusi ?>" required>
</div>

<div class="form-group">
<label for="urutan">Urutan <span style="color:red">*</span></label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

