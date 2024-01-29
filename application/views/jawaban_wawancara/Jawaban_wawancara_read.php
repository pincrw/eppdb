<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Jawaban Wawancara Detail</h3>
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
                <table class="word-table" style="margin-bottom: 10px">
                    <tr><td style="text-align: left;width: 150px">No Pendaftaran</td><td>: <?php echo $no_pendaftaran; ?></td></tr>
                    <tr><td>Nama Peserta</td><td>: <?php echo $nama_peserta; ?></td></tr>
                    <!-- <tr><td>Nomor Hp</td><td>: <?php echo $nomor_hp; ?></td></tr> -->
                    <tr><td>Asal Sekolah</td><td>: <?php echo $asal_sekolah; ?></td></tr>
                    <?php
                        $tgl_lahir=new DateTime($tanggal_lahir);
                        $today = new DateTime('today');
                        $y = $today->diff($tgl_lahir)->y;
                        $m = $today->diff($tgl_lahir)->m;
                        $d = $today->diff($tgl_lahir)->d;
                        $usia = $y . " tahun " . $m . " bulan " . $d . " hari";     
                    ?>                    
                    <tr><td>Usia</td><td>: <?php echo $usia; ?></td></tr>
            	</table>
                <br>
                <table class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                          <th style="text-align: center" width="10px">No</th>
                          <th style="text-align: left;">Pertanyaan</th>
                          <th style="text-align: left;">Jawaban</th>
                        </tr>                     
                    </thead>
                    <tbody>           
                    <?php 
                    $i = 1;
                    foreach ($jawaban_wawancara as $value):?>
                       <tr>  
                          <td style="text-align: center"><?= $i++ ?></td>
                          <td><?php echo $value->pertanyaan ?></td>
                          <td><?php echo $value->jawaban ?></td>   
                        </tr>                                
                    <?php endforeach; ?>      
                    </tbody> 
                </table>  <br>
                <form action="<?php echo $action; ?>" method="post">
                <?php if ($nilai_wawancara) { ?>    
                    <div class="form-group">
                        <label for="varchar">Nilai Wawancara <?php echo form_error('nilai_wawancara') ?></label>                      
                        <input type="text" class="form-control" name="nilai_wawancara" id="nilai_wawancara" placeholder="Nilai Wawancara" value="<?php echo $nilai_wawancara->nilai_wawancara; ?>" readonly/>                       
                    </div>
                    <div class="form-group">
                        <label for="int">Kesimpulan Wawancara <?php echo form_error('kesimpulan') ?></label>
                        <input type="text" class="form-control" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan Wawancara" value="<?php echo $nilai_wawancara->kesimpulan; ?>" readonly/>
                    </div> 
                    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
                    <button type="submit" class="<?= $this->config->item('botton')?>" disabled><?php echo $button ?></button>
                    <a href="<?php echo site_url('jawaban_wawancara') ?>" class="btn btn-default btn-flat">Kembali</a>                    
                <?php } else { ?>
                    <div class="form-group">
                        <label for="varchar">Nilai Wawancara <span style="color:red;">*</span> <?php echo form_error('nilai_wawancara') ?></label>                
                        <input type="text" class="form-control" name="nilai_wawancara" id="nilai_wawancara" placeholder="Nilai Wawancara" value="<?= set_value('nilai_wawancara') ?>" onkeypress="return Angkasaja(event)" required/>
                    </div>
                    <div class="form-group">
                        <label for="int">Kesimpulan Wawancara <span style="color:red;">*</span> <?php echo form_error('kesimpulan') ?></label>
                        <input type="text" class="form-control" name="kesimpulan" id="kesimpulan" placeholder="Kesimpulan Wawancara" value="<?= set_value('kesimpulan') ?>" required/>
                    </div>  
                    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
                    <button type="submit" class="<?= $this->config->item('botton')?>" ><?php echo $button ?></button>
                    <a href="<?php echo site_url('jawaban_wawancara') ?>" class="btn btn-default btn-flat">Kembali</a>
                <?php } ?>                                  
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