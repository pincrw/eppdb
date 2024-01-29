<!DOCTYPE html>
<html>
<head>
    <title>Formulir Wawancara</title>
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
            <td class="tiga"><strong>FORMULIR WAWANCARA PESERTA DIDIK BARU</strong></td>
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
            <?php if ($formulir->kode_formulir=="Ya") { ?>
                <td width="200" style="border-bottom: 1px dotted"><strong><?php echo $formulir->kode_luring ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-L</strong></td>
                <td width="200"></td>
                <td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FW-L <?php echo $tp->ket ?></td>
            <?php } else { ?>
                <td width="200" style="border-bottom: 1px dotted"><strong><?php echo $formulir->kode_luring ?></strong></td>
                <td width="200"></td>
                <td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FW <?php echo $tp->ket ?></td>
            <?php } ?>
        </tr>                                                            
    </table>    
    <?php $th = $tp->tahun_pelajaran + 1; ?>
    <h3 style="text-align: center">FORMULIR WAWANCARA PESERTA DIDIK BARU<br>
    TAHUN PELAJARAN <?php echo $tp->tahun_pelajaran ?>/<?php echo $th ?></h3>     
    <table>    
        <tr>    
            <td width="150">Nama Peserta</td>        
            <td width="10">: </td>
            <td style="border-bottom: 1px dotted"></td>
        </tr>  
        <tr>    
            <td>Asal Sekolah</td>       
            <td>: </td>
            <td style="border-bottom: 1px dotted"></td>
        </tr>              
        <tr>    
            <td>Usia</td>       
            <td>: </td>
            <td style="border-bottom: 1px dotted"></td>
        </tr>                                                                        
    </table>      
    <br>    
    <table class="word-table" style="margin-bottom: 10px">      
        <?php
            foreach ($wawancara_data as $value)
        { ?>
        <tr>
            <td style="text-align: left;width: 30"><?php echo ++$start ?>.</td>
            <td><?php echo $value->pertanyaan ?></td>   
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="border-bottom: 1px dotted"></td> 
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="border-bottom: 1px dotted">&nbsp;</td>   
        </tr>     
        <tr>
            <td>&nbsp;</td>
            <td style="border-bottom: 1px dotted">&nbsp;</td>   
        </tr>             
        <?php } ?>                              
    </table>        
    <br>
    <table>    
        <tr>
            <td style="width: 200px">Mengetahui</td>
            <td></td>       
            <td></td>
            <td></td> 
            <td colspan="2"><?php echo ucwords($pengaturan->kecamatan) ?>, ....................</td>     
        </tr>  
        <tr>
            <td>Orang Tua/Wali</td>
            <td></td>       
            <td></td>
            <td></td> 
            <td style="width: 200px">Calon Siswa</td>
            <td></td>           
        </tr> 
        <tr>
            <td><br><br><br><br></td>
            <td></td>       
            <td></td>
            <td></td> 
            <td></td>
            <td></td>           
        </tr>   
        <tr>
            <td style="font-size: 12px;border-top: 1px solid">Nama Terang dan Tanda Tangan</td>
            <td></td>       
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
<!--         <tr>    
            <td rowspan="3" style="text-align: center"></td> 
            <td></td>
            <td rowspan="3" style="text-align: center">
                  <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="60px" height="70px">
            </td>  
            <td></td>       
            <td colspan="2"><?php echo ucwords($pengaturan->kecamatan) ?>, ....................</td>
        </tr> 
        <tr>    
            <td></td> 
            <td></td>   
            <td style="border-bottom: 1px solid">Petugas Pendaftar<br><br><br><br><br><br></td>
            <td></td> 
        </tr>  
        <tr>
            <td></td>
            <td></td>
            <td></td>           
            <td><br></td>
        </tr>      -->                                      
    </table>                 
</body>
<script type="text/javascript">
    window.print()
</script>
</html>