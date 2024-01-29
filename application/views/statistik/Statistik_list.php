<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

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
            
  if (cek_internet() == true) {    
      if ($chart_agama) { ?>
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chart Pendaftar</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7 col-xs-7">
                      <div class="chart-responsive">
                        <?php
                        if ($chart_pendaftar) {
                          foreach($chart_pendaftar as $data){
                            $jalur[] = $data->jalur;
                            $tot_jalur[] = (float) $data->jml_jalur;
                          }
                        }  
                        ?>   
                        <canvas id="pendaftar" style="width: 100px;height: 50px"></canvas> 
                        <script>
                          var ctx = document.getElementById("pendaftar");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: <?php echo json_encode($jalur);?>,
                              datasets: [{
                                label: 'Jalur Pendaftar ',
                                data: <?php echo json_encode($tot_jalur);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                      
                      </div>
                    </div>
                    <div class="col-md-5 col-xs-5">
                      <?php foreach($count_pendaftar as $data){ ?>
                      <div class="progress-group">       
                        <span><?= $data->jalur ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_jalur ?></span>                                                     
                      </div> 
                      <?php } ?>                                            
                    </div>                    
                  </div>
                </div>
              </div>
            </div> 

            <div class="col-md-4 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chart Jenis Kelamin</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7 col-xs-7">
                      <div class="chart-responsive">
                        <?php
                        if ($chart_jk) {
                          foreach($chart_jk as $data){
                            $jenis_kel[] = $data->jenis_kelamin;
                            $tot_jk[] = (float) $data->jml_jk;
                          }
                        }  
                        ?>   
                        <canvas id="jenis_kel" style="width: 100px;height: 50px"></canvas> 
                        <script>
                          var ctx = document.getElementById("jenis_kel");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: <?php echo json_encode($jenis_kel);?>,
                              datasets: [{
                                label: 'Jenis Kelamin ',
                                data: <?php echo json_encode($tot_jk);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                      
                      </div>
                    </div>
                    <div class="col-md-5 col-xs-5">
                      <?php foreach($count_jk as $data){ ?>
                      <div class="progress-group">
                        <span><?= $data->jenis_kelamin ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_jk ?></span>                                                   
                      </div> 
                      <?php } ?><br>
                      <span class="label label-success">Hasil berdasar jenis kelamin</span>    
                      <?php foreach($count_hasilperjk as $data){ ?>
                      <div class="progress-group"> 
                        <span><?= $data->jenis_kelamin ?></span>      
                        <span><?= $data->status_hasil ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_hasil ?></span>                                                     
                      </div> 
                      <?php } ?>                           
                    </div>                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chart Agama</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7 col-xs-7">
                      <div class="chart-responsive">
                        <?php
                        if ($chart_agama) {
                          foreach($chart_agama as $data){
                            $agama[] = $data->agama;
                            $tot_agama[] = (float) $data->jml_agama;
                          }
                        }  
                        ?> 
                        <canvas id="agama" style="width: 100px;height: 50px"></canvas> 
                        <script>
                          var ctx = document.getElementById("agama");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: <?php echo json_encode($agama);?>,
                              datasets: [{
                                label: 'Agama ',
                                data: <?php echo json_encode($tot_agama);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                    
                      </div>
                    </div>
                    <div class="col-md-5 col-xs-5">
                      <?php foreach($count_agama as $data){ ?>
                      <div class="progress-group">  
                        <span><?= $data->agama ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_agama ?></span>                                                       
                      </div> 
                      <?php } ?><br>
                      <span class="label label-success">Hasil berdasar agama</span>    
                      <?php foreach($count_hasilperagama as $data){ ?>
                      <div class="progress-group"> 
                        <span><?= $data->agama ?></span>      
                        <span><?= $data->status_hasil ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_hasil ?></span>                                                     
                      </div> 
                      <?php } ?>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>  

            <div class="col-md-4 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chart Status Hasil</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7 col-xs-7">
                      <div class="chart-responsive">
                        <?php
                        if ($chart_hasil) {
                          foreach($chart_hasil as $data){
                            $status_hasil[] = $data->status_hasil;
                            $tot_hasil[] = (float) $data->jml_hasil;
                          }
                        }  
                        ?>   
                        <canvas id="status_hasil" style="width: 100px;height: 50px"></canvas> 
                        <script>
                          var ctx = document.getElementById("status_hasil");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: <?php echo json_encode($status_hasil);?>,
                              datasets: [{
                                label: 'Status Hasil ',
                                data: <?php echo json_encode($tot_hasil);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>                                      
                      </div>
                    </div>
                    <div class="col-md-5 col-xs-5">
                      <?php foreach($count_hasil as $data){ ?>
                      <div class="progress-group">       
                        <span><?= $data->status_hasil ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_hasil ?></span>                                                     
                      </div> 
                      <?php } ?><br>
                      <span class="label label-success">Hasil berdasar jalur</span>    
                      <?php foreach($count_hasilperjalur as $data){ ?>
                      <div class="progress-group"> 
                        <span><?= $data->jalur ?></span>      
                        <span><?= $data->status_hasil ?></span>
                        <span class="progress-number label label-info"><?= $data->jml_hasil ?></span>                                                     
                      </div> 
                      <?php } ?>                                           
                    </div>                    
                  </div>
                </div>
              </div>
            </div>    
          </div>           

          <div class="row">
            <div class="col-md-8 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Chart Asal Sekolah</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="chart-responsive">
                        <?php
                        if ($chart_sekolah) {
                          foreach($chart_sekolah as $data){
                            $sekolah[] = $data->asal_sekolah;
                            $tot_sekolah[] = (float) $data->jml_sekolah;
                          }
                        }  
                        ?>   
                        <canvas id="sekolah" width="500"></canvas> 
                        <script>
                          var ctx = document.getElementById("sekolah");
                          var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: <?php echo json_encode($sekolah);?>,
                              datasets: [{
                                axis: 'y',
                                label: 'Jumlah ',
                                data: <?php echo json_encode($tot_sekolah);?>,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              indexAxis: 'y',
                            }  
                          });
                        </script>                                    
                      </div>
                    </div>              
                  </div>
                </div>
              </div>
            </div>
 
            <div class="col-md-4 col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Asal Sekolah</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <?php foreach ($count_sekolah as $value) { ?>           
                  <div class="col-md-12 col-xs-12">                                 
                      <div class="progress-group">
                        <span><?= $value->npsn_sekolah ?> | <?= $value->asal_sekolah ?></span>
                        <span class="progress-number label label-info"><?= $value->jml_sekolah ?></span>                    
                      </div>                
                  </div>
                  <?php } ?>                      
                </div>
              </div>
            </div> 
          </div> 
    <?php } else { ?>             
          <div class="row">
            <div class="col-xs-12">
              <div class="callout callout-info">
                Tidak ada data statistik
              </div>
            </div>
          </div>  
    <?php }    
  } else { ?>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12 col-xs-12">            
          <div class="callout callout-info">
            <p>Aktifkan koneksi internet untuk menampilkan Statistik</p>
          </div>
        </div>
      </div>  
    </div>               
  <?php } ?>