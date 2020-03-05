<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	$tanggal=date("Y-m-d");
	
	if ($stat=="ubah")
	{
	opendb();
	$qview = "SELECT * FROM soal_bank WHERE kode_soal_bank='$kode_setting'";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	}
	?>
	
	<h2><?php if ($stat=="ubah") { echo"Daftar Soal - Ubah Data"; } elseif ($stat=="tambah") { echo"Daftar Soal - Tambah Data"; } else { echo"Daftar Soal"; } ?></h2>
	<?php if ($stat<>"") { ?>
	<form method="post" action="index.php?page=daftar-soal" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="<?php if ($stat=="ubah") { echo"ubah1"; } else { echo"tambah1"; } ?>">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Kategori Soal</td>
					<td width="2%">:</td>
					<td width="75%">
                      <select name="kategori">
						<?php
                          opendb();
                          $queryx="select * FROM soal_kategori";
                          $hasilqueryx=querydb($queryx);
                          closedb();
                          while ($dkat=mysql_fetch_array($hasilqueryx)) {
                          ?>
                           <option value="<?php echo "$dkat[0]"; ?>" <?php if($dkat[0]==$dview[2]) { echo"selected"; } ?>><?php echo "$dkat[1]"; ?>                           </option>
                          <?php } ?>
                        </select>                    </td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Isi Soal</td>
					<td valign="top">:</td>
					<td>
                    	<textarea name="isi_soal" cols="" rows="" style="width:400px; height:60px;"><?php echo "$dview[1]"; ?></textarea>                    </td>
				  </tr>
                  <?php if($stat<>"ubah") { ?>
					  <?php for($i=0; $i<=4; $i++) { ?>
                      <input type="hidden" name="ja[]" value="ja<?php echo $i+1; ?>" />
                      <tr bgcolor="#FFFFFF">
                        <td valign="top" align="right">Jawaban <?php echo $i+1; ?></td>
                        <td valign="top">:</td>
                        <td>
                        <input type="text" size="60" name="jawab[]" /> 
                        <input type="radio" name="ra_jawab" checked="checked" value="ja<?php echo $i+1; ?>"  />
                        </td>
                      </tr>
                      <?php } ?>
                  <?php } elseif ($stat=="ubah") { ?>
					  <?php
					  $no=0;
					  opendb();
					  $qjawab = "SELECT kode_soal_bank_jawaban, jawaban, kode_soal_bank, status 
					             FROM soal_bank_jawaban WHERE kode_soal_bank='$kode_setting'";
					  $hjawab = querydb($qjawab);
					  closedb();
					  while ($djawab = mysql_fetch_array($hjawab)) {
					  $no=$no+1;
					  ?>
                      <input type="hidden" name="ja[]" value="ja<?php echo $no; ?>" />
                      <input type="hidden" name="id_jawaban[]" value="<?php echo $djawab[0]; ?>" />
                      <tr bgcolor="#FFFFFF">
                        <td valign="top" align="right">Jawaban <?php echo $no; ?></td>
                        <td valign="top">:</td>
                        <td>
                        <input type="text" size="60" name="jawab[]"  value="<?php echo $djawab[1]; ?>"/> 
                        <input type="radio" name="ra_jawab" <?php if($djawab[3]==1) { echo "checked='checked'"; } ?> value="ja<?php echo $no; ?>"  />
                        </td>
                      </tr>
				  <?php } } ?>                  
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
					<th width="4%">No.</th>
					<th width="60%">Soal</th>
					<th width="18%">Kategori</th>
					<th width="13%">Tanggal</th>
<th width="5%">
<form method="post" action="index.php?page=daftar-soal"  enctype="multipart/form-data" name="tambah" id="tambah">
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
				$qview1 = "SELECT a.kode_soal_bank, a.soal, b.nama_kategori, b.keterangan, a.tanggal_input
						   FROM soal_bank as a, soal_kategori as b
						   WHERE a.kode_soal_kategori=b.kode_soal_kategori ORDER BY b.nama_kategori ASC, a.tanggal_input DESC";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="4%"><?php echo "$no"; ?></td>
					<td width="60%"><?php echo "$dview1[1]"; ?></td>
					<td width="18%"><?php echo "$dview1[2]"; ?></td>
					<td width="13%"><?php echo date("d/m/Y", strtotime($dview1[4])); ?></td>
			      <td width="5%">
  <form method="post" action="index.php?page=daftar-soal"  enctype="multipart/form-data" name="ubah" id="ubah<?php echo "$dview1[0]"; ?>">
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
$kategori=$_POST['kategori'];
$isi_soal=$_POST['isi_soal'];
$jawab=$_POST['jawab'];
$ja=$_POST['ja'];
$ra_jawab=$_POST['ra_jawab'];
$id_jawaban=$_POST['id_jawaban'];

//Script untuk pemrosesan data :::
//ubah data
if ($stat=="ubah1") {
		opendb();
		$query="UPDATE soal_bank SET soal='$isi_soal', kode_soal_kategori='$kategori' WHERE kode_soal_bank='$kode_setting'";
		querydb($query);
		closedb();
		
		$jml=count($ja);
		for($j=0; $j<$jml; $j++) {
			if($ja[$j]==$ra_jawab) { $x=1; } else { $x=0; }
			opendb();
			$query="UPDATE soal_bank_jawaban SET jawaban='$jawab[$j]', status='$x' 
			        WHERE kode_soal_bank='$kode_setting' AND kode_soal_bank_jawaban='$id_jawaban[$j]'";
			querydb($query);
			closedb();
		}

		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=daftar-soal'</script>
		<?php
		}
		
//tambah data
elseif ($stat=="tambah1") {
		//Simpan soal
		opendb();
		$query="INSERT INTO soal_bank (soal, kode_soal_kategori, tanggal_input) VALUES ('$isi_soal', '$kategori', '$tanggal')";
		querydb($query);
		closedb();
		//Ambil kode soal yang barusan disimpan
		opendb();
		$qid_soal = "SELECT kode_soal_bank FROM soal_bank WHERE soal='$isi_soal' AND kode_soal_kategori='$kategori'";
		$hid_soal = querydb($qid_soal);
		closedb();
		$did_soal = mysql_fetch_array($hid_soal);
		//simpan jawabannya
		$jml=count($ja);
		for($j=0; $j<$jml; $j++) {
			if($ja[$j]==$ra_jawab) { $x=1; } else { $x=0; }
			opendb();
			$query="INSERT INTO soal_bank_jawaban (jawaban, kode_soal_bank, status) VALUES ('$jawab[$j]', '$did_soal[0]', '$x')";
			querydb($query);
			closedb();
		}
		?>
		<script language="JavaScript">alert('Data berhasil disimpan.');
		document.location='index.php?page=daftar-soal'</script>
		<?php
		}
?>