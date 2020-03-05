<script type="text/javascript">
// Forms Validator
$j(function() {
  $j("#pendaftaran").validate();
});
</script>
<?php      
opendb();
$qdatadiri="SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$ses_clnpsb'";
$hdatadiri=querydb($qdatadiri);
closedb();
$ddatadiri=mysql_fetch_array($hdatadiri);
?>
<div class="article">

	<h2>Data Diri Pendaftaran</h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
				    <td>Jurusan/Program studi</td>
				    <td>:</td>
				    <td>Pilihan 1 : 
                      <?php
					  	opendb();
						$q_jur1="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_1]";
						$h_jur1=querydb($q_jur1);
						$d_jur1=mysql_fetch_array($h_jur1);
					  ?>
				      <?php echo $d_jur1['jurusan']; ?>
					  &nbsp | &nbsp; Pilihan 2 : 
                      <?php
					  	opendb();
						$q_jur2="SELECT * FROM jurusan WHERE kode_jurusan=$ddatadiri[jurusan_2]";
						$h_jur2=querydb($q_jur2);
						closedb();
						$d_jur2=mysql_fetch_array($h_jur2);
					  ?>
				      <?php echo $d_jur2['jurusan']; ?>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Nomor Pendaftaran</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[nomor_pendaftaran]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Nama Lengkap</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[nama_lengkap]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td><?php if($ddatadiri['jenis_kelamin']==1) { echo "Pria"; } else { echo "Wanita"; } ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Tinggi Badan</td>
				    <td valign="top">:</td>
				    <td><?php echo "$ddatadiri[tinggi_badan]"; ?> cm</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Berat Badan</td>
				    <td valign="top">:</td>
				    <td><?php echo "$ddatadiri[berat_badan]"; ?> kg</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat, Tanggal Lahir </td>
					<td valign="top">:</td>
					<td><?php echo "$ddatadiri[tempat_lahir], $ddatadiri[tanggal_lahir]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor KTP</td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[no_ktp]"; ?></td>
			      </tr>
                  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Email</td>
                    <td>:</td>
                    <td align="left"><?php echo "$ddatadiri[email]"; ?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Lengkap <div style="font-size:10px; color:#333;">(Tempat Tinggal)</div></td>
                    <td>:</td>
                    <td><?php echo "$ddatadiri[alamat]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor Telepon</td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[telp]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Kode POS</td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[kode_pos]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Asal Sekolah / Jurusan <div style="font-size:10px; color:#333;">(Nama Sekolah, lokasi/kabupaten)</div></td>
                    <td>:</td>
                    <td><?php echo "$ddatadiri[asal_sekolah_jurusan]"; ?>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Kewarganegaraan</td>
					<td width="1%">:</td>
					<td width="67%"><?php echo "$ddatadiri[kewarganegaraan]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Foto</td>
					<td width="1%">:</td>
					<td width="67%"><img src="./images_foto/thumb/<?php echo "$ddatadiri[foto]"; ?>" title="Foto Anda" width="150"/></td>
				  </tr>
                  <?php 
				  	opendb();
					$q_cek="SELECT COUNT(*) as jml FROM tb_pendaftaran WHERE cek_tinggi=1 AND cek_syarat=1 AND cek_pembayaran=1 AND  nomor_pendaftaran='$ses_clnpsb'";
					$h_cek=querydb($q_cek);
					$d_cek=mysql_fetch_array($h_cek);
					if($d_cek[0]==0) {
				  ?>
				  <tr bgcolor="#FFFFFF">
				    <th>Cetak</th>
				    <th>:</th>
				    <th align="left">Maaf data Anda belum diverifikasi. Silahkan lihat beberapa saat lagi.<br />
                    * Pastikan tinggi badan Anda sesuai yang dipersyaratkan<br />
                    * Pastikan persyaratan sudah dikirim dan lengkap<br />
                    * Sudah melakukan pembayaran dan konfirmasi
                    </th>
			      </tr>
                  <?php } else { ?>
				  <tr bgcolor="#FFFFFF">
				    <th align="right">Cetak</td>
				    <th>>></th>
				    <th align="left"><a href="cetak_formulir.php?nopen=<?php echo "$ses_clnpsb"; ?>" title="Cetak Formulir" target="_blank"><img src="images/printer_48.png" width="18" /></a></th>
			      </tr>
                  <?php } ?>
				</table>				
	  <br />
	</form>
</div>