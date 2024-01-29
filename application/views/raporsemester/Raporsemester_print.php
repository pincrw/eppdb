<!DOCTYPE html>
<html>
<head>
    <title>Rapor Semester</title>
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
    <h3 align="center">Data Rapor Semester</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>