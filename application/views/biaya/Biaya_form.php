<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Biaya</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <style>
              .select2{width:100% !important};
            </style>                
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="int">Tahun <span style="color:red;">*</span> <?php echo form_error('id_tahun') ?> </label>
                <?php if ($button=="Tambah") { ?>                     
                    <select type="text" class="select2 form-control" name="id_tahun" id="id_tahun" value="" required />
                        <option value="">Pilih Tahun</option> 
                        <?php foreach ($tahun as $key => $value) { ?>
                            <option value="<?= $value->id_tahun;?>"<?php echo set_select('id_tahun', $value->id_tahun); ?>>
                                <?= $value->tahun_pelajaran;?> <?= $value->ket;?>
                            </option>
                        <?php }?>
                    </select>
                <?php } else { ?>
                    <select type="text" class="select2 form-control" name="id_tahun" id="id_tahun" value="" />
                        <option value="<?php echo $id_tahun; ?>"><?php echo $tahun_pelajaran; ?> <?php echo $ket; ?></option> 
                        <?php foreach ($tahun as $key => $value) { ?>
                            <option value="<?= $value->id_tahun;?>">
                                <?= $value->tahun_pelajaran;?> <?= $value->ket;?>
                            </option>
                        <?php }?>
                    </select>                    
                <?php } ?>    
                </div>
           
        	    <div class="form-group">
                    <label for="varchar">Nama Biaya <span style="color:red;">*</span> <?php echo form_error('nama_biaya') ?></label>
                    <input type="text" class="form-control" name="nama_biaya" id="nama_biaya" placeholder="Nama Biaya" value="<?php echo $nama_biaya; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Jumlah Biaya <span style="color:red;">*</span> <?php echo form_error('jumlah_biaya') ?></label>
                    <input type="text" class="form-control" name="jumlah_biaya" id="jumlah_biaya" placeholder="Jumlah Biaya" onkeypress="return Angkasaja(event)" value="<?php echo $jumlah_biaya; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Jenis Biaya <span style="color:red;">*</span> <?php echo form_error('jenis_biaya') ?></label>
                    <select type="text" class="form-control" name="jenis_biaya" id="jenis_biaya" placeholder="Jenis Biaya" value="" required/>
                        <option value="<?php echo $jenis_biaya; ?>"><?php echo $jenis_biaya; ?></option>
                        <option value="Pendaftaran">Pendaftaran</option>
                        <option value="Daftar ulang">Daftar ulang</option>
                    </select>
                </div>

        	    <div class="form-group">
                    <label for="varchar">Status Biaya <span style="color:red;">*</span> <?php echo form_error('status_biaya') ?></label>
                    <select type="text" class="form-control" name="status_biaya" id="status_biaya" placeholder="Status Biaya" value="" required/>
                        <option value="<?php echo $status_biaya; ?>"><?php echo $status_biaya; ?></option>
                        <option value="Wajib">Wajib</option>
                        <option value="Tidak Wajib">Tidak Wajib</option>
                    </select>
                </div>
        	    <input type="hidden" name="id_biaya" value="<?php echo $id_biaya; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('biaya') ?>" class="btn btn-default btn-flat">Batal</a>
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