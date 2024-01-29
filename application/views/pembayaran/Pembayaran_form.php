<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Konfirmasi Pembayaran</h3>
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
                <div class="col-xs-12 col-md-6">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                	    <div class="form-group">
                            <?php if ($button=="Ubah") { ?>  
                                <label for="varchar">No Transaksi <?php echo form_error('no_transaksi') ?></label>  
                                <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" placeholder="Petugas" value="<?php echo $no_transaksi; ?>" readonly/>
                            <?php } ?>
                        </div>
                	    <div class="form-group">
                            <label for="int">Nama Peserta <span style="color:red;">*</span> <?php echo form_error('id_users') ?></label>
                            <?php if ($button=="Tambah") { ?>                     
                                <select type="text" class="select2 form-control" name="id_users" id="id_users" placeholder="Nama Peserta" value="" required />
                                    <option value="">Pilih Nama Peserta</option> 
                                    <?php foreach ($users as $key => $value) { ?>
                                        <option value="<?= $value->id;?>">
                                           <?= $value->full_name;?>
                                        </option>
                                    <?php }?>
                                </select>
                            <?php } else { ?>
                                <input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="ID User" value="<?php echo $id_users; ?>" readonly/>                                    
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Nama Peserta" value="<?php echo $full_name; ?>" readonly/>                  
                            <?php } ?>   
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Pembayaran <span style="color:red;">*</span> <?php echo form_error('pembayaran') ?></label>
                            <?php if ($button=="Tambah") { ?>
                                <input type="text" class="form-control" name="pembayaran" id="pembayaran" placeholder="Pembayaran" value="<?= set_value('pembayaran') ?>" required/>
                            <?php } else { ?>
                                <input type="text" class="form-control" name="pembayaran" id="pembayaran" placeholder="Pembayaran" value="<?php echo $pembayaran; ?>" readonly/>                                
                            <?php } ?>     
                        </div>
                	    <div class="form-group">
                            <label for="varchar">Jumlah Bayar <span style="color:red;">*</span> <?php echo form_error('jumlah_bayar') ?></label>
                            <?php if ($button=="Tambah") { ?>
                                <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Bayar" onkeypress="return Angkasaja(event)" value="<?= set_value('jumlah_bayar') ?>" required/>
                            <?php } else { ?>
                                <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Bayar" onkeypress="return Angkasaja(event)" value="<?php echo $jumlah_bayar; ?>" readonly/>                                
                            <?php } ?>    
                        </div>
                	    <div class="form-group">
                            <label for="date">Tanggal Bayar <span style="color:red;">*</span> <?php echo form_error('tanggal_bayar') ?></label>
                            <?php if ($button=="Tambah") { ?>
                                <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Bayar" value="<?= set_value('tanggal_bayar') ?>" required/>
                            <?php } else { ?>
                                <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Bayar" value="<?php echo date('m/d/Y', strtotime($tanggal_bayar)); ?>" />        
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Bukti Bayar <?php echo form_error('bukti_bayar') ?></label>
                            <input type="file" class="form-control" name="bukti_bayar" id="bukti_bayar" />
                        </div>  
                        <div class="form-group">
                            <label for="varchar">Jenis Bayar <span style="color:red;">*</span> <?php echo form_error('jenis_bayar') ?></label>
                            <?php if ($button=="Tambah") { ?> 
                                <select type="text" class="form-control" name="jenis_bayar" id="jenis_bayar" placeholder="Jenis Bayar" value="" required/>
                                    <option value="Pendaftaran">Pendaftaran</option>
                                    <option value="Daftar ulang">Daftar ulang</option>
                                </select>
                            <?php } else { ?>
                                <input type="text" class="form-control" name="jenis_bayar" id="jenis_bayar" placeholder="Jenis Bayar" value="<?php echo $jenis_bayar; ?>" readonly/>
                            <?php } ?>
                        </div>                          
                	    <div class="form-group">
                            <label for="varchar">Status Bayar <span style="color:red;">*</span> <?php echo form_error('status_bayar') ?></label>
                            <select type="text" class="form-control" name="status_bayar" id="status_bayar" placeholder="Status Bayar" value="" required/>
                                <option value="<?php echo $status_bayar; ?>"><?php echo $status_bayar; ?></option>
                                <option value="Sudah bayar">Sudah bayar</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                	    <input type="hidden" class="form-control" name="id_pembayaran" id="id_pembayaran" value="<?php echo $id_pembayaran; ?>" /> 
                        <input type="hidden" class="form-control" name="petugas" id="petugas" value="<?php echo $user->full_name; ?>" />
                	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
                	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default btn-flat">Batal</a>
                    </form>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?php if ($button=="Ubah") { ?> 
                        <?php 
                        if ($bukti_bayar) { ?>  
                          <img src="<?php echo base_url('assets/uploads/attachment/'.$bukti_bayar) ?>" width="100%">
                        <?php } else { ?>
                          <img src="<?php echo base_url('assets/dist/img/kwitansi.jpg') ?>" width="100%">
                        <?php } ?>  
                    <?php } ?>    
                </div>    
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