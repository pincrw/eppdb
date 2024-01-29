<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pembayaran Detail</h3>
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
                <div class="col-xs-12 col-md-6">
                    <table class="table">
                	    <tr><td>No Transaksi</td><td><?php echo $no_transaksi; ?></td></tr>
                	    <tr><td>Nama Peserta</td><td><?php echo $full_name; ?></td></tr>
                	    <tr><td>Pembayaran</td><td><?php echo $pembayaran; ?></td></tr>
                	    <tr><td>Jumlah Bayar</td><td><?php echo $jumlah_bayar; ?></td></tr>
                	    <tr><td>Tanggal Bayar</td><td><?php echo $tanggal_bayar; ?></td></tr>
                	    <tr><td>Petugas</td><td><?php echo $petugas; ?></td></tr>
                	    <tr><td>Bukti Bayar</td><td><?php echo $bukti_bayar; ?></td></tr>
                	    <tr><td>Jenis Bayar</td><td><?php echo $jenis_bayar; ?></td></tr>
                        <tr><td>Status Bayar</td><td><?php echo $status_bayar; ?></td></tr>
                	    <tr><td><a href="<?php echo site_url('pembayaran') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
                	</table>
                </div>
                <div class="col-xs-12 col-md-6">     
                    <img src="<?php echo base_url('assets/uploads/attachment/'.$bukti_bayar) ?>" width="100%">
                </div>                    
            </div>
        </div>
    </div>
</div>