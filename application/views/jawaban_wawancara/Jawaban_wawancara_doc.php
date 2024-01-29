<!doctype html>
<html>
    <head>
        <title>Jawaban Wawancara</title>
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
        <h2>Jawaban Wawancara List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<!-- <th>Id Peserta</th> -->
                <th>No Pendaftaran</th>
                <th>Nama Peserta</th>
        		<!-- <th>Id Wawancara</th> -->
                <th>Pertanyaan</th>
        		<th>Jawaban</th>		
            </tr>
            <?php
                foreach ($jawaban_wawancara_data as $jawaban_wawancara)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <!-- <td><?php echo $jawaban_wawancara->id_peserta ?></td> -->
                <td><?php echo $jawaban_wawancara->no_pendaftaran ?></td>
                <td><?php echo $jawaban_wawancara->nama_peserta ?></td>
		        <!-- <td><?php echo $jawaban_wawancara->id_wawancara ?></td> -->
                <td><?php echo $jawaban_wawancara->pertanyaan ?></td>
		        <td><?php echo $jawaban_wawancara->jawaban ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>