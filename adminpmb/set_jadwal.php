<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	
	if ($stat=="ubah")
	{
	opendb();
	$qview = "SELECT * FROM jadwal_pmb WHERE kode_jadwal=$kode_setting AND kode_setting='$dtahun[0]'";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Jadwal PMB - Ubah Data"; } elseif ($stat=="tambah") { echo"Jadwal PMB - Tambah Data"; } else { echo"Jadwal PMB"; } echo " - Tahun $dtahun[tahun]"; ?></h2>
	<?php if ($stat!="") { ?>
	<form method="post" action="index.php?page=setting2" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php if ($stat=="ubah") { echo"ubah1"; } else { echo"tambah1"; } ?>">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="16%">Jadwal</td>
					<td width="1%">:</td>
					<td width="83%">
                    <select name="kode_khusus">
                    	<option value="J1" <?php if($dview[1]=="J1") { echo "selected"; } ?>>J1 - Pendaftaran, Pengumpulan Berkas dan Pembayaran</option>
                    	<option value="J2" <?php if($dview[1]=="J2") { echo "selected"; } ?>>J2 - Test Tertulis</option>
                    	<option value="J3" <?php if($dview[1]=="J3") { echo "selected"; } ?>>J3 - Pengumuman Hasil Test Tertulis</option>
                    	<option value="J4" <?php if($dview[1]=="J4") { echo "selected"; } ?>>J4 - Daftar Ulang</option>
                    	<option value="J5" <?php if($dview[1]=="J5") { echo "selected"; } ?>>J5 - Test Kesehatan</option>
                    	<option value="J6" <?php if($dview[1]=="J6") { echo "selected"; } ?>>J5 - Pengumuman Hasil Test Kesehatan</option>
                    </select>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tanggal Aktif</td>
					<td valign="top">:</td>
					<td><input type="text" name="tanggal_awal" value="<?php if ($dview[2]=="0000-00-00" or $dview[2]=="1970-01-01" or $dview[2]=="") { echo"$pub_tgl"; } else { echo date('d-m-Y', strtotime($dview[2])); } ?>" style="width:120px;"> 
                            <script language="JavaScript">
							var o_cal = new tcal ({
								// form name
								'formname': 'test',
								// input name
								'controlname': 'tanggal_awal'
							});
								// individual template parameters can be modified via the calendar variable
							o_cal.a_tpl.yearscroll = true;
							o_cal.a_tpl.weekstart = 1;
							</script>                
                    s/d <input type="text" name="tanggal_akhir" value="<?php if ($dview[3]=="0000-00-00" or $dview[3]=="1970-01-01" or $dview[3]=="") { echo"$pub_tgl"; } else { echo date('d-m-Y', strtotime($dview[3])); } ?>" style="width:120px;">
                            <script language="JavaScript">
							var o_cal = new tcal ({
								// form name
								'formname': 'test',
								// input name
								'controlname': 'tanggal_akhir'
							});
								// individual template parameters can be modified via the calendar variable
							o_cal.a_tpl.yearscroll = true;
							o_cal.a_tpl.weekstart = 1;
							</script>                
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
                    <th width="8%">No.</th>
					<th width="9%">Kode</th>
					<th width="31%">Tanggal Aktif</th>
					<th width="47%">Kegiatan</th>
			      <th width="5%">
<form method="post" action="index.php?page=setting2"  enctype="multipart/form-data" name="tambah" id="tambah">
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
				$qview1 = "SELECT * FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' order by tanggal_awal ASC";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="8%"><?php echo "$no"; ?></td>
					<td width="9%"><?php echo "$dview1[1]"; ?></td>
					<td width="31%"><?php echo "$dview1[2] s/d $dview1[3]"; ?></td>
					<td width="47%"><?php echo "$dview1[4]"; ?></td>
			      <td width="5%">
<form method="post" action="index.php?page=setting2"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo"$dview1[0]"; ?>">
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
$kode_khusus=$_POST['kode_khusus'];
$tanggal_awal=date("Y-m-d", strtotime($_POST['tanggal_awal']));
$tanggal_akhir=date("Y-m-d", strtotime($_POST['tanggal_akhir']));

if($kode_khusus=="J1") { $kegiatan="Pendaftaran, Pengumpulan Berkas dan Pembayaran"; }
elseif($kode_khusus=="J2") { $kegiatan="Test Tertulis"; }
elseif($kode_khusus=="J3") { $kegiatan="Pengumuman Hasil Test Tertulis"; }
elseif($kode_khusus=="J4") { $kegiatan="Daftar Ulang"; }
elseif($kode_khusus=="J5") { $kegiatan="Test Kesehatan"; }
elseif($kode_khusus=="J6") { $kegiatan="Pengumuman Hasil Test Kesehatan"; }

//Script untuk pemrosesan data :::
//ubah data
if ($stat=="ubah1") {
		opendb();
		$qCek="SELECT count(*) FROM jadwal_pmb WHERE kode_khusus='$kode_khusus' AND kode_setting='$dtahun[0]' AND kode_jadwal!='$kode_setting'";
		$hCek=querydb($qCek);
		closedb();
		$dCek=mysql_fetch_array($hCek);
		
		if($dCek[0]==0){
			opendb();
			$query="UPDATE jadwal_pmb SET kode_khusus='$kode_khusus', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', kegiatan='$kegiatan', kode_setting='$dtahun[0]' WHERE kode_jadwal=$kode_setting";
			querydb($query);
			closedb();
			?>
			<script language="JavaScript">alert('Perubahan berhasil disimpan.');
			document.location='index.php?page=setting2'</script>
			<?php
		} else {
			?>
			<script language="JavaScript">alert('Jadwal sudah ada.');
			document.location='index.php?page=setting2'</script>
			<?php
		}
	}
		
//tambah data
elseif ($stat=="tambah1") {
		opendb();
		$qCek="SELECT count(*) FROM jadwal_pmb WHERE kode_khusus='$kode_khusus' AND kode_setting='$dtahun[0]'";
		$hCek=querydb($qCek);
		closedb();
		$dCek=mysql_fetch_array($hCek);
		
		if($dCek[0]==0){
			opendb();
			$query="INSERT INTO jadwal_pmb (kode_khusus, tanggal_awal, tanggal_akhir, kegiatan, kode_setting) VALUES ('$kode_khusus', '$tanggal_awal', '$tanggal_akhir', '$kegiatan', '$dtahun[0]')";
			querydb($query);
			closedb();
			?>
			<script language="JavaScript">alert('Data berhasil disimpan.');
			document.location='index.php?page=setting2'</script>
			<?php
		} else {
			?>
			<script language="JavaScript">alert('Jadwal sudah ada.');
			document.location='index.php?page=setting2'</script>
			<?php
		}
	}
?>