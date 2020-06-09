<?php
// Form buka utk delete multiple
echo form_open(base_url('admin/member/proses'));
?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">
<p>
  <div class="btn-group">
    <a href="<?php echo base_url('admin/member/tambah') ?>" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i> Tambah Baru</a>

    <button class="btn btn-info btn-lg" name="aktifkan" type="submit">
      <i class="fa fa-check"></i> Aktifkan
    </button>

    <button class="btn btn-warning btn-lg" name="non_aktifkan" type="submit">
      <i class="fa fa-times"></i> Non Aktifkan
    </button>

    <button class="btn btn-danger btn-lg" name="hapus" type="submit">
      <i class="fa fa-trash"></i> Hapus
    </button>
  </div>
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th class="text-center" width="5%">
       <!-- Check all button -->
        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
        </button>
    </th>
    <th>NIM</th>
    <th>PRODI</th>
    <th>NAMA</th>
    <th>AKSES LEVEL</th>
    <th>EMAIL</th>
    <th>USERNAME</th>
    <th>STATUS</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data member dg foreach
  $i=1;
  foreach($member as $member) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_user[]" value="<?php echo $member->id_user ?>">
    </td>
    <td><?php echo $member->NIM ?></td>
    <td><?php echo $member->Prodi ?></td>
    <td><?php echo $member->nama ?></td>
    <td><?php echo $member->akses_level ?></td>
    <td><?php echo $member->email ?></td>
    <td><?php echo $member->username ?></td>
    <td><?php echo $member->is_active ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/member/edit/'.$member->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/member/delete/'.$member->id_user) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>

</div>
<!-- /.mail-box-messages -->
<?php 
// Form tutup
echo form_close(); 
?>
