<!doctype html>
<html>
    <head>
        <title>Nilai Tes dan Wawancara</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tes dan wawancara List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<!-- <th>Id Peserta</th> -->
                <th>No Pendaftaran</th>
                <th>Nama Peserta</th>
        		<th>Nilai Tes</th>
        		<th>Nilai Wawancara</th>		
            </tr>
            <?php
                foreach ($tesdanwawancara_data as $tesdanwawancara)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <!-- <td><?php echo $tesdanwawancara->id_peserta ?></td> -->
                <td><?php echo $tesdanwawancara->no_pendaftaran ?></td>
                <td><?php echo $tesdanwawancara->nama_peserta ?></td>
		        <td><?php echo $tesdanwawancara->nilai_tes ?></td>
		        <td><?php echo $tesdanwawancara->nilai_wawancara ?></td>
                <td><?php echo $tesdanwawancara->kesimpulan ?></td>                	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>