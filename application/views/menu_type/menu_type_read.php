<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Menu Type Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table">
	           <tr><td>Type</td><td><?php echo $type; ?></td></tr>
	           <tr><td><a href="<?php echo site_url('menu_type') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
	        </table>
            </div>
        </div>
    </div>
</div>