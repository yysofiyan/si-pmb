<script type="text/javascript">
// Forms Validator
$j(function() {
     $j("#form1").validate();
});
</script>
<div class="article">
	<h2>Form Ubah Password Login</h2>
    <form method='POST' action='index.php?page=ubah-password' name='form1' id='form1' enctype="multipart/form-data">
    <table border="0" cellspacing="0" cellpadding="4" width="100%">
    <tr><td width='200'>Masukkan Password Lama</td><td><input type='password' name='pass_lama' class='required' title=' Password lama harus diisi'></td></tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td>Masukkan Password Baru</td><td><input type='password' name='pass_baru' maxlength='20' class='required' title=' Password baru harus diisi' placeholder='Minimal 6 character'></td></tr>
    <tr><td>Masukkan Lagi Password Baru</td><td><input type='password' name='pass_ulangi' maxlength='20' class='required' title=' Ulangi password baru harus diisi' placeholder='Minimal 6 character'></td></tr>
    <tr><td></td><td><input type='submit' name="simpan_2" class='tombol' value='Ganti Password'></td></tr>
    </table></form>
</div>
<?php
	if(@$_POST['simpan_2']) {
		opendb();
		$pass_lama=md5(@$_POST['pass_lama']);
		$pass_baru=@$_POST['pass_baru'];
		$pass_ulangi=@$_POST['pass_ulangi'];
		
		if (empty($pass_lama) || empty($pass_baru) || empty($pass_ulangi)){
			?>
				<script language="JavaScript">alert('Semua data harus diisi.'); history.go(-1);</script>
			<?php
			exit();
		}
		else{ 
		
		if(strlen($pass_baru)<6) {
			?>
				<script language="JavaScript">alert('Panjang password minimum 6 karakter.'); history.go(-1);</script>
			<?php
			exit();
		}
		
		// Apabila password lama cocok dengan password admin di database
		$login=querydb("SELECT * FROM tb_pendaftaran WHERE password='".$pass_lama."' AND nomor_pendaftaran='".$ses_clnpsb."'");
		$ketemu=mysql_num_rows($login);
		$r=mysql_fetch_array($login);
		// Apabila username dan password ditemukan		
		
		if ($ketemu>0){
		  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
		  if ($pass_baru==$pass_ulangi){
			opendb();
			querydb("UPDATE tb_pendaftaran SET password='".md5($pass_baru)."' WHERE nomor_pendaftaran='".$ses_clnpsb."'");
			closedb();
			?>
				<script language="JavaScript">alert('Password berhasil diubah. Sistem akan Logout.'); document.location='logout.php';</script>
			<?php
		  }
		  else{
			?>
				<script language="JavaScript">alert('Password baru dan Ulangi password tidak sama.'); history.go(-1);</script>
			<?php
		  }
		}
		else{
		  ?>
			  <script language="JavaScript">alert('Password lama yang anda masukkan salah.'); history.go(-1);</script>
		  <?php
		}
		}
	closedb();
	}
?>
