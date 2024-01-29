<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Raporsemester Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
            	    <!-- <tr><td>Id Peserta</td><td><?php echo $id_peserta; ?></td></tr> -->
                    <tr><td>No Pendaftaran</td><td><?php echo $no_pendaftaran; ?></td></tr>
                    <tr><td>Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
            	    <tr><td>Mata Pelajaran</td><td><?php echo $mapel; ?></td></tr>
            	    <tr><td>Nilai Semester Satu</td><td><?php echo $satu; ?></td></tr>
            	    <tr><td>Nilai Semester Dua</td><td><?php echo $dua; ?></td></tr>
            	    <tr><td>Nilai Semester Tiga</td><td><?php echo $tiga; ?></td></tr>
            	    <tr><td>Nilai Semester Empat</td><td><?php echo $empat; ?></td></tr>
            	    <tr><td>Nilai Semester Lima</td><td><?php echo $lima; ?></td></tr>
	                <tr><td><a href="<?php echo site_url('raporsemester') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
	            </table>
            </div>
        </div>
    </div>
</div>