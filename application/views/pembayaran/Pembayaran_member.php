<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Pembayaran</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="box-body">
              <div class="row" style="margin-bottom: 10px">
                  <div class="col-xs-4 col-md-4">  
                  <?php if ($nomer) { ?>
                    <?php if ($nomer->status_hasil=='Di Terima') { ?>
                      <?php if ($biaya_du) { ?>
                        <button class="btn bg-purple btn-flat" data-toggle="modal" data-target="#myModalPembayaranDU"><i class="fa fa-plus"></i>&nbsp;&nbsp;Pembayaran daftar ulang</button>                      
                      <?php } else { ?>
                        <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalPembayaran"><i class="fa fa-plus"></i>&nbsp;&nbsp;Pembayaran pendaftaran</button>                      
                      <?php } ?> 
                    <?php } else { ?>
                      <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalPembayaran"><i class="fa fa-plus"></i>&nbsp;&nbsp;Pembayaran pendaftaran</button>                      
                    <?php } ?>                       
                  <?php } else { ?>
                      <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalPembayaran"><i class="fa fa-plus"></i>&nbsp;&nbsp;Pembayaran pendaftaran</button>                    
                  <?php } ?>                                       
                  </div>
                  <div class="col-xs-8 col-md-8 text-right">
                  </div>
              </div>                
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                  <thead>
                    <tr>
                      <th width="10px">No</th>
                      <th>Bukti Transfer</th>    
                      <th>No Transaksi</th>
                      <th>Nama Peserta</th>                                  
                      <th>Pembayaran</th>
                      <th>Jumlah Transfer</th>
                      <th>Tanggal Transfer</th>
                      <th>Petugas</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th width="80px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($pembayaran as $value): 
                    $id = $value->id_pembayaran;
                    ?>
                        <tr>
                          <td style="text-align: center"><?php echo $no++;?></td>
                          <td>
                            <?php 
                            if ($value->bukti_bayar) { ?>  
                              <img src="<?php echo base_url('assets/uploads/attachment/'.$value->bukti_bayar) ?>" width="50px">
                            <?php } else { ?>
                              <img src="<?php echo base_url('assets/dist/img/kwitansi.jpg') ?>" width="50px">
                            <?php } ?>
                          </td>
                          <td><?php echo $value->no_transaksi;?></td>
                          <td><?php echo $value->full_name;?></td>                       
                          <td><?php echo $value->pembayaran;?></td>
                          <td>Rp. <?php echo number_format($value->jumlah_bayar,2,',','.');?></td>
                          <td><?php echo $value->tanggal_bayar;?></td>
                          <td><?php echo $value->petugas;?></td>
                          <td><?php echo $value->jenis_bayar;?></td>
                          <td>
                            <?php if ($value->status_bayar=="Sudah bayar") { ?>
                              <span class="label bg-green"><?php echo $value->status_bayar;?></span>
                            <?php } else { ?>
                              <span class="label bg-yellow"><?php echo $value->status_bayar;?></span>
                            <?php } ?>
                          </td>
                          <td class="text-center">
                            <?php 
                              if ($value->status_bayar=="Sudah bayar") {
                              echo anchor('member/transactions/'.$id, '<i class="fa fa-print"></i>', 'class="btn btn-xs bg-purple btn-flat" onclick="return confirmdelete(\'member/del_pembayaran/'.$id.'\')" data-toggle="tooltip" title="Delete" target="blank"');
                              }
                            ?>
                            <?php echo anchor('member/del_pembayaran/'.$id, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'member/del_pembayaran/'.$id.'\')" data-toggle="tooltip" title="Delete"');?>
                          </td>                                        
                        </tr>
                      <?php endforeach;?>  
                  </tbody>                                    
                </table>
              </div>
              <?php if ($formulir->biaya=="Ya") { ?>
                <?php if ($nomer) { ?>
                  <?php if ($nomer->status_hasil=='Di Terima') { ?>              
                    <?php if ($biaya_du) { ?>
                      <div class="row">    
                        <div class="col-xs-12 col-md-12"> 
                          <div class="callout callout-info">                    
                            <table>
                              <tr>
                                <td width="250">Rincian biaya daftar ulang :</td>
                                <td></td>
                              </tr>
                              <?php
                                $du = number_format($tot_biaya_du_peserta->total,2,',','.');
                                $bayar = number_format($tot_bayar_user->total,2,',','.');
                                $sisa_bayar = $tot_biaya_du_peserta->total - $tot_bayar_user->total;
                                $sisa = number_format($sisa_bayar,2,',','.');
                              ?>                 
                              <tr>
                                <td>Jumlah biaya yang harus dibayarkan</td>
                                <td>: Rp. <?= $du;?></td>
                              </tr> 
                              <tr>
                                <td>Sub total</td>
                                <td>: Rp. <?= $bayar;?></td>
                              </tr>
                              <tr> 
                                <td>Kekurangan bayar</td>
                                <td>: Rp. <?= $sisa;?></td>
                              </tr>
                              <tr>
                                <td>Status</td>
                                <td>: 
                                  <?php if($du==$bayar) {
                                    echo "Lunas";
                                  } else if($du>$bayar) {
                                    echo "Belum Lunas";
                                  } else {
                                    echo "Lunas";  
                                  } ?>
                                </td>
                              </tr>                     
                            </table>
                          </div> 
                        </div>  
                      </div>                
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pembayaran -->
<div class="modal fade" id="myModalPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Konfirmasi Pembayaran</h4>
      </div>
      <div class="modal-body">  
      <style>
        .select2{width:100% !important};
      </style>         
        <div class="row">
          <?php if ($formulir->biaya=='Ya') { ?>
            <?php if ($biaya) { ?>           
              <?php if ($pendaftaran) { ?>
                <div class="col-xs-12 col-md-12">
                  <div class="callout callout-info">
                    Sudah konfirmasi pembayaran pendaftaran
                  </div>  
                </div> 
              <?php } else { ?>            
                <form action="konfirmasi_pembayaran" method="post" enctype="multipart/form-data">
                  <div class="col-xs-12 col-md-12">
                    <div class="callout callout-warning">
                      Rincian Biaya :
                      <?php foreach ($biaya as $value) { ?>       
                        <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
                      <?php } ?>
                      Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya->total,2,',','.');?>               
                    </div> 
                    <div class="form-group">
                      <label for="varchar">Pilih Pembayaran <span style="color:red;">*</span></label> 
                    </div>  
                    <div class="form-group">
                      <?php foreach ($biaya as $key => $value) { ?>
                        <input type="checkbox" name="pembayaran[]" alt="Checkbox" value="<?= $value->nama_biaya;?>" required />&nbsp;<?= $value->nama_biaya;?>&nbsp;
                      <?php }?>
                    </div> 
                    <div class="form-group">
                      <label for="varchar">Jumlah Transfer <span style="color:red;">*</span></label>       
                      <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Transfer" onkeypress="return Angkasaja(event)" required/>
                    </div>                                                                        
                    <div class="form-group">
                      <label for="varchar">Tanggal Transfer <span style="color:red;">*</span></label>         
                      <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Transfer" required/>
                    </div> 
                    <div class="form-group">
                      <label for="varchar">Bukti Transfer <span style="color:red;">*</span></label>
                      <input type="file" class="form-control" name="bukti_bayar" required />
                    </div>   
                      <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?php echo $user->id; ?>" /> 
                      <input type="hidden" class="form-control" name="jenis_bayar" id="jenis_bayar" value="Pendaftaran" />
                      <input type="hidden" class="form-control" name="status_bayar" id="status_bayar" value="Pending" />
                    <div class="form-group">    
                        <button type="submit" class="<?= $this->config->item('botton')?>">Konfirmasi Pembayaran</button>
                    </div>
                  </div>              
                </form>
                <div class="col-xs-12 col-md-12">  
                  <div class="callout callout-info">
                    Bukti Pembayaran yang akan diupload harus sesuai ketentuan
                    <li>format : jpg/jpeg/png</li>
                    <li>ukuran max : 500 kb</li>                
                  </div>
                </div>  
              <?php } ?>  
            <?php } else { ?>
              <div class="col-xs-12 col-md-12">  
                <div class="callout callout-info">
                  Tidak ada biaya pendaftaran
                </div> 
              </div> 
            <?php } ?> 
          <?php } else { ?>
            <div class="col-xs-12 col-md-12">  
              <div class="callout callout-info">
                Tidak ada pembayaran, selama proses PPDB tidak di pungut biaya apapun (GRATIS)
              </div> 
            </div>             
          <?php } ?> 
        </div>                                   
      </div>
    </div>
  </div>
</div>
<!-- end Modal Pembayaran -->

<!-- Modal Pembayaran DU-->
<div class="modal fade" id="myModalPembayaranDU" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Konfirmasi Pembayaran</h4>
      </div>
      <div class="modal-body">  
      <style>
        .select2{width:100% !important};
      </style>         
        <div class="row">
          <?php if ($formulir->biaya=='Ya') {?>            
            <form action="konfirmasi_pembayaran" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="callout callout-warning">
                  Rincian biaya daftar ulang :
                  <?php foreach ($biaya_du_peserta as $value) { ?>       
                    <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
                  <?php } ?>
                  Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya_du_peserta->total,2,',','.');?>               
                </div> 
                <div class="form-group">
                  <label for="varchar">Pilih Pembayaran <span style="color:red;">*</span></label> 
                </div>  
                <div class="form-group">
                  <?php foreach ($biaya_du_peserta as $key => $value) { ?>
                    <input type="checkbox" name="pembayaran[]" alt="Checkbox" value="<?= $value->nama_biaya;?>" required />&nbsp;<?= $value->nama_biaya;?>&nbsp;
                  <?php }?>
                </div> 
                <div class="form-group">
                  <label for="varchar">Jumlah Transfer <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Transfer" onkeypress="return Angkasaja(event)" required/>
                </div>                                                                        
                <div class="form-group">
                  <label for="varchar">Tanggal Transfer <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Transfer" required/>
                </div> 
                <div class="form-group">
                  <label for="varchar">Bukti Transfer <span style="color:red;">*</span></label>
                  <input type="file" class="form-control" name="bukti_bayar" required />
                </div>   
                  <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?php echo $user->id; ?>" /> 
                  <input type="hidden" class="form-control" name="jenis_bayar" id="jenis_bayar" value="Daftar ulang" />              
                  <input type="hidden" class="form-control" name="status_bayar" id="status_bayar" value="Pending" />
                <div class="form-group">    
                    <button type="submit" class="<?= $this->config->item('botton')?>">Konfirmasi Pembayaran</button>
                </div>
              </div>              
            </form>
            <div class="col-xs-12 col-md-12">  
              <div class="callout callout-info">
                Bukti Pembayaran yang akan diupload harus sesuai ketentuan
                <li>format : jpg/jpeg/png</li>
                <li>ukuran max : 500 kb</li>                
              </div>
            </div>  
          <?php } else { ?>
            <div class="col-xs-12 col-md-12">  
              <div class="callout callout-info">
                Tidak ada biaya pembayaran
              </div> 
            </div>             
          <?php } ?> 
        </div>                                   
      </div>
    </div>
  </div>
</div>
<!-- end Modal Pembayaran -->

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

<script type="text/javascript">
//select2
  $('.select2').select2();
//Date picker
  $('#tanggal_bayar').datepicker({
      autoclose: true,
      dateFormat: "dd-mm-yy",
      changeYear: true,
      defaultViewDate: new Date(<?php echo date('Y'); ?>, <?php echo date('m'); ?>, 1)
  })

  $(document).ready(function() {
    $('#mytable').DataTable();
  });

function Angkasaja(evt) 
{
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
}
</script>