<!DOCTYPE html>
<html>
<head>
    <title>Formulir Daftar Ulang</title>
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
        font-size: 14px;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 5px;
        padding-bottom: 5px;
        /*background-color: #39CCCC;*/
        /*text-align: left;*/
    }
    table td{    
        /*border: 1px solid;*/
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
			<td rowspan="3" width="100">
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
	<table>    
		<tr>	
			<td width="150">No. Pendaftaran</td>	    
		    <td width="10">: </td>
		    <td width="200" style="border-bottom: 1px dotted"><strong><?php echo $peserta->no_pendaftaran ?></strong></td>
		    <td width="200"></td>
		    <?php  
		    $kode = substr($peserta->no_pendaftaran,-1); 
		    if ($kode=="D" || $kode=="L") { ?>
		    	<td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FDU-<?php echo substr($peserta->no_pendaftaran,-1) ?> <?php echo $peserta->ket ?></td>
		    <?php } else { ?>
		    	<td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FDU <?php echo $peserta->ket ?></td>
		    <?php } ?>	
        </tr>                                                            
    </table>
    <?php $th = $peserta->tahun_pelajaran + 1; ?>
	<h3 style="text-align: center">FORMULIR DAFTAR ULANG PESERTA DIDIK BARU<br>
	TAHUN PELAJARAN <?php echo $peserta->tahun_pelajaran ?>/<?php echo $th ?></h3>	
    <table class="word-table" style="margin-bottom: 10px">	
		<tr>		    
		    <td style="width: 280px">Nama Peserta</td>
		    <td style="width: 10px">: </td>
		    <td style="border-bottom: 1px dotted"><?php echo strtoupper($peserta->nama_peserta) ?></td>
		</tr>
		<tr>    
		    <td>Jenis Kelamin</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">
		    <?php if ($peserta->jenis_kelamin=='L') {
		    	echo 'Laki-laki';
		    } else {
		    	echo 'Perempuan';
		    } ?>	
		    </td>
		</tr>
	<?php if ($formulir->nisn=='Ya'){ ?>	
		<tr>    
		    <td>NISN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nisn ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->nik=='Ya'){ ?>
		<tr>
		    <td>NIK</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nik ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->no_kk=='Ya'){ ?>
		<tr>
		    <td>No Kartu Keluarga</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_kk ?></td>
		</tr>
	<?php } ?>		
		<tr>
		    <td>Tempat Tanggal Lahir</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_lahir ?>, <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir))); ?></td>
		</tr>
	<?php if ($formulir->no_registrasi_akta_lahir=='Ya'){ ?>		
		<tr>
		    <td>No. Registrasi Akta Lahir</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_registrasi_akta_lahir ?></td>
		</tr>
	<?php } ?>
		<tr>
		    <td>Agama</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->agama ?></td>
		</tr>
	<?php if ($formulir->kewarganegaraan=='Ya'){ ?>		
		<tr>
		    <td>Kewarganegaraan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->kewarganegaraan ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus=='Ya'){ ?>		
		<tr>
		    <td>Berkebutuhan khusus</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->berkebutuhan_khusus ?></td>
		</tr>
	<?php } ?>		
		<tr>
		    <td>Alamat</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->alamat ?></td>
		</tr>
	<?php if ($formulir->rt=='Ya'){ ?>		
		<tr>
		    <td>RT/RW</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->rt ?>/<?php echo $peserta->rw ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->nama_dusun=='Ya'){ ?>			
		<tr>
		    <td>Nama Dusun</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nama_dusun ?></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->nama_kelurahan=='Ya'){ ?>		
		<tr>
		    <td>Nama Kelurahan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nama_kelurahan ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->kecamatan=='Ya'){ ?>				
		<tr>
		    <td>Kecamatan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->kecamatan ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->kabupaten=='Ya'){ ?>				
		<tr>
		    <td>Kabupaten/Kota</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->kabupaten ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->provinsi=='Ya'){ ?>				
		<tr>
		    <td>Provinsi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->provinsi ?></td>
		</tr>
	<?php } ?>				
	<?php if ($formulir->kode_pos=='Ya'){ ?>			
		<tr>
		    <td>Kode Pos</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->kode_pos ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->latitude=='Ya' and $formulir->longitude=='Ya'){ ?>				
		<tr>
		    <td>Latitude/Longitude</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->latitude ?> / <?php echo $peserta->longitude ?></td>
		</tr>
	<?php } ?>	

	<?php if ($formulir->tempat_tinggal=='Ya'){ ?>			
		<tr>
		    <td>Tempat Tinggal</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_tinggal ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->moda_transportasi=='Ya'){ ?>				
		<tr>
		    <td>Moda Transportasi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->moda_transportasi ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_kks=='Ya'){ ?>		
		<tr>
		    <td>No. KKS (Kartu Keluarga Sejahtera)</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_kks ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->anak_ke=='Ya'){ ?>			
		<tr>
		    <td>Anak keberapa</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->anak_ke ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penerima_kps_pkh=='Ya'){ ?>		
		<tr>
		    <td>Penerima KPS/PKH</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->penerima_kps_pkh ?>
		    	<?php if ($formulir->no_kps_pkh=='Ya'){ ?>
		    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor : <?php echo $peserta->no_kps_pkh ?>
		    	<?php } ?>			    	
		    </td>
		</tr>
	<?php } ?>
<!-- 	<?php if ($formulir->no_kps_pkh=='Ya'){ ?>		
		<tr>    
			<td>No. KPS/PKH</td>
			<td>: </td>
			<td style="border-bottom: 1px dotted"><?php echo $peserta->no_kps_pkh ?></td>
		</tr>
	<?php } ?> -->
	<?php if ($formulir->penerima_kip=='Ya'){ ?>		
		<tr>    
		    <td>Penerima KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->penerima_kip ?>
		    	<?php if ($formulir->no_kip=='Ya'){ ?>
		    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor : <?php echo $peserta->no_kip ?>
		    	<?php } ?>			    	
		    </td>
		</tr>
	<?php } ?>	
<!-- 	<?php if ($formulir->no_kip=='Ya'){ ?>			
		<tr>    
		    <td>No. KIP (Kartu Indonesia Pintar)</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_kip ?></td>
		</tr>
	<?php } ?> -->
	<?php if ($formulir->nama_tertera_di_kip=='Ya'){ ?>		
		<tr>    
		    <td>Nama tertera di KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nama_tertera_di_kip ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->terima_fisik_kartu_kip=='Ya'){ ?>		
		<tr>    
		    <td>Terima fisik kartu KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->terima_fisik_kartu_kip ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->hobi=='Ya'){ ?>		
		<tr>    
		    <td>Hobi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->hobi ?></td>
		</tr>
	<?php } ?>
			
		<tr>
		    <td>Nama Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo strtoupper($peserta->nama_ayah) ?></td>
		</tr>
	<?php if ($formulir->nik_ayah=='Ya'){ ?>		
		<tr>  
		    <td>NIK Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nik_ayah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->tempat_lahir_ayah=='Ya'){ ?>		
		<tr> 
		    <td>Tempat lahir Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_lahir_ayah ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->tanggal_lahir_ayah=='Ya'){ ?>		
		<tr> 
		    <td>Tanggal lahir Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">
				<?php if($peserta->tanggal_lahir_ayah=="0000-00-00"){
					echo "";
				} else { ?>
					<?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir_ayah))); 
				} ?>		    	
		    </td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_ayah=='Ya'){ ?>	
		<tr> 
		    <td>Pendidikan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pendidikan_ayah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pekerjaan_ayah=='Ya'){ ?>		
		<tr>  
		    <td>Pekerjaan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pekerjaan_ayah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Penghasilan bulanan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->penghasilan_bulanan_ayah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Berkebutuhan khusus Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->berkebutuhan_khusus_ayah ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->no_hp_ayah=='Ya'){ ?>				
		<tr>
		    <td>No Hp Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_hp_ayah ?></td>
		</tr>
	<?php } ?>		

		<tr>  
		    <td>Nama Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo strtoupper($peserta->nama_ibu) ?></td>
		</tr>
	<?php if ($formulir->nik_ibu=='Ya'){ ?>			
		<tr>    
		    <td>NIK Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nik_ibu ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->tempat_lahir_ibu=='Ya'){ ?>		
		<tr> 
		    <td>Tempat lahir Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_lahir_ibu ?></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->tanggal_lahir_ibu=='Ya'){ ?>		
		<tr> 
		    <td>Tanggal lahir Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">
				<?php if($peserta->tanggal_lahir_ibu=="0000-00-00"){
					echo "";
				} else { ?>
					<?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir_ibu))); 
				} ?>		    	
		    </td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_ibu=='Ya'){ ?>		
		<tr>  
		    <td>Pendidikan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pendidikan_ibu ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pekerjaan_ibu=='Ya'){ ?>		
		<tr>  
		    <td>Pekerjaan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pekerjaan_ibu ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_ibu=='Ya'){ ?>		
		<tr> 
		    <td>Penghasilan bulanan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->penghasilan_bulanan_ibu ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus_ibu=='Ya'){ ?>		
		<tr> 
		    <td>Berkebutuhan khusus Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->berkebutuhan_khusus_ibu ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_hp_ibu=='Ya'){ ?>				
		<tr>
		    <td>No Hp Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_hp_ibu ?></td>
		</tr>
	<?php } ?>	

	<?php if ($formulir->nama_wali=='Ya'){ ?>				
		<tr>  
		    <td>Nama Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo strtoupper($peserta->nama_wali) ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nik_wali=='Ya'){ ?>		
		<tr>    
		    <td>NIK Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nik_wali ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->tempat_lahir_wali=='Ya'){ ?>		
		<tr> 
		    <td>Tempat lahir Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_lahir_wali ?></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->tanggal_lahir_wali=='Ya'){ ?>		
		<tr> 
		    <td>Tanggal lahir Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">
				<?php if($peserta->tanggal_lahir_wali=="0000-00-00"){
					echo "";
				} else { ?>
					<?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir_wali))); 
				} ?>		    	
		    </td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_wali=='Ya'){ ?>		
		<tr>  
		    <td>Pendidikan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pendidikan_wali ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pekerjaan_wali=='Ya'){ ?>		
		<tr>    
		    <td>Pekerjaan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pekerjaan_wali ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_wali=='Ya'){ ?>		
		<tr>   
		    <td>Penghasilan bulanan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->penghasilan_bulanan_wali ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_hp_wali=='Ya'){ ?>				
		<tr>
		    <td>No Hp Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_hp_wali ?></td>
		</tr>
	<?php } ?>		

	<?php if ($formulir->no_telepon_rumah=='Ya'){ ?>					
		<tr>  
		    <td>No. Telepon Rumah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_telepon_rumah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nomor_hp=='Ya'){ ?>
		<tr>    
		    <td>No. Handphone</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nomor_hp ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->email=='Ya'){ ?>			
		<tr>    
		    <td>Email</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->email ?></td>
		</tr>
	<?php } ?>

	<?php if ($formulir->tinggi_badan=='Ya'){ ?>					
		<tr> 	    
		    <td>Tinggi Badan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tinggi_badan ?> cm</td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berat_badan=='Ya'){ ?>		
		<tr> 	  
		    <td>Berat Badan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->berat_badan ?> kg</td>
		</tr>
	<?php } ?>
	<?php if ($formulir->lingkar_kepala=='Ya'){ ?>
		<tr>
		    <td>Lingkar Kepala</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->lingkar_kepala ?> cm</td>
		</tr>
	<?php } ?>	
		<tr> 		 
		    <td>Jarak ke sekolah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->jarak ?></td>
		</tr>
	<?php if ($formulir->waktu_tempuh=='Ya'){ ?>
		<tr>
		    <td>Waktu Tempuh</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->waktu_tempuh ?></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->jumlah_saudara_kandung=='Ya'){ ?>			
		<tr> 	 
		    <td>Jumlah saudara kandung</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->jumlah_saudara_kandung ?></td>
		</tr>
	<?php } ?>	
      
		<tr>    
		    <td>Jalur Pendaftaran</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->jalur ?></td>
		</tr>

	<?php if ($formulir->pilihan_sekolah_lain=='Ya'){ ?>			
		<tr>    
		    <td>Sekolah pilihan lain</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pilihan_sekolah_lain ?></td>
		</tr>
	<?php } ?>

	<?php if ($formulir->jurusan=='Ya'){ ?>
		<tr>
		    <td>Jurusan Pilihan 1</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nama_jurusan ?></td>
		</tr>
		<tr>
		    <td>Jurusan Pilihan 2</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->pilihan_dua ?></td>
		</tr>		
	<?php } ?>
		<tr>		    
		    <td>Asal Sekolah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->asal_sekolah ?></td>
		</tr>
	<?php if ($formulir->akreditasi=='Ya'){ ?>		
		<tr>		    
		    <td>Akreditasi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->akreditasi ?></td>
		</tr>
	<?php } ?>			
	<?php if ($formulir->no_peserta_ujian=='Ya'){ ?>		
		<tr>		    
		    <td>No. Peserta Ujian</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_un ?></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->no_seri_ijazah=='Ya'){ ?>		
		<tr>		    
		    <td>No. Seri Ijazah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_seri_ijazah ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_seri_skhu=='Ya'){ ?>		
		<tr>		    
		    <td>No. Seri SKHU</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_seri_skhu ?></td>	
		</tr>
	<?php } ?>
	<?php if ($formulir->tahun_lulus=='Ya'){ ?>				
		<tr>
		    <td>Tahun Lulus</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tahun_lulus ?></td>
		</tr>
	<?php } ?>		
				
	<?php if ($formulir->nilai_rapor=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata Rapor/SKL</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nilai_rapor ?></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->nilai_usbn=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata US</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nilai_usbn ?></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nilai_unbk_unkp=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata UN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nilai_unbk_unkp ?></td>
		</tr>
	<?php } ?>	
    </table>

	<?php if ($raporsemester) { ?> 
	    <table border="1" class="empat">
	    	<tr>
	            <th rowspan="2" width="36px">No</th>
	            <th rowspan="2">Mata Pelajaran</th>
		        <th colspan="5">Nilai Semester</th>
	        </tr>
	    	<tr>
		        <th>1</th>
	            <th>2</th>
	            <th>3</th>
	            <th>4</th>
	            <th>5</th>
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
	    </table><br>
	<?php } ?>    

	<?php if ($prestasipeserta) { ?>    
	    <table border="1" class="empat">
	    	<tr>
	            <th>No</th>
	            <th>Jenis</th>
		        <th>Nama Prestasi</th>
	            <th>Tahun</th>
	            <th>Penyelenggara</th>
	            <th>Tingkat</th>
	            <th>Juara</th>
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
	    </table><br>
	<?php } ?>

 	<table>
		<tr>
			<td style="width: 200px">Mengetahui</td>
			<td></td>  	    
			<td></td>
			<td rowspan="4" style="text-align: center">
                <?php 
                if ($berkas) { ?>  
                  <img src="<?php echo base_url('assets/uploads/attachment/'.$berkas->nama_berkas) ?>" width="100px" height="120px">
                <?php } else { ?>
                  <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="60px" height="70px">
                <?php } ?>    
			</td> 
			<td colspan="2">
				<?php
					echo ucwords($pengaturan->kecamatan).','; 
					if ($peserta->tgl_daftar_ulang=='0000-00-00') {
						echo "";
					} else {
						echo format_indo(date('Y-m-d', strtotime($peserta->tgl_daftar_ulang)));		
					}
				?>
			</td>		
        </tr>  
		<tr>
			<td>Orang Tua/Wali</td>
			<td></td>  	    
			<td></td>
			<td style="width: 200px">Calon Siswa</td>
			<td></td>  			
        </tr> 
		<tr>
			<td><br><br><br><br><br><br></td>
			<td></td>  	    
			<td></td>
			<td></td>
			<td></td>  			
        </tr>   
		<tr>
			<td style="font-size: 12px;border-top: 1px solid">Nama Terang dan Tanda Tangan</td>
			<td></td>  	    
			<td></td>
			<td style="font-size: 12px;border-top: 1px solid">Nama Terang dan Tanda Tangan</td>
			<td></td>  			
        </tr>
		<tr>
			<td colspan="6" style="font-size: 12px;">
			<br>
			<?php foreach ($pengumuman as $text) { ?>				
				<?php echo $text->text ?>
			<?php } ?>
			<br><br>				
			</td>	    
        </tr>  
		<tr>	
			<td rowspan="3">
				<img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
			</td> 
			<td></td>
			<td></td>  
			<td rowspan="3" style="text-align: center"></td>	    
		    <td colspan="2"><br></td>
        </tr>    
		<tr>	
			<td></td> 
			<td></td>   
		    <td><br><br><br><br><br><br></td>
		    <td></td> 
        </tr>  
		<tr>
			<td></td>
			<td></td>
			<td></td>   	    
		    <td><br></td>
        </tr>                                           
    </table>                          
</body>
<script type="text/javascript">
    window.print()
</script>
</html>