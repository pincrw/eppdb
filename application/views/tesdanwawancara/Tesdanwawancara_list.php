<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">List Nilai Tes dan Wawancara</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                <i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form id="myform" method="post" onsubmit="return false">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-xs-6 col-md-6">
                        <?php echo anchor(site_url('tesdanwawancara/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                        <button type="button" class="btn bg-purple btn-flat" data-toggle="modal" data-target="#myModalImport">
                            <i class="fas fa-upload"></i><span class="hidden-xs">&nbsp; Import Nilai Tes dan Wawancara</span>
                        </button>                            
                        <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                    </div>
                    <div class="col-xs-6 col-md-6 text-right">
<!--                 		<?php echo anchor(site_url('tesdanwawancara/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?> -->
                		<?php echo anchor(site_url('tesdanwawancara/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
<!--                 		<?php echo anchor(site_url('tesdanwawancara/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn bg-purple btn-flat"'); ?> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                        <thead>
                            <tr>
                                <th width=""></th>
                                <th width="10px">No</th>
                    		    <!-- <th>Id Peserta</th> -->
                                <th>No Pendaftaran</th>
                                <th>Nama Peserta</th>
                    		    <th>Nilai Tes</th>
                    		    <th>Nilai Wawancara</th>
                                <th>Kesimpulan Wawancara</th>    	
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Import-->
<div class="modal fade" id="myModalImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-clipboard-list"></i>&nbsp; Import Nilai Tes dan Wawancara</h4>
      </div>
      <div class="modal-body">
        <div class="row">            
            <form action="tesdanwawancara/upload_nilaitesdanwawancara" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <?php echo anchor(site_url('peserta/formatnilaitesdanwawancara'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Format Nilai Tes dan Wawancara</span>', 'class="btn btn-info btn-flat"'); ?>
                    </div>
                    <div class="form-group">
                        <label>File Nilai Tes dan Wawancara</label>
                        <input type="file" id="file" name="file" class="form-control">
                        <p class="help-block">format file (xls, xlsx), max 10000 kb.</p>
                    </div>
                    <div class="form-group">    
                        <button type="submit" class="<?= $this->config->item('botton')?>">Import File</button>
                        <!-- <a href="<?php echo site_url('sekolah') ?>" class="btn btn-default btn-flat">Batal</a> -->
                    </div>
                </div>
            </form>
        </div>                    
      </div>
    </div>
  </div>
</div>