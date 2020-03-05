<?php
include "../config.php";
include "../koneksi.php";

//Data tahun yang aktif
opendb();
$qtahun = "SELECT * FROM setting WHERE status='Y'";
$htahun = querydb($qtahun);
closedb();
$dtahun = mysql_fetch_array($htahun);

//Hitung Semua Soal
opendb();
$qjmax="SELECT SUM(jumlah) FROM setting_soal_kategori WHERE kode_setting='$dtahun[0]'";
$hjmax=querydb($qjmax);
closedb();
$djmax=mysql_fetch_array($hjmax);
$jumlah_total_soal=$djmax[0];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style2.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/arial.js"></script>
<script type="text/javascript" src="../js/cuf_run.js"></script>
<!-- CuFon ends -->
</head>
<body>

<div class="article">

    <?php
	$stat=$_REQUEST['stat'];
	$carinya=$_REQUEST['carinya'];
	?>
	<div style=" padding:1px; background-color:#CCCCCC; font-size:11px">
				<table width="1700" border="0" cellspacing="0" cellpadding="3px">
				  <form id="caricari" action="daftar_calon_terdaftar_nilai.php?stat=<?php echo"$stat"; ?>" method="get"> 
				  <tr bgcolor="#FFFFFF" valign="middle">
				  	<td width="2%"><img src="../images/miniarrow-down-blue.png" width="20px"/></td>
					<td width="17%">Urut Berdasar &gt; <a href="daftar_calon_terdaftar_nilai.php?stat=1&carinya=<?php echo"$carinya"; ?>">Nomor Pendaftaran</a> | <a href="daftar_calon_terdaftar_nilai.php?stat=2&carinya=<?php echo"$carinya"; ?>">Nama</a> </td>
				  	<td width="2%"><img src="../images/miniarrow-right-blue.png"  width="20px"/></td>
					<td><input name="carinya" type="text" size="30" value="<?php echo"$carinya"; ?>" maxlength="30" /></td>
					<td width="67%"><a onclick="document.getElementById('caricari').submit()"><img src="../images/search-blue.png" /></a></td>
				  </tr>
				  </form>
				 </table>
	</div>
	<div style=" padding:1px; background-color:#CCCCCC; font-size:11px">
				<table width="1700" border="0" cellspacing="1" cellpadding="3px">
				  <tr bgcolor="#C1C1C1">
				  <?php
				  opendb();
				  $qsyaratjml = "SELECT * FROM syarat WHERE status='Y' AND kode_setting='$dtahun[0]'";
				  $hsyaratjml = querydb($qsyaratjml);
				  closedb();
				  $dsyaratjml = mysql_num_rows($hsyaratjml);
				  ?>
					<td width="2%">No</td>
					<td width="8%" bgcolor="#FF9900"><b>Nilai</b></td>
					<td width="4%">No. Pend </td>
					<td width="10%">Nama</td>
				    <td width="11%">Pilihan Jurusan I</td>
					<td width="4%">JK</td>
					<td width="4%">Tinggi (cm)</td>
				    <td width="5%">Berat (kg)</td>
				    <td width="9%">Tempat, Tgl. Lahir</td>
				    <td width="7%">Lokasi Test</td>
				    <td width="8%">No. HP/Telp</td>
				    <td width="19%">Alamat</td>
				    <td width="9%">Tgl/Waktu Daftar</td>
				  </tr>
				<?php
				$no=0;
				opendb();
				if ($stat<>2) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap, a.tinggi_badan, a.berat_badan, a.tempat_lahir, 
						   a.tanggal_lahir, a.jenis_kelamin, a.alamat, a.telp, a.kode_pos, a.asal_sekolah_jurusan, 
						   a.kewarganegaraan, a.jurusan_1, a.jurusan_2, a.tempat_test, a.password, a.password_temp,
						   a.waktu_daftar, a.kode_setting, b.jurusan, a.cek_tinggi, a.cek_nilai
                    		FROM tb_pendaftaran as a, jurusan as b
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								  AND a.kode_setting='$dtahun[0]' AND a.jurusan_1=b.kode_jurusan
                    		ORDER BY a.nomor_pendaftaran ASC";
				}
				elseif ($stat==2) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap, a.nip, a.status, a.tempat_lahir, a.tanggal_lahir, 
							a.jenis_kelamin, a.alamat, a.telp, a.kode_pos, a.pendidikan_terakhir, a.email, a.unit_kerja, 
							a.alamat_unit_kerja, a.telp_unit_kerja, a.kode_pos_unit_kerja, a.jabatan, a.pangkat_golongan, 
							a.password, a.password_temp, a.waktu_daftar, b.kode_test, b.mulai, b.selesai
                    		FROM tb_pendaftaran as a, test_online as b
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								AND a.nomor_pendaftaran IN (SELECT nomor_pendaftaran FROM cek_syarat) AND a.kode_setting='$dtahun[0]'
								AND a.nomor_pendaftaran=b.nomor_pendaftaran
							ORDER BY a.nama_lengkap ASC";
				}
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="2%"><?php echo $no; ?></td>
					<td bgcolor="#66CCFF">
				  <form action="daftar_calon_terdaftar_nilai_save.php" method="post" name="form1" enctype="multipart/form-data">
                    <input type="text" name="nilai" size="5" maxlength="5" value="<?php echo "$dview1[cek_nilai]"; ?>" />
                    <input type="hidden" name="nopen" value="<?php echo "$dview1[nomor_pendaftaran]"; ?>" />
                    <input type="submit" name="update" value="Update" />
				  </form>
                    </td>
					<td><?php echo "$dview1[nomor_pendaftaran]"; ?></td>
					<td><?php echo "$dview1[nama_lengkap]"; ?></td>
					<td><?php echo "$dview1[jurusan]"; ?></td>
					<td><?php if($dview1[jenis_kelamin]==1) { echo "Pria"; } elseif($dview1[jenis_kelamin]==2) { echo "Wanita"; } ?></td>
				    <td style="vertical-align:middle;"><?php echo "$dview1[tinggi_badan]"; ?> 
                    <span style="margin-right:10px;text-align:right; float:right; margin-top:2px;">
                    <?php
					$nopen=$dview1['nomor_pendaftaran'];
					if($dview1['cek_tinggi']==1) { echo "<a href='daftar_calon_terdaftar_cek_tinggi_save.php?stat=0&id=$nopen'><img src='../images/pass.png' width='16' title='Unpass'></a>"; }
					else  { echo "<a href='daftar_calon_terdaftar_cek_tinggi_save.php?stat=1&id=$nopen'><img src='../images/pass_un.png' width='16' title='Pass'></a>"; }
                    ?>
                    </span>
                    </td>
				    <td><?php echo "$dview1[berat_badan]"; ?></td>
				    <td><?php echo "$dview1[tempat_lahir], $dview1[tanggal_lahir]"; ?></td>
				    <td><?php echo "$dview1[tempat_test]"; ?></td>
				    <td><?php echo "$dview1[telp]"; ?></td>
				    <td><?php echo "$dview1[alamat]"; ?></td>
				    <td><?php echo "$dview1[waktu_daftar]"; ?></td>
				  </tr>
				<?php } ?>
	  </table>
	</div>
</div>
</body>