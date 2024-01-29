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
        <h2>Pembayaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>No Transaksi</th>
        		<th>Nama Peserta</th>
        		<th>Pembayaran</th>
        		<th>Jumlah Bayar</th>
        		<th>Tanggal Bayar</th>
        		<th>Petugas</th>
        		<th>Bukti Bayar</th>
                <th>Jenis Bayar</th>
        		<th>Status Bayar</th>
            </tr>
            <?php
                foreach ($pembayaran_data as $pembayaran)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $pembayaran->no_transaksi ?></td>
		        <td><?php echo $pembayaran->full_name ?></td>
		        <td><?php echo $pembayaran->pembayaran ?></td>
		        <td><?php echo $pembayaran->jumlah_bayar ?></td>
		        <td><?php echo $pembayaran->tanggal_bayar ?></td>
		        <td><?php echo $pembayaran->petugas ?></td>
		        <td><?php echo $pembayaran->bukti_bayar ?></td>
                <td><?php echo $pembayaran->jenis_bayar ?></td>
		        <td><?php echo $pembayaran->status_bayar ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>