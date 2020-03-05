<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	
	$satu=$_POST['satu'];
	$dua=$_POST['dua'];
	$tiga=$_POST['tiga'];
	$empat=$_POST['empat'];
	
	if ($stat=="ubah")
	{
	opendb();
	$qview = "SELECT * FROM informasi WHERE kode_informasi='$kode_setting'";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Informasi - Ubah Data"; } elseif ($stat=="tambah") { echo"Informasi - Tambah Data"; } else { echo"Informasi"; } ?></h2>
	<?php if ($stat<>"") { ?>
	<form method="post" action="informasi_act.php" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php echo "$stat"; ?>">
    <input type="hidden" name="id" value="<?php echo "$dview[0]"; ?>" />
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Judul</td>
					<td width="2%">:</td>
					<td width="75%"><input type="text" name="judul" value="<?php echo "$dview[1]"; ?>" maxlength="100" style="width:435px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
					<td valign="top">Isi </td>
					<td valign="top">:</td>
					<td><textarea name="isi" rows="25" cols="53"><?php echo "$dview[2]"; ?></textarea></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td>Gambar</td>
					<td>:</td>
					<td><input type="file" name="gam" value="<?php echo "$dview[3]"; ?>"></td>
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
					<th width="7%">No. </th>
					<th width="44%">Informasi</th>
					<th width="20%">Tanggal</th>
		            <th width="17%">Oleh</th>
		            <th width="12%">
	  		<form method="post" action="index.php?page=informasi"  enctype="multipart/form-data" name="tambah" id="tambah">
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
				$qview1 = "SELECT a.*, b.nama FROM informasi as a, panitia as b WHERE a.kode_panitia=b.kode_panitia";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="7%"><?php echo "$no"; ?></td>
					<td width="44%"><?php echo "$dview1[1]"; ?></td>
					<td width="20%"><?php echo date("d/m/Y", strtotime($dview1[3])); ?></td>
		            <td width="17%"><?php echo "$dview1[6]"; ?></td>
		            <td width="12%">
<form method="post" action="index.php?page=informasi"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo"$dview1[0]"; ?>">
<input type="hidden" name="koset" value="<?php echo "$dview1[0]"; ?>">
							<input type="hidden" name="stat" value="ubah">
                            <a style="cursor:pointer" onclick="document.getElementById('ubah<?php echo"$dview1[0]"; ?>').submit()" title="Ubah Data">
                       		<img src="../images/n_edit.png" width="24"/></a>
                            <a href="informasi_act.php?stat=hapus&id=<?php echo "$dview1[0]"; ?>" style="cursor:pointer" title="Hapus Data">
                       		<img src="../images/hapus.png" width="24"/></a>
						</form>					</td>
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
		$query="UPDATE syarat SET kode_syarat='$satu', nama_syarat='$dua', status='$tiga' WHERE kode_syarat='$kode_setting'";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=setting3'</script>
		<?php
		}
		
//tambah data
elseif ($stat=="tambah1") {
		opendb();
		$query="INSERT INTO syarat (kode_syarat, nama_syarat, status) VALUES ('$satu', '$dua', '$tiga')";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Data berhasil disimpan.');
		document.location='index.php?page=setting3'</script>
		<?php
		}
?>