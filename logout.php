<?php
session_start();
unset($_SESSION['sesclnpsb']);
session_destroy();
?>
<script language="JavaScript">alert('Anda Sudah Berhasil Keluar');
document.location='index.php'</script>