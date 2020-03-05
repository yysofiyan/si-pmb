<?php
session_start();
unset($_SESSION['admpsb']);
session_destroy();
?>
<script language="JavaScript">alert('Anda Sudah Berhasil Keluar');
document.location='login-page.php'</script>