<?php
// Notifikasi error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open(base_url('admin/member/edit/'.$member->id_user));
?>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label>Nama member <span class="text-danger">*</span></label>
			<input type="text" name="nama" class="form-control form-control-lg" value="<?php echo $member->nama ?>" placeholder="Nama member" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>NIM Member <span class="text-danger">*</span></label>
			<input type="text" name="NIM" class="form-control form-control-lg" value="<?php echo $member->NIM ?>" placeholder="Nim Member" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>username <span class="text-danger">*</span></label>
			<input type="text" name="username" class="form-control form-control-lg" value="<?php echo $member->username ?>" placeholder="username" readonly>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>New Password <span class="text-danger">*</span></label>
			<input type="password" name="password" class="form-control form-control-lg" value="" placeholder="Password">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label>PRODI <span class="text-danger">*</span></label>
			<select name="Prodi" class="form-control">
				<option value="NULL">--Select Prodi--</option>
				<option value="S1 Informatika" <?php if($member->Prodi == "S1 Informatika") echo "selected"; ?>></option>>S1 Informatika</option>
				<option value="S1 Teknik Elektro" <?php if($member->Prodi == "S1 Teknik Elektro") echo "selected"; ?>>S1 Teknik Elektro</option>
				<option value="S1 Sistem Informasi" <?php if($member->Prodi == "S1 Sistem Informasi") echo "selected"; ?>>S1 Sistem Informasi</option>
				<option value="S1 Bioteknologi" <?php if($member->Prodi == "S1 Bioteknologi") echo "selected"; ?>>S1 Bioteknologi</option>
				<option value="S1 Manajemen Rekayasa" <?php if($member->Prodi == "S1 Manajemen Rekayasa") echo "selected"; ?>>S1 Manajemen Rekayasa</option>
				<option value="D3 Teknologi Informasi" <?php if($member->Prodi == "D3 Teknologi Informasi") { echo "selected"; }?>>D3 Teknologi Informasi</option>
				<option value="D4 Teknologi Rekayasa Perangkat Lunak" <?php if($member->Prodi == "D4 Teknologi Rekayasa Perangkat Lunak") echo "selected"; ?>>D4 Teknologi Rekayasa Perangkat Lunak</option>
				<option value="D3 Teknologi Komputer" <?php if($member->Prodi == "D3 Teknologi Komputer") echo "selected"; ?>>D3 Teknologi Komputer</option>
          </select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="email" name="email" class="form-control" value="<?php echo $member->email ?>" placeholder="Email" required>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label>Set Status <span class="text-danger">*</span></label>
			<select name="is_active" class="form-control">
				<option value="Y">Active</option>
				<option value="N" selected>Non-Active</option>
          </select>
			</select>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Bio</label>
			<textarea name="keterangan" class="form-control textarea" placeholder="Keterangan"><?php echo $member->Motivasi ?></textarea>
		</div>

		<div class="form-group">
			<div class="btn-group">
				<button class="btn btn-success btn-lg" name="submit" type="submit">
					<i class="fa fa-save"></i> Simpan
				</button>
				<button class="btn btn-info btn-lg" name="reset" type="reset">
					<i class="fa fa-times"></i> Reset
				</button>
				<a href="<?php echo base_url('admin/member') ?>" class="btn btn-warning btn-lg">
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