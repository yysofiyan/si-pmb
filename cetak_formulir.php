<?php
session_start();
include "./config.php";
include "./koneksi.php";

$nopen=$_REQUEST['nopen'];
?>

<style>
body { 
	font-family:Arial, Helvetica, sans-serif; 
	font-size:12px; 
	color:#000; 
}

table {
	font-size: 12px;
	text-align: left;
}

#tabel table {
	font-size: 12px;
	text-align: left;
}

#tabel table tr td { 
	padding:7px 0px;
}

</style>
<?php 
  opendb();
  $q_cek="SELECT COUNT(*) as jml FROM tb_pendaftaran WHERE cek_tinggi=1 AND cek_syarat=1 AND cek_pembayaran=1 AND  nomor_pendaftaran='$nopen'";
  $h_cek=querydb($q_cek);
  $d_cek=mysql_fetch_array($h_cek);
  if($d_cek[0]==0) {
?>
	<script language="JavaScript">alert('Maaf Anda belum dapat mencetak formulir.'); history.go(-1); </script>
<?php
  } else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulir</title>
</head>

<body>
	<?php 
    opendb();
    $qdatadiri="SELECT a.*, b.tahun FROM tb_pendaftaran as a, setting as b WHERE a.kode_setting=b.kode_setting AND a.nomor_pendaftaran='$nopen'";
    $hdatadiri=querydb($qdatadiri);
    closedb();
    $ddatadiri=mysql_fetch_array($hdatadiri);
	$tahun_plus=$ddatadiri['tahun']+1;
	$tahun_akademik=$ddatadiri['tahun']."/".$tahun_plus;
    ?>
<div style="tabel">
<table width="750" border="0" cellspacing="0" cellpadding="4px">
	<tr>
    	<td colspan="5" align="center">
        <span style="font-size:18px; text-decoration:underline; font-weight:bold;">TANDA PESERTA UJIAN</span><br />
        <span style="font-size:13px;">STKIP 11 APRIL SUMEDANG</span><br />
        <span style="font-size:13px;">TAHUN AKADEMIK <?php echo $tahun_akademik; ?></span><br />
        <div style="float:right; margin-right:40px; text-decoration:underline;">Untuk Peserta</div>   
		</td>
    </tr>
	<tr>
        <td colspan="5">&nbsp;</td>
    </tr>
	<tr>
        <td width="157">Nama STKIP 11 APRIL SUMEDANG</td>
        <td width="13">:</td>
        <td colspan="3"><b>Jl. Angkrek Situ No.19 Sumedang Utara 45323 </b></td>
    </tr>
	<tr>
        <td>Jurusan/Prodi Pilihan</td>
        <td>:</td>
        <td colspan="3">        <?php
					  	opendb();
						$q_jur1="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_1]";
						$h_jur1=querydb($q_jur1);
						$d_jur1=mysql_fetch_array($h_jur1);
					  ?>
				      1. <?php echo $d_jur1['jurusan']; ?>
					  <br /> 
                      <?php
					  	opendb();
						$q_jur2="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_2]";
						$h_jur2=querydb($q_jur2);
						closedb();
						$d_jur2=mysql_fetch_array($h_jur2);
					  ?>
				      2. <?php echo $d_jur2['jurusan']; ?></td>
    </tr>
	<tr>
        <td>NOMOR UJIAN</td>
        <td>:</td>
        <td colspan="3" style="font-size:15px; font-weight:bold;"><?php echo "$ddatadiri[nomor_pendaftaran]"; ?></td>
    </tr>
	<tr>
        <td>NAMA LENGKAP</td>
        <td>:</td>
        <td colspan="3" style="font-size:15px; font-weight:bold; text-transform:uppercase;"><?php echo "$ddatadiri[nama_lengkap]"; ?></td>
    </tr>
	<tr>
        <td>LOKASI TEST</td>
        <td>:</td>
        <td colspan="3" style="font-size:15px; text-transform:uppercase;"><?php echo "$ddatadiri[tempat_test]"; ?></td>
    </tr>
	<tr>
        <td>NOMOR KTP</td>
        <td>:</td>
        <td colspan="3" style="font-size:15px; text-transform:uppercase;"><?php echo "$ddatadiri[no_ktp]"; ?></td>
    </tr>
	<tr>
        <td colspan="5">&nbsp;</td>
    </tr>
	<tr>
        <td><img src="./images_foto/thumb/<?php echo "$ddatadiri[foto]"; ?>" width="130" /></td>
        <td>Stempel</td>
        <td width="220" style="font-size:15px; font-weight:bold; text-transform:uppercase;">&nbsp;</td>
        <td width="132" align="center"><div style="border:0px solid #333; width:130px; height:80px; text-align:center;"></div>Paraf Petugas</td>
        <td width="188" align="center"><div style="border:1px solid #333; width:130px; height:80px; text-align:center;"></div>Tanda Tangan Peserta</td>
    </tr>
</table>
</div>
</body>
</html>
<?php } ?>