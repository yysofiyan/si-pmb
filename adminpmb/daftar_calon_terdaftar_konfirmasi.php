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
				  <form id="caricari" action="daftar_calon_terdaftar_konfirmasi.php?stat=<?php echo"$stat"; ?>" method="get"> 
				  <tr bgcolor="#FFFFFF" valign="middle">
				  	<td width="2%"><img src="../images/miniarrow-down-blue.png" width="20px"/></td>
					<td width="17%">Urut Berdasar &gt; <a href="daftar_calon_terdaftar_konfirmasi.php?stat=1&carinya=<?php echo"$carinya"; ?>">Nomor Pendaftaran</a> | <a href="daftar_calon_terdaftar_konfirmasi.php?stat=2&carinya=<?php echo"$carinya"; ?>">Nama</a> </td>
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
					<td width="2%">Syarat</td>
					<td width="5%" bgcolor="#FF9900"><b>Verifikasi</b></td>
					<td width="3%">No. Pend </td>
					<td width="9%">Nama</td>
					<td width="3%">JK</td>
					<td width="9%">Pilihan Jurusan I</td>
				    <td width="5%">Ke Bank</td>
				    <td width="6%">Jumlah Transfer</td>
				    <td width="38%">Keterangan</td>
				    <td width="20%">Tgl/Waktu Daftar</td>
				  </tr>
				<?php
				opendb();
				if ($stat<>2) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap,  
							a.jenis_kelamin, a.waktu_daftar, b.ke_bank, b.kode_konfirmasi_pembayaran, 
							b.jumlah_Transfer, b.keterangan, b.status, c.jurusan
                    		FROM tb_pendaftaran as a, konfirmasi_pembayaran as b, jurusan as c
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								AND a.nomor_pendaftaran IN (SELECT nomor_pendaftaran FROM cek_syarat) AND a.kode_setting='$dtahun[0]'
								AND a.nomor_pendaftaran=b.nomor_pendaftaran AND a.jurusan_1=c.kode_jurusan
                    		ORDER BY a.nomor_pendaftaran ASC";
				}
				elseif ($stat==2) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap,  
							a.jenis_kelamin, a.waktu_daftar, b.ke_bank, b.kode_konfirmasi_pembayaran, 
							b.jumlah_Transfer, b.keterangan, b.status, c.jurusan
                    		FROM tb_pendaftaran as a, konfirmasi_pembayaran as b, jurusan as c
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								AND a.nomor_pendaftaran IN (SELECT nomor_pendaftaran FROM cek_syarat) AND a.kode_setting='$dtahun[0]'
								AND a.nomor_pendaftaran=b.nomor_pendaftaran AND a.jurusan_1=c.kode_jurusan
							ORDER BY a.nama_lengkap ASC";
				}
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				//$nilai=substr($dview1[2], 0, 5);
				
				opendb();
				$qsyaratjml2 = "SELECT a.* FROM syarat as a, cek_syarat as b WHERE a.kode_syarat=b.kode_syarat AND a.status='Y' 
								AND b.nomor_pendaftaran='$dview1[nomor_pendaftaran]' AND b.status=1 AND a.kode_setting='$dtahun[0]'";
				$hsyaratjml2 = querydb($qsyaratjml2);
				closedb();
				$dsyaratjml2 = mysql_num_rows($hsyaratjml2);
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="2%"><?php if ($dsyaratjml2==$dsyaratjml) { echo"<img src='../images/tag-blue.png' title='Persyaratan Sudah Lengkap'/>"; } else { echo"<img src='../images/tag-red.png' title='Persyaratan Belum Lengkap'/>"; } ?></td>
					<td align="center">
                    <?php if($dview1['status']==0) { ?>
                    <a href="daftar_calon_terdaftar_konfirmasi_save.php?idx=<?php echo "$dview1[nomor_pendaftaran]"; ?>&id=<?php echo "$dview1[kode_konfirmasi_pembayaran]"; ?>&stat=1" title="Klik untuk verifikasi (Jika data sudah benar).">Belum Verifikasi</a>
                    <?php } else { ?>
                    <a href="daftar_calon_terdaftar_konfirmasi_save.php?idx=<?php echo "$dview1[nomor_pendaftaran]"; ?>&id=<?php echo "$dview1[kode_konfirmasi_pembayaran]"; ?>&stat=0" title="Klik untuk un-verifikasi (Jika ada kesalahan data).">Verifikasi OK</a>
                    <?php } ?>
                    </td>
					<td width="3%"><?php echo "$dview1[nomor_pendaftaran]"; ?></td>
					<td width="9%"><?php echo "$dview1[nama_lengkap]"; ?></td>
					<td width="3%"><?php if($dview1[jenis_kelamin]==1) { echo "Pria"; } elseif($dview1[jenis_kelamin]==2) { echo "Wanita"; } ?></td>
					<td width="9%"><?php echo "$dview1[jurusan]"; ?></td>
				    <td width="5%"><?php echo "$dview1[ke_bank]"; ?></td>
				    <td width="6%"><?php echo "$dview1[jumlah_Transfer]"; ?></td>
				    <td width="38%"><?php echo "$dview1[keterangan]"; ?></td>
				    <td width="20%"><?php echo "$dview1[waktu_daftar]"; ?></td>
				  </tr>
				<?php } ?>
	  </table>
	</div>
</div>
</body>