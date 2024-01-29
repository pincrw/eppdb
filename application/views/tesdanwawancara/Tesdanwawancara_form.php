<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> NIlai Tes dan wawancara</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
<style>
  .select2{width:100% !important};
</style>                
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="int">Nama Peserta <span style="color:red;">*</span> <?php echo form_error('id_peserta') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>
                    <select type="text" class="select2 form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="" />
                        <option value="">Pilih Nama Peserta</option>
                        <?php foreach ($peserta as $key => $value) { ?>
                            <option value="<?= $value->id_peserta;?>">
                                <?= $value->nisn;?> | <?= $value->no_pendaftaran;?> | <?= $value->nama_peserta;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } else if ($button=="Ubah") { ?>  
                        <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="<?php echo $tesdanwawancara->id_peserta; ?>" /> 
                        <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Peserta" value="<?php echo $tesdanwawancara->nisn; ?> | <?php echo $tesdanwawancara->no_pendaftaran; ?> | <?php echo $tesdanwawancara->nama_peserta; ?>" readonly/>
                    <?php } ?>                                  
                </div>

	            <div class="form-group">
                    <label for="varchar">Nilai Tes <span style="color:red;">*</span> <?php echo form_error('nilai_tes') ?></label>
                    <input type="text" class="form-control" name="nilai_tes" id="nilai_tes" placeholder="Nilai Tes" value="<?php echo $nilai_tes; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Wawancara <span style="color:red;">*</span> <?php echo form_error('nilai_wawancara') ?></label>
                    <input type="text" class="form-control" name="nilai_wawancara" id="nilai_wawancara" placeholder="Nilai Wawancara" value="<?php echo $nilai_wawancara; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Kesimpulan Wawancara <?php echo form_error('kesimpulan') ?></label>
                    <input type="text" class="form-control" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan Wawancara" value="<?php echo $kesimpulan; ?>" />
                </div>                
        	    <input type="hidden" name="id_tesdanwawancara" value="<?php echo $id_tesdanwawancara; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('tesdanwawancara') ?>" class="btn btn-default btn-flat">Batal</a>	
            </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Angkasaja(evt) 
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
</script>   