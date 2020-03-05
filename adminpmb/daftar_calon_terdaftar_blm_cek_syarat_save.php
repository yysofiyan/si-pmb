<?php
include "../config.php";
include "../koneksi.php";
$simpan=$_POST['simpan'];
$stat=$_POST['stat'];
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Halaman Belum Cek Syarat
	$nopen=$_POST['nopen'];
	$syarat=$_POST['syarat'];
	$kode_syarat=$_POST['kode_syarat'];
	
  		$jml = count($syarat);
  		$jml2 = count($kode_syarat);
		if ($jml>0) {
		for ($i=0;$i<$jml2;$i++) {
			opendb();
			$query1="insert into cek_syarat (nomor_pendaftaran, kode_syarat, status) values ('$nopen', '$kode_syarat[$i]', 0)";
			querydb($query1);
			closedb();
		}
		for ($j=0;$j<$jml;$j++) {
			opendb();
			$query2="UPDATE cek_syarat SET status=1 WHERE nomor_pendaftaran='$nopen' AND kode_syarat='$syarat[$j]'";
			querydb($query2);
			closedb();
		} 
			opendb();
			$sumq1="SELECT COUNT(*) FROM syarat WHERE status='Y'";
			$sumh1=querydb($sumq1);
			closedb();
			$sumd1=mysql_fetch_array($sumh1);
			opendb();
			$sumq2="SELECT COUNT(a.kode_syarat) FROM cek_syarat as a, syarat as b WHERE a.nomor_pendaftaran='$nopen' AND a.kode_syarat=b.kode_syarat AND a.status=1 AND b.status='Y'";
			$sumh2=querydb($sumq2);
			closedb();
			$sumd2=mysql_fetch_array($sumh2);
			if ($sumd1[0]==$sumd2[0]) { $status="1"; }
			else { $status="0"; }
			
			opendb();
			$query2="UPDATE tb_pendaftaran SET cek_syarat='$status' WHERE nomor_pendaftaran='$nopen'";
			querydb($query2);
			closedb();
		?>
		<script language="JavaScript">alert('Check persyaratan berhasil disimpan.');
		document.location='daftar_calon_terdaftar_blm_ceksyarat.php'</script>

		<?php 
		}
		else {
		?>
		<script language="JavaScript">alert('Anda belum mencentang satupun, mohon dicek ulang.');
		document.location='daftar_calon_terdaftar_blm_ceksyarat.php'</script>
		<?php } 
?>