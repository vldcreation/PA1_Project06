<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open(base_url('admin/quotes/tambah/'));
?>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label>Author </label>
			<input type="text" disabled="disabled" name="author_quotes" class="form-control form-control-lg" value="<?php if(isset($quotes->author_quotes)) { echo $quotes->author_quotes ;} else { echo $this->session->userdata('nama'); }  ?>" placeholder="Nama Author" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Judul Kutipan <span class="text-danger">*</span></label>
			<input type="text" name="title_quotes" class="form-control form-control-lg" value="<?php echo set_value('title_quotes') ?>" placeholder="Judul Kutipan" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Deskripsi Kutipan</label>
			<textarea name="body_quotes" class="form-control textarea" placeholder="Isi Kutipan"><?php echo set_value('body_quotes') ?></textarea>
	</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Footer Quotes <span class="text-danger">*</span></label>
			<input type="text" name="footer_quotes" class="form-control form-control-lg" value="<?php echo set_value('footer_quotes')?>" placeholder="Penutup Kutipan" required>
		</div>
	</div>

	

		<div class="form-group">
			<div class="btn-group">
				<button class="btn btn-success btn-lg" name="submit" type="submit">
					<i class="fa fa-save"></i> Simpan
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
				<a href="<?php echo base_url('admin/quotes') ?>" class="btn btn-warning btn-lg">
					<i class="fa fa-backward"></i> Kembali
				</a>
			</div>
		</div>
	</div>
</div>
<?php 
// Form close
echo form_close();
?>