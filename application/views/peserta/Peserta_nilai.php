<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Rekap Nilai Peserta</h3>
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
						<?php echo anchor(site_url('peserta/rekap_nilai'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Nilai</span>', 'class="btn bg-yellow btn-flat"'); ?>	
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
							    <!-- <th>Jurusan</th> -->
							    <th>Jalur</th>
							    <th>Rapor</th>
 								<th>US</th>
 								<th>UN</th>
                                <th>Rerata semester</th>
 								<th>Jumlah Nilai</th>
 								<th>Nilai Jarak</th>
 								<th>Nilai Prestasi</th>
                                <th>Nilai Tes</th>
                                <th>Nilai Wawancara</th>
 								<th>Nilai Akhir</th>
							    <th>Usia</th>
                                <!-- <th>Kesimpulan Wawancara</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($peserta as $data):
						        $id=$data->id_peserta;
    					        $id_peserta=$data->id_peserta;
                                $poin_jarak=$data->skor_jarak;
                                $akreditasi=$data->akreditasi;
                                
                                // nilai tes dan wawancara
                                if ($this->Peserta_model->get_tesdanwawancara($id)) {
                                    foreach ($this->Peserta_model->get_tesdanwawancara($id) as $value) {
                                      $poin_tes=$value->nilai_tes;
                                      $poin_wawancara=$value->nilai_wawancara;
                                      $kesimpulan=$value->kesimpulan;
                                    }
                                } else {
                                    $poin_tes="0";
                                    $poin_wawancara="0";     
                                    $kesimpulan="";                                 
                                }                                    
                                // rerata nilai rapor per semester
                                foreach ($this->Peserta_model->get_rerataraporsemester($id) as $rerata) {
                                    $nilai_rerata=$rerata->rerata;                                 
                                }
						        // total nilai
                                $tot_nilai=$data->nilai_rapor+$data->nilai_usbn+$data->nilai_unbk_unkp+$nilai_rerata;
                                if ($formulir->akreditasi=='Ya') {
                                    if ($akreditasi=='A') {
                                        $poin_nilai=($tot_nilai!=0)?($tot_nilai*30)/100:0;
                                    } else if ($akreditasi=='B') {
                                        $poin_nilai=($tot_nilai!=0)?($tot_nilai*20)/100:0;
                                    } else {
                                        $poin_nilai=($tot_nilai!=0)?($tot_nilai*10)/100:0;    
                                    }                                     
                                } else {
                                    $poin_nilai=$tot_nilai;
                                }

						        // total poin prestasi
						        foreach ($this->Prestasipeserta_model->sumpoin($id_peserta) as $poin) {
						          $poin_prestasi=$poin->totalpoin;
						        }
						        // bobot by id_peserta
						        foreach ($this->Peserta_model->bobot($id) as $bobot) {
						          $bobotjarak=($bobot->bobot_jarak!=0)?($bobot->bobot_jarak*$poin_jarak)/100:0;
						          $bobotnilai=($bobot->bobot_nilai!=0)?($bobot->bobot_nilai*$poin_nilai)/100:0;
						          $bobotprestasi=($bobot->bobot_prestasi!=0)?($bobot->bobot_prestasi*$poin_prestasi)/100:0;
                                  $bobottes=($bobot->bobot_tes!=0)?($bobot->bobot_tes*$poin_tes)/100:0;
                                  $bobotwawancara=($bobot->bobot_wawancara!=0)?($bobot->bobot_wawancara*$poin_wawancara)/100:0;
						        }
						        // nilai akhir        
                                if ($this->Peserta_model->bobot($id)) {        
                                  $nilai_akhir=$bobotjarak+$bobotnilai+$bobotprestasi+$bobottes+$bobotwawancara;                               
                                } else {
                                  $nilai_akhir='bobot jalur blm ada';  
                                }

						        // umur by id_peserta
						        foreach ($this->Peserta_model->tgl_lhr($id) as $tgl) {
						        	$tanggal_lahir=new DateTime($tgl->tanggal_lahir);
						        }        
								$today = new DateTime('today');
								$y = $today->diff($tanggal_lahir)->y;
								$m = $today->diff($tanggal_lahir)->m;
								$d = $today->diff($tanggal_lahir)->d;
								$usia = $y . " tahun " . $m . " bulan " . $d . " hari";  
                            ?>
                            <tr>
                                <td style="text-align: center"><?php echo $no++;?></td>
                                <td><?php echo $data->no_pendaftaran;?></td>
                                <td><?php echo $data->nama_peserta;?></td>        
                                <!-- <td><?php echo $data->nama_jurusan;?></td> -->
                                <td><?php echo $data->jalur;?></td>
                                <td style="text-align: center"><?php echo $data->nilai_rapor;?></td>
                                <td style="text-align: center"><?php echo $data->nilai_usbn;?></td>
                                <td style="text-align: center"><?php echo $data->nilai_unbk_unkp;?></td>
                                <td style="text-align: center"><?php echo round($nilai_rerata,2);?></td>
                                <td style="text-align: center"><?php echo round($bobotnilai,2);?></td>
                                <td style="text-align: center"><?php echo $bobotjarak;?></td>
                                <td style="text-align: center"><?php echo $bobotprestasi;?></td>
                                <td style="text-align: center"><?php echo $bobottes;?></td>
                                <td style="text-align: center"><?php echo $bobotwawancara;?></td>                                
                                <td style="text-align: center"><?php echo $nilai_akhir;?></td>
                                <td><?php echo $usia;?></td>
                                <!-- <td><?php echo $kesimpulan;?></td> -->
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="callout callout-info">
                <li>Jumlah Nilai = Rapor + US + UN + Rerata semester</li>
                Jumlah nilai jika menggunakan akreditasi
                <li>Akreditasi A : 30%</li>
                <li>Akreditasi B : 20%</li>
                <li>Akreditasi C : 10%</li>
                <li>Jumlah Nilai = Jumlah Nilai * Akreditasi</li>
                Nilai akhir
                <li>Jumlah Nilai = Jumlah Nilai * Bobot Nilai/100</li>
                <li>Nilai Jarak = Nilai Jarak * Bobot Jarak/100</li>
                <li>Nilai Prestasi = Nilai Prestasi * Bobot Prestasi/100</li>
                <li>Nilai Tes = Nilai Tes * Bobot Tes/100</li>
                <li>Nilai Wawancara = Nilai Wawancara * Bobot Wawancara/100</li>
                <li>Nilai Akhir = Jumlah Nilai + Nilai Jarak + Nilai Prestasi + Nilai Tes + Nilai Wawancara</li>
            </div>            
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