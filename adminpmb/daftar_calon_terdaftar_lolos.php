<?php
include "../config.php";
include "../koneksi.php";
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
				<table width="1500px" border="0" cellspacing="0" cellpadding="3px">
				  <form id="caricari" action="daftar_calon_terdaftar_lolos.php?stat=<?php echo"$stat"; ?>" method="get"> 
				  <tr bgcolor="#FFFFFF" valign="middle">
				  	<td width="2%"><img src="../images/miniarrow-right-blue.png"  width="20px"/></td>
					<td width="81%">
						<?php
						opendb();
						$qsetting="SELECT * FROM setting WHERE status='Y'";
						$hsetting=querydb($qsetting);
						closedb();
						$dsetting=mysql_fetch_array($hsetting);
						echo "Daya tampung maksimal : $dsetting[2] &nbsp;&nbsp;|&nbsp;&nbsp; Nilai Test Minimal : $dsetting[3]"; 
						?>
					</td>
				  </tr>
				  </form>
				 </table>
	</div>
	<div style=" padding:1px; background-color:#CCCCCC; font-size:11px">
				<table width="1500px" border="0" cellspacing="1" cellpadding="3px">
				  <tr bgcolor="#C1C1C1">
				    <td width="3%">No. Pend </td>
					<td width="9%">Nama</td>
					<td width="3%">N. Test</td>
					<td width="3%">NIP</td>
				    <td width="5%">Tempat Lahir</td>
				    <td width="5%">Tgl. Lahir</td>
				    <td width="5%">Status</td>
				    <td width="5%">Pend. Terakhir</td>
				    <td width="2%">JK</td>
				    <td width="7%">Telp.</td>
				    <td width="10%">Email</td>
				    <td width="16%">Alamat</td>
				    <td width="9%">Unit Kerja</td>
				    <td width="8%">Jabatan</td>
				    <td width="10%">Tgl/Waktu Daftar</td>
			      </tr>
				<?php
				opendb();
				$qset="SELECT * FROM setting WHERE status='Y'";
				$hset=querydb($qset);
				closedb();
				$dset=mysql_fetch_array($hset);
				
				//Hitung Semua Soal
				opendb();
				$qjmax="SELECT SUM(jumlah) FROM setting_soal_kategori WHERE kode_setting='$dtahun[0]'";
				$hjmax=querydb($qjmax);
				closedb();
				$djmax=mysql_fetch_array($hjmax);
				$jumlah_total_soal=$djmax[0];
				
				//Jumlah Syarat Wajib
				opendb();
				$qsyaratjml = "SELECT * FROM syarat WHERE status='Y' AND kode_setting='$dset[0]'";
				$hsyaratjml = querydb($qsyaratjml);
				closedb();
				$dsyaratjml = mysql_num_rows($hsyaratjml);
					
				$quota=0;
				opendb();
				$qview1 = "SELECT (((COUNT(DISTINCT(a.kode_soal_bank)))/(SELECT SUM(jumlah) FROM  setting_soal_kategori WHERE kode_setting='$dset[0]'))*100) as nilai, d.nomor_pendaftaran, d.nama_lengkap, d.nip, d.status, d.tempat_lahir, d.tanggal_lahir, 
							d.jenis_kelamin, d.alamat, d.telp, d.kode_pos, d.pendidikan_terakhir, d.email, d.unit_kerja, 
							d.alamat_unit_kerja, d.telp_unit_kerja, d.kode_pos_unit_kerja, d.jabatan, d.pangkat_golongan, 
							d.password, d.password_temp, d.waktu_daftar
						   FROM test_online_hasil as a, soal_bank as b, soal_bank_jawaban as c, tb_pendaftaran as d, test_online as e 
						   WHERE c.kode_soal_bank=b.kode_soal_bank and a.kode_soal_bank=b.kode_soal_bank
						   and a.kode_soal_bank_jawaban=c.kode_soal_bank_jawaban and c.status=1 and a.kode_test=e.kode_test 
						   AND d.nomor_pendaftaran=e.nomor_pendaftaran GROUP BY d.nomor_pendaftaran 
						   ORDER BY (((COUNT(DISTINCT(a.kode_soal_bank)))/(SELECT SUM(jumlah) FROM  setting_soal_kategori WHERE kode_setting='$dset[0]'))*100) DESC";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$nilai=round($dview1[0], 2);
				
				opendb();
				$qcek1="SELECT COUNT(*) FROM tb_pendaftaran as a, konfirmasi_pembayaran as b
                    	WHERE a.nomor_pendaftaran IN (SELECT nomor_pendaftaran FROM cek_syarat) AND a.kode_setting='$dset[0]' AND a.nomor_pendaftaran=b.nomor_pendaftaran AND b.status=1 AND a.nomor_pendaftaran='$dview1[1]'";
				$hcek1=querydb($qcek1);
				closedb();
				$dcek1=mysql_fetch_array($hcek1);
				
				//Jumlah syarat yang dikumpulkan
				opendb();
				$qsyaratjml2 = "SELECT a.* FROM syarat as a, cek_syarat as b WHERE a.kode_syarat=b.kode_syarat AND a.status='Y' 
								AND b.nomor_pendaftaran='$dview1[nomor_pendaftaran]' AND b.status=1";
				$hsyaratjml2 = querydb($qsyaratjml2);
				closedb();
				$dsyaratjml2 = mysql_num_rows($hsyaratjml2);
				?>
                	<!-- <script language="JavaScript">alert("<?php echo $dsyaratjml2; ?>");</script> -->
                <?php
				if($dview1[0]>=$dset['nilai_minimum'] and $dcek1[0]>0 and $dsyaratjml==$dsyaratjml2 and $quota<$dset['target_mahasiswa']) {
					$quota=$quota+1;
				?>
				  <tr bgcolor="#FFFFFF" valign="middle">
				    <td width="3%"><?php echo "$dview1[nomor_pendaftaran]"; ?></td>
					<td width="9%"><?php echo "$dview1[nama_lengkap]"; ?></td>
					<td width="3%"><?php echo "$nilai"; ?></td>
					<td width="3%"><?php echo "$dview1[nip]"; ?></td>
				    <td width="5%"><?php echo "$dview1[tempat_lahir]"; ?></td>
				    <td width="5%"><?php echo "$dview1[tanggal_lahir]"; ?></td>
				    <td width="5%"><?php if($dview1[status]==1) { echo "Kawin"; } elseif($dview1[status]==2) { echo "Belum Kawin"; } elseif($dview1[status]==3) { echo "Janda/Duda"; }   ?></td>
				    <td width="5%"><?php echo "$dview1[pendidikan_terakhir]"; ?></td>
				    <td width="2%"><?php if($dview1[jenis_kelamin]==1) { echo "P"; } elseif($dview1[jenis_kelamin]==2) { echo "W"; } ?></td>
				    <td width="7%"><?php echo "$dview1[telp]"; ?></td>
				    <td width="10%"><?php echo "$dview1[email]"; ?></td>
				    <td width="16%"><?php echo "$dview1[alamat]"; ?></td>
				    <td width="9%"><?php echo "$dview1[unit_kerja]"; ?></td>
				    <td width="8%"><?php echo "$dview1[jabatan]"; ?></td>
				    <td width="10%"><?php echo "$dview1[waktu_daftar]"; ?></td>
			      </tr>
				<?php } } ?>
	  </table>
	</div>
</div>
</body>