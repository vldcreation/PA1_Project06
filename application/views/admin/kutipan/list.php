<?php
// Form buka utk delete multiple
echo form_open(base_url('admin/quotes/proses'));
?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/', '', current_url()) ?>">
<p>
  <div class="btn-group">
    <a href="<?php echo base_url('admin/quotes/tambah') ?>" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i> Tambah Baru</a>

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
    <th>Judul</th>
    <th>ISI</th>
    <th>FOOTER</th>
    <th>AUTHOR</th>
    <th>ACTION</th>
  </tr>
  </thead>
  <tbody>

  <?php 
  // Looping data quotes dg foreach
  $i=1;
  foreach($quotes as $quotes) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_quotes[]" value="<?php echo $quotes->id_quotes ?>">
    </td>
    <td><?php echo $quotes->title_quotes ?></td>
    <td><?php echo $quotes->body_quotes ?></td>
    <td><?php echo $quotes->footer_quotes ?></td>
    <td><?php echo $quotes->author_quotes ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/quotes/edit/'.$quotes->id_quotes) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/quotes/delete/'.$quotes->id_quotes) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
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
