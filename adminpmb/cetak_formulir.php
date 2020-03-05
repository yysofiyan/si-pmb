<?php
session_start();
include "../config.php";
include "../koneksi.php";

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
<table width="750" border="0" cellspacing="0" cellpadding="4px">
	<tr>
    	<td width="140"><img src="../images/logo2.png"/></td>
    	<td width="419" align="center">
        <span style="font-size:20px; font-weight:bold;">FORMULIR PENDAFTARAN</span><br />
        <span style="font-size:16px; font-weight:bold;">SELEKSI PENERIMAAN MAHASISWA BARU</span><br />
        <span style="font-size:16px; font-weight:bold;">TAHUN AKADEMIK <?php echo $tahun_akademik; ?></span><br />
        </td>
    	<td width="22"></td>
    	<td width="137" style="border:1px solid #333;" align="center" valign="middle">No. Form:<br />FORM.ADK.06<br />Tgl. Cetak: <br /><?php echo date("d M Y"); ?></td>
    </tr>
	<tr>
	  <td colspan="4"><hr /></td>
  </tr>
</table>
<div id="tabel">
<table width="750" border="0" cellspacing="0" cellpadding="4px">
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Nama Sekolah Tinggi</td>
					<td width="1%">:</td>
					<td width="67%">STKIP 11 April Sumedang</td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jurusan/Program studi</td>
				    <td>:</td>
				    <td>Pilihan 1 : 
                      <?php
					  	opendb();
						$q_jur1="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_1]";
						$h_jur1=querydb($q_jur1);
						$d_jur1=mysql_fetch_array($h_jur1);
					  ?>
				      <?php echo $d_jur1['jurusan']; ?>
					  &nbsp | &nbsp; Pilihan 2 : 
                      <?php
					  	opendb();
						$q_jur2="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_2]";
						$h_jur2=querydb($q_jur2);
						closedb();
						$d_jur2=mysql_fetch_array($h_jur2);
					  ?>
				      <?php echo $d_jur2['jurusan']; ?>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Nomor Pendaftaran</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[nomor_pendaftaran]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Nama Lengkap</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[nama_lengkap]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td><?php if($ddatadiri['jenis_kelamin']==1) { echo "Pria"; } else { echo "Wanita"; } ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Tinggi Badan</td>
				    <td valign="top">:</td>
				    <td><?php echo "$ddatadiri[tinggi_badan]"; ?> cm</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Berat Badan</td>
				    <td valign="top">:</td>
				    <td><?php echo "$ddatadiri[berat_badan]"; ?> kg</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat, Tanggal Lahir </td>
					<td valign="top">:</td>
					<td><?php echo "$ddatadiri[tempat_tinggal], $ddatadiri[tanggal_lahir]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Nomor KTP </td>
					<td valign="top">:</td>
					<td><?php echo "$ddatadiri[no_ktp]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Email </td>
					<td valign="top">:</td>
					<td><?php echo "$ddatadiri[email]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Lengkap <div style="font-size:10px; color:#333;">(Tempat Tinggal)</div></td>
                    <td>:</td>
                    <td><?php echo "$ddatadiri[alamat]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor Telepon</td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[telp]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Kode POS</td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[kode_pos]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Asal Sekolah / Jurusan <div style="font-size:10px; color:#333;">(Nama Sekolah, lokasi/kabupaten)</div></td>
                    <td>:</td>
                    <td><?php echo "$ddatadiri[asal_sekolah_jurusan]"; ?>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Kewarganegaraan</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[kewarganegaraan]"; ?></td>
				  </tr>
</table>
</div>				
	
    <br />
	<br />
<div style="margin-top:500px;"></div>
<div style="tabel">
<table width="750" border="0" cellspacing="0" cellpadding="4px">
	<tr>
    	<td colspan="5" align="center">
        <span style="font-size:18px; text-decoration:underline; font-weight:bold;">TANDA PESERTA UJIAN</span><br />
        <span style="font-size:13px;">PMB - STKIP SEBELAS APRIL SUMEDANG</span><br />
        <span style="font-size:13px;">TAHUN AKADEMIK <?php echo $tahun_akademik; ?></span><br />
        <div style="float:right; margin-right:40px; text-decoration:underline;">Untuk Panitia</div>   
		</td>
    </tr>
	<tr>
        <td colspan="5">&nbsp;</td>
    </tr>
	<tr>
        <td width="157">Nama Sekolah Tinggi</td>
        <td width="13">:</td>
        <td colspan="3"><b>STKIP 11 APRIL SUMEDANG</b></td>
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
        <td><!--<div style="border:1px solid #333; width:130px; height:80px; text-align:center; padding-top:70px;">Tempel Foto</div>-->
        <img src="../images_foto/thumb/<?php echo "$ddatadiri[foto]"; ?>" width="130" />
        </td>
        <td>Stempel</td>
        <td width="220" style="font-size:15px; font-weight:bold; text-transform:uppercase;">&nbsp;</td>
        <td width="132" align="center"><div style="border:0px solid #333; width:130px; height:80px; text-align:center;"></div>Paraf Petugas</td>
        <td width="188" align="center"><div style="border:1px solid #333; width:130px; height:80px; text-align:center;"></div>Tanda Tangan Peserta</td>
    </tr>
</table>
</div>
<br />
<div style="margin-top:500px;"></div>
<div style="tabel">
<table width="750" border="0" cellspacing="0" cellpadding="4px">
    <tr><td style="background-color:#999;">IJAZAH</td></tr>
    <tr><td style="background-color:#999;"><img src="../images_ijazah/thumb/<?php echo "$ddatadiri[ijazah]"; ?>" /></td></tr>
</table>
</div>
</body>
</html>