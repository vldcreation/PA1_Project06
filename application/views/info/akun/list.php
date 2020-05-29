<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container emp-profile">
	<div class="col-md-7">
		<h4 class="alert alert-info">Update Profil Anda</h4>

		<p class="text-center">
			<img src="<?php if($member->gambar =="") { echo $this->website->icon(); }else{ echo base_url('assets/upload/member/thumbs/'.$member->gambar); } ?>" style="max-width: 150px; height: auto;" class="img img-circle img-thumbnail">
		</p>

		<?php echo form_open_multipart(base_url('info/member/edit'),'id="tambah"') ?>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Nick name <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $member->nama ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Email <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $member->email ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">username <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $member->username ?>" readonly disabled>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Level Hak Akses <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="akses_level" class="form-control" placeholder="Akses level" value="<?php echo $member->akses_level ?>" readonly disabled>
			</div>
		</div>

        <div class="form-group row">
			<label class="col-sm-3 control-label text-right">Nim <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="NIM" class="form-control" placeholder="Nim Anda" value="<?php echo $member->NIM ?>">
			</div>
		</div>

        <div class="form-group row">
			<label class="col-sm-3 control-label text-right">Prodi <span class="text-danger">*</span></label>
			<div class="col-sm-9">
            <select name="Prodi" class="form-control" required>
            <option value="<?php echo $member->Prodi ?>" selected>--Select Prodi--</option>
            <option value="IF">Informatika</option>
            <option value="TE">Teknik Elektro</option>
            <option value="SI">Sistem Informasi</option>
            <option value="BP">Bioteknologi</option>
            <option value="MR">Manajemen Rekayasa</option>
            <option value="TI">Teknologi Informasi</option>
            <option value="TRPL">Teknologi Rekayasa Perangkat Lunak</option>
            <option value="NM">Teknlogi Komputer</option>
          </select>
			</div>
		</div>

        <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Bio(Quotes) <span class="text-danger">*</span></label>
        <div class="col-sm-9">
        <textarea class="form-control text-area" name="Motivasi" rows="1" placeholder="Bio..."><?php echo $member->Motivasi ?> </textarea>
        </div>
        </div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
			<div class="col-sm-9">

				<input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo $member->gambar ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right"></label>
			<div class="col-sm-9">
				<div class="form-group btn-group text-right">
					<button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
					<button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
					<a href="<?php echo base_url('info/member') ?>" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>

	<div class="col-md-5">
		<h4 class="alert alert-info">Ganti Password</h4>



		<?php echo form_open_multipart(base_url('info/member/password'),'id="tambah"') ?>

		<div class="form-group row">
			<label class="col-sm-4 control-label text-right">Password baru <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="password" name="password" id="password" class="form-control" placeholder="Password baru" value="<?php echo set_value('password') ?>" minlength="6" maxlength="32" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 control-label text-right">Konfirmasi Password <span class="text-danger">*</span></label>
			<div class="col-sm-8">
				<input type="password" name="passconf" id="passconf" class="form-control" placeholder="Konfirmasi Password " value="<?php echo set_value('passconf') ?>" minlength="6" maxlength="32" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-4 control-label text-right"></label>
			<div class="col-sm-8">
				<div class="form-group btn-group text-right">
					<button type="submit" name="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Ganti Password</button>
					<button type="reset" name="reset" class="btn btn-info btn-md"><i class="fa fa-cut"></i> Reset</button>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>
</div>


<style>
        body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
        </style>

<style>
}
.emp-home{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.home-img{
    text-align: center;
}
.home-img img{
    width: 70%;
    height: 100%;
}
.home-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.home-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.home-head h5{
    color: #333;
}
.home-head h6{
    color: #0062cc;
}
.home-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.home-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.home-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.home-head .nav-tabs{
    margin-bottom:5%;
}
.home-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.home-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.home-work{
    padding: 14%;
    margin-top: -15%;
}
.home-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.home-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.home-work ul{
    list-style: none;
}
.home-tab label{
    font-weight: 600;
}
.home-tab p{
    font-weight: 600;
    color: #0062cc;
}
        </style>