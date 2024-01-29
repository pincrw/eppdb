<table class="table">
	<tr><td colspan="2"><h3>Informasi Dokumen</h3></td></tr>
	<tr><td><span class="label bg-purple">Data Registrasi</span></td><td></td></tr>              	
	<tr><td>No Pendaftaran</td><td><?php echo $peserta->no_pendaftaran; ?></td></tr>
	<tr><td>Tanggal Daftar</td><td><?php echo date('d F Y', strtotime($peserta->tanggal_daftar)); ?></td></tr>
	<tr><td>Tahun Pelajaran</td><td><?php echo $peserta->tahun_pelajaran; ?></td></tr>    
	<tr><td>Jalur Pendaftaran</td><td><?php echo $peserta->jalur; ?></td></tr>
	<tr><td>Asal Sekolah</td><td><?php echo $peserta->asal_sekolah; ?></td></tr>
	<tr><td>Tahun Lulus</td><td><?php echo $peserta->tahun_lulus; ?></td></tr>	
	<tr><td><span class="label bg-purple">Data Pribadi</span></td><td></td></tr>
	<tr><td>Nama Peserta</td><td><?php echo $peserta->nama_peserta; ?></td></tr>
	<tr><td>Jenis Kelamin</td>
    <td>
	    <?php if ($peserta->jenis_kelamin=="L"){
				echo "Laki-laki";
	    } else {
	    	echo "Perempuan";
	    } ?>				    		
    </td>
	</tr>
	<tr><td>NISN</td><td><?php echo $peserta->nisn; ?></td></tr>
	<tr><td>Tempat Lahir</td><td><?php echo $peserta->tempat_lahir; ?></td></tr>
	<tr><td>Tanggal Lahir</td><td><?php echo date('d F Y', strtotime($peserta->tanggal_lahir)); ?></td></tr>
	<tr><td>Agama</td><td><?php echo $peserta->agama; ?></td></tr>
	<tr><td>Alamat</td><td><?php echo $peserta->alamat; ?></td></tr>
<!-- 	<tr><td>Nama Ayah</td><td><?php echo $peserta->nama_ayah; ?></td></tr>   
	<tr><td>Nama Ibu</td><td><?php echo $peserta->nama_ibu; ?></td></tr> -->
	<tr><td>Nomor HP</td><td><?php echo $peserta->nomor_hp; ?></td></tr>
	<tr><td><span class="label bg-purple">Data Status</span></td><td></td></tr>				    
	<tr><td>Status Pendaftaran</td>
	  <td>
		  <?php if ($peserta->status=="Belum diverifikasi"){?>
			<span class="label label-warning"><?php echo $peserta->status; ?></span>
		  <?php } else if ($peserta->status=="Sudah diverifikasi") {?>
		 	<span class="label label-success"><?php echo $peserta->status; ?></span>
		  <?php } else if ($peserta->status=="Berkas Kurang") {?>
		 	<span class="label label-danger"><?php echo $peserta->status; ?></span>
		  <?php } ?>
	  </td>
	</tr>
	<tr><td>Status Hasil</td>
	  <td>
		  <?php if ($peserta->status_hasil=="Cadangan"){?>
			<span class="label label-primary"><?php echo $peserta->status_hasil; ?></span>
		  <?php } else if ($peserta->status_hasil=="Di Terima") {?>
		  <span class="label label-success"><?php echo $peserta->status_hasil; ?></span>
		  <?php } else if ($peserta->status_hasil=="Tidak di terima") {?>
		  <span class="label label-danger"><?php echo $peserta->status_hasil; ?></span>
		  <?php } else if ($peserta->status_hasil=="Belum ada") {?>
		  <span class="label label-warning"><?php echo $peserta->status_hasil; ?></span>
		  <?php } ?>
	  </td>
	</tr>
	<tr><td>Status Daftar Ulang</td>
	  <td>
		  <?php if ($peserta->status_daftar_ulang=="Belum daftar ulang"){?>
			<span class="label label-warning"><?php echo $peserta->status_daftar_ulang; ?></span>
		  <?php } else if ($peserta->status_daftar_ulang=="Sudah daftar ulang") {?>
		  <span class="label label-success"><?php echo $peserta->status_daftar_ulang; ?></span>
		  <?php } else if ($peserta->status_daftar_ulang=="Tidak daftar ulang") {?>
		  <span class="label label-danger"><?php echo $peserta->status_daftar_ulang; ?></span>
		  <?php } else if ($peserta->status_daftar_ulang=="Menunggu") {?>
		  <span class="label label-primary"><?php echo $peserta->status_daftar_ulang; ?></span>
		  <?php } ?>				    		
	  </td>
	</tr>
	<tr>
		<td>Catatan</td><td><?php echo $peserta->catatan; ?></td>
	</tr>	
	<tr>	
		<td>
			<form action="printformulir" method="post" target="blank">
				<input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?php echo $peserta->id_peserta; ?>"/>	
				<button type="submit" class="<?= $this->config->item('botton')?>">Lihat Formulir</button>
			</form>	
		</td>
		<td>
			<form action="status_verifikasi" method="post">
				<input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?php echo $peserta->id_peserta; ?>"/>
				<input type="hidden" class="form-control" name="nama_peserta" id="nama_peserta" value="<?php echo $peserta->nama_peserta; ?>"/>						
				<input type="hidden" class="form-control" name="status" id="status" value="Sudah diverifikasi"/>
				<button type="submit" class="<?= $this->config->item('botton')?>">Verifikasi</button>
			</form>			
		</td>
	</tr>	
</table>