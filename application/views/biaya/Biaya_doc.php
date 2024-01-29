<!doctype html>
<html>
    <head>
        <title>codeigniter crud generator</title>
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
        <h2>Biaya List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Periode</th>
        		<th>Nama Biaya</th>
        		<th>Jumlah Biaya</th>
                <th>Jenis Biaya</th>
        		<th>Status Biaya</th>
            </tr>
            <?php
                foreach ($biaya_data as $biaya)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
                <td><?php echo $biaya->tahun_pelajaran ?></td>
                <td><?php echo $biaya->ket ?></td>
		        <td><?php echo $biaya->nama_biaya ?></td>
		        <td><?php echo $biaya->jumlah_biaya ?></td>
                <td><?php echo $biaya->jenis_biaya ?></td>
		        <td><?php echo $biaya->status_biaya ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>