<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Rapor Semester</h3>
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
                    <select type="text" class="select2 form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="" required/>
                        <option value="">Pilih Nama Peserta</option>
                        <?php foreach ($peserta as $key => $value) { ?>
                            <option value="<?= $value->id_peserta;?>">
                                <?= $value->nisn;?> | <?= $value->no_pendaftaran;?> | <?= $value->nama_peserta;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } else if ($button=="Ubah") { ?>  
                        <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="<?php echo $raporsemester->id_peserta; ?>" /> 
                        <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Peserta" value="<?php echo $raporsemester->nisn; ?> | <?php echo $raporsemester->no_pendaftaran; ?> | <?php echo $raporsemester->nama_peserta; ?>" readonly/>
                    <?php } ?>                                  
                </div>
                <div class="form-group">
                    <label for="int">Mata Pelajaran <span style="color:red;">*</span> <?php echo form_error('mapel') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>
                    <select type="text" class="select2 form-control" name="mapel" id="mapel" placeholder="Mata Pelajaran" value="" required/>
                        <option value="">Pilih Mata Pelajaran</option>
                        <option value="PABP">Pendidikan Agama dan Budi Pekerti</option>
                        <option value="PPKn">Pendidikan Pancasila dan Kewarganegaraan</option>
                        <option value="BIND">Bahasa Indonesia</option>
                        <option value="MTK">Matematika</option>
                        <option value="IPA">Ilmu Pengetahuan Alam</option>
                        <option value="IPS">Ilmu Pengetahuan Sosial</option>
                        <option value="BING">Bahasa Inggris</option>
                        <option value="PJOK">Pendidikan Jasmani Olahraga dan Kesehatan</option>
                        <option value="SENBUD">Seni Budaya</option>
                        <option value="PRAKARYA">Prakarya</option>
                        <option value="INFORMATIKA">Informatika</option>
                        <option value="MULOK">Muatan Lokal</option> 
                    </select>
                    <?php } else if ($button=="Ubah") { ?>  
                        <input type="text" class="form-control" name="mapel" id="mapel" placeholder="Mata Pelajaran" value="<?php echo $mapel; ?>" readonly/>
                    <?php } ?>                                  
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Semester Satu <span style="color:red;">*</span> <?php echo form_error('satu') ?></label>
                    <input type="text" class="form-control" name="satu" id="satu" placeholder="Nilai Semester Satu" value="<?php echo $satu; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Semester Dua <span style="color:red;">*</span> <?php echo form_error('dua') ?></label>
                    <input type="text" class="form-control" name="dua" id="dua" placeholder="Nilai Semester Dua" value="<?php echo $dua; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Semester Tiga <span style="color:red;">*</span> <?php echo form_error('tiga') ?></label>
                    <input type="text" class="form-control" name="tiga" id="tiga" placeholder="Nilai Semester Tiga" value="<?php echo $tiga; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Semester Empat <span style="color:red;">*</span> <?php echo form_error('empat') ?></label>
                    <input type="text" class="form-control" name="empat" id="empat" placeholder="Nilai Semester Empat" value="<?php echo $empat; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <div class="form-group">
                    <label for="varchar">Nilai Semester Lima <span style="color:red;">*</span> <?php echo form_error('lima') ?></label>
                    <input type="text" class="form-control" name="lima" id="lima" placeholder="Nilai Semester Lima" value="<?php echo $lima; ?>" onkeypress="return Angkasaja(event)" required/>
                </div>
	            <input type="hidden" name="id_raporsemester" value="<?php echo $id_raporsemester; ?>" /> 
	            <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
	            <a href="<?php echo site_url('raporsemester') ?>" class="btn btn-default btn-flat">Batal</a>
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