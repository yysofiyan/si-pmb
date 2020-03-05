<?php
include "../config.php";
include "../koneksi.php";

//Data tahun yang aktif
opendb();
$qtahun = "SELECT * FROM setting WHERE status='Y'";
$htahun = querydb($qtahun);
closedb();
$dtahun = mysql_fetch_array($htahun);

$pilihan=$_REQUEST['pilihan'];
$jurusan=$_REQUEST['jurusan'];
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
				  <form id="caricari" action="daftar_calon_terdaftar_rank.php?stat=<?php echo"$stat"; ?>" method="POST"> 
				  <tr bgcolor="#FFFFFF" valign="middle">
				  	<td width="2%"><img src="../images/miniarrow-down-blue.png" width="20px"/></td>
					<td width="4%">Tampilkan &gt;</td>
					<td width="5%">
                    <select name="pilihan">
                        <option value="0" <?php if($pilihan==0) { echo "selected"; } ?>>- Pilih -</option>
                        <option value="1" <?php if($pilihan==1) { echo "selected"; } ?>>Pilihan 1</option>
                        <option value="2" <?php if($pilihan==2) { echo "selected"; } ?>>Pilihan 2</option>
                    </select>                    </td>
					<td width="9%">
                    <select name="jurusan">
					  <option value="0">- Pilihan Jurusan -</option>
					  <?php
					  	opendb();
						$q_jur1="SELECT * FROM jurusan ORDER BY kode_jurusan ASC";
						$h_jur1=querydb($q_jur1);
						closedb();
						while($d_jur1=mysql_fetch_array($h_jur1)) {
					  ?>
					  <option value="<?php echo $d_jur1['kode_jurusan']; ?>" <?php if($jurusan==$d_jur1['kode_jurusan']) { echo "selected"; } ?>><?php echo $d_jur1['jurusan']; ?></option>
					  <?php } ?>
				    </select>
                    </td>
				  	<td width="2%"><img src="../images/miniarrow-right-blue.png"  width="20px"/></td>
					<td width="11%"><input name="carinya" type="text" size="20" value="<?php echo"$carinya"; ?>" maxlength="30" /></td>
					<td width="67%"><a onclick="document.getElementById('caricari').submit()"><img src="../images/search-blue.png" /></a></td>
				  </tr>
				  </form>
				 </table>
	</div>
	<div style=" padding:1px; background-color:#CCCCCC; font-size:11px">
    <?php if($pilihan!=0 && $jurusan!=0) { ?>
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
					<td width="4%"><b>Lolos</b></td>
					<td width="3%"><b>Nilai</b></td>
					<td width="3%">No. Pend </td>
					<td width="12%">Nama</td>
				    <td width="10%">Pilihan Jurusan <?php if($pilihan==1) { echo "II"; } else { echo "I"; } ?></td>
					<td width="4%">JK</td>
				    <td width="4%">Berat (kg)</td>
				    <td width="11%">Tempat, Tgl. Lahir</td>
				    <td width="6%">Lokasi Test</td>
				    <td width="5%">No. HP/Telp</td>
				    <td width="26%">Alamat</td>
				    <td width="10%">Tgl/Waktu Daftar</td>
				  </tr>
				<?php
				$no=0;
				opendb();
				if ($pilihan==1) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap, a.tinggi_badan, a.berat_badan, a.tempat_lahir, 
						   a.tanggal_lahir, a.jenis_kelamin, a.alamat, a.telp, a.kode_pos, a.asal_sekolah_jurusan, 
						   a.kewarganegaraan, a.jurusan_1, a.jurusan_2, a.tempat_test, a.password, a.password_temp,
						   a.waktu_daftar, a.kode_setting, b.jurusan, a.cek_tinggi, a.cek_nilai, a.cek_syarat, a.cek_pembayaran,
						   a.cek_nilai_lolos_1 as lolos_stat
                    		FROM tb_pendaftaran as a, jurusan as b
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								  AND a.kode_setting='$dtahun[0]' AND a.jurusan_1=b.kode_jurusan AND a.jurusan_1='$jurusan'
								  AND a.cek_tinggi=1 AND a.cek_syarat=1 AND a.cek_pembayaran=1 AND a.cek_nilai>0 
                    		ORDER BY a.cek_nilai DESC, a.waktu_daftar ASC";
				}
				elseif ($pilihan==2) {
				$qview1 = "SELECT a.nomor_pendaftaran, a.nama_lengkap, a.tinggi_badan, a.berat_badan, a.tempat_lahir, 
						   a.tanggal_lahir, a.jenis_kelamin, a.alamat, a.telp, a.kode_pos, a.asal_sekolah_jurusan, 
						   a.kewarganegaraan, a.jurusan_1, a.jurusan_2, a.tempat_test, a.password, a.password_temp,
						   a.waktu_daftar, a.kode_setting, b.jurusan, a.cek_tinggi, a.cek_nilai, a.cek_syarat, a.cek_pembayaran,
						   a.cek_nilai_lolos_2 as lolos_stat
                    		FROM tb_pendaftaran as a, jurusan as b
                    		WHERE (a.nomor_pendaftaran LIKE '%" . $carinya . "%' OR a.nama_lengkap LIKE '%" . $carinya . "%')
								  AND a.kode_setting='$dtahun[0]' AND a.jurusan_2=b.kode_jurusan AND a.jurusan_2='$jurusan'
								  AND a.cek_tinggi=1 AND a.cek_syarat=1 AND a.cek_pembayaran=1 AND a.cek_nilai>0 
                    		ORDER BY a.cek_nilai DESC, a.waktu_daftar ASC";
				}
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="2%"><?php echo $no; ?></td>
				    <td style="vertical-align:middle;"><?php if($dview1['lolos_stat']==1) { echo "Lolos"; } else { echo "Tidak"; } ?> 
                    <span style="margin-right:10px;text-align:right; float:right; margin-top:2px;">
                    <?php
					$nopen=$dview1['nomor_pendaftaran'];
					if($dview1['lolos_stat']==1) { echo "<a href='daftar_calon_terdaftar_rank_save.php?stat=0&id=$nopen&pilihan=$pilihan&jurusan=$jurusan'><img src='../images/pass.png' width='16' title='Unpass'></a>"; }
					else  { echo "<a href='daftar_calon_terdaftar_rank_save.php?stat=1&id=$nopen&pilihan=$pilihan&jurusan=$jurusan'><img src='../images/pass_un.png' width='16' title='Pass'></a>"; }
                    ?>
                    </span>
                    </td>
					<td><span style="color:#06C; font-size:11px; font-weight:800;"><?php echo "$dview1[cek_nilai]"; ?></span></td>
					<td><?php echo "$dview1[nomor_pendaftaran]"; ?></td>
					<td><?php echo "$dview1[nama_lengkap]"; ?></td>
					<td>
                    <?php 
					if($pilihan==1) { $jur=$dview1['jurusan_2']; } else { $jur=$dview1['jurusan_1']; } 
                    opendb();
                    $q_jur1="SELECT jurusan FROM jurusan WHERE kode_jurusan='$jur'";
                    $h_jur1=querydb($q_jur1);
                    closedb();
                    $d_jur1=mysql_fetch_array($h_jur1);
					echo $d_jur1['jurusan'];
					?>
                    </td>
					<td><?php if($dview1[jenis_kelamin]==1) { echo "Pria"; } elseif($dview1[jenis_kelamin]==2) { echo "Wanita"; } ?></td>
				    <td><?php echo "$dview1[berat_badan]"; ?></td>
				    <td><?php echo "$dview1[tempat_lahir], $dview1[tanggal_lahir]"; ?></td>
				    <td><?php echo "$dview1[tempat_test]"; ?></td>
				    <td><?php echo "$dview1[telp]"; ?></td>
				    <td><?php echo "$dview1[alamat]"; ?></td>
				    <td><?php echo "$dview1[waktu_daftar]"; ?></td>
				  </tr>
				<?php } ?>
	  </table>
      <?php } else { ?>
	  	<div style="background-color:#CCC; color:#666; font-size:14px; padding:5px 10px; margin-top:20px; border-top:2px solid #F30;"><marquee direction="left">PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN" PILIH DAHULU "PILIHAN" &amp; "JURUSAN"</marquee></div>
      <?php
	  }
	  ?>
	</div>
</div>
</body>