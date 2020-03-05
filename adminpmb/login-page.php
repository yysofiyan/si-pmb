<?php
include "../config.php";
include "../koneksi.php";

$page=$_REQUEST['page'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Admin Program PMB - anindyadev.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/arial.js"></script>
<script type="text/javascript" src="../js/cuf_run.js"></script>
<!-- CuFon ends -->
</head>
<body>
<div id="loginboxTop" style="text-align:center;">Admin | Panitia</div>
<div align="center" style="color:#FFFFFF;">PMB "STKIP 11 APRIL SUMEDANG" | Jalur Umum - Tahun <?php echo date('Y'); ?></div>
<div id="loginbox">
	<div id="loginboxin">
    	<h3>Login Admin</h3>
        <form action="login_periksa.php" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="29%">&nbsp;</td>
            <td width="9%">&nbsp;</td>
            <td width="62%">&nbsp;</td>
          </tr>
          <tr valign="middle">
            <td>Username</td>
            <td>:</td>
            <td><input name="username" type="text" size="25" maxlength="20" class="txt"/></td>
          </tr>
          <tr valign="middle">
            <td>Password</td>
            <td>:</td>
            <td><input name="pass" type="password" size="25" maxlength="20" class="txt"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Login" class="btn"/></td>
          </tr>
        </table>
        </form>
    </div>
    <div style="margin:10px; text-align:center;">
        Untuk login gunakan Username <b>"admin"</b> dan Password <b>"a"</b><br />
        <div style="border-bottom:1px solid #CCC; height:10px; margin-bottom:10px;"></div>
        Developed By <a href="https://yanyan-sofiyan.com/" target="_blank">Yanyan Sofiyan,M.Kom.</a><br />
        Hak Cipta © 2018 STKIP 11 April Sumedang. Semua Hak Dilindung.<a href="#" target="_blank"></a><br />
    </div>
</div>


</body>
</html>