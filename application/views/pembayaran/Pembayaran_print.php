<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 11px;
        padding-bottom: 11px;
        background-color: #a29bfe;
    }
    table td{
        border: 1px solid;
    }
    </style>
</head>
<body>
    <h3 align="center">Data Pembayaran</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>