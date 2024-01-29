<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran</title>
    <style type="text/css" media="print">
    @page {
        margin-top: 10;  /* this affects the margin in the printer settings */
    	margin-bottom: 180;
    	margin-left: 50;
    	margin-right: 50;
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        font-size: 12px;
        font-family: sans-serif;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 3px;
        padding-bottom: 2px;
        background-color: #e5e6e4;
        /*text-align: left;*/
    }
    table td{    
        border: 1px solid;
        padding-top: 3px;
        padding-bottom: 2px;
        padding-left: 5px;
        padding-right: 5px;         
    }
    .satu {
   		font-size: 10px;
   	}
   	.dua {
   		font-size: 24px;
   	}
   	.tiga {
   		font-size: 20px;
   	}   	
   	.empat {
   		font-size: 11px;
   	}     	
    </style>
</head>
<body>
<?php if (file_exists('assets/dist/img/'.$pengaturan->header)) { ?>
    <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->header) ?>" width="100%">  
<?php } else { ?> 	
  	<table>    
		<tr>	
			<td rowspan="3" style="width:100px">
				<img src="<?php echo base_url('assets/dist/img/'.$pengaturan->logo) ?>" height="70px">
			</td>	    
		    <td class="tiga"><strong>PENERIMAAN PESERTA DIDIK BARU (PPDB)</strong></td>
		    <td></td>
        </tr> 
		<tr>	    
		    <td class="dua"><strong><?php echo strtoupper($pengaturan->nama_sekolah) ?></strong></td>
		    <td></td>
        </tr> 
		<tr>	    
		    <td class="satu"><?php echo ucwords($pengaturan->alamat) ?> Kec.<?php echo ucwords($pengaturan->kecamatan) ?>, <?php echo ucwords($pengaturan->kabupaten) ?> Kode Pos <?php echo $pengaturan->kode_pos ?> </td>
		    <td></td>
        </tr>                                                             
    </table>
    <hr>
<?php } ?>
    <br><br>

    <?php $th = $peserta->tahun_pelajaran + 1; ?>  
	<table>   
		<tr>	
			<td style="width:50%">
			<?php if ($peserta->status=='Sudah diverifikasi' || $peserta->status=='Berkas Kurang') { ?>
				<strong>TANDA BUKTI VERIFIKASI PENDAFTARAN<br>
			<?php } else { ?>
				<strong>TANDA BUKTI PENDAFTARAN<br>
			<?php } ?>				
				PENERIMAAN PESERTA DIDIK BARU</strong><br>	
				Tahun Pelajaran <?php echo $peserta->tahun_pelajaran ?>/<?php echo $th ?>				
			</td>	    
		    <td style="text-align: right;">Dokumen ini resmi di keluarkan oleh<br><?php echo $pengaturan->nama_sekolah ?><br> melalui <?php echo $pengaturan->website ?></td>
        </tr>                                                                     
    </table><br>

	<table>
		<tr>	
			<td colspan="4"><strong>Info Pendaftaran <?php echo $peserta->ket ?></strong></td>	    
        </tr>	    
		<tr style="background-color:#e5e6e4">	
			<td style="width:20%">No. Pendaftaran</td>	    
		    <td style="width:30%">Jalur</td>
		    <td style="width:30%">Tanggal daftar</td>
		    <td>Status</td>
        </tr>
		<tr>	
			<td><?php echo $peserta->no_pendaftaran ?></td>	    
		    <td><?php echo $peserta->jalur ?></td>
		    <td><?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_daftar))); ?></td>
		    <td><?php echo $peserta->status ?></td>
        </tr>                                                                      
    </table>

    <table> 
		<tr>	
			<td colspan="3"><strong>Biodata Siswa</strong></td>   
        </tr>    	
		<tr>
			<td rowspan="19" style="width:20%; text-align: center;">
                <?php 
                if ($berkas) { ?>  
                  <img src="<?php echo base_url('assets/uploads/attachment/'.$berkas->nama_berkas) ?>" width="130px" height="170px">
                <?php } else { ?>
                  <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="60px" height="70px">
                <?php } ?>  
			</td>		    
		    <td style="width:30%;background-color:#e5e6e4">Nama Peserta</td>
		    <td><?php echo strtoupper($peserta->nama_peserta) ?></td>
		</tr>
		<tr>    
		    <td style="background-color:#e5e6e4">Jenis Kelamin</td>
		    <td>
		    <?php if ($peserta->jenis_kelamin=='L') {
		    	echo 'Laki-laki';
		    } else {
		    	echo 'Perempuan';
		    } ?>
		    </td>
		</tr>
		<tr>    
		    <td style="background-color:#e5e6e4">NISN</td>
		    <td><?php echo $peserta->nisn ?></td>
		</tr>
	<?php if ($formulir->nik=='Ya'){ ?>
		<tr>
		    <td style="background-color:#e5e6e4">NIK</td>
		    <td><?php echo $peserta->nik ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_kk=='Ya'){ ?>
		<tr>
		    <td style="background-color:#e5e6e4">No Kartu Keluarga</td>
		    <td><?php echo $peserta->no_kk ?></td>
		</tr>
	<?php } ?>			
		<tr>
		    <td style="background-color:#e5e6e4">Tempat Tanggal Lahir</td>
		    <td><?php 
			    $tempat_lahir = strtolower($peserta->tempat_lahir);
			    echo ucwords($tempat_lahir) ?>, <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir))); ?>
		    </td>
		</tr>
		<tr>
		    <td style="background-color:#e5e6e4">Agama</td>
		    <td><?php echo $peserta->agama ?></td>
		</tr>
		<tr>
		    <td style="background-color:#e5e6e4">Alamat</td>
		    <td><?php echo $peserta->alamat ?></td>
		</tr>
		<tr>    
		    <td style="background-color:#e5e6e4">No. Handphone</td>
		    <td><?php echo $peserta->nomor_hp ?></td>
		</tr>
		<tr>		    
		    <td style="background-color:#e5e6e4">Sekolah Asal</td>
		    <td><?php echo $peserta->asal_sekolah ?></td>
		</tr>
		<tr> 		 
		    <td style="background-color:#e5e6e4">Jarak ke sekolah</td>
		    <td><?php echo $peserta->jarak ?></td>
		</tr>
	<?php if ($formulir->latitude=='Ya' and $formulir->longitude=='Ya'){ ?>				
		<tr>
		    <td style="background-color:#e5e6e4">Latitude/Longitude</td>
		    <td><?php echo $peserta->latitude ?> / <?php echo $peserta->longitude ?></td>
		</tr>
	<?php } ?>			
    </table>
    
    <?php if ($formulir->pilihan_sekolah_lain=='Ya' || $formulir->nilai_rapor=='Ya' || $formulir->nilai_usbn=='Ya' || $formulir->nilai_unbk_unkp=='Ya'){ ?>
    <table>		
		<tr> 
			<td colspan="2"><strong>Pilihan Sekolah</strong></td>
			<td colspan="3"><strong>Nilai Rerata</strong></td>   
		</tr>
		<tr>
		    <td style="width:5%; text-align: center;background-color:#e5e6e4">1</td>
		    <td><?php echo $pengaturan->nama_sekolah ?></td>			
			<td style="width:10%;background-color:#e5e6e4;text-align: center;">Rapor</td>
			<td style="width:10%;background-color:#e5e6e4;text-align: center;">US</td>
			<td style="width:10%;background-color:#e5e6e4;text-align: center;">UN</td>
		</tr>
		<tr>		
		    <td style="text-align: center;background-color:#e5e6e4">2</td>
		    <td><?php echo $peserta->pilihan_sekolah_lain ?></td>
			<td style="text-align: center">
				<?php if ($formulir->nilai_rapor=='Ya') { 			 
					echo $peserta->nilai_rapor; 
				} ?>
			</td>
			<td style="text-align: center">
				<?php if ($formulir->nilai_usbn=='Ya') { 			 
					echo $peserta->nilai_usbn; 
				} ?>
			</td>
			<td style="text-align: center">
				<?php if ($formulir->nilai_unbk_unkp=='Ya') { 			 
					echo $peserta->nilai_unbk_unkp; 
				} ?>
			</td>			    
		</tr>				
    </table>
    <?php } ?>

	<?php if ($formulir->jurusan=='Ya'){ ?>
	    <table>		
			<tr> 
			    <td colspan="2"><strong>Pilihan Jurusan</strong></td>
			</tr>
			<tr>
			    <td style="width:5%; text-align: center;background-color:#e5e6e4">1</td>
			    <td>
			    	<?php 
			    		if ($peserta->nama_jurusan=='Umum') {
			    			echo '';
			    		} else {
			    			echo $peserta->nama_jurusan;
			    		}
			    	?>
			    </td>
			</tr>
			<tr>
			    <td style="text-align: center;background-color:#e5e6e4">2</td>
			    <td><?php echo $peserta->pilihan_dua ?></td>
			</tr>				
	    </table>
    <?php } ?>  

	<?php if ($raporsemester) { ?> 
	    <table>
	    	<tr>	
				<td colspan="7"><strong>Nilai Semester</strong></td>   
	        </tr> 	    	
	    	<tr style="background-color:#e5e6e4">
	            <td rowspan="2" style="width:5%;text-align: center">No</td>
	            <td rowspan="2" style="text-align: center">Mata Pelajaran</td>
		        <td colspan="5" style="text-align: center">Nilai Semester</td>
	        </tr>
	    	<tr style="background-color:#e5e6e4">
		        <td style="width:10%;text-align: center">1</td>
	            <td style="width:10%;text-align: center">2</td>
	            <td style="width:10%;text-align: center">3</td>
	            <td style="width:10%;text-align: center">4</td>
	            <td style="width:10%;text-align: center">5</td>
	        </tr>        
	    <?php
	    $no=1;
	    foreach ($raporsemester as $value):?>
	    	<tr>
	            <td style="text-align: center"><?php echo $no++;?></td>
	            <td>&nbsp;<?php echo $value->mapel ?></td>
		        <td style="text-align: center"><?php echo $value->satu ?></td>
	            <td style="text-align: center"><?php echo $value->dua ?></td>
	            <td style="text-align: center"><?php echo $value->tiga ?></td>
	            <td style="text-align: center"><?php echo $value->empat ?></td>
	            <td style="text-align: center"><?php echo $value->lima ?></td>
	        </tr>    
	    <?php endforeach; ?>   
	    </table>
	<?php } ?>    

	<?php if ($prestasipeserta) { ?>    
	    <table>
	    	<tr>	
				<td colspan="7"><strong>Prestasi Akademik/Non Akademik</strong></td>   
	        </tr> 	    	
	    	<tr style="background-color:#e5e6e4">
	            <td style="width:5%;text-align: center">No</td>
	            <td style="text-align: center">Jenis</td>
		        <td style="text-align: center">Nama Prestasi</td>
	            <td style="text-align: center">Tahun</td>
	            <td style="text-align: center">Penyelenggara</td>
	            <td style="text-align: center">Tingkat</td>
	            <td style="text-align: center">Juara</td>
	        </tr>
	    <?php
	    $no=1;
	    foreach ($prestasipeserta as $value):?>
	    	<tr>
	            <td style="text-align: center"><?php echo $no++;?></td>
	            <td>&nbsp;<?php echo $value->jenis ?></td>
		        <td>&nbsp;<?php echo $value->nama_prestasi ?></td>
	            <td style="text-align: center"><?php echo $value->tahun ?></td>
	            <td>&nbsp;<?php echo $value->penyelenggara ?></td>
	            <td>&nbsp;<?php echo $value->tingkat ?></td>
	            <td style="text-align: center"><?php echo $value->juara ?></td>
	        </tr>    
	    <?php endforeach; ?>   
	    </table>
	<?php } ?>

	<?php if ($peserta->status=='Sudah diverifikasi' || $peserta->status=='Berkas Kurang') { ?>
		<br>
	    <table>		
			<tr> 
			    <td style="width:50%"><strong>Dokumen</strong></td>
			    <td><strong>Catatan</strong></td>
			</tr>		
			<tr>
			    <td>
					<?php foreach ($berkasall as $value):?>	
						<?php echo $value->keterangan_berkas ?>,
					<?php endforeach; ?> 			    		
			    </td>
			    <td style="vertical-align:text-top;"><?php echo $peserta->catatan ?>&nbsp;</td>
			</tr>	
	    </table>
	<?php } ?> 

	<br>
 	<table>
		<tr>
			<td colspan="4">
			<br>
			<?php foreach ($pengumuman as $text) { ?>				
				<?php echo $text->text ?>
			<?php } ?>
			<br><br>				
			</td>	    
        </tr>  
		<tr>	
			<td style="width:15%">
				<img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
			</td> 
			<td style="width:28%;vertical-align:text-top;">a/n <?php echo strtoupper($peserta->nama_peserta) ?><br>
				Menyetujui data diatas,<br>
				Ortu/Wali Siswa terdaftar<br><br><br><br><br><br>
				(...............................................)
			</td>
			<td style="width:28%;vertical-align:text-top;">Menyetujui data diatas,<br>
				Siswa terdaftar<br><br><br><br><br><br><br>
				<?php echo strtoupper($peserta->nama_peserta) ?>
			</td>     
		    <td style="vertical-align:text-top;"><?php echo ucwords($pengaturan->kecamatan) ?>,<br>
		    	Panitia PPDB<br><br><br><br><br><br><br>
		    	(...............................................)
		    </td>
        </tr>
       	<tr>
			<td colspan="4">
				Pantau hasil seleksi PPDB <strong><?php echo strtoupper($peserta->nama_peserta) ?></strong> melalui website<br>
				<?php echo $pengaturan->website ?> setiap saat. 				
			</td>	    
        </tr>                                               
    </table>   
</body>
<script type="text/javascript">
    window.print()
</script>
</html>