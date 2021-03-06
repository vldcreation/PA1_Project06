<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open(base_url('admin/member/tambah'));
?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama User <span class="text-danger">*</span></label>
			<input type="text" name="nama" class="form-control form-control-lg" value="<?php echo set_value('nama') ?>" placeholder="Nama Member" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Username <span class="text-danger">*</span></label>
			<input type="text" name="username" class="form-control form-control-lg" value="<?php echo set_value('username') ?>" placeholder="username" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Password <span class="text-danger">*</span></label>
			<input type="password" name="password" class="form-control form-control-lg" value="<?php echo set_value('password') ?>" placeholder="Password" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label>PRODI <span class="text-danger">*</span></label>
			<select name="Prodi" class="form-control">
				<option value="NULL" selected>--Select Prodi--</option>
				<option value="S1 Informatika">S1 Informatika</option>
				<option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
				<option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
				<option value="S1 Bioteknologi">S1 Bioteknologi</option>
				<option value="S1 Manajemen Rekayasa">S1 Manajemen Rekayasa</option>
				<option value="D3 Teknologi Informasi">D3 Teknologi Informasi</option>
				<option value="D4 Teknologi Rekayasa Perangkat Lunak">D4 Teknologi Rekayasa Perangkat Lunak</option>
				<option value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
          </select>
			</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>NIM <span class="text-danger">*</span></label>
			<input type="text" name="NIM" class="form-control" value="<?php echo set_value('NIM') ?>" placeholder="NIM" required>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Email" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Deskripsi Bio User</label>
			<textarea name="Motivasi" class="form-control textarea" placeholder="Bio" rows="5"><?php echo set_value('Motivasi') ?></textarea>
		</div>

		<div class="form-group">
			<div class="btn-group">
				<button class="btn btn-success btn-lg" name="submit" type="submit">
					<i class="fa fa-save"></i> Simpan
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
				<a href="<?php echo base_url('admin/user') ?>" class="btn btn-warning btn-lg">
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