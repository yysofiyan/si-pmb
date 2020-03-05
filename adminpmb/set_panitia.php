<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	
	$satu=$_POST['username'];
	$dua=$_POST['dua'];
	$tiga=$_POST['tiga'];
	$empat=$_POST['empat'];
	//$lima=md5($_POST['lima']);
	$lima1=$_POST['lima1'];
	$enam=$_POST['enam'];
	$tujuh=$_POST['tujuh'];
	
	if (strlen($_POST['lima']) > 15)
		{ $lima=$_POST['lima']; }
	else
		{ $lima=md5($_POST['lima']); }
	
	if ($stat=="ubah")
	{
	opendb();
	$qview = "SELECT * FROM panitia WHERE kode_panitia=$kode_setting";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Daftar Panitia - Ubah Data"; } elseif ($stat=="tambah") { echo"Daftar Panitia - Tambah Data"; } else { echo"Daftar Panitia"; } ?></h2>
	<?php if ($stat<>"") { ?>
	<form method="post" action="index.php?page=setting4" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php if ($stat=="ubah") { echo"ubah1"; } else { echo"tambah1"; } ?>">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Nama </td>
					<td valign="top">:</td>
					<td><input type="text" name="dua" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:200px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Alamat </td>
				    <td valign="top">:</td>
				    <td><input type="text" name="tiga" value="<?php echo "$dview[2]"; ?>" maxlength="100" style="width:350px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Nomor Telp. </td>
				    <td valign="top">:</td>
				    <td><input type="text" name="empat" value="<?php echo "$dview[3]"; ?>" maxlength="13" style="width:150px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Username </td>
				    <td valign="top">:</td>
				    <td><input type="text" name="username" value="<?php echo "$dview[4]"; ?>" maxlength="15" style="width:150px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Password </td>
				    <td valign="top">:</td>
				    <td><input type="password" name="lima" value="<?php echo "$dview[5]"; ?>" maxlength="15" style="width:150px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Ulangi Password </td>
				    <td valign="top">:</td>
				    <td><input type="password" name="lima1" value="<?php echo "$dview[5]"; ?>" maxlength="15" style="width:150px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Tipe</td>
				    <td valign="top">:</td>
				    <td>
						<select name="enam">
							<option value="Admin" <?php if ($dview[6]=="Admin") {echo "selected"; } ?>>Admin</option>
							<option value="Panitia" <?php if ($dview[6]=="Panitia") {echo "selected"; } ?>>Panitia</option>
						</select>
					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Status</td>
				    <td valign="top">:</td>
				    <td>
						<select name="tujuh">
							<option value="Y" <?php if ($dview[7]=="Y") {echo "selected"; } ?>>Aktif</option>
							<option value="N" <?php if ($dview[7]=="N") {echo "selected"; } ?>>Non Aktif</option>
						</select>
					</td>
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
					<th width="6%">No </th>
					<th width="34%">Nama </th>
					<th width="18%">No. Telp </th>
				    <th width="10%">Tipe</th>
				    <th width="23%">Status</th>
				    <th width="23%">Password</th>
			      <th width="9%">
  <form method="post" action="index.php?page=setting4"  enctype="multipart/form-data" name="tambah" id="tambah">
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
				$qview1 = "SELECT * FROM panitia";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1))
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="6%"><?php echo "$no"; ?></td>
					<td width="34%"><?php echo "$dview1[1]"; ?></td>
					<td width="18%"><?php echo "$dview1[3]"; ?></td>
				    <td width="10%"><?php echo "$dview1[6]"; ?></td>
				    <td width="23%"><?php if ($dview1[7]=="Y") {echo "Aktif";} elseif ($dview1[7]=="N") {echo "Tidak Aktif";} ?></td>
				    <td width="23%">
                    <form action="index.php?page=setting4" onsubmit="return confirm ('Anda yakin akan mereset password <?php echo $dview1[1]; ?>?')" method="post">
                    <input type="hidden" name="id" value="<?php echo "$dview1[0]"; ?>"/>
                    <input type="submit" name="reset_password" value="Reset" />
                    </form>
                    </td>
			      <td width="9%">
  <form method="post" action="index.php?page=setting4"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo"$dview1[0]"; ?>">
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
if(@$_POST['reset_password']) {
	$id=@$_POST['id'];
	
	//Buat default password
	$pass=date("dmYHis");
	$pass=substr(md5($pass), 0, 8);
	$pass_temp=$pass;
	$pass=md5($pass);
	
	opendb();
	$query="UPDATE panitia SET password_panitia='$pass' WHERE kode_panitia=$id";
	querydb($query);
	closedb();
	?>
	<script language="JavaScript">alert('Password baru = <?php echo $pass_temp; ?>');
	document.location='index.php?page=setting4'</script>
	<?php
}
if ($stat=="ubah1") {
		opendb();
		$query="UPDATE panitia SET username_panitia='$satu', nama='$dua', alamat='$tiga', nomor_telepon='$empat', password_panitia='$lima', tipe='$enam', stat='$tujuh' WHERE kode_panitia=$kode_setting";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=setting4'</script>
		<?php
		}
		
//tambah data
elseif ($stat=="tambah1") {
		opendb();
		$query="INSERT INTO panitia (username_panitia, nama, alamat, nomor_telepon, password_panitia, tipe, stat) VALUES ('$satu', '$dua', '$tiga', '$empat', '$lima', '$enam', '$tujuh')";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Data berhasil disimpan.');
		document.location='index.php?page=setting4'</script>
		<?php
		}
?>