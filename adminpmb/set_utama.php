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
	$qview = "SELECT * FROM setting WHERE kode_setting=$kode_setting";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Setting Utama - Ubah Data"; } elseif ($stat=="tambah") { echo"Setting Utama - Tambah Data"; } else { echo"Setting Utama"; } ?></h2>
	<?php if ($stat<>"") { ?>
	<form method="post" action="index.php?page=setting1" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php if ($stat=="ubah") { echo"ubah1"; } else { echo"tambah1"; } ?>">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="22%">Tahun</td>
					<td width="2%">:</td>
					<td colspan="4"><input type="text" name="satu" value="<?php echo "$dview[1]"; ?>" maxlength="4" style="width:150px;"></td>
				  </tr>
                  <!--
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Target Mahasiswa</td>
					<td valign="top">:</td>
					<td colspan="4"><input type="text" name="dua" value="<?php echo "$dview[2]"; ?>" maxlength="4" style="width:150px;"></td>
				  </tr>
                  -->
                  <!--
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Total nilai minimum </td>
				    <td valign="top">:</td>
				    <td colspan="4"><input type="text" name="tiga" value="<?php echo "$dview[2]"; ?>" maxlength="5" style="width:150px;"></td>
			      </tr>
                  -->
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Status</td>
				    <td valign="top">:</td>
				    <td colspan="4">
						<select name="empat">
							<option value="Y" <?php if ($dview[3]=="Y") {echo "selected"; } ?>>Aktif</option>
							<option value="N" <?php if ($dview[3]=="N") {echo "selected"; } ?>>Non Aktif</option>
						</select>
					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Kategori Soal Test Latihan</td>
				    <td valign="top">:</td>
				    <td colspan="4"></td>
			      </tr>
                  <?php
				  opendb();
				  $qkat="SELECT kode_soal_kategori, nama_kategori FROM soal_kategori";
				  $hkat=querydb($qkat);
				  closedb();
				  while($dkat=mysql_fetch_array($hkat)){ 
				  		opendb();
				  		$qkat2="SELECT * FROM setting_soal_kategori WHERE kode_soal_kategori='$dkat[0]' 
								AND kode_setting='$dview[0]'";
						$hkat2=querydb($qkat2);
						closedb();
						$dkat2=mysql_fetch_array($hkat2);
				  ?>
				  <tr bgcolor="#FFFFFF">
					<td>&nbsp;</td>
					<td></td>
					<td width="5%">&diams;<input type="hidden" name="kodex[]" value="<?php echo $dkat['kode_soal_kategori']; ?>" <?php if($dkat2[0]<>"") { echo "checked"; } ?> /></td>
					<td width="46%"><?php echo $dkat['nama_kategori']; ?></td>
					<td width="12%">Jml. Soal</td>
					<td width="13%"><input name="jumlah[]" type="text" value="<?php echo $dkat2['jumlah']; ?>" size="10" max="3"/></td>
				  </tr>
                  <?php } ?>
				</table>
				</table>
	<div align="right" style=" background-color:#ffd318; border:1px solid; border-bottom-color:#999999; padding:3px; -moz-border-radius:5px 5px 5px 5px; -webkit-border-radius:5px 5px 5px 5px;">
	<input type="submit" name="submit" value="Simpan"></div>
	</form>
	<br>
	<?php } ?>
	<div style=" padding:1px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#C1C1C1">
                    <th width="10%">No.</th>
					<th width="18%">Tahun</th>
                    <!--
					<th width="25%">Target Mahasiswa</th>
					-->
                    <!--
                    <th width="22%">Total nilai minimum </th>
                    -->
				    <th width="27%">Status</th>
			      <th width="8%">
  <form method="post" action="index.php?page=setting1"  enctype="multipart/form-data" name="tambah" id="tambah">
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
				$qview1 = "SELECT * FROM setting";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="10%"><?php echo "$no"; ?></td>
					<td width="18%"><?php echo "$dview1[1]"; ?></td>
                    <!--
					<td width="25%"><?php echo "$dview1[2]"; ?></td>
                    <td width="22%"><?php echo "$dview1[2]"; ?></td>
                    -->
				    <td width="27%"><?php if($dview1[3]=="Y") { echo "Aktif"; } else { echo"Tidak Aktif"; } ?></td>
			      <td width="8%">
  <form method="post" action="index.php?page=setting1"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo"$dview1[0]"; ?>">
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
$kodex=$_POST['kodex'];
$jumlah=$_POST['jumlah'];
$jml=count($kodex);

if ($stat=="ubah1") {
		opendb();
		$query="UPDATE setting SET tahun='$satu', nilai_minimum='$tiga', status='$empat' WHERE kode_setting=$kode_setting";
		querydb($query);
		closedb();
		
		for($i=0; $i<$jml; $i++) {
			opendb();
			$qview2 = "SELECT count(*) FROM setting_soal_kategori WHERE kode_soal_kategori='$kodex[$i]' AND kode_setting=$kode_setting";
			$hview2 = querydb($qview2);
			closedb();
			$dview2 = mysql_fetch_array($hview2);
			
			echo "SELECT count(*) FROM setting_soal_kategori WHERE kode_soal_kategori='$kodex[$i]' AND kode_setting=$kode_setting";
			if($dview2[0]==0) {
				opendb();
				$query="INSERT INTO setting_soal_kategori (kode_soal_kategori, kode_setting, jumlah) 
						VALUES ('$kodex[$i]', '$kode_setting', '$jumlah[$i]')";
				querydb($query);
				closedb();
			}
			else {
				opendb();
				$query="UPDATE setting_soal_kategori SET jumlah='$jumlah[$i]' 
						WHERE kode_soal_kategori='$kodex[$i]' AND kode_setting=$kode_setting";
				querydb($query);
				closedb();
			}
		}
		
		?>
		<script language="JavaScript">alert('Data berhasil diubah.');
		document.location='index.php?page=setting1'</script>
		<?php
		}
		
//tambah data
elseif ($stat=="tambah1") {
		opendb();
		$query="INSERT INTO setting (tahun, nilai_minimum, status) 
				VALUES ('$satu', '$tiga', '$empat')";
		querydb($query);
		closedb();
		
		opendb();
		$qview2 = "SELECT kode_setting FROM setting WHERE tahun='$satu'";
		$hview2 = querydb($qview2);
		closedb();
		$dview2 = mysql_fetch_array($hview2);
		
		for($i=0; $i<$jml; $i++) {
			opendb();
			$query="INSERT INTO setting_soal_kategori (kode_soal_kategori, kode_setting, jumlah) 
					VALUES ('$kodex[$i]', '$dview2[0]', '$jumlah[$i]')";
			querydb($query);
			closedb();
		}
		?>
		<script language="JavaScript">alert('Data berhasil disimpan.');
		document.location='index.php?page=setting1'</script>
		<?php
		
		}
?>