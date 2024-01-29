<!DOCTYPE html>
<html>
<head>
    <title>Surat Keterangan</title>
    <style type="text/css" media="print">
    @page {
        margin-top: 30;  /* this affects the margin in the printer settings */
    	margin-bottom: 150;
    	margin-left: 50;
    	margin-right: 50;
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;       
        width: 100%;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #39CCCC;
        /*text-align: left;*/
    }
    table td{    
        /*border: 0px solid;*/
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
    .ttd {
        position: absolute;
        left: 490px;
        top: 595px;
/*        top: 615px;*/
    }  
    .stempel {
        position: absolute;
        left: 430px;
        top: 575px;
    }        	
    </style>
</head>
<body> 
<?php if ($pengaturan->sttd=="Ya") {
    if (file_exists('assets/dist/img/'.$pengaturan->ttd)) { ?>    
        <div class="ttd">
            <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->ttd) ?>" height="<?php echo $pengaturan->httd ?>px">
        </div>
    <?php }
    } ?>
<?php if ($pengaturan->sstempel=="Ya") {
    if (file_exists('assets/dist/img/'.$pengaturan->stempel)) { ?>     
        <div class="stempel">
            <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->stempel) ?>" height="<?php echo $pengaturan->hstempel ?>px">
        </div>
    <?php }
    } ?>
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
    <br>
    <br>
 	<table>    
		<tr>	
			<td colspan="3" style="text-align: center"><strong>SURAT KETERANGAN</strong></td>	    
        </tr> 
		<tr>	    
		    <td colspan="3" style="text-align: center">
                <strong>Nomor :
                <?php foreach ($pengumuman as $text) {             
                    echo $text->judul;
                } ?> 
                </strong>
            </td>
        </tr>  
		<tr>	    
		    <td colspan="3" style="text-align: center"><br><br></td>
        </tr>
		<tr>	
			<td colspan="3" style="text-align: center"><strong>TENTANG</strong></td>	    
        </tr> 
		<tr>	
			<td colspan="3" style="text-align: center"><strong>HASIL SELEKSI CALON PESERTA DIDIK BARU</strong></td>	    
        </tr>
        <?php $tp = $peserta->tahun_pelajaran + 1; ?>  
		<tr>	
			<td colspan="3" style="text-align: center"><strong>TAHUN PELAJARAN <?php echo $peserta->tahun_pelajaran ?>/<?php echo $tp ?></strong></td>	    
        </tr>
		<tr>	    
		    <td colspan="3" style="text-align: center"><br><br></td>
        </tr>        
    </table>
    <table class="word-table" style="margin-bottom: 10px">	
    	<tr>
            <td colspan="5" style="text-align: justify">Berdasarkan keputusan kepala <?php echo strtoupper($pengaturan->nama_sekolah) ?> tanggal <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_pengumuman))) ?> tentang hasil seleksi calon peserta didik baru tahun pelajaran <?php echo $peserta->tahun_pelajaran ?>/<?php echo $tp ?> menerangkan bahwa :</td>
        </tr> 
    	<tr>
            <td width="30px"></td>
            <td width="150px">Nama</td>
	        <td colspan="3">: <strong><?php echo strtoupper($peserta->nama_peserta) ?></strong></td>
        </tr> 
    	<tr>
            <td></td>
            <td>No. Pendaftaran</td>
	        <td>: <?php echo $peserta->no_pendaftaran ?></td>
            <td></td>
            <td></td>
        </tr>                   	
    	<tr>
            <td></td>
            <td>Asal Sekolah</td>
	        <td colspan="3">: <?php echo strtoupper($peserta->asal_sekolah) ?></td>
        </tr> 
    	<tr>
            <td></td>
            <td>Dinyatakan</td>
	        <td colspan="3">: <strong><?php echo strtoupper($peserta->status_hasil) ?></strong></td>
        </tr>
        <?php if ($formulir->jurusan=='Ya') { ?>
    	<tr>
            <td></td>
            <td>Program</td>
	        <td colspan="3">: <?php echo ucwords($peserta->nama_jurusan) ?></td>
        </tr>
        <?php } ?>          
    	<tr>
            <td colspan="5" style="text-align: justify"><br>selanjutnya kepada calon peserta didik yang dinyatakan <strong>DI TERIMA</strong> untuk melakukan <strong>DAFTAR ULANG</strong> sesuai dengan ketentuan.</td>
        </tr>
        <tr>
            <td colspan="5"><br>Demikian surat keterangan ini dibuat, untuk digunakan seperlunya.</td>
        </tr>                                                  
    </table>
	<br>

 	<table>    
		<tr>	
			<td rowspan="3" width="140px" style="text-align: center">
				<img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
			</td> 
			<td width="150px"></td>
			<td rowspan="3" width="100px" style="text-align: center"></td>  
			<td width="40px"></td>	    
		    <td><?php echo ucwords($pengaturan->kecamatan) ?>, <?php echo format_indo(date('Y-m-d', strtotime($peserta->tanggal_pengumuman))) ?></td>
        </tr> 
		<tr>	
			<td></td> 
			<td></td>   
		    <td>Kepala Sekolah,<br><br><br><br><br><br><br>
            </td>
        </tr>   
		<tr>
			<td></td>
			<td></td>  	    
		    <td><strong><?php echo $pengaturan->kepala_sekolah ?></strong></td>
        </tr> 
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>   	    
		    <td>NIP. <?php echo $pengaturan->nip ?></td>
        </tr>           
		<tr>
			<td colspan="5" style="font-size: 13px"><br>
			<?php foreach ($pengumuman as $text) { ?>				
				<?php echo $text->text ?>
			<?php } ?>				
			</td>	    
        </tr>                                     
    </table>
</body>
<script type="text/javascript">
    window.print()
</script>
</html>