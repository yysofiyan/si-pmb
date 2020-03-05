<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$pub_tgl=date("d-m-Y");
$tgl_sekarang=date("Y-m-d");
$id_berita=$_REQUEST['id_berita'];

include "./config.php";
include "./koneksi.php";

$page=$_REQUEST['page'];
opendb();
$ses_clnpsb=$_SESSION['sesclnpsb'];
if (isset($_SESSION['sesclnpsb']))
{ 
$querycln="SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$ses_clnpsb'";
$hasilcln=querydb($querycln);
$datacln=mysql_fetch_array($hasilcln);
$status_login="";
} else {
$status_login="Maaf Username atau Password salah.";
}

//Data tahun yang aktif
$qtahun = "SELECT * FROM setting WHERE status='Y'";
$htahun = querydb($qtahun);
$dtahun = mysql_fetch_array($htahun);

//CEK JADWAL
//#1
$qjadwal1="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J1'";
$hjadwal1=querydb($qjadwal1);
$djadwal1=mysql_fetch_array($hjadwal1);
//#2
$qjadwal2="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J2'";
$hjadwal2=querydb($qjadwal2);
$djadwal2=mysql_fetch_array($hjadwal2);
//#3
$qjadwal3="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J3'";
$hjadwal3=querydb($qjadwal3);
$djadwal3=mysql_fetch_array($hjadwal3);
//#4
$qjadwal4="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J4'";
$hjadwal4=querydb($qjadwal4);
$djadwal4=mysql_fetch_array($hjadwal4);
//#5
$qjadwal5="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J5'";
$hjadwal5=querydb($qjadwal5);
$djadwal5=mysql_fetch_array($hjadwal5);
//#6
$qjadwal6="SELECT COUNT(*) FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' 
		   AND ('$tgl_sekarang' BETWEEN tanggal_awal AND tanggal_akhir) AND kode_khusus='J6'";
$hjadwal6=querydb($qjadwal6);
closedb();
$djadwal6=mysql_fetch_array($hjadwal6);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PMB - STKIP 11 April Sumedang</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut ICON" href="images/icon.png" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="calendar.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type='text/javascript' src='./js/jquery.min.js?ver=3.1.2'></script>
<script type="text/javascript" src="./js/custom.js"></script>

<script type="text/javascript" src="./js/jquery.validate.js"></script>

<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>

<!-- CuFon ends -->
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">PMB STKIP 11 APRIL SUMEDANG</a></h1>
        <div style="position:relative; color:#FFFFFF; font-size:15px; font-weight:500; left:125px; top:-20px; ">
        Jl. Angkrek Situ No.19 Sumedang | Telp. (0261) 202911 - Email. pmb@stkip11april.ac.id</div> 					
      </div>
      <div id="menu">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php?page=sambutan">Sambutan</a></li>
          <li><a href="index.php?page=alur-pmb">Alur PMB</a></li>
          <li><a href="index.php?page=jadwal-pmb">Jadwal PMB</a></li>
          <li><a href="index.php?page=petunjuk-pmb">Petunjuk PMB</a></li>
          <li><a href="index.php?page=profile">Profile</a></li>
          <li><a href="index.php?page=kontak">Kontak</a></li>
          <li><a href="./adminpmb/">Login Admin</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
 
  <div class="content">
    <div class="content_resize">
      <div class="sidebar">
		<?php include "login.php"; ?>
        <div class="gadget">
          <h3 class="star">Informasi Terbaru</h3>
			<?php
            opendb();
            $qview1 = "SELECT a.*, b.nama FROM informasi as a, panitia as b WHERE a.kode_panitia=b.kode_panitia ORDER BY tanggal DESC LIMIT 0, 6";
            $hview1 = querydb($qview1);
            closedb();
            while ($dview1 = mysql_fetch_array($hview1)) 
            {
            ?>
            <div style="font-size:11px; font-weight:500; color:#003300; "><a href="index.php?page=berita&id_berita=<?php echo "$dview1[0]"; ?>"><?php echo "$dview1[1] <br>"; ?></a></div>
            <div style="font-size:10px; margin-bottom:10px;">Posted by <?php echo "$dview1[6]"; ?> | Date <?php echo date("d/m/Y", strtotime($dview1[3])); ?></div>
                
            <div style="border-bottom:1px dotted #999999; margin:5px 0;"></div>
            <?php } ?>
        </div>
      </div>
      
      <div class="mainbar">
		<?php
			if ($page=="sambutan") { include"info_sambutan.php"; }
			elseif ($page=="formulir" and $djadwal1[0]>0) { include"form_formulir_pendaftaran.php"; }
			elseif ($page=="formulir" and $djadwal1[0]==0) { include"keterangan_2.php"; }
			
			elseif ($page=="alur-pmb") { include"info_alur.php"; }
			elseif ($page=="petunjuk-pmb") { include"info_petunjuk_pmb.php"; }
			elseif ($page=="profile") { include"info_profile.php"; }
			elseif ($page=="kontak") { include"info_kontak.php"; }
			elseif ($page=="alur") { include"info_alur_pendaftaran.php"; }
			elseif ($page=="panitia") { include"info_panitia.php"; }
			elseif ($page=="jadwal-pmb") { include"info_jadwal.php"; }
			elseif ($page=="persyaratan") { include"info_persyaratan.php"; }
			elseif ($page=="pendaftaran-berhasil" and $djadwal1[0]>0) { include"info_pendaftaran_berhasil.php"; }
			elseif ($page=="pendaftaran-berhasil" and $djadwal1[0]==0) { include"keterangan_2.php"; }

			elseif ($page=="konfirmasi-pembayaran" and $djadwal1[0]>0) { include"konfirmasi_pembayaran.php"; }
			elseif ($page=="konfirmasi-pembayaran" and $djadwal1[0]==0) { include"keterangan_2.php"; }

			elseif ($page=="test-online") { include"info_test.php"; }
			elseif ($page=="test-selesai") { include"keterangan_1.php"; }
			
			elseif ($page=="formulir-isi") { include"form_formulir_pendaftaran_isi.php"; }
			//elseif ($page=="formulir-isi-ubah") { include"form_formulir_pendaftaran_isi_ubah.php"; }
			
			//elseif ($page=="daftar-peserta") { include"daftar_calon_terdaftar_frame.php"; }
			elseif ($page=="ubah-password") { include"ubah_password.php"; }
			
			elseif ($page=="daftar-peserta-lolos" and $djadwal3[0]>0) { include"daftar_calon_terdaftar_lolos_frame.php"; }
			elseif ($page=="daftar-peserta-lolos" and $djadwal3[0]==0) { include"keterangan_2.php"; }
			elseif ($page=="daftar-peserta-lolos-final" and $djadwal6[0]>0) { include"daftar_calon_terdaftar_kesehatan_frame.php"; }
			elseif ($page=="daftar-peserta-lolos-final" and $djadwal6[0]==0) { include"keterangan_2.php"; }

			elseif ($page=="berita" and $id_berita<>"") { include"info_berita_view.php"; }
			else { include"info_home.php"; }
		?>
      </div>

      <div class="clr"></div>
    </div>
  </div>

  <div class="footer">
    <div class="footer_resize">
	  <p class="lf"><b><span style="color:#F60;">&copy; 2018 </span>PMB Stkip 11 April Sumedang.</b><a href="https://www.facebook.com/sofiyanyanyan" target="_blank"> All Rights Reserved.</a></p>
      <ul class="fmenu">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php?page=sambutan">Sambutan</a></li>
          <li><a href="index.php?page=petunjuk-pmb">Petunjuk Pengisian</a></li>
          <li><a href="index.php?page=kontak">Kontak</a></li>
      </ul>
    </div>
    <div class="clr"></div>
  </div>
</div>
</body>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "https://www.facebook.com/stkip11april/", // Facebook page ID
            whatsapp: "#", // WhatsApp number
            telegram: "#", // Telegram bot username
            call: "", // Call phone number
            company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
            greeting_message: "Hello, how may we help you? Just send us a message now to get assistance.", // Text of greeting message
            call_to_action: "Message us", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,call,facebook,telegram" // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</html>