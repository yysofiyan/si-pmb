
<div class="article">
    <?php
	opendb();
	$qview = "SELECT * FROM informasi_statis_web WHERE kode_statis=9";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	?>
	<h2><?php echo "$dview[1]"; ?></h2>
    <?php if($dview[4]<>"") { ?>
    <div style="float:left; margin: 0 15px 15px 0; padding:3px; border:1px dotted #E0E0E0; background-color:#F8F8F8;">
    	<img src="adminPMB/images_info_statis/<?php echo "$dview[4]"; ?>" width="170" />
    </div>
    <?php } ?>
	<?php echo "$dview[2]"; ?>
    <br /><br />
    <?php
		opendb();
		$qcek="DELETE a, b FROM test_online as a, test_online_hasil as b WHERE a.kode_test=b.kode_test AND a.nomor_pendaftaran='$ses_clnpsb'";
		$hcek=querydb($qcek);
		closedb();
		
		//if($dcek[0]==0) {
	?>
    <!-- TOMBOL MULAI -->
    <div style="padding:10px; border:1px dotted #FFCC00; background:#333333; color:#333333; font-size:18px; font-weight:bold;">
    	<a href="test-online.php" title="MULAI TEST">MULAI TEST (Klik untuk memulai test)</a>
    </div>
    <?php //} else { ?>
    <!-- INFO SUDAH TEST -->
    <!--
    <div style="padding:10px; border:1px dotted #FFCC00; background:#FF6600; color:#000000; font-size:18px; font-weight:bold;">
    	MAAF ANDA SUDAH PERNAH MELAKUKAN TEST ONLINE.
    </div>
    Jika Anda belum melakukan test akan tetapi informasi ini muncul mohon hubungi kami. Informasi >> <a href="index.php?page=kontak" title="Halaman kontak">kontak</a>. 
	-->
	<?php //} ?>
    
    <div class="box">
    <!-- AddThis Button BEGIN -->
          <span class="addthis_toolbox addthis_default_style">
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_tweet"></a>
          <a class="addthis_counter addthis_pill_style"></a>
          </span>
          <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4dfc980a16cd69b8"></script>
    <!-- AddThis Button END -->
    </div>
</div>
<div id="defaultCountdown"></div>