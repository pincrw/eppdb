<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran</title>
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
        font-size: 15px;
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
/*        border: 1px solid;*/
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
 
	<table style="background-image: url('assets/dist/img/kwitansi.jpg');background-size:cover;background-repeat:no-repeat;">
		<tr>	
			<td colspan="9" style="border-top:1px dotted">&nbsp;</td>	    
        </tr>		
		<tr>
			<td rowspan="9" style="width:2%"></td>	
			<td rowspan="9" style="width:13%;"></td>
			<td rowspan="9" style="width:6%"></td>
			<td colspan="5" style="text-align:right; width:30%;font-size:20px"><strong>Kwitansi</strong></td>
			<td rowspan="9" style="width:3%"></td>	    
        </tr>	    
        <tr>	
			<td style="border-bottom:1px dotted">No. <?php echo $pembayaran->no_transaksi ?></td>
			<td colspan="4"></td>	    
        </tr> 
		<tr>	
			<td style="width:20%">Telah terima dari</td>
			<td style="width:2%">:</td>	    
		    <td colspan="3" style="border-bottom:1px dotted"><?php echo strtoupper($pembayaran->full_name) ?></td>
        </tr>        
		<tr>	
			<td>Uang sejumlah</td>
			<td>:</td>
			<?php
				$terbilang=strtoupper($pembayaran->jumlah_bayar);
			?>	    
		    <td colspan="3" style="border-bottom:1px dotted"><?php echo ucwords(terbilang($terbilang)) ?> Rupiah</td>
        </tr>
		<tr>	
			<td style="vertical-align:text-top;">Untuk pembayaran</td>
			<td style="vertical-align:text-top;">:</td>
			<td colspan="3" style="border-bottom:1px dotted"><?php echo $pembayaran->jenis_bayar ?> (<?php echo $pembayaran->pembayaran ?>)</td>	    
        </tr>
		<tr>	
			<td colspan="5">&nbsp;</td>    
        </tr>        
        <tr>	
			<td colspan="3"></td>
			<td></td>
			<td style="width:40%"><?php echo $pengaturan->kecamatan ?>, <?php echo format_indo(date('Y-m-d', strtotime($pembayaran->tanggal_bayar))); ?></td>	    
        </tr>
		<tr>	   
		    <td colspan="3" style="font-size:20px;text-align:center;background-color:#EEEEEE;font-style:italic;border:1px dotted"><strong>Rp. <?php echo number_format($pembayaran->jumlah_bayar,2,',','.');?></strong></td>
		    <td></td>
		    <td><br><br><br></td>
        </tr>
		<tr>	   
		    <td colspan="3"></td>
		    <td></td>
		    <td><?php echo $pembayaran->petugas ?></td>
        </tr>
		<tr>	
			<td colspan="9">&nbsp;</td>	    
        </tr>
		<tr>	
			<td colspan="9" style="font-size:10px;font-style:italic;border-bottom:1px dotted"><br><br>Dokumen ini resmi di keluarkan oleh <?php echo $pengaturan->nama_sekolah ?> melalui <?php echo $pengaturan->website ?></td>	    
        </tr>        
    </table>

</body>
<script type="text/javascript">
    window.print()
</script>
</html>