<!DOCTYPE html>
<html>
<head>
    <title>Jawaban Wawancara</title>
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
    <h3 align="center">Data Jawaban Wawancara</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>