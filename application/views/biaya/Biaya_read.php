<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Biaya Detail</h3>
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
                    <tr><td>Tahun</td><td><?php echo $tahun_pelajaran; ?> <?php echo $ket; ?></td></tr>
            	    <tr><td>Nama Biaya</td><td><?php echo $nama_biaya; ?></td></tr>
            	    <tr><td>Jumlah Biaya</td><td><?php echo $jumlah_biaya; ?></td></tr>
                    <tr><td>Jenis Biaya</td><td><?php echo $jenis_biaya; ?></td></tr>
            	    <tr><td>Status Biaya</td><td><?php echo $status_biaya; ?></td></tr>
            	    <tr><td><a href="<?php echo site_url('biaya') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
            	</table>
            </div>
        </div>
    </div>
</div>