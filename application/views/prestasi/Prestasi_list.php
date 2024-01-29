<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Prestasi</h3>
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
                    <label for="varchar">Tingkat <span style="color:red;">*</span> <?php echo form_error('tingkat') ?></label>
                    <select type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat" value="" required/>
                        <option value="<?= set_value('tingkat') ?>"><?= set_value('tingkat') ?></option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Propinsi">Propinsi</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Hafiz Al Quran">Hafiz Al Quran</option>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="varchar">Kategori <span style="color:red;">*</span> <?php echo form_error('kategori') ?></label>
                    <select type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="" required/>
                        <option value="<?= set_value('kategori') ?>"><?= set_value('kategori') ?></option>
                        <option value="Perorangan">Perorangan</option>
                        <option value="Beregu">Beregu</option>
                    </select>   
                </div>
                <div class="form-group">
                    <label for="varchar">Peringkat <span style="color:red;">*</span> <?php echo form_error('juara') ?></label>
                    <select type="text" class="form-control" name="juara" id="juara" placeholder="Peringkat" value="" required/>
                        <option value="<?= set_value('juara') ?>"><?= set_value('juara') ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>  
                </div>
                <div class="form-group">
                    <label for="int">Poin Prestasi <span style="color:red;">*</span> <?php echo form_error('skor_prestasi') ?></label>
                    <input type="text" class="form-control" name="skor_prestasi" id="skor_prestasi" placeholder="Poin Prestasi" value="<?= set_value('skor_prestasi') ?>" required/>
                </div>
                <input type="hidden" name="id_prestasi" value="<?php echo $id_prestasi; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('prestasi') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Prestasi</h3>
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
                            <!-- tambah                             
                            <?php echo anchor(site_url('prestasi/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalImport">
                            <i class="fas fa-upload"></i><span class="hidden-xs">&nbsp; Import Data Prestasi</span>
                            </button>
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                    		<!-- print
                            <?php echo anchor(site_url('prestasi/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?> -->
                    		<?php echo anchor(site_url('prestasi/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- word
                    		<?php echo anchor(site_url('prestasi/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn bg-purple btn-flat"'); ?> -->
    	                </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                        		    <th>Tingkat</th>
                        		    <th>Kategori</th>
                        		    <th>Peringkat</th>
                        		    <th>Poin Prestasi</th>
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
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-graduation-cap"></i>&nbsp; Import Data Prestasi</h4>
      </div>
      <div class="modal-body">
        <div class="row">            
            <form action="prestasi/upload" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <a href="<?php echo base_url("assets/uploads/files/formatprestasi.xlsx"); ?>" class="btn bg-navy btn-flat"><i class="fas fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Templete Prestasi</span></a>
                    </div>
                    <div class="form-group">
                        <label>File input</label>
                        <input type="file" id="file" name="file" class="form-control">
                        <p class="help-block">format file (xls, xlsx), max 10000 kb.</p>
                    </div>
                    <!--                     
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        </div>
                    </div> 
                    -->
                    <div class="form-group">    
                        <button type="submit" class="<?= $this->config->item('botton')?>">Import File</button>
                        <!-- <a href="<?php echo site_url('jarak') ?>" class="btn btn-default btn-flat">Batal</a> -->
                    </div>
                </div>
            </form>
        </div>                    
      </div>
    </div>
  </div>
</div>