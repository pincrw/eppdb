<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">List Peserta</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                <i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form id="myform" method="post" onsubmit="return false">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-xs-6 col-md-6">                      
                    </div>
                    <div class="col-xs-6 col-md-6 text-right">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>No Pendaftaran</th>
                                <th>Nama Peserta</th>
                                <th>NISN</th>
                                <th>Jurusan</th>
                                <th>Asal Sekolah</th>
                                <th>Jalur</th>
                                <th>Catatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($peserta as $data):
                            ?>    
                            <tr>
                                <td style="text-align: center"><?php echo $no++;?></td>
                                <td><?php echo $data->no_pendaftaran;?></td>
                                <td><?php echo $data->nama_peserta;?></td> 
                                <td><?php echo $data->nisn;?></td>       
                                <td><?php echo $data->nama_jurusan;?></td>
                                <td><?php echo $data->asal_sekolah;?></td>
                                <td><?php echo $data->jalur;?></td>
                                <td><?php echo $data->catatan;?></td>
                                <td>
                                <?php if ($data->status=="Belum diverifikasi") { ?>
                                    <span class="label bg-yellow"><?php echo $data->status;?></span>
                                <?php } else if ($data->status=="Sudah diverifikasi") { ?>
                                    <span class="label bg-green"><?php echo $data->status;?></span>
                                <?php } else { ?>
                                    <span class="label bg-red"><?php echo $data->status;?></span>
                                <?php } ?>    
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </form>        
        </div>
    </div>
</div>
</div>

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>