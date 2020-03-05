<div class="article">
	<h2>Jadwal PMB</h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#C1C1C1">
                    <th width="8%">No.</th>
					<th width="9%">Kode</th>
					<th width="31%">Tanggal</th>
					<th width="47%">Kegiatan</th>
				  </tr>
				<?php
				$no=0;
				opendb();
				$qview1 = "SELECT * FROM jadwal_pmb WHERE kode_setting='$dtahun[0]' order by tanggal_awal ASC";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				$no=$no+1;
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="8%"><?php echo "$no"; ?></td>
					<td width="9%"><?php echo "$dview1[1]"; ?></td>
					<td width="31%"><?php echo "$dview1[2] s/d $dview1[3]"; ?></td>
					<td width="47%"><?php echo "$dview1[4]"; ?></td>
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
