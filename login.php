        <div class="gadget">
		  <?php if ($ses_clnpsb=="") { ?>
		  <div class="loginform">          
          <h3 class="star">Login Peserta PMB</h3>
		  <form method="post" action="login_periksa.php">
		  Nomor Pendaftaran: <br>
		  <input type="text" name="username" width="30" value=""  style="font-size:12px; height:20px; width:190px; padding:4px; color:#006600; -moz-border-radius:7px 7px 7px 7px; -webkit-border-radius:7px 7px 7px 7px; border:1px dotted #009900; font-weight:bold;"><br>
		  Password:<br>
		  <input type="password" name="pass" width="30" value="" style="font-size:12px; height:20px; width:190px; padding:4px; color:#006600; -moz-border-radius:7px 7px 7px 7px; -webkit-border-radius:7px 7px 7px 7px; border:1px dotted #009900; font-weight:bold;"><br><br>
		  <input type="submit" name="Login" value="Login" class="tombol">
		  </form>
		  </div>
          <ul class="ex_menu">
            <li><a href="index.php?page=formulir">Formulir Pendaftaran</a></li>
            <li><a href="index.php?page=persyaratan">Persyaratan dan Ketentuan</a></li>
          </ul>
		  <?php } 
		  else {
		  ?>
		  <div class="loginform">
		  <span style="font-size:14px; color:#333333; font-weight:bold;">Selamat Datang Ananda</span><br>
		  Nama &nbsp;: <?php echo"$datacln[1]"; ?><br>
		  Nomor : <?php echo"$datacln[0]"; ?><br><br>
		  <a href="logout.php">Logout</a> | <a href="index.php?page=ubah-password">Ubah Password</a>
		  </div>
          <ul class="ex_menu">
            <li><a href="index.php?page=formulir-isi">Data Diri | Formulir Terisi</a></li>
            <li><a href="index.php?page=persyaratan">Persyaratan dan Ketentuan</a></li>
            <li><a href="index.php?page=konfirmasi-pembayaran">Konfirmasi Pembayaran (Wajib)</a></li>
            <li><a href="index.php?page=test-online">Test Latihan Online</a></li>
            <!--<li><a href="index.php?page=daftar-peserta">Daftar Peserta PMB</a></li>-->
            <li><a href="index.php?page=daftar-peserta-lolos">Pengumuman Hasil Test Tertulis</a></li>
            <li><a href="index.php?page=daftar-peserta-lolos-final">Pengumuman Hasil Test Kesehatan (Final)</a></li>
          </ul>
		  <?php } ?>
        </div>
