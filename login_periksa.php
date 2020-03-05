<?php
session_start();

include("config.php");
include("koneksi.php");
	
$username=$_POST['username'];
$password=md5($_POST['pass']);

$query="SELECT count(*) FROM tb_pendaftaran WHERE nomor_pendaftaran='$username' AND password='$password'";
opendb();
$hasil=mysql_query($query);
$userjum=mysql_fetch_row($hasil);
if ($userjum[0]<>0) {

$_SESSION['sesclnpsb']=$username;
?>

<script language="JavaScript">alert('Anda Telah Berhasil Login');
document.location='index.php?page=formulir-isi'</script>
<?php
} else {
?>

<script language="JavaScript">alert('Username atau Password Anda Salah');
document.location='index.php'</script><?php
}
?>