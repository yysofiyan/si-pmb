<div class="article">
    <?php
	opendb();
	$qview = "SELECT * FROM informasi_statis_web WHERE kode_statis=7";
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
    <!-- Daftar Persyaratan -->
	<h2>Berkas Yang Harus Dikumpulkan</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#C1C1C1">
					<th width="7%">No. </th>
					<th width="9%">Kode </th>
					<th width="68%">Berkas / Persyaratan </th>
					<th width="16%">Status </th>
	  </tr>
				<?php
				$no=0;
				opendb();
				$qview1 = "SELECT * FROM syarat";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="7%"><?php echo "$no"; ?></td>
					<td width="9%"><?php echo "$dview1[0]"; ?></td>
					<td width="68%"><?php echo "$dview1[1]"; ?></td>
					<td width="16%"><?php if ($dview1[2]=="Y") {echo "Wajib";} elseif ($dview1[2]=="N") {echo "Tidak Wajib";} ?></td>
	  </tr>
				<?php } ?>
	  </table>
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
