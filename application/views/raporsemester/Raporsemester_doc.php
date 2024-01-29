<!doctype html>
<html>
    <head>
        <title>Rapor Semester</title>
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
        <h2>Rapor Semester List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th rowspan="2">No</th>
        		<!-- <th rowspan="2">Id Peserta</th> -->
                <th rowspan="2">No Pendaftaran</th>
                <th rowspan="2">Nama Peserta</th>
        		<th rowspan="2">Mapel</th>
                <th colspan="5">Nilai Semester</th>
            </tr>
            <tr>    
        		<th>Satu</th>
        		<th>Dua</th>
        		<th>Tiga</th>
        		<th>Empat</th>
        		<th>Lima</th>	
            </tr>
            <?php
                foreach ($raporsemester_data as $raporsemester)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <!-- <td><?php echo $raporsemester->id_peserta ?></td> -->
                <td><?php echo $raporsemester->no_pendaftaran ?></td>
                <td><?php echo $raporsemester->nama_peserta ?></td>
		        <td><?php echo $raporsemester->mapel ?></td>
		        <td><?php echo $raporsemester->satu ?></td>
		        <td><?php echo $raporsemester->dua ?></td>
		        <td><?php echo $raporsemester->tiga ?></td>
		        <td><?php echo $raporsemester->empat ?></td>
		        <td><?php echo $raporsemester->lima ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>