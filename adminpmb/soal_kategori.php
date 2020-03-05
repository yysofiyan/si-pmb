<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	
	$satu=$_POST['satu'];
	$dua=$_POST['dua'];
	
	if ($stat=="ubah")
	{
	opendb();
	$qview = "SELECT * FROM soal_kategori WHERE kode_soal_kategori='$kode_setting'";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Kategori Soal - Ubah Data"; } elseif ($stat=="tambah") { echo"Kategori Soal - Tambah Data"; } else { echo"Kategori Soal"; } ?></h2>
	<?php if ($stat<>"") { ?>
	<form method="post" action="index.php?page=kategori-soal" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php if ($stat=="ubah") { echo"ubah1"; } else { echo"tambah1"; } ?>">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Nama Kategori</td>
					<td width="2%">:</td>
					<td width="75%"><input type="text" name="satu" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:200px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Keterangan</td>
					<td valign="top">:</td>
					<td><input type="text" name="dua" value="<?php echo "$dview[2]"; ?>" maxlength="100" style="width:400px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td></td>
					<td></td>
					<td align="right"></td>
				  </tr>
				</table>
	<div align="right" style=" background-color:#ffd318; border:1px solid; border-bottom-color:#999999; padding:3px; -moz-border-radius:5px 5px 5px 5px; -webkit-border-radius:5px 5px 5px 5px;">
	<input type="submit" name="submit" value="Simpan"></div>
	</form>
	<br>
	<?php } ?>
	<div style=" padding:1px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#C1C1C1">
					<th width="5%">No.</th>
					<th width="21%">Kategori</th>
					<th width="67%">Keterangan</th>
			      <th width="7%">
  						<form method="post" action="index.php?page=kategori-soal"  enctype="multipart/form-data" name="tambah" id="tambah">
							<input type="hidden" name="stat" value="tambah">
            				<a style="cursor:pointer" onclick="document.getElementById('tambah').submit()" title="Tambah Data">
                            	<img src="../images/n_add.png" width="24"/>
					</a>
						</form>
					</th>
				  </tr>
				<?php
				$no=0;
				opendb();
				$qview1 = "SELECT * FROM soal_kategori";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="5%"><?php echo "$no"; ?></td>
					<td width="21%"><?php echo "$dview1[1]"; ?></td>
					<td width="67%"><?php echo "$dview1[2]"; ?></td>
			      <td width="7%">
  					<form method="post" action="index.php?page=kategori-soal"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo "$dview1[0]"; ?>">
							<input type="hidden" name="koset" value="<?php echo "$dview1[0]"; ?>">
							<input type="hidden" name="stat" value="ubah">
                            <a style="cursor:pointer" onclick="document.getElementById('ubah<?php echo"$dview1[0]"; ?>').submit()" title="Ubah Data">
                       		<img src="../images/n_edit.png" width="24"/>
					</a>
						</form>
					</td>
				  </tr>
				<?php } ?>
	  </table>
	</div>
</div>

<?php
//Script untuk pemrosesan data :::
//ubah data
if ($stat=="ubah1") {
		opendb();
		$query="UPDATE soal_kategori SET nama_kategori='$satu', keterangan='$dua' WHERE kode_soal_kategori='$kode_setting'";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=kategori-soal'</script>
		<?php
		}
		
//tambah data
elseif ($stat=="tambah1") {
		opendb();
		$query="INSERT INTO soal_kategori (nama_kategori, keterangan) VALUES ('$satu', '$dua')";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Data berhasil disimpan.');
		document.location='index.php?page=kategori-soal'</script>
		<?php
		}
?>