<style>
  .select2{width:100% !important};
</style>            
<form action="<?php echo $action; ?>" role="form" method="post" accept-charset="utf-8">
  <div class="form-group">
      <label for="int">Ketentuan PPDB</label>                
        <div class="callout callout-info">
          <p><?php echo $formulir->ketentuan ?></p>
        </div>                
  </div>
  <div class="callout callout-info">
        <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
  </div>  
  <?php if ($formulir->tahun_pelajaran=='Ya'){ ?>
  <div class="form-group">
        <label for="int">Tahun Pelajaran <?php echo form_error('id_tahun') ?></label>
        <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?php echo $tahunpelajaran->id_tahun; ?>" />
        <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" value="<?php echo $peserta->tahun_pelajaran; ?>" readonly/>                                  
  </div>
  <?php } ?>

  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Registrasi</h3>              
  </div><br> 
  <?php if ($formulir->jalur_pendaftaran=='Ya'){ ?>
  <div class="form-group">
        <label for="int">Jalur Pendaftaran <span style="color:red;">*</span> <?php echo form_error('id_jalur') ?></label>
        <select type="text" class="select2 form-control" name="id_jalur" id="id_jalur" value="" placeholder="Jalur Pendaftaran" required/>
          <option value="<?php echo $peserta->id_jalur; ?>"><?php echo $peserta->jalur; ?></option>
          <?php foreach ($jalur as $key => $value) { ?>
              <option value="<?= $value->id_jalur;?>">
                  <?= $value->jalur;?>
              </option>
          <?php }?>
        </select>
  </div>
  <?php } ?>     
            
  <?php if ($formulir->asal_sekolah=='Ya'){ ?>
  <div class="form-group">
        <label for="int">Asal Sekolah <span style="color:red;">*</span> <?php echo form_error('id_sekolah') ?> <span class="label bg-yellow" data-toggle="modal" data-target="#myModalInfo">klik disini jika sekolah tidak ada</span></label>
        <select type="text" class="select2 form-control" name="id_sekolah" id="id_sekolah" value="" placeholder="Asal Sekolah" required/>
          <option value="<?php echo $peserta->id_sekolah; ?>"><?php echo $peserta->npsn_sekolah; ?> | <?php echo $peserta->asal_sekolah; ?> | <?php echo $peserta->kecsekolah; ?></option> 
          <?php foreach ($sekolah as $key => $value) { ?>
              <option value="<?= $value->id_sekolah;?>">
                  <?= $value->npsn_sekolah;?> | <?= $value->asal_sekolah;?> | <?= $value->kecamatan;?>
              </option>
          <?php }?>
        </select>
  </div>
  <?php } ?>  
  
  <?php if ($formulir->akreditasi=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Akreditasi <span style="color:red;">*</span> <?php echo form_error('akreditasi') ?></label>   
        <select type="text" class="form-control" name="akreditasi" id="akreditasi" value="" placeholder="Akreditasi" required/>
                <option value="<?php echo $peserta->akreditasi; ?>"><?php echo $peserta->akreditasi; ?></option>
                <option value="A">Akreditasi A</option>
                <option value="B">Akreditasi B</option>
                <option value="C">Akreditasi C</option>
                <option value="TT">Tidak Terakreditasi</option>
        </select>    
  </div>
  <?php } else { ?>
      <input type="hidden" class="form-control" name="akreditasi" id="akreditasi"/>
  <?php } ?>

<!-- pilihan sekolah lainnya -->
  <?php if ($pengaturan->jenjang=='SMP/MTs'){ ?>                          
  <div class="form-group">
      <label for="varchar">Sekolah Pilihan kedua <?php echo form_error('pilihan_sekolah_lain') ?></label>
      <input type="text" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" value="<?php echo $pilihan_sekolah_lain; ?>" placeholder="Sekolah Pilihan kedua jika ada tuliskan" />
  </div>
  <?php } else { ?>
      <input type="hidden" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" />
  <?php } ?>
<!-- end pilihan sekolah lainnya -->

  <?php if ($formulir->no_peserta_ujian=='Ya'){ ?>
    <div class="form-group">
          <label for="varchar">No Peserta Ujian <?php echo form_error('no_un') ?></label>
          <input type="text" class="form-control" name="no_un" id="no_un" value="<?php echo $no_un; ?>" placeholder="No. Peserta Ujian" />
    </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_un" id="no_un" />
  <?php } ?>
  
  <?php if ($formulir->no_seri_ijazah=='Ya'){ ?>
    <div class="form-group">
          <label for="varchar">No Seri Ijazah <?php echo form_error('no_seri_ijazah') ?></label>
          <input type="text" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" value="<?php echo $no_seri_ijazah; ?>" placeholder="No Seri Ijazah" />
    </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" />
  <?php } ?>                          
  
  <?php if ($formulir->no_seri_skhu=='Ya'){ ?>
    <div class="form-group">
          <label for="varchar">No Seri SKHU <?php echo form_error('no_seri_skhu') ?></label>
          <input type="text" class="form-control" name="no_seri_skhu" id="no_seri_skhu" value="<?php echo $no_seri_skhu; ?>" placeholder="No Seri SKHU" />
    </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_seri_skhu" id="no_seri_skhu" />
  <?php } ?>    

<!-- pilihan jurusan -->                                                    
  <?php if ($formulir->jurusan=='Ya'){ ?>    
    <div class="form-group">
      <label for="int">Jurusan Pilihan Satu  <span style="color:red;">*</span> <?php echo form_error('id_jurusan') ?></label>
      <select type="text" class="select2 form-control" name="id_jurusan" id="id_jurusan" value="" placeholder="Jurusan Pilihan Satu" required/>
        <option value="<?php echo $peserta->id_jurusan; ?>"><?php echo $peserta->nama_jurusan; ?></option> 
        <?php foreach ($jurusan as $key => $value) { ?>
            <option value="<?= $value->id_jurusan;?>">
                <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
            </option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="int">Jurusan Pilihan Dua <span style="color:red;"><i> (tidak disarankan memilih pilihan yang sama dengan pilihan satu)</i></span><?php echo form_error('pilihan_dua') ?></label>
      <select type="text" class="select2 form-control" name="pilihan_dua" id="pilihan_dua" value="" placeholder="Jurusan Pilihan Dua" />
        <option value="<?php echo $peserta->pilihan_dua; ?>"><?php echo $peserta->pilihan_dua; ?></option> 
        <?php foreach ($jurusan as $key => $value) { ?>
            <option value="<?= $value->nama_jurusan;?>">
                <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
            </option>
        <?php }?>
      </select>
    </div>                             
  <?php } else { ?>
    <input type="hidden" class="form-control" name="id_jurusan" id="id_jurusan" value="1"/>
    <input type="hidden" class="form-control" name="pilihan_dua" id="pilihan_dua"/>
  <?php } ?> 
<!-- end pilihan jurusan -->                                                    

  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Pribadi</h3>              
  </div><br>
  <?php if ($formulir->nama_peserta=='Ya'){ ?>
    <div class="form-group">
          <label for="varchar">Nama Peserta <span style="color:red;">*</span> <?php echo form_error('nama_peserta') ?></label>
          <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?php echo $nama_peserta; ?>"placeholder="Nama Peserta" required/>
    </div>
  <?php } ?>
  
  <?php if ($formulir->jenis_kelamin=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Jenis Kelamin <span style="color:red;">*</span> <?php echo form_error('jenis_kelamin') ?></label>   
        <select type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="" placeholder="Jenis Kelamin" required/>
                <option value="<?php echo $peserta->jenis_kelamin; ?>">
                    <?php if ($peserta->jenis_kelamin=='L') {
                        echo "Laki-Laki";
                    } else {
                        echo "Perempuan";  
                    }
                    ?>
                </option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
        </select>    
  </div>
  <?php } ?>
            
  <?php if ($formulir->nisn=='Ya'){ ?>
  <?php if ($pengaturan->jenjang=='TK/PAUD' || $pengaturan->jenjang=='SD/MI'){ ?>    
  <div class="form-group">
        <label for="varchar">NISN <?php echo form_error('nisn') ?></label>
        <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN harus tepat 10 karakter" value="<?php echo $nisn; ?>" readonly/>
  </div>
  <?php } else { ?>
  <div class="form-group">
        <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>
        <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN harus tepat 10 karakter" value="<?php echo $nisn; ?>" readonly/>
  </div>    
  <?php } ?>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nisn" id="nisn" />
  <?php } ?>
  
  <?php if ($formulir->nik=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">NIK <span style="color:red;">*</span> <?php echo form_error('nik') ?></label>
        <input type="text" class="form-control" name="nik" id="nik" maxlength="16" onkeypress="return Angkasaja(event)" value="<?php echo $nik; ?>" placeholder="NIK harus tepat 16 karakter" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nik" id="nik" />
  <?php } ?>

  <?php if ($formulir->no_kk=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No Kartu Keluarga <span style="color:red;">*</span> <?php echo form_error('no_kk') ?></label>
        <input type="text" class="form-control" name="no_kk" id="no_kk" maxlength="16" onkeypress="return Angkasaja(event)" value="<?php echo $no_kk; ?>" placeholder="No KK harus tepat 16 karakter" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_kk" id="no_kk" />
  <?php } ?>  
  
  <?php if ($formulir->tempat_lahir=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tempat Lahir <span style="color:red;">*</span> <?php echo form_error('tempat_lahir') ?></label>
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir" required/>
  </div>
  <?php } ?>
  
  <?php if ($formulir->tanggal_lahir=='Ya'){ ?>
  <div class="form-group">
        <label for="date">Tanggal Lahir <span style="color:red;">*</span> <?php echo form_error('tanggal_lahir') ?></label>
        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir)); ?>" placeholder="Tanggal Lahir" required/>
  </div>
  <?php } ?>
  
  <?php if ($formulir->no_registrasi_akta_lahir=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No Registrasi Akta Lahir <?php echo form_error('no_registrasi_akta_lahir') ?></label>
        <input type="text" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" value="<?php echo $no_registrasi_akta_lahir; ?>" placeholder="No Registrasi Akta Lahir" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" />
  <?php } ?>                          
            
  <?php if ($formulir->agama=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Agama <span style="color:red;">*</span> <?php echo form_error('agama') ?></label>
        <select type="text" class="form-control" name="agama" id="agama" value="" placeholder="Agama" required/>
                <option value="<?php echo $peserta->agama; ?>"><?php echo $peserta->agama; ?></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Khatolik">Khatolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghuchu</option>
        </select>
  </div>
  <?php } ?>
  
  <?php if ($formulir->kewarganegaraan=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Kewarganegaraan <span style="color:red;">*</span> <?php echo form_error('kewarganegaraan') ?></label>
        <select type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="" placeholder="Kewarganegaraan" required/>
                <option value="<?php echo $peserta->kewarganegaraan; ?>"><?php echo $peserta->kewarganegaraan; ?></option>
                <option value="Indonesia (WNI)">Indonesia (WNI)</option>
                <option value="Asing (WNA)">Asing (WNA)</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="kewarganegaraan" id="kewarganegaraan" />
  <?php } ?>                          
            
  <?php if ($formulir->berkebutuhan_khusus=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Berkebutuhan Khusus <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus') ?></label>
        <select type="text" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" value="" placeholder="Berkebutuhan Khusus" required/>
                <option value="<?php echo $peserta->berkebutuhan_khusus; ?>"><?php echo $peserta->berkebutuhan_khusus; ?></option>
                <option value="Tidak">Tidak</option>
                <option value="Netra">Netra</option>
                <option value="Rungu">Rungu</option>
                <option value="Grahita Ringan">Grahita Ringan</option>
                <option value="Grahita Sedang">Grahita Sedang</option>
                <option value="Daksa Ringan">Daksa Ringan</option>
                <option value="Daksa Sedang">Daksa Sedang</option>
                <option value="Laras">Laras</option>
                <option value="Wicara">Wicara</option>
                <option value="Tuna Ganda">Tuna Ganda</option>
                <option value="Hiper Aktif">Hiper Aktif</option>
                <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                <option value="Bakat Istimewa">Bakat Istimewa</option>
                <option value="Kesulitan belajar">Kesulitan belajar</option>
                <option value="Narkoba">Narkoba</option>
                <option value="Indigo">Indigo</option>
                <option value="Down Sindrome">Down Sindrome</option>
                <option value="Autis">Autis</option>                 
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" />
  <?php } ?>                                                                          
            
  <?php if ($formulir->alamat=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Alamat <span style="color:red;">*</span> <?php echo form_error('alamat') ?></label>
        <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat" required/>
  </div>
  <?php } ?>
  
  <?php if ($formulir->rt=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">RT <span style="color:red;">*</span> <?php echo form_error('rt') ?></label>
        <input type="text" class="form-control" name="rt" id="rt" onkeypress="return Angkasaja(event)" value="<?php echo $rt; ?>" placeholder="RT" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="rt" id="rt" />
  <?php } ?>                          
  
  <?php if ($formulir->rw=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">RW <span style="color:red;">*</span> <?php echo form_error('rw') ?></label>
        <input type="text" class="form-control" name="rw" id="rw" onkeypress="return Angkasaja(event)" value="<?php echo $rw; ?>" placeholder="RW" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="rw" id="rw" />
  <?php } ?>                          
            
  <?php if ($formulir->nama_dusun=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama Dusun <span style="color:red;">*</span> <?php echo form_error('nama_dusun') ?></label>
        <input type="text" class="form-control" name="nama_dusun" id="nama_dusun" value="<?php echo $nama_dusun; ?>" placeholder="Nama Dusun" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nama_dusun" id="nama_dusun" />
  <?php } ?>                          
  
  <?php if ($formulir->nama_kelurahan=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama Kelurahan <span style="color:red;">*</span> <?php echo form_error('nama_kelurahan') ?></label>
        <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" value="<?php echo $nama_kelurahan; ?>" placeholder="Nama Kelurahan" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nama_kelurahan" id="nama_kelurahan" />
  <?php } ?>                          
  
  <?php if ($formulir->kecamatan=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Kecamatan <span style="color:red;">*</span> <?php echo form_error('kecamatan') ?></label>
        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $kecamatan; ?>" placeholder="Kecamatan" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="kecamatan" id="kecamatan" />
  <?php } ?>                          
  
  <?php if ($formulir->kode_pos=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Kode Pos <span style="color:red;">*</span> <?php echo form_error('kode_pos') ?></label>
        <input type="text" class="form-control" name="kode_pos" id="kode_pos" onkeypress="return Angkasaja(event)" value="<?php echo $kode_pos; ?>" placeholder="Kode Pos" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="kode_pos" id="kode_pos" />
  <?php } ?>                          
            
  <?php if ($formulir->latitude=='Ya' || $formulir->longitude=='Ya'){ ?>           
      <?php
      //buat fungsi untuk cek internet
      function cek_internet(){
         $connected = @fsockopen("www.google.com", 80);
         if ($connected){
            $is_conn = true; //jika koneksi tersambung
            fclose($connected);
         }else{
            $is_conn = false; //jika koneksi gagal
         }
         return $is_conn;
      }
      
      if (cek_internet() == true) { 
      ?>    
          <?php if ($pengaturan->maps=='OpenStreetMap') { ?>  
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="callout callout-info">
                  <p>Drag marker ke lokasi yang diinginkan</p>
                </div>
              </div>    
            </div>                               
            <div id="peta" style="width:100%;height:450px;"></div>
          <?php } else { ?>                               
            <div id="googleMap" style="width:100%;height:450px;"></div>            
          <?php } ?>    
      <?php } else { ?>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="callout callout-info">
                  <p>Aktifkan koneksi internet untuk menampilkan PETA</p>
                </div>
              </div>    
            </div>      
      <?php } ?>      
  <?php } ?>     

  <?php if ($formulir->latitude=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Latitude <span style="color:red;">*</span> <?php echo form_error('latitude') ?></label>
        <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $latitude; ?>" placeholder="Latitude" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="latitude" id="latitude" />
  <?php } ?>                          
  
  <?php if ($formulir->longitude=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Longitude <span style="color:red;">*</span> <?php echo form_error('longitude') ?></label>
        <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $longitude; ?>" placeholder="Longitude" required/>
  </div>                        
  <?php } else { ?>
        <input type="hidden" class="form-control" name="longitude" id="longitude" />
  <?php } ?>                          
            
  <?php if ($formulir->tempat_tinggal=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tempat Tinggal <span style="color:red;">*</span> <?php echo form_error('tempat_tinggal') ?></label>
        <select type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" value="" placeholder="Tempat Tinggal" required/>
                <option value="<?php echo $peserta->tempat_tinggal; ?>"><?php echo $peserta->tempat_tinggal; ?></option>
                <option value="Bersama orangtua">Bersama orangtua</option>
                <option value="Wali">Wali</option>
                <option value="Kos">Kos</option>
                <option value="Asrama">Asrama</option>
                <option value="Panti Asuhan">Panti Asuhan</option>
                <option value="Pesantren">Pesantren</option>
                <option value="Lainnya">Lainnya</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tempat_tinggal" id="tempat_tinggal" />
  <?php } ?>                          

  <?php if ($formulir->moda_transportasi=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Moda Transportasi <span style="color:red;">*</span> <?php echo form_error('moda_transportasi') ?></label>
        <select type="text" class="form-control" name="moda_transportasi" id="moda_transportasi" value="" placeholder="Moda Transportasi" required/>
                <option value="<?php echo $peserta->moda_transportasi; ?>"><?php echo $peserta->moda_transportasi; ?></option>
                <option value="Jalan kaki">Jalan kaki</option>
                <option value="Kendaraan pribadi">Kendaraan pribadi</option>
                <option value="Kendaraan umum">Kendaraan umum</option>
                <option value="Jemputan sekolah">Jemputan sekolah</option>
                <option value="Kereta Api">Kereta Api</option>
                <option value="Lainnya">Lainnya</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="moda_transportasi" id="moda_transportasi" />
  <?php } ?>                          
            
  <?php if ($formulir->no_kks=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No KKS <?php echo form_error('no_kks') ?></label>
        <input type="text" class="form-control" name="no_kks" id="no_kks" value="<?php echo $no_kks; ?>" placeholder="No KKS harus tepat 6 karakter" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_kks" id="no_kks" />
  <?php } ?>                          
  
  <?php if ($formulir->anak_ke=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Anak ke <span style="color:red;">*</span> <?php echo form_error('anak_ke') ?></label>
        <input type="text" class="form-control" name="anak_ke" id="anak_ke" onkeypress="return Angkasaja(event)" value="<?php echo $anak_ke; ?>" placeholder="Anak ke" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="anak_ke" id="anak_ke" />
  <?php } ?>                          
            
  <?php if ($formulir->penerima_kps_pkh=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Penerima KPS/PKH <span style="color:red;">*</span> <?php echo form_error('penerima_kps_pkh') ?></label>
        <select type="text" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" value="" placeholder="Penerima KPS/PKH" required/>
                <option value="<?php echo $peserta->penerima_kps_pkh; ?>"><?php echo $peserta->penerima_kps_pkh; ?></option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" />
  <?php } ?>                          
  
  <?php if ($formulir->no_kps_pkh=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No KPS/PKH <?php echo form_error('no_kps_pkh') ?></label>
        <input type="text" class="form-control" name="no_kps_pkh" id="no_kps_pkh" value="<?php echo $no_kps_pkh; ?>" placeholder="No KPS/PKH" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_kps_pkh" id="no_kps_pkh" />
  <?php } ?>                          
  
  <?php if ($formulir->penerima_kip=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Penerima KIP <span style="color:red;">*</span> <?php echo form_error('penerima_kip') ?></label>
        <select type="text" class="form-control" name="penerima_kip" id="penerima_kip" value="" placeholder="Penerima KIP" required/>
                <option value="<?php echo $peserta->penerima_kip; ?>"><?php echo $peserta->penerima_kip; ?></option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="penerima_kip" id="penerima_kip" />
  <?php } ?>                          
  
  <?php if ($formulir->no_kip=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No KIP <?php echo form_error('no_kip') ?></label>
        <input type="text" class="form-control" name="no_kip" id="no_kip" value="<?php echo $no_kip; ?>" placeholder="No KIP" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_kip" id="no_kip" />
  <?php } ?>                          
  
  <?php if ($formulir->nama_tertera_di_kip=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama tertera di KIP <?php echo form_error('nama_tertera_di_kip') ?></label>
        <input type="text" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" value="<?php echo $nama_tertera_di_kip; ?>" placeholder="Nama tertera di KIP" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" />
  <?php } ?>                          
            
  <?php if ($formulir->terima_fisik_kartu_kip=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Terima fisik kartu KIP <span style="color:red;">*</span> <?php echo form_error('terima_fisik_kartu_kip') ?></label>
        <select type="text" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" value="" placeholder="Terima fisik kartu KIP" required/>
                <option value="<?php echo $peserta->terima_fisik_kartu_kip; ?>"><?php echo $peserta->terima_fisik_kartu_kip; ?></option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" />
  <?php } ?>                          
  
  <?php if ($formulir->hobi=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Hobi <span style="color:red;">*</span> <?php echo form_error('hobi') ?></label>
        <input type="text" class="form-control" name="hobi" id="hobi" value="<?php echo $hobi; ?>" placeholder="Hobi" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="hobi" id="hobi" />
  <?php } ?>

  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Orangtua/Wali</h3>              
  </div><br> 
  <?php if ($formulir->nama_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama Ayah <span style="color:red;">*</span> <?php echo form_error('nama_ayah') ?></label>
        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?php echo $nama_ayah; ?>" placeholder="Nama Ayah" required/>
  </div>
  <?php } ?>
  
  <?php if ($formulir->nik_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">NIK Ayah <?php echo form_error('nik_ayah') ?></label>
        <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" maxlength="16" onkeypress="return Angkasaja(event)" value="<?php echo $nik_ayah; ?>" placeholder="NIK Ayah harus tepat 16 karakter" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nik_ayah" id="nik_ayah" />
  <?php } ?>
  
  <?php if ($formulir->tempat_lahir_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tempat lahir Ayah <span style="color:red;">*</span> <?php echo form_error('tempat_lahir_ayah') ?></label>
        <input type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" value="<?php echo $tempat_lahir_ayah; ?>" placeholder="Tempat lahir Ayah" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" />
  <?php } ?>  
  
  <?php if ($formulir->tanggal_lahir_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="date">Tanggal lahir Ayah <span style="color:red;">*</span> <?php echo form_error('tanggal_lahir_ayah') ?></label>
        <input type="text" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_ayah)); ?>" placeholder="Tanggal lahir Ayah" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="0000-00-00" />
  <?php } ?>                          
  
  <?php if ($formulir->pendidikan_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pendidikan Ayah <span style="color:red;">*</span> <?php echo form_error('pendidikan_ayah') ?></label>
        <select type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" value="" placeholder="Pendidikan Ayah" required/>
                <option value="<?php echo $peserta->pendidikan_ayah; ?>"><?php echo $peserta->pendidikan_ayah; ?></option>
                <option value="Tidak sekolah">Tidak sekolah</option>
                <option value="Putus SD">Putus SD</option>
                <option value="SD Sederajat">SD Sederajat</option>
                <option value="SMP Sederajat">SMP Sederajat</option>
                <option value="SMA Sederajat">SMA Sederajat</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4/S1">D4/S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" />
  <?php } ?>                          
  
  <?php if ($formulir->pekerjaan_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pekerjaan Ayah <span style="color:red;">*</span> <?php echo form_error('pekerjaan_ayah') ?></label>
        <select type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="" placeholder="Pekerjaan Ayah" required/>
                <option value="<?php echo $peserta->pekerjaan_ayah; ?>"><?php echo $peserta->pekerjaan_ayah; ?></option>
                <option value="Tidak bekerja">Tidak bekerja</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Petani">Petani</option>
                <option value="Peternak">Peternak</option>
                <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Pedagang Kecil">Pedagang Kecil</option>
                <option value="Pedagang Besar">Pedagang Besar</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Wirausaha">Wirausaha</option>
                <option value="Buruh">Buruh</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Meninggal Dunia">Meninggal Dunia</option>
                <option value="Lainnya">Lainnya</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" />
  <?php } ?>                          
  
  <?php if ($formulir->penghasilan_bulanan_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Penghasilan bulanan Ayah <span style="color:red;">*</span> <?php echo form_error('penghasilan_bulanan_ayah') ?></label>
        <select type="text" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" value="" placeholder="Penghasilan bulanan Ayah" required/>
                <option value="<?php echo $peserta->penghasilan_bulanan_ayah; ?>"><?php echo $peserta->penghasilan_bulanan_ayah; ?></option>
                <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                <option value="500.000 - 999.999">500.000 - 999.999</option>
                <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" />
  <?php } ?>                          
            
  <?php if ($formulir->berkebutuhan_khusus_ayah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Berkebutuhan khusus Ayah <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus_ayah') ?></label>
        <select type="text" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" value="" placeholder="Berkebutuhan Khusus Ayah" required/>
                <option value="<?php echo $peserta->berkebutuhan_khusus_ayah; ?>"><?php echo $peserta->berkebutuhan_khusus_ayah; ?></option>
                <option value="Tidak">Tidak</option>
                <option value="Netra">Netra</option>
                <option value="Rungu">Rungu</option>
                <option value="Grahita Ringan">Grahita Ringan</option>
                <option value="Grahita Sedang">Grahita Sedang</option>
                <option value="Daksa Ringan">Daksa Ringan</option>
                <option value="Daksa Sedang">Daksa Sedang</option>
                <option value="Laras">Laras</option>
                <option value="Wicara">Wicara</option>
                <option value="Tuna Ganda">Tuna Ganda</option>
                <option value="Hiper Aktif">Hiper Aktif</option>
                <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                <option value="Bakat Istimewa">Bakat Istimewa</option>
                <option value="Kesulitan belajar">Kesulitan belajar</option>
                <option value="Narkoba">Narkoba</option>
                <option value="Indigo">Indigo</option>
                <option value="Down Sindrome">Down Sindrome</option>
                <option value="Autis">Autis</option>                 
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" />
  <?php } ?>                          
  
  <?php if ($formulir->nama_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama Ibu <span style="color:red;">*</span> <?php echo form_error('nama_ibu') ?></label>
        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="<?php echo $nama_ibu; ?>" placeholder="Nama Ibu" required/>
  </div>
  <?php } ?>
  
  <?php if ($formulir->nik_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">NIK Ibu <?php echo form_error('nik_ibu') ?></label>
        <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" maxlength="16" onkeypress="return Angkasaja(event)" value="<?php echo $nik_ibu; ?>" placeholder="NIK Ibu harus tepat 16 karakter" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nik_ibu" id="nik_ibu" />
  <?php } ?>
  
  <?php if ($formulir->tempat_lahir_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tempat lahir Ibu <span style="color:red;">*</span> <?php echo form_error('tempat_lahir_ibu') ?></label>
        <input type="text" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" value="<?php echo $tempat_lahir_ibu; ?>" placeholder="Tempat lahir Ibu" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" />
  <?php } ?>   
            
  <?php if ($formulir->tanggal_lahir_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="date">Tanggal lahir Ibu <span style="color:red;">*</span> <?php echo form_error('tanggal_lahir_ibu') ?></label>
        <input type="text" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_ibu)); ?>" placeholder="Tanggal lahir Ibu" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="0000-00-00" />
  <?php } ?>                          
  
  <?php if ($formulir->pendidikan_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pendidikan Ibu <span style="color:red;">*</span> <?php echo form_error('pendidikan_ibu') ?></label>
        <select type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" value="" placeholder="Pendidikan Ibu" required/>
                <option value="<?php echo $peserta->pendidikan_ibu; ?>"><?php echo $peserta->pendidikan_ibu; ?></option>
                <option value="Tidak sekolah">Tidak sekolah</option>
                <option value="Putus SD">Putus SD</option>
                <option value="SD Sederajat">SD Sederajat</option>
                <option value="SMP Sederajat">SMP Sederajat</option>
                <option value="SMA Sederajat">SMA Sederajat</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4/S1">D4/S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" />
  <?php } ?>                          
            
  <?php if ($formulir->pekerjaan_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pekerjaan Ibu <span style="color:red;">*</span> <?php echo form_error('pekerjaan_ibu') ?></label>
        <select type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="" placeholder="Pekerjaan Ibu" required/>
                <option value="<?php echo $peserta->pekerjaan_ibu; ?>"><?php echo $peserta->pekerjaan_ibu; ?></option>
                <option value="Tidak bekerja">Tidak bekerja</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Petani">Petani</option>
                <option value="Peternak">Peternak</option>
                <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Pedagang Kecil">Pedagang Kecil</option>
                <option value="Pedagang Besar">Pedagang Besar</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Wirausaha">Wirausaha</option>
                <option value="Buruh">Buruh</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Meninggal Dunia">Meninggal Dunia</option>
                <option value="Lainnya">Lainnya</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" />
  <?php } ?>                          
  
  <?php if ($formulir->penghasilan_bulanan_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Penghasilan bulanan Ibu <span style="color:red;">*</span> <?php echo form_error('penghasilan_bulanan_ibu') ?></label>
        <select type="text" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" value="" placeholder="Penghasilan bulanan Ibu" required/>
                <option value="<?php echo $peserta->penghasilan_bulanan_ibu; ?>"><?php echo $peserta->penghasilan_bulanan_ibu; ?></option>
                <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                <option value="500.000 - 999.999">500.000 - 999.999</option>
                <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" />
  <?php } ?>                          
            
  <?php if ($formulir->berkebutuhan_khusus_ibu=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Berkebutuhan khusus Ibu <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus_ibu') ?></label>
        <select type="text" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" value="" placeholder="Berkebutuhan Khusus Ibu" required/>
                <option value="<?php echo $peserta->berkebutuhan_khusus_ibu; ?>"><?php echo $peserta->berkebutuhan_khusus_ibu; ?></option>
                <option value="Tidak">Tidak</option>
                <option value="Netra">Netra</option>
                <option value="Rungu">Rungu</option>
                <option value="Grahita Ringan">Grahita Ringan</option>
                <option value="Grahita Sedang">Grahita Sedang</option>
                <option value="Daksa Ringan">Daksa Ringan</option>
                <option value="Daksa Sedang">Daksa Sedang</option>
                <option value="Laras">Laras</option>
                <option value="Wicara">Wicara</option>
                <option value="Tuna Ganda">Tuna Ganda</option>
                <option value="Hiper Aktif">Hiper Aktif</option>
                <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                <option value="Bakat Istimewa">Bakat Istimewa</option>
                <option value="Kesulitan belajar">Kesulitan belajar</option>
                <option value="Narkoba">Narkoba</option>
                <option value="Indigo">Indigo</option>
                <option value="Down Sindrome">Down Sindrome</option>
                <option value="Autis">Autis</option>                 
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" />
  <?php } ?>                          
  
  <?php if ($formulir->nama_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nama Wali <?php echo form_error('nama_wali') ?></label>
        <input type="text" class="form-control" name="nama_wali" id="nama_wali" value="<?php echo $nama_wali; ?>" placeholder="Nama Wali" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nama_wali" id="nama_wali" />
  <?php } ?>                          
  
  <?php if ($formulir->nik_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">NIK Wali <?php echo form_error('nik_wali') ?></label>
        <input type="text" class="form-control" name="nik_wali" id="nik_wali" maxlength="16" onkeypress="return Angkasaja(event)" value="<?php echo $nik_wali; ?>" placeholder="NIK Wali harus tepat 16 karakter" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nik_wali" id="nik_wali" />
  <?php } ?> 
            
  <?php if ($formulir->tempat_lahir_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tempat lahir Wali <?php echo form_error('tempat_lahir_wali') ?></label>
        <input type="text" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" value="<?php echo $tempat_lahir_wali; ?>" placeholder="Tempat lahir Wali" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" />
  <?php } ?> 
  
  <?php if ($formulir->tanggal_lahir_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="date">Tanggal lahir Wali <?php echo form_error('tanggal_lahir_wali') ?></label>
        <input type="text" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_wali)); ?>" placeholder="Tanggal lahir Wali" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" value="0000-00-00" />
  <?php } ?>                          
            
  <?php if ($formulir->pendidikan_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pendidikan Wali <?php echo form_error('pendidikan_wali') ?></label>
        <select type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" value="" placeholder="Pendidikan wali" />
                <option value="<?php echo $peserta->pendidikan_wali; ?>"><?php echo $peserta->pendidikan_wali; ?></option>
                <option value="Tidak sekolah">Tidak sekolah</option>
                <option value="Putus SD">Putus SD</option>
                <option value="SD Sederajat">SD Sederajat</option>
                <option value="SMP Sederajat">SMP Sederajat</option>
                <option value="SMA Sederajat">SMA Sederajat</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4/S1">D4/S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pendidikan_wali" id="pendidikan_wali" />
  <?php } ?>                          
            
  <?php if ($formulir->pekerjaan_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Pekerjaan Wali <?php echo form_error('pekerjaan_wali') ?></label>
        <select type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" value="" placeholder="Pekerjaan Wali" />
                <option value="<?php echo $peserta->pekerjaan_wali; ?>"><?php echo $peserta->pekerjaan_wali; ?></option>
                <option value="Tidak bekerja">Tidak bekerja</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Petani">Petani</option>
                <option value="Peternak">Peternak</option>
                <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Pedagang Kecil">Pedagang Kecil</option>
                <option value="Pedagang Besar">Pedagang Besar</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Wirausaha">Wirausaha</option>
                <option value="Buruh">Buruh</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Meninggal Dunia">Meninggal Dunia</option>
                <option value="Lainnya">Lainnya</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" />
  <?php } ?>                          
            
  <?php if ($formulir->penghasilan_bulanan_wali=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Penghasilan bulanan Wali <?php echo form_error('penghasilan_bulanan_wali') ?></label>
        <select type="text" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" value="" placeholder="Penghasilan bulanan Wali" />
                <option value="<?php echo $peserta->penghasilan_bulanan_wali; ?>"><?php echo $peserta->penghasilan_bulanan_wali; ?></option>
                <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                <option value="500.000 - 999.999">500.000 - 999.999</option>
                <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
        </select>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" />
  <?php } ?>     

  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Kontak</h3>              
  </div><br>                                                  
  <?php if ($formulir->no_telepon_rumah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No Telepon Rumah <?php echo form_error('no_telepon_rumah') ?></label>
        <input type="text" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" onkeypress="return Angkasaja(event)" value="<?php echo $no_telepon_rumah; ?>" placeholder="No Telepon Rumah" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" />
  <?php } ?>                          
            
  <?php if ($formulir->nomor_hp=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">No Handphone <span style="color:red;">*</span> <?php echo form_error('nomor_hp') ?></label>
        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" onkeypress="return Angkasaja(event)" value="<?php echo $nomor_hp; ?>" placeholder="No Handphone" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nomor_hp" id="nomor_hp" />
  <?php } ?>                          
  
  <?php if ($formulir->email=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Email <?php echo form_error('email') ?></label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email" />
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="email" id="email" />
  <?php } ?>     

  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Priodik</h3>              
  </div><br>   
  <?php if ($formulir->tinggi_badan=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Tinggi Badan <span style="color:red;">*</span> <?php echo form_error('tinggi_badan') ?></label>
        <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" onkeypress="return Angkasaja(event)" value="<?php echo $tinggi_badan; ?>" placeholder="Tinggi Badan" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="tinggi_badan" id="tinggi_badan" />
  <?php } ?>                          
            
  <?php if ($formulir->berat_badan=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Berat Badan <span style="color:red;">*</span> <?php echo form_error('berat_badan') ?></label>
        <input type="text" class="form-control" name="berat_badan" id="berat_badan" onkeypress="return Angkasaja(event)" value="<?php echo $berat_badan; ?>" placeholder="Berat Badan" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="berat_badan" id="berat_badan" />
  <?php } ?> 

  <?php if ($formulir->lingkar_kepala=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Lingkar Kepala <span style="color:red;">*</span> <?php echo form_error('lingkar_kepala') ?></label>
        <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala" onkeypress="return Angkasaja(event)" value="<?php echo $lingkar_kepala; ?>" placeholder="Lingkar Kepala" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="lingkar_kepala" id="lingkar_kepala" />
  <?php } ?>                           
  
  <?php if ($formulir->latitude=='Ya' || $formulir->longitude=='Ya') { ?>
  <div class="form-group">
      <label for="varchar">Info Jarak</label>    
      <input type="text" class="form-control" name="jarak_sistem" id="jarak_sistem" value="<?= set_value('jarak_sistem') ?>" readonly/>
  </div>    
  <?php } ?>  

  <?php if ($formulir->waktu_tempuh=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Waktu Tempuh <span style="color:red;">*</span> <?php echo form_error('waktu_tempuh') ?></label>
        <input type="text" class="form-control" name="waktu_tempuh" id="waktu_tempuh" value="<?php echo $waktu_tempuh; ?>" placeholder="Waktu Tempuh, contoh : 1 jam 20 menit" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="waktu_tempuh" id="waktu_tempuh" />
  <?php } ?>

  <?php if ($formulir->jarak_ke_sekolah=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Jarak ke sekolah <span style="color:red;">*</span> <?php echo form_error('id_jarak') ?></label>
        <select type="text" class="select2 form-control" name="id_jarak" id="id_jarak" value="" placeholder="Jarak ke sekolah" required/>
          <option value="<?php echo $peserta->id_jarak; ?>"><?php echo $peserta->jarak; ?></option>
          <?php foreach ($jarak as $key => $value) { ?>
              <option value="<?= $value->id_jarak;?>">
                  <?= $value->jarak;?>
              </option>
          <?php }?>
        </select>
  </div>
  <?php } ?>
  
  <?php if ($formulir->jumlah_saudara_kandung=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Jumlah saudara kandung <span style="color:red;">*</span> <?php echo form_error('jumlah_saudara_kandung') ?></label>
        <input type="text" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" onkeypress="return Angkasaja(event)" value="<?php echo $jumlah_saudara_kandung; ?>" placeholder="Jumlah saudara kandung" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" />
  <?php } ?>

  <?php if ($formulir->nilai_usbn=='Ya' || $formulir->nilai_rapor=='Ya' || $formulir->nilai_unbk_unkp=='Ya' || $formulir->nilai_raporsemester=='Ya'){ ?> 
  <div class="box-header <?= $this->config->item('header')?>">
      <h3 class="box-title">Data Nilai</h3>              
  </div><br>
  <?php } ?>
  <?php if ($formulir->nilai_rapor=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nilai Rata-rata Rapor <span style="color:red;">*</span> <?php echo form_error('nilai_rapor') ?></label>
        <input type="text" class="form-control" name="nilai_rapor" id="nilai_rapor" value="<?php echo $nilai_rapor; ?>" placeholder="Nilai Rata-rata Rapor yang terdapat pada SKL/SKHU/Ijazah" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nilai_rapor" id="nilai_rapor" value="0"/>
  <?php } ?>
  
  <?php if ($formulir->nilai_usbn=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nilai Rata-rata US <span style="color:red;">*</span> <?php echo form_error('nilai_usbn') ?></label>
        <input type="text" class="form-control" name="nilai_usbn" id="nilai_usbn" value="<?php echo $nilai_usbn; ?>" placeholder="Nilai Rata-rata US yang terdapat pada SKL/SKHU/Ijazah" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nilai_usbn" id="nilai_usbn" value="0"/>
  <?php } ?>                          
            
  <?php if ($formulir->nilai_unbk_unkp=='Ya'){ ?>
  <div class="form-group">
        <label for="varchar">Nilai Rata-rata UN <span style="color:red;">*</span> <?php echo form_error('nilai_unbk_unkp') ?></label>
        <input type="text" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" value="<?php echo $nilai_unbk_unkp; ?>" placeholder="Nilai Rata-rata UN yang terdapat pada SKL/SKHU/Ijazah" required/>
  </div>
  <?php } else { ?>
        <input type="hidden" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" value="0"/>
  <?php } ?>   

  <?php if ($formulir->nilai_raporsemester=='Ya'){ ?>
  <div class="callout callout-info">
      <?php foreach ($pengumuman as $text) { ?>               
          <?php echo $text->text ?>
      <?php } ?>  
  </div>                           
  <div class="form-group">
    <label for="varchar">Nilai Rapor per semester</label>
    <table class="table table-bordered table-striped" id="mytablexxx" style="width:100%">
      <thead>
        <tr>
          <th style="text-align: center" width="10px">No</th>
          <th style="text-align: center">Mata Pelajaran</th>
          <th style="text-align: center">Nilai Semester</th>
        </tr>                     
      </thead>
      <tbody>           
      <?php 
      $no = 1;
      foreach ($raporsemester as $value):?>
        <tr>  
          <td style="text-align: center"><?= $no++ ?></td>
          <td>
            <input type="hidden" class="form-control" name="id_pesertax[]" id="id_pesertax" value="<?php echo $value->id_peserta; ?>" />
            <input type="hidden" class="form-control" name="id_raporsemester[]" id="id_raporsemester" value="<?php echo $value->id_raporsemester; ?>" />
            <select type="text" class="form-control" name="mapel[]" id="mapel" placeholder="Pilih Mata Pelajaran" required/>
              <option value="<?php echo $value->mapel; ?>"><?php echo $value->mapel; ?></option>
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
          </td>
          <td>
            <div class="row">
                <div class="col-xs-12 col-md-2">   
                  <input type="text" class="form-control" name="satu[]" id="satu" maxlength="5" value="<?php echo $value->satu; ?>" placeholder="Semester 1" required/>
                </div>
                <div class="col-xs-12 col-md-2"> 
                  <input type="text" class="form-control" name="dua[]" id="dua" maxlength="5" value="<?php echo $value->dua; ?>" placeholder="Semester 2" required/>
                </div>
                <div class="col-xs-12 col-md-2"> 
                  <input type="text" class="form-control" name="tiga[]" id="tiga" maxlength="5" value="<?php echo $value->tiga; ?>" placeholder="Semester 3" required/>
                </div>
                <div class="col-xs-12 col-md-3"> 
                  <input type="text" class="form-control" name="empat[]" id="empat" maxlength="5" value="<?php echo $value->empat; ?>" placeholder="Semester 4" required/>
                </div>
                <div class="col-xs-12 col-md-3"> 
                  <input type="text" class="form-control" name="lima[]" id="lima" maxlength="5" value="<?php echo $value->lima; ?>" placeholder="Semester 5" required/>
                </div>
            </div>
          </td>        
        </tr>
      <?php endforeach; ?> 
      </tbody>                              
    </table>
  </div>                          
  <?php } ?> 

  <div class="callout callout-danger">
      <p> Mohon di baca penting :
        <ul>
          <li>Proses pengisian formulir pendaftaran hampir selesai. Silahkan periksa kembali data-data yang sudah anda masukkan.</li>
          <li>Pastikan data sudah sesuai dan lengkap.</li>
          <li>Formulir pendaftaran tidak dapat disimpan jika ada data yang masih tidak sesuai.</li>
          <li>Periksa kembali isian dari awal dan lengkapi kembali jika formulir gagal disimpan.</li>
          <li>Bukti pendaftaran dapat dicetak setelah formulir pendaftaran berhasil disimpan.</li>
          <li>Data yang sudah dikirimkan tidak dapat diperbaiki lagi jika sudah diverifikasi panitia.</li>
        </ul> 
      </p>                                
  </div>     
  <div class="form-group">
        <label>Apakah data sudah sesuai dan lengkap? <span style="color:red;">*</label><br/>
        <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, data sudah sesuai dan lengkap
  </div> 
  <input type="hidden" class="form-control" name="status" id="status" value="<?php echo $peserta->status; ?>" />  
  <input type="hidden" class="form-control" name="status_hasil" id="status_hasil" value="<?php echo $peserta->status_hasil; ?>" />
  <input type="hidden" class="form-control" name="status_daftar_ulang" id="status_daftar_ulang" value="<?php echo $peserta->status_daftar_ulang; ?>" />  
  <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" value="<?= $id_peserta; ?>" />                        
  <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?= $user->id; ?>" />
  <button type="submit" class="<?= $this->config->item('botton')?>">Simpan perubahan data</button>
</form>

<!-- Modal Asal Sekolah-->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-school"></i>&nbsp; Asal sekolah</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-info">
            <p>Tambah data asal sekolah jika asal sekolah tidak terdaftar pada pilihan</p>
        </div>
            <form action="tambah_sekolah" method="post">
                <div class="form-group">
                    <label for="varchar">NPSN Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="npsn_sekolah" id="npsn_sekolah" placeholder="NPSN Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Nama Asal Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Nama Asal Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Alamat Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Kelurahan <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Status Sekolah <span style="color:red;">*</span></label>
                    <select type="text" class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Status Sekolah" required/>
                        <option value="">Pilih Status Sekolah</option>
                        <option value="NEGERI">NEGERI</option>
                        <option value="SWASTA">SWASTA</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label for="varchar">Kecamatan <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required/>
                </div>
                <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>">Tambah Sekolah</button>
            </form>               
      </div>
    </div>
  </div>
</div>