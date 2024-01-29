<!doctype html>
<html>
    <head>
        <title>Data Wawancara</title>
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
        <h2>Wawancara List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
            	<th>Pertanyaan</th>
            </tr>
            <?php
                foreach ($wawancara_data as $wawancara)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $wawancara->pertanyaan ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>