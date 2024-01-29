<!DOCTYPE html>
<html>
<head>
    <title>Kartu Tes</title>
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
    <?php $th = $peserta->tahun_pelajaran + 1; ?>
	<h3 style="text-align: center">KARTU PESERTA TES PPDB<br>
	TAHUN PELAJARAN <?php echo $peserta->tahun_pelajaran ?>/<?php echo $th ?></h3>
    <table class="word-table" style="margin-bottom: 10px">				
		<tr>		    
		    <td style="width: 200px">No Pendaftaran</td>
		    <td style="width: 10px">: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->no_pendaftaran ?></td>
		    <td rowspan="6" style="text-align: center">
                <?php 
                if ($berkas) { ?>  
                  <img src="<?php echo base_url('assets/uploads/attachment/'.$berkas->nama_berkas) ?>" width="100px" height="120px">
                <?php } else { ?>
                  <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="60px" height="70px">
                <?php } ?> 
		    </td>
		</tr>
		<tr>		    
		    <td>Nama Peserta</td>
		    <td>: </td>
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
		<tr>    
		    <td>NISN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nisn ?></td>
		</tr>
		<tr>
		    <td>Tempat Tanggal Lahir</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->tempat_lahir ?>, <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_lahir))); ?></td>
		</tr>
		<tr>
		    <td>Agama</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->agama ?></td>
		</tr>
		<tr>
		    <td>Alamat</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->alamat ?></td>
		    <td></td>	
		</tr>
		<tr>    
		    <td>No. Handphone</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->nomor_hp ?></td>
		    <td rowspan="5" style="text-align: center">
		    	<img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
		    </td>			    
		</tr>   
		<tr>    
		    <td>Jalur Pendaftaran</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->jalur ?></td>
		</tr>
		<tr>		    
		    <td>Asal Sekolah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $peserta->asal_sekolah ?></td>
		</tr>			
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
		    <td><br></td>
		    <td></td>
		    <td></td>
		</tr>
		<tr>
		    <td><br></td>
		    <td></td>
		    <td></td>
		</tr>	
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
	    </table>
	<?php } ?>

 	<table>
		<tr>
			<td style="font-size: 12px;">
			<br>
			<?php foreach ($jadwaltes as $text) { ?>			
				<?php echo $text->text ?>
			<?php } ?>
			<br><br>				
			</td>	    
        </tr>                                                   
    </table>                     
</body>
<script type="text/javascript">
    window.print()
</script>
</html>