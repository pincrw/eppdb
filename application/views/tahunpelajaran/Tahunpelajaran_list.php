<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Tahun Pelajaran</h3>
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
                <div class="row">
                    <div class="col-xs-12 col-md-6">                
                        <div class="form-group">
                            <label for="varchar">Tahun Pelajaran <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" placeholder="Contoh : 2020" value="<?= set_value('tahun_pelajaran') ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6"> 
                        <div class="form-group">
                            <label for="varchar">Kuota <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="kuota" id="kuota" placeholder="Kuota" value="<?= set_value('kuota') ?>" required/>
                        </div>
                    </div>
                </div>                        
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="date">Mulai Pendaftaran <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_mulai_pendaftaran" id="tanggal_mulai_pendaftaran" placeholder="Tanggal Mulai Pendaftaran" value="<?= set_value('tanggal_mulai_pendaftaran') ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">   
                        <div class="form-group">
                            <label for="date">Selesai Pendaftaran <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_selesai_pendaftaran" id="tanggal_selesai_pendaftaran" placeholder="Tanggal Selesai Pendaftaran" value="<?= set_value('tanggal_selesai_pendaftaran') ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">                
                        <div class="form-group">
                            <label for="date">Mulai Seleksi <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_mulai_seleksi" id="tanggal_mulai_seleksi" placeholder="Tanggal Mulai Seleksi" value="<?= set_value('tanggal_mulai_seleksi') ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                          
                        <div class="form-group">
                            <label for="date">Selesai Seleksi <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_selesai_seleksi" id="tanggal_selesai_seleksi" placeholder="Tanggal Selesai Seleksi" value="<?= set_value('tanggal_selesai_seleksi') ?>" required/>
                        </div>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="date">Tanggal Pengumuman <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="tanggal_pengumuman" id="tanggal_pengumuman" placeholder="Tanggal Pengumuman" value="<?= set_value('tanggal_pengumuman') ?>" required/>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">                
                        <div class="form-group">
                            <label for="date">Mulai Daftar Ulang <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_mulai_daftar_ulang" id="tanggal_mulai_daftar_ulang" placeholder="Tanggal Mulai Daftar Ulang" value="<?= set_value('tanggal_mulai_daftar_ulang') ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6"> 
                        <div class="form-group">
                            <label for="date">Selesai Daftar Ulang <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="tanggal_selesai_daftar_ulang" id="tanggal_selesai_daftar_ulang" placeholder="Tanggal Selesai Daftar Ulang" value="<?= set_value('tanggal_selesai_daftar_ulang') ?>" required/>
                        </div>
                    </div>
                </div>                      
                <div class="form-group">
                    <label for="enum">Status <span style="color:red;">*</span></label>
                    <select type="text" class="form-control" name="status_tahun" id="status_tahun" placeholder="Status" value="" required/>
                        <option value="<?= set_value('status_tahun') ?>"><?= set_value('status_tahun') ?></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Keterangan</label>
                    <select type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan" value="" />
                        <option value="<?= set_value('ket') ?>"><?= set_value('ket') ?></option>
                        <option value="">Tanpa Gelombang</option>
                        <option value="Uji Coba">Uji Coba</option>
                        <option value="Gelombang 1">Gelombang 1</option>
                        <option value="Gelombang 2">Gelombang 2</option>
                        <option value="Gelombang 3">Gelombang 3</option>
                    </select>                    
                </div>                
                <input type="hidden" name="id_tahun" value="<?php echo $id_tahun; ?>" />
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('tahunpelajaran') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Tahun Pelajaran</h3>
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
                            <?php echo anchor(site_url('tahunpelajaran/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <!-- print
                    		<?php echo anchor(site_url('tahunpelajaran/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                            -->
                    		<?php echo anchor(site_url('tahunpelajaran/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- word 
                    		<?php echo anchor(site_url('tahunpelajaran/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>	
                            -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                        		    <th>Tahun Pelajaran</th>
                        		    <th>Kuota</th>
                                    <!--
                         		    <th>Tanggal Mulai Pendaftaran</th>
                        		    <th>Tanggal Selesai Pendaftaran</th>
                        		    <th>Tanggal Mulai Seleksi</th>
                        		    <th>Tanggal Selesai Seleksi</th>
                        		    <th>Tanggal Pengumuman</th>
                        		    <th>Tanggal Mulai Daftar Ulang</th>
                        		    <th>Tanggal Selesai Daftar Ulang</th> 
                                    -->
                        		    <th>Status</th>
                                    <th>Keterangan</th>
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