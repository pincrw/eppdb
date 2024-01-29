<?php if ($formulir->wawancara=='Ya') { ?>
  <?php if ($jawaban) { ?>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulir Wawancara</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">  
          <div class="callout callout-info">
            <p>Sudah mengisi formulir wawancara</p>
          </div> 
          <div class="small-box bg-primary">
            <div class="inner">
                <h3>Cetak</h3>
                <p>Bukti Wawancara</p>
            </div>
            <div class="icon">
              <i class="fas fa-print"></i>
            </div>
            <form action="printwawancara" method="post" target="blank">
              <button type="submit" class="btn bg-blue btn-flat btn-block btn-lg">Cetak Bukti Wawancara&nbsp; <i class="fa fa-print"></i></button>
            </form>
          </div>
        </div> 
      </div> 
    </div> 
  </div>         
  <?php } else { ?>
    <?php if ($wawancara) { ?>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Formulir Wawancara</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form action="add_jawaban" role="form" method="post" accept-charset="utf-8">
                  <div class="form-group">
                      <label for="int">Ketentuan Wawancara</label>                
                        <div class="callout callout-info">
                          <?php foreach ($pengumuman as $text) { ?>       
                            <?php echo $text->text ?>
                          <?php } ?>
                        </div>                
                  </div>
                  <?php
                      foreach ($wawancara as $value)
                  { ?>
                  <div class="form-group">
                    <label for="text"><?php echo $value->pertanyaan ?></label>
                    <input type="hidden" class="form-control" name="id_peserta[]" id="id_peserta" value="<?php echo $nomer->id_peserta; ?>" />
                    <input type="hidden" class="form-control" name="id_wawancara[]" id="id_wawancara" value="<?php echo $value->id_wawancara; ?>" />
                    <input type="text" class="form-control" name="jawaban[]" id="jawaban" required />
                  </div>
                  <?php } ?>                                          
                  <div class="callout callout-info">
                    <p>
                      <ul>
                        <li>Proses pengisian formulir wawancara hampir selesai. Silahkan periksa kembali data-data yang sudah anda masukkan.</li>
                        <li>Pastikan data sudah sesuai dan lengkap.</li>
                        <li>Data yang sudah disimpan tidak dapat diperbaiki lagi.</li>
                      </ul> 
                    </p>                                
                  </div>    
                  <div class="form-group">
                    <label>Apakah data sudah sesuai dan lengkap? <span style="color:red;">*</label><br/>
                    <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, data sudah sesuai dan lengkap
                  </div> 
                  <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?= $user->id; ?>" />
                  <button type="submit" class="<?= $this->config->item('botton')?>">Simpan Formulir Wawancara</button>
              </form>
            </div>
          </div>
        </div>
      </div>  
    <?php } else { ?>  
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Formulir Wawancara</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="callout callout-info">
                <p>Tidak ada pertanyaan wawancara</p>
              </div>             
            </div>
          </div>
        </div>
      </div>  
    <?php } ?>
  <?php } ?>  
<?php } else { ?>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulir Wawancara</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="callout callout-info">
            <p>CATATAN : Tidak ada formulir wawancara yang perlu diisi</p>
          </div>             
        </div>
      </div>
    </div>
  </div>    
<?php } ?>  