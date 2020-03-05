<div class="article">
    <?php
	opendb();
	$qview = "SELECT * FROM informasi_statis_web WHERE kode_statis=3";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	?>
	<h2><?php echo "$dview[1]"; ?></h2>
    <?php if($dview[4]<>"") { ?>
    <div style="float:left; margin: 0 15px 15px 0; padding:3px; border:1px dotted #E0E0E0; background-color:#F8F8F8;">
    	<img src="adminPMB/images_info_statis/<?php echo "$dview[4]"; ?>" style="max-width:650px" />
    </div>
    <?php } ?>
	<?php echo "$dview[2]"; ?>
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
