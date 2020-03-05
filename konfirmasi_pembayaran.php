            <script type="text/javascript">
            // Forms Validator
            $j(function() {
                $j("#konfirmasi").validate();
            });
            </script>

<div class="article">
	<h2>Konfirmasi Pembayaran | Isi data dengan benar</h2>
    <?php if($dview[4]<>"") { ?>
    <div style="float:left; margin: 0 15px 15px 0; padding:3px; border:1px dotted #E0E0E0; background-color:#F8F8F8;">
    	<img src="adminPMB/images_info_statis/<?php echo "$dview[4]"; ?>" width="170" />
    </div>
    <?php } ?>
	<?php echo "$dview[2]"; ?>
    <?php
		opendb();
		$qcek="SELECT COUNT(*) FROM konfirmasi_pembayaran WHERE nomor_pendaftaran='$ses_clnpsb'";
		$hcek=querydb($qcek);
		closedb();
		$dcek=mysql_fetch_array($hcek);
		
		if($dcek[0]==0) {
	?>
    <!-- TOMBOL MULAI -->
    <form action="index.php?page=konfirmasi-pembayaran&stat=save" method="post" enctype="multipart/form-data" id="konfirmasi">
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td width="22%">Transfer Ke Bank</td>
        <td width="1%">:</td>
        <td width="77%"> <input type="text" name="bank" id="textfield" class="required"/> Ex: BRI, BNI, Mandiri</td>
      </tr>
      <tr>
        <td>Jumlah Transfer</td>
        <td>:</td>
        <td><input type="text" name="jumlah" id="textfield" class="required number" /></td>
      </tr>
      <tr>
        <td>Detail Informasi Pembayaran</td>
        <td>:</td>
        <td><textarea name="info" id="info" cols="45" rows="5" class="required"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="btnkonfirmasi" type="submit" value="Kirim Konfirmasi" /></td>
      </tr>
    </table>
    </form>
    
    <?php
		$bank=$_POST['bank'];
		$jumlah=$_POST['jumlah'];
		$info=$_POST['info'];
		$stat=$_GET['stat'];
		
		if($_POST['btnkonfirmasi'] and $stat=="save") {
			opendb();
			$sql="INSERT INTO konfirmasi_pembayaran (nomor_pendaftaran, ke_bank, jumlah_transfer, keterangan) VALUES
				  ('$ses_clnpsb', '$bank', '$jumlah', '$info')";
			querydb($sql);
			closedb();
			?>
			<script language="JavaScript">document.location='index.php?page=konfirmasi-pembayaran';</script>
			<?php
		}
	?>
   
    <?php } else { ?>
    <!-- INFO SUDAH TEST -->
    <div style="padding:10px; border:1px dotted #003366; background:#0099CC; color:#FFFFFF; font-size:18px; font-weight:bold;">
    	ANDA SUDAH MELAKUKAN KONFIRMASI PEMBAYARAN, TERIMAKASIH.
    </div>
    Jika Anda belum melakukan konfirmasi pembayaran akan tetapi informasi ini muncul atau ada kesalahan data yang Anda masukkan mohon hubungi kami. Informasi >> <a href="index.php?page=kontak" title="Halaman kontak">kontak</a>. 
	<?php } ?>
    
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