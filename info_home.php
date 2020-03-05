<div class="article">
    <?php
	opendb();
	$qview = "SELECT * FROM informasi_statis_web WHERE kode_statis=1";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	?>
	<h2><?php echo "$dview[1]"; ?></h2>
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
    <?php
    opendb();
	$qview1 = "SELECT a.*, b.nama FROM informasi as a, panitia as b WHERE a.kode_panitia=b.kode_panitia ORDER BY tanggal DESC LIMIT 0, 5";
	$hview1 = querydb($qview1);
	closedb();
	while ($dview1 = mysql_fetch_array($hview1)) 
	{
	?>
	<div style="font-size:14px; font-weight:600; "><?php echo "$dview1[1] <br>"; ?></div>
    <div style="font-size:10px; margin-bottom:10px;">Posted by <a href="#"><?php echo "$dview1[6]"; ?></a> | Date <a href="#"><?php echo date("d/m/Y", strtotime($dview1[3])); ?></a></div>
  		<?php
        $TMPBAGIANBERITA = array();
		$TMP =explode(" ", strip_tags($dview1[2]));
		for($i=0;$i<=45;$i++)
		{
		$TMPBAGIANBERITA[$i] = $TMP[$i];
		}
		$BAGIANBERITA = implode(" ",$TMPBAGIANBERITA);
		echo "$BAGIANBERITA ...  <a href='index.php?page=berita&id_berita=$dview1[0]'>Selengkapnya</a> <br>"; ?>
        
    <div style="border-bottom:1px dotted #999999; margin:15px 0;"></div>
	<?php } ?>

</div>