<div class="article">
    <?php
	opendb();
	$qview = "SELECT * FROM psb_statis_one WHERE id_psb_statis_one=7";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	?>

	<h2><?php echo "$dview[1]"; ?></h2>
	<p>Last edited by <a href="#"><?php echo "$dview[5]"; ?></a> | Date <a href="#"><?php echo "$dview[6]"; ?></a></p>
	<form method="post" action="info_pendaftaran_berhasil_update.php" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="ubah">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Judul</td>
					<td width="2%">:</td>
					<td width="75%"><input type="text" name="judul" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:435px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Isi Informasi</td>
					<td valign="top">:</td>
					<td><textarea name="isi" rows="25" cols="53"><?php echo "$dview[2]"; ?></textarea></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td></td>
					<td></td>
					<td align="right"></td>
				  </tr>
				</table>
	<div align="right" style=" background-color:#CCCCCC; border:1px solid; border-bottom-color:#999999; padding:3px;"><input type="submit" name="submit" value="Simpan Perubahan"></div>
	</form>
</div>