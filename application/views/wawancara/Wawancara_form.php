<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Wawancara</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">

            <div class="form-group">
                <label for="longtext">Pertanyaan <?php echo form_error('pertanyaan') ?></label>
                <textarea id="pertanyaan" name="pertanyaan" style="height: 180px;"><?php echo $pertanyaan; ?></textarea>
            </div>             
    	    <input type="hidden" name="id_wawancara" value="<?php echo $id_wawancara; ?>" /> 
    	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('wawancara') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>
</div>