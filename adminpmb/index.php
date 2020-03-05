<?php
date_default_timezone_set('Asia/Jakarta');
$pub_tgl=date("d-m-Y");

session_start();
include "../config.php";
include "../koneksi.php";

$ses_admnya=$_SESSION['admpsb'];
if (!isset($_SESSION['admpsb']))
{ ?>
<script language="JavaScript">alert('Anda Harus Login Dulu Untuk Masuk Halaman Ini!');
document.location='login-page.php'</script>
<?php } else { 

$page=$_REQUEST['page'];

//Data Panitia yang login
opendb();
$queryadm="SELECT * FROM panitia WHERE username_panitia='$ses_admnya'";
$hasiladm=querydb($queryadm);
$dataadm=mysql_fetch_array($hasiladm);

//Data tahun yang aktif
$qtahun = "SELECT * FROM setting WHERE status='Y'";
$htahun = querydb($qtahun);
closedb();
$dtahun = mysql_fetch_array($htahun);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Penerimaan Mahasiswa Baru - STKIP 11 April Sumedang</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut ICON" href="../images/icon.png" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="../css/calendar.css" rel="stylesheet" type="text/css" />

<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/arial.js"></script>
<script type="text/javascript" src="../js/cuf_run.js"></script>
<script type="text/javascript" src="../js/kalender.js"></script>
<!-- CuFon ends -->
</head>
<body>

<script language="javascript" type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    plugins : "emotions,advimage",
    elements : "isi",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap,forecolor,backcolor,emotions",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_align:'left'

  });
</script>

<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">PMB STKIP 11 April Sumedang</a></h1>
        <div style="position:relative; color:#FFFFFF; font-size:16px; font-weight:500; left:130px; top:-20px; ">Penerimaan Mahasiswa Baru Jalur Umum</div> 					
      	<div style="float:right; padding-right:30px; margin-top:25px; padding-left:15px; border-left:1px dotted #009900; color:#3FA82D">
         <?php echo "<b>Selamat Datang :</b> $dataadm[1] [ User : $dataadm[4]]<br>Status: $dataadm[6]"; ?>
        </div>
      </div>
      <div id="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="logout_admin.php">Logout</a></li>
          <li><a href="index.php?page=ubah-pasword">Ubah Password</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <!--
  <div class="hbg">
    <div class="hbg_resize">
      <h2>Selamat Datang</h2>
      <p><span style="font-size:16px; color:#0066FF; font-weight:bold; "><?php echo "$dataadm[1] [$dataadm[0]]"; ?></span>
      <br><span style="font-size:14px; color:#FFFFFF; font-weight:bold; ">Stat : <?php echo "$dataadm[6]"; ?></span></p>
      <p><span style="color:#0E5E98;"><big><strong>Penerimaan Siswa Baru Terpadu</strong></big><br/>Anda berada pada sistem Penerimaan Siswa Baru Terpadu pada halaman (Administrator | Panitia), Selamat bekerja.</span></p>
	</div>
  </div>
  -->
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
		<?php
			if ($page=="informasi-static" and $dataadm[6]=="Admin") { include"informasi_static_web.php"; }
			elseif ($page=="informasi" and $dataadm[6]=="Admin") { include"informasi.php"; }
			elseif ($page=="petunjuk" and $dataadm[6]=="Admin") { include"info_petunjuk_pengisian.php"; }
			elseif ($page=="persyaratan" and $dataadm[6]=="Admin") { include"info_persyaratan_psb.php"; }
			elseif ($page=="alur" and $dataadm[6]=="Admin") { include"info_alur_pendaftaran.php"; }
			elseif ($page=="pendaftaran-berhasil" and $dataadm[6]=="Admin") { include"info_pendaftaran_berhasil.php"; }
			elseif ($page=="kontak" and $dataadm[6]=="Admin") { include"info_kontak.php"; }
			elseif ($page=="ubah-pasword" and $dataadm[6]=="Admin") { include"set_password.php"; }
			
			elseif ($page=="daftar_all1") { include"daftar_calon_terdaftar_frame.php"; }
			elseif ($page=="daftar_all2") { include"daftar_calon_terdaftar_blm_ceksyarat_frame.php"; }
			elseif ($page=="daftar_all3") { include"daftar_calon_terdaftar_sudah_ceksyarat_frame.php"; }
			elseif ($page=="daftar_all4") { include"daftar_calon_terdaftar_rank_frame.php"; }
			//elseif ($page=="daftar_all5") { include"daftar_calon_terdaftar_tidak_lolos_frame.php"; }
			elseif ($page=="daftar_all6") { include"daftar_calon_terdaftar_nilai_frame.php"; }
			elseif ($page=="daftar_all7") { include"daftar_calon_terdaftar_konfirmasi_frame.php"; }
			elseif ($page=="daftar_all8") { include"daftar_calon_terdaftar_kesehatan_frame.php"; }

			elseif ($page=="setting1" and $dataadm[6]=="Admin") { include"set_utama.php"; }
			elseif ($page=="setting2" and $dataadm[6]=="Admin") { include"set_jadwal.php"; }
			elseif ($page=="kategori-soal" and $dataadm[6]=="Admin") { include"soal_kategori.php"; }
			elseif ($page=="daftar-soal" and $dataadm[6]=="Admin") { include"soal_bank.php"; }
			elseif ($page=="setting3" and $dataadm[6]=="Admin") { include"set_kelengkapan_administrasi.php"; }
			elseif ($page=="setting4" and $dataadm[6]=="Admin") { include"set_panitia.php"; }

			else { include"daftar_calon_terdaftar_frame.php"; }
		?>
      </div>

      <div class="sidebar">
        <div class="gadget">
          <h3 class="star">Calon Mahasiswa</h3>
          <ul class="ex_menu">
            <li><a href="index.php?page=daftar_all1"><b>1.</b> &nbsp;&nbsp;Daftar Peserta (Cek Tinggi)</a></li>
            <li><a href="index.php?page=daftar_all2"><b>2.</b> &nbsp;&nbsp;Cek Persyaratan</a></li>
            <li><a href="index.php?page=daftar_all3"><b>2.1</b> Ubah Cek Persyaratan</a></li>
            <li><a href="index.php?page=daftar_all7"><b>3.</b> &nbsp;&nbsp;Verifikasi Pembayaran</a></li>
            <li><a href="index.php?page=daftar_all6"><b>4.</b> &nbsp;&nbsp;Nilai Test</a></li>
            <li><a href="index.php?page=daftar_all4"><b>5.</b> &nbsp;&nbsp;Ranking &amp; Set Lolos</a></li>
            <li><a href="index.php?page=daftar_all8"><b>6.</b> &nbsp;&nbsp;Test Kesehatan</a></li>
            <!-- <li><a href="index.php?page=daftar_all5">Daftar Peserta Tidak Lolos Seleksi</a></li> -->
          </ul>
        </div>
        <?php
		if($dataadm[6]=="Admin") { ?>
        <div class="gadget">
          <h3 class="star">Data Informasi </h3>
          <ul class="ex_menu">
            <li><a href="index.php?page=informasi-static">Informasi Static Web</a></li>
            <li><a href="index.php?page=informasi">Informasi - Berita</a></li>
            <!--
            <li><a href="index.php?page=petunjuk">Petunjuk Pengisian</a></li>
            <li><a href="index.php?page=persyaratan">Persyaratan PSB</a></li>
            <li><a href="index.php?page=alur">Alur Pendaftaran</a></li>
            <li><a href="index.php?page=pendaftaran-berhasil">Informasi dan Pengumuman 1</a><br><span style="font-size:11px; color:#990000;">Info Pendaftaran Berhasil</span></li>
            <li><a href="index.php?page=kontak">Kontak</a></li>
            -->
          </ul>
        </div>
        <div class="gadget">
          <h3 class="star">Data Utama</h3>
          <ul class="ex_menu">
            <li><a href="index.php?page=setting1">Setting Awal</a><br><span style="font-size:11px; color:#990000;">Kapasitas dan Nilai Minimum</span></li>
            <li><a href="index.php?page=setting2">Jadwal PMB</a><br><span style="font-size:11px; color:#990000;">Untuk urutan PMB</span></li>
            <li><a href="index.php?page=kategori-soal">Kategori Soal</a><br><span style="font-size:11px; color:#990000;">Bank Soal</span></li>
            <li><a href="index.php?page=daftar-soal">Daftar Soal</a><br><span style="font-size:11px; color:#990000;">Bank Soal</span></li>
            <li><a href="index.php?page=setting3">Daftar Persyaratan</a></li>
            <li><a href="index.php?page=setting4">Daftar Panitia</a></li>
          </ul>
        </div>
        <?php } ?>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="footer">
    <div class="footer_resize">
	  <p class="lf"><b>Program PMB </b>Dibuat oleh <span style="color:#F60;">&copy;2018</span> <a href="#" target="_blank">Yanyan Sofiyan, M.Kom.</a></p>
    </div>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>
<?php } ?>