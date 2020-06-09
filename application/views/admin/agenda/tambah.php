

</script>
	<script>
	$(function() {
		$( "#mulai" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			dateFormat: "yy-mm-dd",
			changeYear: true,
			numberOfMonths: 2,
			onSelect: function( selectedDate ) {
				$( "#selesai" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#selesai" ).datepicker({
			defaultDate: "+1w",
			dateFormat: "yy-mm-dd",
			changeYear: true,
			changeMonth: true,
			numberOfMonths: 2,
			onSelect: function( selectedDate ) {
				$( "#mulai" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
	</script>

<?php echo validation_errors(); ?>
  <?php echo form_open_multipart(base_url('admin/agenda/tambah')) ?>
  
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
        <tr valign="baseline">
          <td width="22%" align="right" nowrap>Nama agenda kegiatan</td>
          <td width="78%">
            <input type="text" class="form-control" name="nama" size="50">
          </td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap>Jenis Agenda/Training</td>
          <td><select class="form-control"  name="jenis_agenda" id="jenis_agenda">
            <option value="Internal">Agenda Internal</option>
            <option value="External">Agenda External</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" nowrap>Penannggung Jawab (PIC)</td>
          <td><select required name="panitia" class="form-control">
            <option value="NULL">--Pilih Penanggung Jawab--</option>
            <?php foreach($user as $user) { ?>
            <option value="<?php echo $user->nama ?>" ?>>
              <?php echo $user->nama ?>
            </option>
            <?php } ?>
          </select>
            </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tempat pelaksanaan</td>
          <td><input type="text" class="form-control" name="tempat" size="40"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tanggal mulai</td>
          <td>
          <input type="text" class="form-control" data-date-format="yyyy-mm-dd" readonly name="mulai" size="32" id="mulai">
         <br></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tanggal selesai </td>
          <td>
          <input type="text" class="form-control" data-date-format="yyyy-mm-dd" readonly name="selesai" size="32" id="selesai">
         </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Deskripsi ringkas</td>
          <td>
            <input type="text" class="form-control" name="ringkasan" size="50">
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right" valign="top">Deskripsi lengkap</td>
          <td><textarea name="isi" id="isi" cols="50" rows="5" class="ckeditor form-control"></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input name="Submit" type="submit" class="btn btn-primary btn-lg"  value="Simpan data agenda">
          <input style="margin-left:10px" name="Submit2" type="reset" class="btn btn-danger btn-lg"  value="Reset">
          </td>
        </tr>
      </table>
  </form>

<!-- tinymce -->

