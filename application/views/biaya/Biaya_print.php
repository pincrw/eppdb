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
    <h3 align="center">Data Biaya</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>