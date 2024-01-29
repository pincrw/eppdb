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
                    <div class="col-xs-4 col-md-4">                      
                        <?php echo anchor(site_url('peserta/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                        <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                    </div>
                    <div class="col-xs-8 col-md-8 text-right">
                        <button type="button" class="btn bg-blue btn-flat" data-toggle="modal" data-target="#myModalgenhasil">
                            <i class="fas fa-sync-alt"></i><span class="hidden-xs">&nbsp; Gen hasil</span>
						</button>
						<?php echo anchor(site_url('peserta/reset_all'), '<i class="fas fa-clipboard-list"></i><span class="hidden-xs">&nbsp;&nbsp;Reset hasil</span>', 'class="btn btn-warning btn-flat"'); ?>
						<?php echo anchor(site_url('peserta/terima_all'), '<i class="fas fa-users"></i><span class="hidden-xs">&nbsp;&nbsp;Terima semua</span>', 'class="btn btn-success btn-flat"'); ?>					
						<?php echo anchor(site_url('peserta/rekap_nilai'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Nilai</span>', 'class="btn btn-info btn-flat"'); ?>						
						<?php echo anchor(site_url('peserta/excel'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Peserta Excel</span>', 'class="btn bg-purple btn-flat"'); ?>
						<!--
 						<?php echo anchor(site_url('peserta/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
						<?php echo anchor(site_url('peserta/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?> 
						-->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                        <thead>
                            <tr>
                                <th width=""></th>
                                <th width="10px">No</th>
							    <th>No Pendaftaran</th>
<!-- 							    <th>Tanggal Daftar</th>
							    <th>Tahun</th>
							    <th>Jalur</th>
 -->							<th>Nama Peserta</th>
<!-- 							    <th>Jenis Kelamin</th> -->
							    <th>NISN</th>
<!--							    <th>NIK</th>
								<th>No KK</th>
							    <th>Tempat Lahir</th>
							    <th>Tanggal Lahir</th>
							    <th>No Registrasi Akta Lahir</th>
							    <th>Agama</th>
							    <th>Kewarganegaraan</th>
							    <th>Berkebutuhan Khusus</th>
							    <th>Alamat</th>
							    <th>RT</th>
							    <th>RW</th>
							    <th>Nama Dusun</th>
							    <th>Nama Kelurahan</th>
							    <th>Kecamatan</th>
							    <th>Kabupaten/Kota</th>
							    <th>Provinsi</th>
							    <th>Kode Pos</th>
							    <th>Latitude</th>
							    <th>Longitude</th>
							    <th>Tempat Tinggal</th>
							    <th>Moda Transportasi</th>
							    <th>No KKS</th>
							    <th>Anak Ke</th>
							    <th>Penerima KPS/PKH</th>
							    <th>No KPS/PKH</th>
							    <th>Penerima KIP</th>
							    <th>No KIP</th>
							    <th>Nama Tertera Di KIP</th>
							    <th>Terima Fisik Kartu KIP</th>
							    <th>Nama Ayah</th>
							    <th>NIK Ayah</th>
								<th>Tempat Lahir Ayah</th>
							    <th>Tanggal Lahir Ayah</th>
							    <th>Pendidikan Ayah</th>
							    <th>Pekerjaan Ayah</th>
							    <th>Penghasilan Bulanan Ayah</th>
							    <th>Berkebutuhan Khusus Ayah</th>
							    <th>No Hp Ayah</th>
							    <th>Nama Ibu</th>
							    <th>NIK Ibu</th>
								<th>Tempat Lahir Ibu</th>
							    <th>Tanggal Lahir Ibu</th>
							    <th>Pendidikan Ibu</th>
							    <th>Pekerjaan Ibu</th>
							    <th>Penghasilan Bulanan Ibu</th>
							    <th>Berkebutuhan Khusus Ibu</th>
							    <th>No Hp Ibu</th>
							    <th>Nama Wali</th>
							    <th>NIK Wali</th>
								<th>Tempat Lahir Wali</th>
							    <th>Tanggal Lahir Wali</th>
							    <th>Pendidikan Wali</th>
							    <th>Pekerjaan Wali</th>
							    <th>Penghasilan Bulanan Wali</th>
							    <th>No Hp Wali</th>
							    <th>No Telepon Rumah</th>
							    <th>Nomor HP</th>
							    <th>Email</th>
							    <th>Hobi</th>
							    <th>Tinggi Badan</th>
							    <th>Berat Badan</th>
							    <th>Lingkar Kepala</th>
							    <th>Jarak</th>
							    <th>Waktu Tempuh</th>
							    <th>Jumlah Saudara Kandung</th> -->
							    <th>Jurusan</th>
<!-- 							    <th>Jurusan Pilihan 2</th>
								<th>Sekolah Pilihan 2</th> -->
							    <th>Asal Sekolah</th>
<!--							    <th>Akreditasi</th>
							    <th>No UN</th>
							    <th>No Seri Ijazah</th>
							    <th>No Seri Skhu</th>
							    <th>Tahun Lulus</th>
							    <th>Nilai Rapor</th>id
 								<th>Nilai US</th>
 								<th>Nilai UN</th>
 								<th>Poin Jarak</th> -->
 								<th>Jalur</th>
							    <th>Status</th>
							    <th>Hasil</th>
							    <th>Daftar Ulang</th>
                                <th width="230px">Action</th>
                            </tr>
                        </thead>	
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal gen hasil-->
<div class="modal fade" id="myModalgenhasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-sync-alt"></i>&nbsp; Generate Hasil</h4>
      </div>
      <div class="modal-body">
      	    <style>
              .select2{width:100% !important};
            </style>
            <form action="peserta/gen_hasil" method="post">
                <div class="form-group">
                    <label for="varchar">Jalur Pendaftaran <span style="color:red;">*</span></label>
                    <select type="text" class="select2 form-control" name="id_jalur" id="id_jalur" value="" required/>
                        <option value="">Pilih Jalur Pendaftaran</option>
                            <?php foreach ($jalur as $key => $value) { ?>
                                <option value="<?= $value->id_jalur;?>">
                                    <?= $value->jalur;?>
                                </option>
                            <?php } ?>
                    </select>
                </div>

                <?php if ($formulir->jurusan=='Ya'){ ?>
                    <div class="form-group">
                        <label for="int">Program | Jurusan <span style="color:red;">*</span> <?php echo form_error('id_jurusan') ?></label>
                        <select type="text" class="select2 form-control" name="id_jurusan" id="id_jurusan" value="" required/>
                            <option value="">Pilih Jurusan</option>
                                <?php foreach ($jurusan as $key => $value) { ?>
                                    <option value="<?= $value->id_jurusan;?>">
                                        <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                    </option>
                                <?php }?>
                        </select>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="int">Limit <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="limit" id="limit" placeholder="Hanya angka" onkeypress="return Angkasaja(event)" required/>
                </div>               
                <button type="submit" class="<?= $this->config->item('botton')?>">Generate Hasil</button>
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