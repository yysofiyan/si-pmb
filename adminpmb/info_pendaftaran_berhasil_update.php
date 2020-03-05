<?php
include "../config.php";
include "../koneksi.php";

$judul=$_POST['judul'];
$isi=$_POST['isi'];
$stat=$_POST['stat'];
$tgl=date("Y")."-".date("n")."-".date("d");

if ($stat=="ubah") {
		opendb();
		$query="UPDATE psb_statis_one SET judul='$judul', isi='$isi', tgl='$tgl' WHERE id_psb_statis_one=7";
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=pendaftaran-berhasil'</script>
<?php
	}
else
	{
?>
		<script language="JavaScript">document.location='index.php?page=pendaftaran-berhasil'</script>
<?php
	}
?>