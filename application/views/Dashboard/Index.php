<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header <?= $this->config->item('header')?>">
        <img src="<?php echo base_url('assets/dist/img/nenemowhite.png') ?>" width="55" height="25">
          <h3 class="box-title"><?= $this->config->item('sitename')?> <?php echo strtoupper($pengaturan->nama_sekolah) ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="callout callout-info">
    <?php if ($kuotax) { ?>  
      Jadwal PPDB <?php echo $kuotax->ket ?><br>
      Pendaftaran : <?php echo format_indo(date('Y-m-d', strtotime($kuotax->tanggal_mulai_pendaftaran))) ?> s.d. <?php echo format_indo(date('Y-m-d', strtotime($kuotax->tanggal_selesai_pendaftaran))) ?>, Pengumuman : <?php echo format_indo(date('Y-m-d', strtotime($kuotax->tanggal_pengumuman))) ?>, Daftar Ulang : <?php echo format_indo(date('Y-m-d', strtotime($kuotax->tanggal_mulai_daftar_ulang))) ?> s.d. <?php echo format_indo(date('Y-m-d', strtotime($kuotax->tanggal_selesai_daftar_ulang))) ?>
    <?php } else { ?>
      Tahun Penerimaan belum diaktifkan
    <?php } ?>  
    </div>
  </div>
</div> 

<?php
if ($this->ion_auth->is_admin() || $group->group_id=="3"){ ?>    
<!-- dashboard admin dan panitia -->    
<!-- Default box -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fas fa-map-marked-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $jalur1->jalur ?></span>
          <span class="info-box-number"><?php echo $totaljalur1 ?></span>
          <div class="progress">
            <div class="progress-bar" style="width : <?php echo $barjalur1.'%' ?>"></div>
          </div>
          <span class="progress-description">
            Kuota <?php echo round($KuotaJalur1) ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fas fa-id-card"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $jalur2->jalur ?></span>
          <span class="info-box-number"><?php echo $totaljalur2 ?></span>
          <div class="progress">
            <div class="progress-bar" style="width : <?php echo $barjalur2.'%' ?>"></div>
          </div>
          <span class="progress-description">
            Kuota <?php echo round($KuotaJalur2) ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fas fa-exchange-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $jalur3->jalur ?></span>
          <span class="info-box-number"><?php echo $totaljalur3 ?></span>
          <div class="progress">
            <div class="progress-bar" style="width : <?php echo $barjalur3.'%' ?>"></div>
          </div>
          <span class="progress-description">
            Kuota <?php echo round($KuotaJalur3) ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $jalur4->jalur ?></span>
          <span class="info-box-number"><?php echo $totaljalur4 ?></span>
          <div class="progress">
            <div class="progress-bar" style="width : <?php echo $barjalur4.'%' ?>"></div>
          </div>
          <span class="progress-description">
            Kuota <?php echo round($KuotaJalur4) ?>
          </span>
        </div>
      </div>
    </div>        
  </div>

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $totalditerima ?></h3>
          <p>Pendaftar di terima Laki-laki <?php echo $totallakiditerima ?>, Perempuan <?php echo $totalperempuanditerima ?></p>
        </div>
        <div class="icon">
          <i class="fas fa-user-check"></i>
        </div>           
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3><?php echo $totaltdkditerima ?></h3>
          <p>Pendaftar tidak di terima Laki-laki <?php echo $totallakitdkditerima ?>, Perempuan <?php echo $totalperempuantdkditerima ?></p>
        </div>
        <div class="icon">
          <i class="fas fa-user-times"></i>
        </div>
      </div>
    </div>        
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3><?php echo $totallaki ?></h3>
          <p>Pendaftar laki-laki</p>
        </div>
        <div class="icon">
          <i class="fas fa-mars"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?php echo $totalperempuan ?></h3>
          <p>Pendaftar perempuan</p>
        </div>
        <div class="icon">
          <i class="fas fa-venus"></i>
        </div>
      </div>
    </div>
  </div>      

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><?php echo $totalpeserta ?></h3>
          <p>Total Pendaftar</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url();?>peserta" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>            
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $totalbaru ?></h3>
          <p>Pendaftar belum diverifikasi</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <form action="peserta/status_pendaftaran" method="post">
          <input type="hidden" class="form-control" name="status" id="status" value="Belum diverifikasi"/>
          <button type="submit" class="btn btn-warning btn-flat btn-block">More info <i class="fa fa-arrow-circle-right"></i></button>
        </form> 
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $totaldiverifikasi ?></h3>
          <p>Pendaftar sudah diverifikasi</p>
        </div>
        <div class="icon">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <form action="peserta/status_pendaftaran" method="post">
          <input type="hidden" class="form-control" name="status" id="status" value="Sudah diverifikasi"/>
          <button type="submit" class="btn btn-success btn-flat btn-block">More info <i class="fa fa-arrow-circle-right"></i></button>
        </form>            
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $totalberkaskurang ?></h3>
          <p>Berkas kurang/tidak sesuai</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-alt"></i>
        </div>
        <form action="peserta/status_pendaftaran" method="post">
          <input type="hidden" class="form-control" name="status" id="status" value="Berkas Kurang"/>
          <button type="submit" class="btn btn-danger btn-flat btn-block">More info <i class="fa fa-arrow-circle-right"></i></button>
        </form>            
      </div>
    </div>
  </div>

  <!-- progress bar -->  
  <?php if ($formulir->jurusan=='Ya') { ?>   
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Progress Bar Pendaftar</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">  
            <?php foreach ($countjurusan as $value) { 
              $kuota_jalur = ($value->kuota_jurusan * $value->persentase)/100; ?>           
              <div class="col-md-6 col-xs-12">                                 
                  <div class="progress-group">
                    <span class="progress-text"><?= $value->nama_jurusan ?></span>
                    <span class="progress-number">Pendaftar <span class="label label-success"><?= $value->countjurusan ?></span> / Kuota <span class="label label-primary"><?= $value->kuota_jurusan ?></span></span>                    
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red progress-bar-striped" style="width: <?php echo ($value->countjurusan/$value->kuota_jurusan*100).'%' ?>">
                      </div>
                    </div>
                  </div>                
              </div>
              <div class="col-md-6 col-xs-12">           
                  <div class="progress-group">
                    <span class="progress-text"><?= $value->jalur ?></span>
                    <?php if ($value->countjalur>$kuota_jalur){ ?>
                      <span class="progress-number">Pendaftar <span class="label label-danger"><?= $value->countjalur ?></span> / Kuota <span class="label label-primary"><?= round($kuota_jalur) ?></span>
                      </span>
                      <?php } else { ?>
                      <span class="progress-number">Pendaftar <span class="label label-success"><?= $value->countjalur ?></span> / Kuota <span class="label label-primary"><?= round($kuota_jalur) ?></span>
                      </span>
                    <?php } ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: <?php echo ($value->countjalur/$kuota_jalur*100).'%' ?>">
                      </div>
                    </div>
                  </div>
              </div>
            <?php } ?>                  
          </div>
        </div>
      </div>   
    </div>    
  <?php } ?>      
  <!-- end progress bar -->                  

  <!-- start GIS Peserta + log aktivitas -->  
  <?php if ($pengaturan->gis=='Ya') { ?>
    <div class="row">
  <!-- start GIS Peserta -->     
      <div class="col-md-9 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">GIS Calon Peserta Didik</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>

          <?php
          function cek_internet(){
             $connected = @fsockopen("www.google.com", 80);
             if ($connected){
                $is_conn = true;
                fclose($connected);
             } else {
                $is_conn = false;
             }
             return $is_conn;
          }
          
          if (cek_internet() == true) { ?> 
              <div class="box-body">
              <?php if ($pengaturan->maps=='OpenStreetMap') { ?>     
                <!-- start leaflet map -->
                <div id="map"></div>               
                <!-- end leaflet map -->
              <?php } else { ?>                  
                <!-- start google map -->
                <?php 
                  $this->load->library('googlemaps');
                  $config['apiKey']="$pengaturan->apikey";          
                  $config['center']="$pengaturan->latitude,$pengaturan->longitude";
                  $config['zoom']='14';
                  $config['map_type']="$pengaturan->maptype";
                  $config['https']="TRUE";
                  // circle
                  $config['radius']="$pengaturan->radius";
                  $config['strokeColor']= "#0000F7";
                  $config['strokeOpacity']= '0.9';
                  $config['strokeWeight']= '1';
                  $config['fillColor']= "#0000F7";
                  $config['fillOpacity']= '0.1';
                  // marker sekolah
                  $config['position']="$pengaturan->latitude,$pengaturan->longitude";
                  $config['infowindow_content']='<div class="media" style="width:150px;">';
                  $config['infowindow_content'].='<div class="media-left">';
                  $config['infowindow_content'].='</div>';
                  $config['infowindow_content'].='<div class="media-body">';
                  $config['infowindow_content'].='<h5 class="media-heading">'.$pengaturan->nama_sekolah.'</h5>';
                  $config['infowindow_content'].='<a>NPSN. '.$pengaturan->npsn.'</a>';
                  $config['infowindow_content'].='</div>';
                  $config['infowindow_content'].='</div>';
                  $config['icon']=base_url('assets/icon/villa.png');

                  // marker calon peserta didik
                  foreach ($peserta as $key => $value) {

                      $lat1 = $pengaturan->latitude;
                      $lon1 = $pengaturan->longitude;
                      $lat2 = floatval($value->latitude);
                      $lon2 = floatval($value->longitude);     

                      // jarak titik sekolah ke rumah
                      $theta = $lon1 - $lon2;
                      $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                      $miles = acos($miles);
                      $miles = rad2deg($miles);
                      $miles = $miles * 60 * 1.1515;
                      $feet  = $miles * 5280;
                      $yards = $feet / 3;
                      $kilometers = $miles * 1.609344;
                      $meters = round($kilometers * 1000);

                      $marker=array();
                      $marker['animation']='DROP';
                      $marker['position']="$value->latitude,$value->longitude";
                      $marker['infowindow_content']='<div class="media" style="width:170px;">';
                      $marker['infowindow_content'].='<div class="media-left">';
                      $marker['infowindow_content'].='</div>';
                      $marker['infowindow_content'].='<div class="media-body">';
                      $marker['infowindow_content'].='<h5 class="media-heading">'.$value->nama_peserta.'</h5>';
                      $marker['infowindow_content'].='<a>No. '.$value->no_pendaftaran.'</a><br>';
                      $marker['infowindow_content'].='<a>Jarak. '.$value->jarak.'</a><br>';
                      $marker['infowindow_content'].='<a>Sistem. '.$meters.' meter</a>';
                      $marker['infowindow_content'].='</div>';
                      $marker['infowindow_content'].='</div>';
                      // $marker['icon']=base_url('assets/icon/person.png');

                  $this->googlemaps->add_marker($marker);
                  }
                  
                  $this->googlemaps->add_marker($config);
                  $this->googlemaps->add_circle($config);
                  $this->googlemaps->initialize($config);
                  $map = $this->googlemaps->create_map();

                  echo $map['js'];
                  echo $map['html'];
                ?>  
                <!-- end google map -->
              <?php } ?>                  
              </div>
          <?php } else { ?>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-xs-12">            
                  <div class="callout callout-info">
                    <p>Aktifkan koneksi internet untuk menampilkan GIS Calon Peserta Didik</p>
                  </div>
                </div>
              </div>  
            </div>               
          <?php } ?>
        </div>
      </div>
  <!-- end GIS --> 
  <!-- start log aktivitas --> 
      <div class="col-md-3 col-xs-12">
        <div class="box box-warning direct-chat direct-chat-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Aktivitas Pengguna</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="direct-chat-messages" style="min-height: 500px">
              <?php foreach ($log as $value) { ?> 
                <?php if ($value->id=="1" || $value->id=="3") { ?> 
                  <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left"><?php echo $value->full_name ?></span>
                      <span class="direct-chat-timestamp pull-right"><?php echo $value->log_time ?></span>
                    </div>
                      <?php 
                      if (file_exists('assets/uploads/image/user/'.$value->image)) { ?>  
                        <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/'.$value->image) ?>">
                      <?php } else { ?>
                        <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
                      <?php } ?>
                    <div class="direct-chat-text">
                        <?php echo $value->log_ket ?>
                    </div>
                  </div>
                <?php } else if ($value->id=="2") { ?>   
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left"><?php echo $value->log_time ?></span>
                      <span class="direct-chat-timestamp pull-right"><?php echo $value->full_name ?></span>
                    </div>
                      <?php 
                      if (file_exists('assets/uploads/image/user/'.$value->image)) { ?>  
                        <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/'.$value->image) ?>">
                      <?php } else { ?>
                        <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
                      <?php } ?>
                    <div class="direct-chat-text">
                        <?php echo $value->log_ket ?>
                    </div>
                  </div>
                <?php } ?>   
              <?php } ?>
            </div>  
          </div> 
          <div class="box-footer">
          </div>             
        </div>
      </div> 
  <!-- end aktivitas --> 
    </div>
  <?php } ?>      
  <!-- end GIS Peserta + log aktivitas -->       

 

<?php } else if ($group->group_id=="10") { ?>
<!-- dashboard bendahara -->  
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $status_pending ?></h3>
          <p>Pembayaran Pending</p>
        </div>
        <div class="icon">
          <i class="fas fa-clipboard"></i>
        </div>           
      </div>
    </div>        
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $status_bayar ?></h3>
          <p>Pembayaran Sudah Bayar</p>
        </div>
        <div class="icon">
          <i class="fas fa-clipboard-check"></i>
        </div>           
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $countdu->count ?></h3>
          <p>Pendaftar</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-check"></i>
        </div>           
      </div>
    </div>        
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>Rp. <?php echo number_format($tot_bayar->total,2,',','.') ?></h3>
          <p>Total</p>
        </div>
        <div class="icon">
          <i class="fas fa-money-bill"></i>
        </div>           
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Rekap pembayaran pendaftaran</h3>
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
      <?php echo anchor(site_url('pembayaran/rekap_pendaftaran'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Pendaftaran</span>', 'class="btn bg-purple btn-flat"'); ?>  
              </div>
              <div class="col-xs-6 col-md-6 text-right">
                <span class="btn btn-success btn-flat"><strong>Total Rp. <?php echo number_format($total_pendaftaran->total,2,',','.') ?></strong></span>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytablependaftaran" style="width:100%">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>No Daftar</th>
                    <!-- <th>NISN</th> -->
                    <th>Nama Peserta</th>
                    <!-- <th>No Handphone</th> -->
                    <th>Jumlah</th>
                    <th>bayar</th>
                    <th>Sisa</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($bayar_pendaftaran as $data):
                    $subtot_bayar = number_format($data->jumlah,2,',','.');  
                    $total = number_format($tot_biaya->total,2,',','.'); 
                    $sisax = $tot_biaya->total - $data->jumlah;
                    $sisa = number_format($sisax,2,',','.');

                    if($total==$subtot_bayar) {
                        $status = "Lunas";
                      } else if($total>$subtot_bayar) {
                        $status = "Belum Lunas";
                      } else {
                        $status = "Kelebihan bayar";  
                    }                                                                     
                  ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++;?></td>
                    <td><?php echo $data->no_pendaftaran;?></td>
                    <!-- <td><?php echo $data->nisn;?></td> -->
                    <td><?php echo $data->nama_peserta;?></td>
                    <!-- <td><?php echo $data->nomor_hp;?></td> -->
                    <td>Rp. <?php echo $total;?></td>                                
                    <td>Rp. <?php echo $subtot_bayar;?></td>        
                    <td>Rp. <?php echo $sisa;?></td>
                    <td>
                    <?php if ($status=="Lunas") { ?>
                      <span class="label label-success"> <?php echo $status;?></span>
                    <?php } else if ($status=="Belum Lunas") { ?>
                      <span class="label label-warning"> <?php echo $status;?></span>
                    <?php } else { ?>
                      <span class="label label-info"> <?php echo $status;?></span>
                    <?php } ?>   
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </form>
          <?php if ($formulir->biaya=="Ya") { ?>
            <?php if ($biaya_du) { ?>
            <div class="callout callout-info">
              Rincian biaya pendaftaran :
              <?php foreach ($biaya as $value) { ?>       
                <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
              <?php } ?>
              Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya->total,2,',','.');?>  
            </div>
            <?php } ?>
          <?php } ?>            
        </div>
      </div>
    </div>
<!--   </div>

  <div class="row"> -->
    <div class="col-xs-12 col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Rekap pembayaran daftar ulang</h3>
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
      <?php echo anchor(site_url('pembayaran/rekap_pembayarandu'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Daftar Ulang</span>', 'class="btn bg-purple btn-flat"'); ?>  
              </div>
              <div class="col-xs-6 col-md-6 text-right">
                <span class="btn btn-success btn-flat"><strong>Total Rp. <?php echo number_format($total_du->total,2,',','.') ?></strong></span>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytablepembayaran" style="width:100%">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>No Daftar</th>
                    <!-- <th>NISN</th> -->
                    <th>Nama Peserta</th>
                    <th>No Handphone</th>                                          
                    <th>Jumlah</th>
                    <th>bayar</th>
                    <th>Sisa</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($bayar as $data):
                    $subtot_bayar = number_format($data->jumlah,2,',','.');  
                    $totaldu = number_format($tot_biaya_du->total,2,',','.'); 
                    $sisax = $tot_biaya_du->total - $data->jumlah;
                    $sisa = number_format($sisax,2,',','.');

                    if($totaldu==$subtot_bayar) {
                        $status = "Lunas";
                      } else if($totaldu>$subtot_bayar) {
                        $status = "Belum Lunas";
                      } else {
                        $status = "Kelebihan bayar";  
                    }                                                                     
                  ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++;?></td>
                    <td><?php echo $data->no_pendaftaran;?></td>
                    <!-- <td><?php echo $data->nisn;?></td> -->
                    <td><?php echo $data->nama_peserta;?></td>
                    <td><?php echo $data->nomor_hp;?></td>
                    <td>Rp. <?php echo $totaldu;?></td>                                
                    <td>Rp. <?php echo $subtot_bayar;?></td>        
                    <td>Rp. <?php echo $sisa;?></td>
                    <td>
                    <?php if ($status=="Lunas") { ?>
                      <span class="label label-success"> <?php echo $status;?></span>
                    <?php } else if ($status=="Belum Lunas") { ?>
                      <span class="label label-warning"> <?php echo $status;?></span>
                    <?php } else { ?>
                      <span class="label label-info"> <?php echo $status;?></span>
                    <?php } ?>   
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </form>
          <?php if ($formulir->biaya=="Ya") { ?>
            <?php if ($biaya_du) { ?>
            <div class="callout callout-info">
              Rincian biaya daftar ulang :
              <?php foreach ($biaya_du as $value) { ?>       
                <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
              <?php } ?>
              Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya_du->total,2,',','.');?>  
            </div>
            <?php } ?>
          <?php } ?>            
        </div>
      </div>
    </div>
  </div>  

<?php } else { ?>
<!-- dashboard member -->
  <?php if ($formulir->wawancara=='Ya') { ?>   
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h2><strong>Formulir</strong></h2>
          <p>Pendaftaran</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-signature"></i>
        </div>
        <?php if ($formulir->biaya=='Ya') { ?>
          <?php if ($biaya) { ?>
            <?php if ($pembayaran) { ?>
              <?php if ($pembayaran->status_bayar=='Sudah bayar') { ?>
                <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
                  Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
                </a> 
              <?php } else { ?>
                <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalStatusPembayaran">
                  Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
                </a>
              <?php } ?> 
            <?php } else { ?>
              <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalInfoPembayaran">
                Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
              </a>
            <?php } ?>
          <?php } else { ?>
            <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
              Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
            </a>  
          <?php } ?>  
        <?php } else { ?>  
          <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
            Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
          </a>  
        <?php } ?>                  
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="small-box bg-maroon">
        <div class="inner">
          <h2><strong>Formulir</strong></h2>
          <p>Wawancara</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-signature"></i>
        </div>
        <a href="<?= base_url();?>member/formwawancara" class="small-box-footer">
          Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
        </a>                  
      </div>
    </div>
  </div>  
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-6">
      <div class="small-box bg-purple">
        <div class="inner">
          <h2><strong>Prestasi</strong></h2>
          <p>Akademik/Non Akademik</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-graduate"></i>
        </div>
        <a href="<?= base_url();?>member/prestasipeserta" class="small-box-footer">
          Tambah Prestasi&nbsp; <i class="fa fa-arrow-circle-right"></i>
        </a>              
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h2><strong>Berkas</strong></h2>
          <p>Pendukung</p>
        </div>
        <div class="icon">
          <i class="fas fa-copy"></i>
        </div>
        <a href="<?= base_url();?>member/berkas" class="small-box-footer">
          Upload Berkas&nbsp; <i class="fa fa-arrow-circle-right"></i>  
        </a>                       
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="small-box bg-primary">
        <div class="inner">
          <h2><strong>Cetak</strong></h2>
          <?php if ($nomer) { ?>  
            <?php if ($nomer->status=='Sudah diverifikasi' || $nomer->status=='Berkas Kurang') { ?>  
              <p>Bukti Verifikasi</p>
            <?php } else { ?>
              <p>Bukti Pendaftaran</p>
            <?php } ?>
          <?php } else { ?>
            <p>Bukti Pendaftaran</p>
          <?php } ?>  
        </div>
        <div class="icon">
          <i class="fas fa-print"></i>
        </div>
        <?php if ($nomer) { ?>
          <?php if ($formulir->foto=='Ya' || $formulir->foto_full=='Ya' || $formulir->skl_skhu=='Ya' || $formulir->akte_kelahiran=='Ya' || $formulir->kartu_keluarga=='Ya' || $formulir->ktp_ortu=='Ya' || $formulir->sptjm=='Ya' || $formulir->sp=='Ya' || $formulir->skd=='Ya' || $formulir->sktm=='Ya' || $formulir->kartu_bantuan=='Ya' || $formulir->berkaslain=='Ya') { ?>
              <?php if (!$berkas) { ?>
                <a href="<?= base_url();?>member/berkas" class="small-box-footer">
                  Cetak Bukti&nbsp; <i class="fa fa-print"></i>  
                </a>
              <?php } else { ?>   
                <a href="<?= base_url();?>member/printformulir" method="post" target="blank" class="small-box-footer">
                    Cetak Bukti&nbsp; <i class="fa fa-print"></i>
                </a>                 
              <?php } ?>       
          <?php } else { ?>
            <a href="<?= base_url();?>member/printformulir" method="post" target="blank" class="small-box-footer">
                Cetak Bukti&nbsp; <i class="fa fa-print"></i>
            </a> 
          <?php } ?>  
        <?php } else { ?>
          <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
              Cetak Bukti&nbsp; <i class="fa fa-print"></i>
          </a>              
        <?php } ?>   
      </div>
    </div>           
  </div>    

  <?php } else { ?>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h2><strong>Formulir</strong></h2>
          <p>Pendaftaran</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-signature"></i>
        </div>
        <?php if ($formulir->biaya=='Ya') { ?>
          <?php if ($biaya) { ?>
            <?php if ($pembayaran) { ?>
              <?php if ($pembayaran->status_bayar=='Sudah bayar') { ?>
                <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
                  Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
                </a> 
              <?php } else { ?>
                <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalStatusPembayaran">
                  Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
                </a>
              <?php } ?> 
            <?php } else { ?>
              <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalInfoPembayaran">
                Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
              </a> 
            <?php } ?>
          <?php } else { ?>
            <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
              Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
            </a>  
          <?php } ?>  
        <?php } else { ?>  
          <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
            Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
          </a>  
        <?php } ?>    
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="small-box bg-purple">
        <div class="inner">
          <h2><strong>Prestasi</strong></h2>
          <p>Akademik/Non Akademik</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-graduate"></i>
        </div>
        <a href="<?= base_url();?>member/prestasipeserta" class="small-box-footer">
          Tambah Prestasi&nbsp; <i class="fa fa-arrow-circle-right"></i>
        </a>              
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h2><strong>Berkas</strong></h2>
          <p>Pendukung</p>
        </div>
        <div class="icon">
          <i class="fas fa-copy"></i>
        </div>
        <a href="<?= base_url();?>member/berkas" class="small-box-footer">
          Upload Berkas&nbsp; <i class="fa fa-arrow-circle-right"></i>  
        </a>                       
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="small-box bg-primary">
        <div class="inner">
          <h2><strong>Cetak</strong></h2>
          <?php if ($nomer) { ?>  
            <?php if ($nomer->status=='Sudah diverifikasi' || $nomer->status=='Berkas Kurang') { ?>  
              <p>Bukti Verifikasi</p>
            <?php } else { ?>
              <p>Bukti Pendaftaran</p>
            <?php } ?>
          <?php } else { ?>
            <p>Bukti Pendaftaran</p>
          <?php } ?>   
        </div>
        <div class="icon">
          <i class="fas fa-print"></i>
        </div>
        <?php if ($nomer) { ?>
          <?php if ($formulir->foto=='Ya' || $formulir->foto_full=='Ya' || $formulir->skl_skhu=='Ya' || $formulir->akte_kelahiran=='Ya' || $formulir->kartu_keluarga=='Ya' || $formulir->ktp_ortu=='Ya' || $formulir->sptjm=='Ya' || $formulir->sp=='Ya' || $formulir->skd=='Ya' || $formulir->sktm=='Ya' || $formulir->kartu_bantuan=='Ya' || $formulir->berkaslain=='Ya') { ?>
              <?php if (!$berkas) { ?>
                <a href="<?= base_url();?>member/berkas" class="small-box-footer">
                  Cetak Bukti&nbsp; <i class="fa fa-print"></i>  
                </a>
              <?php } else { ?>  
                <a href="<?= base_url();?>member/printformulir" method="post" target="blank" class="small-box-footer">
                    Cetak Bukti&nbsp; <i class="fa fa-print"></i>
                </a>  
              <?php } ?>       
          <?php } else { ?>
            <a href="<?= base_url();?>member/printformulir" method="post" target="blank" class="small-box-footer">
                Cetak Bukti&nbsp; <i class="fa fa-print"></i>
            </a>             
          <?php } ?>  
        <?php } else { ?>
          <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
              Cetak Bukti&nbsp; <i class="fa fa-print"></i>
          </a>              
        <?php } ?>   
      </div>
    </div>           
  </div>    
  <?php } ?>  
         
  <div class="row">
    <div class="col-md-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="glyphicon glyphicon-bullhorn"></i> Pengumuman</h3>
        </div>
        <div class="box-body">
          <ul class="timeline">
            <?php foreach ($infomember as $pengumuman) { ?>
            <li class="time-label">
              <span class="bg-green">
                <?= date('d F Y', strtotime($pengumuman->date)); ?>
              </span>
            </li>
            <li>
              <i class="fa fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?= date('H:i:s a', strtotime($pengumuman->date)); ?></span>
                  <h3 class="timeline-header"><a href="#"><?= $pengumuman->judul ?></a></h3>
                  <div class="timeline-body">
                    <?= $pengumuman->text ?>
                  </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Panitia PPDB</a>
                </div>
              </div>
            </li>
            <?php } ?>                 
            <li>
              <i class="fa fa-clock-o bg-gray"></i>    
            </li> 
          </ul>
        </div>
        <div class="box-footer">
        </div>
      </div>
    </div> 
     
    <div class="col-md-3 col-xs-12">
      <div class="small-box bg-maroon">
        <div class="inner">
          <?php if ($nomer) { ?>
            <h3><?php echo $nomer->no_pendaftaran ?></h3>
            <p>Nomer Pendaftaran</p>
          <?php } else { ?>
            <h3>Belum ada</h3>
            <p>Nomer Pendaftaran</p>
          <?php } ?>
        </div>
        <div class="icon">
          <i class="fas fa-barcode"></i>
        </div>                      
      </div>
    </div>           

  <?php if ($pengaturan->status_pendaftaran) { ?>             
    <div class="col-md-3 col-xs-12">
    <?php if ($nomer) { ?>  
    <?php if ($nomer->status=='Belum diverifikasi') { ?>
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fas fa-file-signature"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $nomer->status ?></span>
          <span class="info-box-number">Panitia</span>                
          <div class="progress">
            <div class="progress-bar" style="width : 100% "></div>
          </div>
          <span class="progress-description">
            Status Pendaftaran
          </span>
        </div>
      </div>
    <?php } else if ($nomer->status=='Sudah diverifikasi') { ?> 
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fas fa-clipboard-check"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><?php echo $nomer->status ?></span>
          <span class="info-box-number">Panitia</span>               
          <div class="progress">
            <div class="progress-bar" style="width : 100% "></div>
          </div>
          <span class="progress-description">
            <?php if ($formulir->kartu_tes=='Ya') { ?>
              <a href="<?= base_url();?>member/printkartu" method="post" target="blank" style="color: white;">
                  Cetak Kartu Tes &nbsp; <i class="fa fa-print"></i>
              </a>
            <?php } else { ?>
              Status Pendaftaran
            <?php } ?>            
          </span>
        </div>
      </div>
    <?php } else if ($nomer->status=='Berkas Kurang') { ?> 
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fas fa-minus"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Berkas</span>
          <span class="info-box-number">Kurang/tidak sesuai</span>             
          <div class="progress">
            <div class="progress-bar" style="width : 100% "></div>
          </div>
          <span class="progress-description">
            Status Pendaftaran
          </span>
        </div>
      </div>
    <?php } ?>   
    <?php } else { ?>  
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fas fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Belum</span>
          <span class="info-box-number">Terdaftar</span>              
          <div class="progress">
            <div class="progress-bar" style="width : 100% "></div>
          </div>
          <span class="progress-description">
            Status Pendaftaran
          </span>
        </div>
      </div>
    <?php } ?> 
    </div>               
  <?php } ?>
  
  <?php
    if ($tgl_ppdb) { 
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_pengumuman = date('d F Y 08:00:00',strtotime($tgl_ppdb->tanggal_pengumuman));
    $tanggal_mulai_daftar_ulang = date('d F Y 08:00:00',strtotime($tgl_ppdb->tanggal_mulai_daftar_ulang));  
    $tanggal_sekarang = date('d F Y H:i:s');
    $mulai_pengumuman = new DateTime($tanggal_pengumuman);
    $selesai_pengumuman = new DateTime($tanggal_mulai_daftar_ulang);
    $today = new DateTime($tanggal_sekarang); 
  ?>    
    <?php if ($today > $selesai_pengumuman) { ?>    
        <?php if ($pengaturan->status_hasil) { ?>        
          <div class="col-md-3 col-xs-12">
            <?php if ($nomer) { ?>    
              <?php if ($nomer->status_hasil=='Di Terima') { ?> 
                <div class="info-box bg-green">
                  <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Status anda</span>
                    <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
                    <div class="progress">
                      <div class="progress-bar" style="width : 100% "></div>
                    </div>
                    <span class="progress-description">
                      Status Hasil
                    </span>
                  </div>
                </div>
              <?php } else if ($nomer->status_hasil=='Tidak di terima') { ?> 
                <div class="info-box bg-red">
                  <span class="info-box-icon"><i class="fas fa-user-slash"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Status anda</span>
                    <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
                    <div class="progress">
                      <div class="progress-bar" style="width : 100% "></div>
                    </div>
                    <span class="progress-description">
                      Status Hasil
                    </span>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        <?php } ?> 
    <?php } ?> 
  <?php } ?> 

  <?php if ($pengaturan->status_daftar_ulang) { ?>        
    <div class="col-md-3 col-xs-12">
      <?php if ($nomer) { ?>    
        <?php if ($nomer->status_daftar_ulang=='Tidak daftar ulang') { ?> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-user-slash"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>
        <?php } ?>     
      <?php } ?>
    </div>
  <?php } ?>     

    <div class="col-md-3 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fab fa-whatsapp"></i> Contact Panitia PPDB</h3>
        </div>
        <div class="box-body">
          <div class="callout callout-info">
            <?php foreach ($contact as $value) { ?>
              <li><i class="fab fa-whatsapp"></i>&nbsp;&nbsp;<a style="text-decoration:none" href="https://api.whatsapp.com/send?phone=<?= $value->phone ?>" target="blank"><?= $value->phone ?></a> - <?= $value->full_name ?>
              </li>
            <?php } ?>
          </div>                   
        </div>
      </div>
    </div>             
  </div>  

  <!-- Modal Info Pembayaran -->
  <div class="modal fade" id="myModalInfoPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?= $this->config->item('header')?>">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Info Pembayaran</h4>
        </div>
        <div class="modal-body">    
          <div class="row">            
            <?php if ($biaya) { ?>
              <div class="col-xs-12 col-md-12">  
                <div class="callout callout-info">
                  Formulir dapat diisi setelah melakukan pembayaran pendaftaran
                </div> 
                <div class="callout callout-warning">
                  Rincian Biaya :
                  <?php foreach ($biaya as $value) { ?>       
                    <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
                  <?php } ?>
                  Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya->total,2,',','.');?>               
                </div> 
                <div class="callout callout-info">
                  <?php foreach ($infopembayaran as $text) { ?>       
                    <?php echo $text->text ?>
                  <?php } ?>              
                </div>
              </div>   
            <?php } else { ?>
              <div class="col-xs-12 col-md-12">  
                <div class="callout callout-info">
                  Tidak ada rincian biaya yang harus dibayarkan
                </div> 
              </div> 
            <?php } ?>                         
          </div>                                   
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal Info Pembayaran -->    

  <!-- Modal Status Pembayaran -->
  <div class="modal fade" id="myModalStatusPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?= $this->config->item('header')?>">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Status Pembayaran</h4>
        </div>
        <div class="modal-body">    
          <div class="row">
            <div class="col-xs-12 col-md-12">  
              <div class="callout callout-info">
                Status pembayaran masih dalam proses, coba lagi nanti
              </div> 
            </div>             
          </div>                                   
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal Status Pembayaran -->    

  <!-- Modal Informasi -->
  <?php
      if ($tgl_ppdb) { 
      date_default_timezone_set('Asia/Jakarta');
      $tanggal_pengumuman = date('d F Y 08:00:00',strtotime($tgl_ppdb->tanggal_pengumuman));
      $tanggal_mulai_daftar_ulang = date('d F Y 08:00:00',strtotime($tgl_ppdb->tanggal_mulai_daftar_ulang));  
      $tanggal_sekarang = date('d F Y H:i:s');
      $mulai_pengumuman = new DateTime($tanggal_pengumuman);
      $selesai_pengumuman = new DateTime($tanggal_mulai_daftar_ulang);
      $today = new DateTime($tanggal_sekarang); 
  ?>    
    <?php if ($today < $mulai_pengumuman) { ?>    
      <!-- Modal catatan -->
      <?php if ($nomer) { ?> 
      <?php if ($nomer->catatan) { ?>
      <div class="modal fade" id="myModalCatatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header <?= $this->config->item('header')?>">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Pemberitahuan</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-md-12">  
                  <div class="callout callout-info">
                    <?php echo $nomer->catatan ?>
                  </div> 
                </div>
              </div>                                   
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php } ?>
      <!-- end Modal catatan -->
    <?php } else if ($today > $selesai_pengumuman) { ?>       
      <!-- Modal daftar ulang -->
      <?php if ($pengaturan->status_daftar_ulang) { ?>         
        <?php if ($nomer) { ?> 
          <?php if ($nomer->status_hasil=='Di Terima') { ?>   
            <div class="modal fade" id="myModalDUlang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header <?= $this->config->item('header')?>">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Daftar Ulang</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <?php if ($nomer->status_daftar_ulang=='Sudah daftar ulang') { ?>
                        <div class="col-xs-12 col-md-12">                
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Selamat anda</span>
                              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                              <div class="progress">
                                <div class="progress-bar" style="width : 100% "></div>
                              </div>
                              <span class="progress-description">
                                Status Daftar Ulang
                              </span>
                            </div>
                          </div> 
                        </div>
                        <div class="col-xs-12 col-md-12">
                          <div class="callout callout-info">Status anda sudah daftar ulang. Silahkan cetak bukti daftar ulang anda dan serahkan ke Panitia.</div>
                        </div> 
                        <div class="col-md-12 col-xs-12">
                          <form action="member/printDU" method="post" target="blank">
                            <button type="submit" class="btn bg-yellow btn-flat btn-block">Cetak Bukti Daftar Ulang&nbsp; <i class="fa fa-print"></i></button>
                          </form>
                        </div> 
                      <?php } else if ($nomer->status_daftar_ulang=='Menunggu') { ?>
                        <div class="col-xs-12 col-md-12">                
                          <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Status anda</span>
                              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                              <div class="progress">
                                <div class="progress-bar" style="width : 100% "></div>
                              </div>
                              <span class="progress-description">
                                Status Daftar Ulang
                              </span>
                            </div>
                          </div> 
                        </div>
                        <div class="col-xs-12 col-md-12">
                          <div class="callout callout-info">Status daftar ulang menunggu proses. Bukti daftar ulang baru dapat dicetak setelah status berubah dari MENUNGGU menjadi SUDAH DAFTAR ULANG. Cek kembali status anda nanti...</div>
                        </div> 
                      <?php } else if ($nomer->status_daftar_ulang=='Tidak daftar ulang') { ?>
                        <div class="col-xs-12 col-md-12">   
                          <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fas fa-user-slash"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Status anda</span>
                              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                              <div class="progress">
                                <div class="progress-bar" style="width : 100% "></div>
                              </div>
                              <span class="progress-description">
                                Status Daftar Ulang
                              </span>
                            </div>
                          </div>             
                        </div>           
                      <?php } else { ?>
                        <?php if ($formulir->biaya=='Ya') { ?>                        
                          <?php if ($biaya_du) { ?>                      
                            <?php if ($daftar_ulang) { ?>
                              <?php if ($daftar_ulang->status_bayar=='Sudah bayar') { ?>
                                <div class="col-xs-12 col-md-12">
                                  <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fas fa-user"></i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Status anda</span>
                                      <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                                      <div class="progress">
                                        <div class="progress-bar" style="width : 100% "></div>
                                      </div>
                                      <span class="progress-description">
                                        Status Daftar Ulang
                                      </span>
                                    </div>
                                  </div>
                                </div>                   
                                <div class="col-xs-12 col-md-12">
                                  <table class="word-table" style="margin-bottom: 10px">
                                    <tr><td style="text-align: left;width: 150px">No Pendaftaran</td><td>: <?php echo $nomer->no_pendaftaran ?></td></tr>
                                    <tr><td>Nama Peserta</td><td>: <?php echo $nomer->nama_peserta ?></td></tr>
                                    <tr><td>Jenis Kelamin</td><td>: <?php echo $nomer->jenis_kelamin ?></td></tr>
                                    <tr><td>Tempat Tanggal lahir</td><td>: <?php echo $nomer->tempat_lahir ?>, <?php echo format_indo(date('Y-m-d', strtotime($nomer->tanggal_lahir))); ?></td></tr>
                                    <tr><td>NISN</td><td>: <?php echo $nomer->nisn ?></td></tr>
                                    <tr><td>Asal Sekolah</td><td>: <?php echo $nomer->asal_sekolah; ?></td></tr>
                                  </table>
                                </div>                       
                                <div class="col-xs-12 col-md-12">
                                  <div class="callout callout-info">Saya yang tercantum di data menyatakan bahwa data yang tertera adalah benar, dan saya mengajukan Daftar Ulang atau Lapor Diri secara sadar, dan bersedia mematuhi semua aturan yang berlaku dengan segala konsekuensinya.</div>
                                </div>
                                <div class="col-xs-12 col-md-12">                        
                                  <form action="member/daftarulang" method="post">
                                    <div class="form-group">
                                      <label>Apakah anda setuju dengan pernyataan di atas? <span style="color:red;">*</label><br/>
                                      <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, Saya setuju dengan pernyataan di atas
                                    </div> 
                                    <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?php echo $nomer->id_peserta; ?>" />
                                    <button type="submit" class="<?= $this->config->item('botton')?>">Daftar ulang sekarang</button>
                                  </form>            
                                </div>
                              <?php } else { ?>
                                <div class="col-xs-12 col-md-12"> 
                                  <div class="callout callout-info">
                                    Status pembayaran daftar ulang masih dalam proses. Setelah pembayaran di proses segera lakukan daftar ulang. Cek kembali lagi nanti
                                  </div> 
                              </div>
                              <?php } ?>
                            <?php } else { ?>  
                              <div class="col-xs-12 col-md-12">
                                <div class="callout callout-info">
                                  Daftar ulang dapat dilakukan setelah membayar biaya daftar ulang terlebih dahulu
                                </div>
                                <div class="callout callout-warning">
                                  Rincian biaya daftar ulang :
                                  <?php foreach ($biaya_du as $value) { ?>       
                                    <li><?= $value->nama_biaya;?> Rp. <?= number_format($value->jumlah_biaya,2,',','.');?></li>
                                  <?php } ?>
                                  Jumlah biaya yang harus dibayarkan : Rp. <?= number_format($tot_biaya_du->total,2,',','.');?>               
                                </div> 
                                <div class="callout callout-info">
                                  <?php foreach ($infopembayaran as $text) { ?>       
                                    <?php echo $text->text ?>
                                  <?php } ?>              
                                </div> 
                              </div> 
                            <?php } ?>
                          <?php } else { ?>
                            <div class="col-xs-12 col-md-12">
                              <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-user"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Status anda</span>
                                  <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                                  <div class="progress">
                                    <div class="progress-bar" style="width : 100% "></div>
                                  </div>
                                  <span class="progress-description">
                                    Status Daftar Ulang
                                  </span>
                                </div>
                              </div>
                            </div>                   
                            <div class="col-xs-12 col-md-12">
                              <table class="word-table" style="margin-bottom: 10px">
                                <tr><td style="text-align: left;width: 150px">No Pendaftaran</td><td>: <?php echo $nomer->no_pendaftaran ?></td></tr>
                                <tr><td>Nama Peserta</td><td>: <?php echo $nomer->nama_peserta ?></td></tr>
                                <tr><td>Jenis Kelamin</td><td>: <?php echo $nomer->jenis_kelamin ?></td></tr>
                                <tr><td>Tempat Tanggal lahir</td><td>: <?php echo $nomer->tempat_lahir ?>, <?php echo format_indo(date('Y-m-d', strtotime($nomer->tanggal_lahir))); ?></td></tr>
                                <tr><td>NISN</td><td>: <?php echo $nomer->nisn ?></td></tr>
                                <tr><td>Asal Sekolah</td><td>: <?php echo $nomer->asal_sekolah; ?></td></tr>
                              </table>
                            </div>                       
                            <div class="col-xs-12 col-md-12">
                              <div class="callout callout-info">Saya yang tercantum di data menyatakan bahwa data yang tertera adalah benar, dan saya mengajukan Daftar Ulang atau Lapor Diri secara sadar, dan bersedia mematuhi semua aturan yang berlaku dengan segala konsekuensinya.</div>
                            </div>
                            <div class="col-xs-12 col-md-12">                        
                              <form action="member/daftarulang" method="post">
                                <div class="form-group">
                                  <label>Apakah anda setuju dengan pernyataan di atas? <span style="color:red;">*</label><br/>
                                  <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, Saya setuju dengan pernyataan di atas
                                </div> 
                                <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?php echo $nomer->id_peserta; ?>" />
                                <button type="submit" class="<?= $this->config->item('botton')?>">Daftar ulang sekarang</button>
                              </form>            
                            </div>                  
                          <?php } ?> 
                        <?php } else { ?>
                          <div class="col-xs-12 col-md-12">
                            <div class="info-box bg-yellow">
                              <span class="info-box-icon"><i class="fas fa-user"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Status anda</span>
                                <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
                                <div class="progress">
                                  <div class="progress-bar" style="width : 100% "></div>
                                </div>
                                <span class="progress-description">
                                  Status Daftar Ulang
                                </span>
                              </div>
                            </div>
                          </div>                   
                          <div class="col-xs-12 col-md-12">
                            <table class="word-table" style="margin-bottom: 10px">
                              <tr><td style="text-align: left;width: 150px">No Pendaftaran</td><td>: <?php echo $nomer->no_pendaftaran ?></td></tr>
                              <tr><td>Nama Peserta</td><td>: <?php echo $nomer->nama_peserta ?></td></tr>
                              <tr><td>Jenis Kelamin</td><td>: <?php echo $nomer->jenis_kelamin ?></td></tr>
                              <tr><td>Tempat Tanggal lahir</td><td>: <?php echo $nomer->tempat_lahir ?>, <?php echo format_indo(date('Y-m-d', strtotime($nomer->tanggal_lahir))); ?></td></tr>
                              <tr><td>NISN</td><td>: <?php echo $nomer->nisn ?></td></tr>
                              <tr><td>Asal Sekolah</td><td>: <?php echo $nomer->asal_sekolah; ?></td></tr>
                            </table>
                          </div>                       
                          <div class="col-xs-12 col-md-12">
                            <div class="callout callout-info">Saya yang tercantum di data menyatakan bahwa data yang tertera adalah benar, dan saya mengajukan Daftar Ulang atau Lapor Diri secara sadar, dan bersedia mematuhi semua aturan yang berlaku dengan segala konsekuensinya.</div>
                          </div>
                          <div class="col-xs-12 col-md-12">                        
                            <form action="member/daftarulang" method="post">
                              <div class="form-group">
                                <label>Apakah anda setuju dengan pernyataan di atas? <span style="color:red;">*</label><br/>
                                <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, Saya setuju dengan pernyataan di atas
                              </div> 
                              <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?php echo $nomer->id_peserta; ?>" />
                              <button type="submit" class="<?= $this->config->item('botton')?>">Daftar ulang sekarang</button>
                            </form>            
                          </div>  
                        <?php } ?>  
                      <?php } ?>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      <!-- end Modal daftar ulang -->  
    <?php } else { ?>
      <!-- Modal status hasil -->
      <?php if ($pengaturan->status_hasil) { ?>         
        <?php if ($nomer) { ?>        
          <div class="modal fade" id="myModalStatushasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header <?= $this->config->item('header')?>">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Pengumuman hasil seleksi</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-md-12 col-xs-12">
                  <?php if ($nomer->status_hasil=='Di Terima') { ?>
                    <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>Selamat</h3>
                          <p><strong><?php echo $nomer->nama_peserta ?></strong> anda dinyatakan <?php echo strtoupper($nomer->status_hasil) ?> seleksi sebagai calon peserta didik baru <?php echo $pengaturan->nama_sekolah ?>, silahkan cetak Surat Keterangan sebagai bukti jika anda <?php echo $nomer->status_hasil ?>.</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-check"></i>
                      </div>     
                        <form action="member/printSKL" method="post" target="blank">
                          <button type="submit" class="btn bg-blue btn-flat btn-block">Cetak Bukti <?php echo $nomer->status_hasil ?>&nbsp; <i class="fa fa-print"></i></button>
                        </form>               
                    </div>         
                  <?php } else if($nomer->status_hasil=='Tidak di terima') { ?>
                    <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>Mohon maaf</h3>
                          <p><strong><?php echo $nomer->nama_peserta ?></strong> anda dinyatakan <?php echo strtoupper($nomer->status_hasil) ?> seleksi sebagai calon peserta didik baru <?php echo $pengaturan->nama_sekolah ?>, silahkan cetak Surat Keterangan sebagai bukti jika anda Di Terima.</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-slash"></i>
                      </div>     
                        <form action="member/printSKL" method="post" target="blank">
                          <button type="submit" class="btn bg-blue btn-flat btn-block">Cetak Bukti <?php echo $nomer->status_hasil ?>&nbsp; <i class="fa fa-print"></i></button>
                        </form>               
                    </div>         
                  <?php } else if($nomer->status_hasil=='Cadangan') { ?>
                    <div class="small-box bg-primary">
                      <div class="inner">
                          <h3><?php echo $nomer->nama_peserta ?></h3>
                          <p>anda dinyatakan <?php echo strtoupper($nomer->status_hasil) ?> seleksi sebagai calon peserta didik baru <?php echo $pengaturan->nama_sekolah ?>, silahkan cetak Surat Keterangan sebagai bukti jika anda <?php echo $nomer->status_hasil ?>. Jika ada yang kurang jelas silahkan tanyakan ke panitia PPDB.</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>     
                        <form action="member/printSKL" method="post" target="blank">
                          <button type="submit" class="btn bg-blue btn-flat btn-block">Cetak Bukti <?php echo $nomer->status_hasil ?>&nbsp; <i class="fa fa-print"></i></button>
                        </form>               
                    </div>    
                  <?php } else { ?>
                    <div class="col-xs-12 col-md-12">                
                      <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Status anda</span>
                          <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
                          <div class="progress">
                            <div class="progress-bar" style="width : 100% "></div>
                          </div>
                          <span class="progress-description">
                            Status Hasil
                          </span>
                        </div>
                      </div> 
                    </div>
                    <div class="col-xs-12 col-md-12">
                      <div class="callout callout-info">Status hasil seleksi anda belum ada. Cek kembali status anda nanti...</div>
                    </div>                        
                  <?php } ?>
                  </div>
                  </div>                                            
                </div>
              </div>
            </div>
          </div> 
        <?php } ?>  
      <?php } ?>  
      <!-- end Modal status hasil -->           
    <?php } ?>
  <?php } ?>          
  <!-- end Modal informasi -->

  <!-- live chat telegram -->
  <script>
  window.intergramId="<?php echo $pengaturan->intergramid ?>";
  window.intergramCustomizations={
    titleClosed:'Chat Admin',
    titleOpen:'Sedang Chat...',
    introMessage:'Halo selamat datang, ada yang bisa kami bantu',
    autoResponse:'Silahkan tunggu',
    autoNoResponse:'Pesan anda akan kami jawab, silahkan tunggu',
    maincolor:"#1a73c8",
    alwaysUseFloatingButton: false
  };
  </script>
  <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
  <!-- end chat --> 
<?php } ?>

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytablependaftaran').DataTable();
    $('#mytablepembayaran').DataTable();
  });
</script>