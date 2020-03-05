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
				  	<td width="2%"><img src="../images/miniarrow-down-blue.png"  width="20px"/></td>
					<td>
						Tidak Lolos Berdasarkan : 
						<a href="daftar_calon_terdaftar_tidak_lolos.php?stat=1">Kelengkapan Persyaratan</a> | 
						<a href="daftar_calon_terdaftar_tidak_lolos.php?stat=2">Nilai UAN Minimum</a> | 
					<a href="daftar_calon_terdaftar_tidak_lolos.php?stat=3">Daya Tampung</a>					</td>
					</tr>
				  </form>
				 </table>
				<table width="1500px" border="0" cellspacing="0" cellpadding="3px">
				  <form id="caricari" action="daftar_calon_terdaftar_lolos.php?stat=<?php echo"$stat"; ?>" method="get"> 
				  <tr bgcolor="#FFFFFF" valign="middle">
				  	<td width="2%"><img src="../images/alert-square-blue.png" width="20px" /></td>
					<td width="22%" style="font-weight:bold; color:#0066CC; font-size:14px; ">
						<?php 
							if ($stat==1) { echo "Tidak Lolos Berdasar Tidak Lengkapnya Persyaratan"; }  
							elseif ($stat==2) { echo "Tidak Lolos Di Bawah Nilai Minimum UAN"; }
							else  { echo "Tidak Lolos - Melebihi Daya Tampung"; } 
						?>					    </td>
                    <td width="76%">
						<?php
							opendb();
							$qsetting="SELECT * FROM psb_setting WHERE status='Y'";
							$hsetting=querydb($qsetting);
							closedb();
							$dsetting=mysql_fetch_array($hsetting);
							echo "Daya tampung maksimal : $dsetting[2] &nbsp;&nbsp;|&nbsp;&nbsp; Nilai UAN Minimal : $dsetting[3]"; 
						?>                    </td>
					</tr>
				  </form>
				 </table>
	</div>
	<div style=" padding:1px; background-color:#CCCCCC; font-size:11px">
				<table width="1500px" border="0" cellspacing="1" cellpadding="3px">
				  <tr bgcolor="#C1C1C1">
				    <td width="4%">No. Pend </td>
					<td width="10%">Nama</td>
					<td width="3%">N. UAN</td>
				    <td width="5%">Tempat Lahir</td>
				    <td width="5%">Tgl. Lahir</td>
				    <td width="2%">Umur</td>
				    <td width="5%">Agama</td>
				    <td width="2%">JK</td>
				    <td width="20%">Alamat</td>
				    <td width="9%">Asal Sekolah</td>
				    <td width="7%">Nama Ortu</td>
				    <td width="7%">Nama Wali</td>
				    <td width="9%">Telah Mendaftar Di</td>
				    <td width="8%">Tgl/Waktu Daftar</td>
			      </tr>
				<?php
				opendb();
				$qset="SELECT * FROM psb_setting WHERE status='Y'";
				$hset=querydb($qset);
				closedb();
				$dset=mysql_fetch_array($hset);
				
				opendb();
				if ($stat==1) {
				$qview1 = "SELECT psb_pendaftaran.nomor_pendaftaran, psb_pendaftaran.nama , SUM(psb_nilai_mapel.nilai) as Jumlah,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar
                    FROM psb_pendaftaran, psb_nilai_mapel, psb_setting
                    WHERE psb_pendaftaran.nomor_pendaftaran=psb_nilai_mapel.nomor_pendaftaran AND psb_setting.status='Y' AND psb_pendaftaran.status_cek_daftar='N' AND (psb_pendaftaran.nomor_pendaftaran LIKE '%" . $carinya . "%' OR psb_pendaftaran.nama LIKE '%" . $carinya . "%')
                    GROUP BY psb_pendaftaran.nomor_pendaftaran,psb_pendaftaran.nama,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar, psb_setting.minimal_nilai
                    ORDER BY psb_pendaftaran.nomor_pendaftaran ASC";
					}
				elseif ($stat==2) {
				$qview1 = "SELECT psb_pendaftaran.nomor_pendaftaran, psb_pendaftaran.nama , SUM(psb_nilai_mapel.nilai) as Jumlah,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar
                    FROM psb_pendaftaran, psb_nilai_mapel, psb_setting
                    WHERE psb_pendaftaran.nomor_pendaftaran=psb_nilai_mapel.nomor_pendaftaran AND psb_setting.status='Y' AND psb_pendaftaran.status_cek_daftar='Y' AND (psb_pendaftaran.nomor_pendaftaran LIKE '%" . $carinya . "%' OR psb_pendaftaran.nama LIKE '%" . $carinya . "%')
                    GROUP BY psb_pendaftaran.nomor_pendaftaran,psb_pendaftaran.nama,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar, psb_setting.minimal_nilai
					HAVING SUM(psb_nilai_mapel.nilai) < psb_setting.minimal_nilai
                    ORDER BY SUM(psb_nilai_mapel.nilai) DESC, psb_pendaftaran.tanggal_daftar ASC";
					}
				else {
				$qview1 = "SELECT psb_pendaftaran.nomor_pendaftaran, psb_pendaftaran.nama , SUM(psb_nilai_mapel.nilai) as Jumlah,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar
                    FROM psb_pendaftaran, psb_nilai_mapel, psb_setting
                    WHERE psb_pendaftaran.nomor_pendaftaran=psb_nilai_mapel.nomor_pendaftaran AND psb_setting.status='Y' AND psb_pendaftaran.status_cek_daftar='Y' AND (psb_pendaftaran.nomor_pendaftaran LIKE '%" . $carinya . "%' OR psb_pendaftaran.nama LIKE '%" . $carinya . "%')
                    GROUP BY psb_pendaftaran.nomor_pendaftaran,psb_pendaftaran.nama,
                    psb_pendaftaran.tempat_lahir, psb_pendaftaran.tanggal_lahir, psb_pendaftaran.umur, psb_pendaftaran.agama,
                    psb_pendaftaran.jenis_kelamin, psb_pendaftaran.alamat_calon, psb_pendaftaran.asal_sekolah, psb_pendaftaran.nama_orang_tua,
                    psb_pendaftaran.nama_wali, psb_pendaftaran.telah_mendaftar_di, psb_pendaftaran.tanggal_daftar, psb_setting.minimal_nilai
					HAVING SUM(psb_nilai_mapel.nilai) >= psb_setting.minimal_nilai
                    ORDER BY SUM(psb_nilai_mapel.nilai) DESC, psb_pendaftaran.tanggal_daftar ASC LIMIT $dset[2], 10000000";
					}
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$nilai=substr($dview1[2], 0, 5);
				?>
				  <tr bgcolor="#FFFFFF" valign="middle">
				    <td width="4%"><?php echo "$dview1[0]"; ?></td>
					<td width="10%"><?php echo "$dview1[1]"; ?></td>
					<td width="3%"><?php echo "$nilai"; ?></td>
				    <td width="5%"><?php echo "$dview1[3]"; ?></td>
				    <td width="5%"><?php echo "$dview1[4]"; ?></td>
				    <td width="2%"><?php echo "$dview1[5]"; ?></td>
				    <td width="5%"><?php echo "$dview1[6]"; ?></td>
				    <td width="2%"><?php echo "$dview1[7]"; ?></td>
				    <td width="20%"><?php echo "$dview1[8]"; ?></td>
				    <td width="9%"><?php echo "$dview1[9]"; ?></td>
				    <td width="7%"><?php echo "$dview1[10]"; ?></td>
				    <td width="7%"><?php echo "$dview1[11]"; ?></td>
				    <td width="9%"><?php echo "$dview1[12]"; ?></td>
				    <td width="8%"><?php echo "$dview1[13]"; ?></td>
			      </tr>
				<?php } ?>
	  </table>
	</div>
</div>
</body>