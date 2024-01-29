<!-- GIS -->
<!-- <?php echo $map['js']; ?> -->

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Peserta</h3>
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
            <?php if ($this->ion_auth->is_admin()){ ?> 
                <?php if ($button=="Tambah") { ?> 
                    <?php if ($pengaturan->penomoran=="otomatis") { ?>
                        <form action="update_penomoran" method="post">
                            <input type="hidden" name="id_identitas" value="<?php echo $pengaturan->id_identitas; ?>" /> 
                            <input type="hidden" name="penomoran" id="penomoran" value="manual" />
                            <button type="submit" class="<?= $this->config->item('botton')?>">Aktifkan No Pendaftaran Manual</button>
                        </form><br>
                    <?php } else if ($pengaturan->penomoran=="manual") { ?>
                        <form action="update_penomoran" method="post">
                            <input type="hidden" name="id_identitas" value="<?php echo $pengaturan->id_identitas; ?>" />     
                            <input type="hidden" name="penomoran" id="penomoran" value="otomatis" />
                            <button type="submit" class="<?= $this->config->item('botton')?>">Aktifkan No Pendaftaran Otomatis</button>
                        </form><br>    
                    <?php } ?> 
                <?php } ?>
            <?php } ?>
           
            <?php if ($tahunpelajaran) { ?>    
            <form action="<?php echo $action; ?>" method="post">
                <?php if ($pengaturan->penomoran=="manual"){ ?> 
                <div class="form-group">
                    <label for="int">No Pendaftaran <span style="color:red;">*</span> <?php echo form_error('no_pendaftaran') ?></label>
                <?php if ($button=="Tambah") { ?>          
                    <input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" value="<?= set_value('no_pendaftaran') ?>" placeholder="No Pendaftaran terdiri dari 4 digit, contoh : 0001" maxlength="4" onkeypress="return Angkasaja(event)" required />                 
                <?php } else { ?>
                    <input type="text" class="form-control" name="no_daftar" id="no_daftar" value="<?php echo $peserta->no_pendaftaran; ?>" readonly />
                <?php } ?> 
                </div>
                <?php } ?>                 

                <?php if ($formulir->tahun_pelajaran=='Ya'){ ?>                
                <div class="form-group">
                    <label for="int">Tahun Pelajaran <?php echo form_error('id_tahun') ?></label>
                <?php if ($button=="Tambah") { ?>
                    <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?php echo $tahunpelajaran->id_tahun; ?>" />
                    <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" value="<?php echo $tahunpelajaran->tahun_pelajaran; ?>" readonly/>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?php echo $peserta->id_tahun; ?>" />
                    <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" value="<?php echo $peserta->tahun_pelajaran; ?>" readonly/>  
                <?php } ?>                     
                </div>
                <?php } ?>

                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Registrasi</h3>              
                </div><br> 

                <?php if ($formulir->jalur_pendaftaran=='Ya'){ ?>                
                <div class="form-group">
                    <label for="int">Jalur Pendaftaran <span style="color:red;">*</span> <?php echo form_error('id_jalur') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="select2 form-control" name="id_jalur" id="id_jalur" placeholder="Pilih Jalur Pendaftaran" value="" required />
                        <option value="">Pilih Jalur Pendaftaran</option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value->id_jalur;?>"<?php echo set_select('id_jalur', $value->id_jalur); ?>>
                                <?= $value->jalur;?>
                            </option>
                        <?php }?>
                    </select>
                <?php } else { ?>
                    <select type="text" class="select2 form-control" name="id_jalur" id="id_jalur" placeholder="Pilih Jalur Pendaftaran" value="" />
                        <option value="<?php echo $peserta->id_jalur; ?>"><?php echo $peserta->jalur; ?></option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value->id_jalur;?>">
                                <?= $value->jalur;?>
                            </option>
                        <?php }?>
                    </select>                
                <?php } ?>   
                </div>
                <?php } ?>
                
                <?php if ($formulir->asal_sekolah=='Ya'){ ?>                   
                <div class="form-group">
                    <label for="int">Asal Sekolah <span style="color:red;">*</span> <?php echo form_error('id_sekolah') ?> <span class="label bg-yellow" data-toggle="modal" data-target="#myModalInfo">klik disini jika sekolah tidak ada</span></label>
                <?php if ($button=="Tambah") { ?>                     
                    <select type="text" class="select2 form-control" name="id_sekolah" id="id_sekolah" placeholder="Pilih Asal Sekolah" value="" required />
                        <option value="">Pilih Asal Sekolah</option> 
                        <?php foreach ($sekolah as $key => $value) { ?>
                            <option value="<?= $value->id_sekolah;?>"<?php echo set_select('id_sekolah', $value->id_sekolah); ?>>
                                <?= $value->npsn_sekolah;?> | <?= $value->asal_sekolah;?> | <?= $value->kecamatan;?>
                            </option>
                        <?php }?>
                    </select>
                <?php } else { ?>
                    <select type="text" class="select2 form-control" name="id_sekolah" id="id_sekolah" placeholder="Pilih Asal Sekolah" value="" />
                        <option value="<?php echo $peserta->id_sekolah; ?>"><?php echo $peserta->npsn_sekolah; ?> | <?php echo $peserta->asal_sekolah; ?> | <?php echo $peserta->kecsekolah; ?></option> 
                        <?php foreach ($sekolah as $key => $value) { ?>
                            <option value="<?= $value->id_sekolah;?>">
                                <?= $value->npsn_sekolah;?> | <?= $value->asal_sekolah;?> | <?= $value->kecamatan;?>
                            </option>
                        <?php }?>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } ?>

                <?php if ($formulir->akreditasi=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Akreditasi <span style="color:red;">*</span> <?php echo form_error('akreditasi') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="akreditasi" id="akreditasi" placeholder="Pilih Akreditasi" value="" required />
                        <option value="<?= set_value('akreditasi') ?>"><?= set_value('akreditasi') ?></option>
                        <option value="A">Akreditasi A</option>
                        <option value="B">Akreditasi B</option>
                        <option value="C">Akreditasi C</option>
                        <option value="Belum Terakreditasi">Belum Terakreditasi</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="akreditasi" id="akreditasi" placeholder="Pilih Akreditasi" value="" />
                        <option value="<?php echo $peserta->akreditasi; ?>"><?php echo $peserta->akreditasi; ?></option>
                        <option value="A">Akreditasi A</option>
                        <option value="B">Akreditasi B</option>
                        <option value="C">Akreditasi C</option>
                        <option value="Belum Terakreditasi">Belum Terakreditasi</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="akreditasi" id="akreditasi"/>
                <?php } ?>

                <?php if ($formulir->pilihan_sekolah_lain=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Sekolah Pilihan kedua <?php echo form_error('pilihan_sekolah_lain') ?></label>
                <?php if ($button=="Tambah") { ?>                    
                    <input type="text" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" placeholder="Sekolah Pilihan kedua jika ada tuliskan" value="<?= set_value('pilihan_sekolah_lain') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" placeholder="Sekolah Pilihan kedua jika ada tuliskan" value="<?php echo $pilihan_sekolah_lain; ?>" />
                <?php } ?>     
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" />
                <?php } ?>

                <?php if ($formulir->no_peserta_ujian=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Peserta Ujian <?php echo form_error('no_un') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_un" id="no_un" placeholder="No. Peserta Ujian" value="<?= set_value('no_un') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_un" id="no_un" placeholder="No. Peserta Ujian" value="<?php echo $no_un; ?>" />
                <?php } ?>         
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_un" id="no_un" />
                <?php } ?> 
                
                <?php if ($formulir->no_seri_ijazah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Seri Ijazah <?php echo form_error('no_seri_ijazah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" placeholder="No Seri Ijazah" value="<?= set_value('no_seri_ijazah') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" placeholder="No Seri Ijazah" value="<?php echo $no_seri_ijazah; ?>" />   
                <?php } ?>          
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" />
                <?php } ?>                          
                
                <?php if ($formulir->no_seri_skhu=='Ya'){ ?>                
                <div class="form-group">
                    <label for="varchar">No Seri SKHU <?php echo form_error('no_seri_skhu') ?></label>
                <?php if ($button=="Tambah") { ?>
                    <input type="text" class="form-control" name="no_seri_skhu" id="no_seri_skhu" placeholder="No Seri SKHU" value="<?= set_value('no_seri_skhu') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_seri_skhu" id="no_seri_skhu" placeholder="No Seri SKHU" value="<?php echo $no_seri_skhu; ?>" />       
                <?php } ?>                 
                </div>   
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_seri_skhu" id="no_seri_skhu" />
                <?php } ?>

                <?php if ($formulir->tahun_lulus=='Ya'){ ?>                
                <div class="form-group">
                    <label for="varchar">Tahun Lulus <?php echo form_error('tahun_lulus') ?></label>
                <?php if ($button=="Tambah") { ?>
                    <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" maxlength="4" onkeypress="return Angkasaja(event)" placeholder="Tahun Lulus" value="<?= set_value('tahun_lulus') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" maxlength="4" onkeypress="return Angkasaja(event)" placeholder="Tahun Lulus" value="<?php echo $tahun_lulus; ?>" />       
                <?php } ?>                 
                </div>   
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tahun_lulus" id="tahun_lulus" />
                <?php } ?>

            <!-- pilihan jurusan -->
                <?php if ($formulir->jurusan=='Ya'){ ?>                                 
                    <div class="form-group">
                        <label for="int">Jurusan Pilihan Satu <?php echo form_error('id_jurusan') ?></label>
                        <?php if ($button=="Tambah") { ?>       
                            <select type="text" class="select2 form-control" name="id_jurusan" id="id_jurusan" placeholder="Jurusan Pilihan Satu" value="" required />
                                <option value="1">Pilih Jurusan Satu</option> 
                                <?php foreach ($jurusan as $key => $value) { ?>
                                    <option value="<?= $value->id_jurusan;?>"<?php echo set_select('id_jurusan', $value->id_jurusan); ?>>
                                        <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                    </option>
                                <?php }?>
                            </select>
                        <?php } else { ?>
                            <select type="text" class="select2 form-control" name="id_jurusan" id="id_jurusan" placeholder="Jurusan Pilihan Satu" value="" />
                                <option value="<?php echo $peserta->id_jurusan; ?>"><?php echo $peserta->nama_jurusan; ?></option> 
                                <?php foreach ($jurusan as $key => $value) { ?>
                                    <option value="<?= $value->id_jurusan;?>">
                                        <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                    </option>
                                <?php }?>
                            </select>                    
                        <?php } ?> 
                    </div>  
                    <!-- pilihan dua -->
                    <div class="form-group">
                        <label for="int">Jurusan Pilihan Dua <span style="color:red;"><i> (tidak disarankan memilih pilihan yang sama dengan pilihan satu)</i></span><?php echo form_error('pilihan_dua') ?></label>
                        <?php if ($button=="Tambah") { ?>       
                            <select type="text" class="select2 form-control" name="pilihan_dua" id="pilihan_dua" placeholder="Jurusan Pilihan Dua" value="" />
                                <option value="">Pilih Jurusan Dua</option> 
                                <?php foreach ($jurusan as $key => $value) { ?>
                                    <option value="<?= $value->nama_jurusan;?>"<?php echo set_select('pilihan_dua', $value->nama_jurusan); ?>>
                                        <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                    </option>
                                <?php }?>
                            </select>
                        <?php } else { ?>
                            <select type="text" class="select2 form-control" name="pilihan_dua" id="pilihan_dua" placeholder="Jurusan Pilihan Dua" value="" />
                                <option value="<?php echo $peserta->pilihan_dua; ?>"><?php echo $peserta->pilihan_dua; ?></option> 
                                <?php foreach ($jurusan as $key => $value) { ?>
                                    <option value="<?= $value->nama_jurusan;?>">
                                        <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                    </option>
                                <?php }?>
                            </select>                    
                        <?php } ?> 
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
                <?php if ($button=="Tambah") { ?>     
                    <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?= set_value('nama_peserta') ?>" required />
                <?php } else { ?>
                    <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?php echo $nama_peserta; ?>" required />
                <?php } ?>    
                </div>
                <?php } ?>

                <?php if ($formulir->jenis_kelamin=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Jenis Kelamin <span style="color:red;">*</span> <?php echo form_error('jenis_kelamin') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="" required />
                        <option value="<?= set_value('jenis_kelamin') ?>"><?= set_value('jenis_kelamin') ?></option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="" />
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
                <?php } ?>    
                </div>
                <?php } ?>
                
                <?php if ($formulir->nisn=='Ya'){ ?>
                <div class="form-group">
                    <!-- <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>    -->
                <?php if ($button=="Tambah") { ?>
                    <?php if ($pengaturan->jenjang=='TK/PAUD' || $pengaturan->jenjang=='SD/MI'){ ?> 
                        <label for="varchar">NISN <?php echo form_error('nisn') ?></label>  
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?= set_value('nisn') ?>" />                
                    <?php } else { ?> 
                        <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label> 
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?= set_value('nisn') ?>" required />                     
                    <?php } ?>     
                <?php } else { ?>
                <?php if ($pengaturan->jenjang=='TK/PAUD' || $pengaturan->jenjang=='SD/MI'){ ?>   
                    <?php if ($this->ion_auth->is_admin()) { ?> 
                        <label for="varchar">NISN <?php echo form_error('nisn') ?></label>      
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?php echo $nisn; ?>" />
                    <?php } else { ?>  
                        <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>    
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?php echo $nisn; ?>" readonly />              
                    <?php } ?> 
                <?php } else { ?>  
                    <?php if ($this->ion_auth->is_admin()) { ?> 
                        <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>      
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?php echo $nisn; ?>" required />
                    <?php } else { ?>    
                        <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>  
                        <input type="text" class="form-control" name="nisn" id="nisn" maxlength="10" onkeypress="return Angkasaja(event)" placeholder="NISN" value="<?php echo $nisn; ?>" readonly />              
                    <?php } ?> 
                <?php } ?> 
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nisn" id="nisn" />
                <?php } ?>

                <?php if ($formulir->nik=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">NIK <?php echo form_error('nik') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nik" id="nik" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK" value="<?= set_value('NIK') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="nik" id="nik" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK" value="<?php echo $nik; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nik" id="nik" />
                <?php } ?>

                <?php if ($formulir->no_kk=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Kartu Keluarga <?php echo form_error('no_kk') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_kk" id="no_kk" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="No KK" value="<?= set_value('no_kk') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="no_kk" id="no_kk" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="No KK" value="<?php echo $no_kk; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_kk" id="no_kk" />
                <?php } ?>                

                <?php if ($formulir->tempat_lahir=='Ya'){ ?>                
                <div class="form-group">
                    <label for="varchar">Tempat Lahir <span style="color:red;">*</span> <?php echo form_error('tempat_lahir') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir') ?>" required />
                <?php } else { ?>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" required />
                <?php } ?>    
                </div>
                <?php } ?>

                <?php if ($formulir->tanggal_lahir=='Ya'){ ?>
                <div class="form-group">
                    <label for="date">Tanggal Lahir <span style="color:red;">*</span> <?php echo form_error('tanggal_lahir') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir') ?>" required />
                <?php } else { ?>        
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir)); ?>" required />                
                <?php } ?>
                </div>
                <?php } ?>

                <?php if ($formulir->no_registrasi_akta_lahir=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Registrasi Akta Lahir <?php echo form_error('no_registrasi_akta_lahir') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" placeholder="No Registrasi Akta Lahir" value="<?= set_value('no_registrasi_akta_lahir') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" placeholder="No Registrasi Akta Lahir" value="<?php echo $no_registrasi_akta_lahir; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" />
                <?php } ?>     

                <?php if ($formulir->agama=='Ya'){ ?>                
                <div class="form-group">
                    <label for="varchar">Agama <span style="color:red;">*</span> <?php echo form_error('agama') ?></label>
                <?php if ($button=="Tambah") { ?>      
                    <select type="text" class="form-control" name="agama" id="agama" placeholder="Pilih Agama" value="" required />
                        <option value="<?= set_value('agama') ?>"><?= set_value('agama') ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Khatolik">Khatolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghuchu</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="agama" id="agama" placeholder="Pilih Agama" value="" />
                        <option value="<?php echo $peserta->agama; ?>"><?php echo $peserta->agama; ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Khatolik">Khatolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghuchu</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } ?>

                <?php if ($formulir->kewarganegaraan=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Kewarganegaraan <?php echo form_error('kewarganegaraan') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Pilih Kewarganegaraan" value="" />
                        <option value="<?= set_value('kewarganegaraan') ?>"><?= set_value('kewarganegaraan') ?></option>
                        <option value="Indonesia (WNI)">Indonesia (WNI)</option>
                        <option value="Asing (WNA)">Asing (WNA)</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Pilih Kewarganegaraan" value="" />
                        <option value="<?php echo $peserta->kewarganegaraan; ?>"><?php echo $peserta->kewarganegaraan; ?></option>
                        <option value="Indonesia (WNI)">Indonesia (WNI)</option>
                        <option value="Asing (WNA)">Asing (WNA)</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="kewarganegaraan" id="kewarganegaraan" />
                <?php } ?>                          
                
                <?php if ($formulir->berkebutuhan_khusus=='Ya'){ ?>                
                <div class="form-group">
                    <label for="varchar">Berkebutuhan Khusus <?php echo form_error('berkebutuhan_khusus') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" placeholder="Pilih Berkebutuhan Khusus" value="" />
                        <option value="<?= set_value('berkebutuhan_khusus') ?>"><?= set_value('berkebutuhan_khusus') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" placeholder="Pilih Berkebutuhan Khusus" value="" />
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
                <?php } ?>   
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" />
                <?php } ?>                                                                          
                
                <?php if ($formulir->alamat=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Alamat <span style="color:red;">*</span> <?php echo form_error('alamat') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>" required />
                <?php } else { ?>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" required />
                <?php } ?>    
                </div>
                <?php } ?>
                
                <?php if ($formulir->rt=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">RT <?php echo form_error('rt') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="rt" id="rt" onkeypress="return Angkasaja(event)" placeholder="RT" value="<?= set_value('rt') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="rt" id="rt" onkeypress="return Angkasaja(event)" placeholder="RT" value="<?php echo $rt; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="rt" id="rt" />
                <?php } ?>                          
                
                <?php if ($formulir->rw=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">RW <?php echo form_error('rw') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="rw" id="rw" onkeypress="return Angkasaja(event)" placeholder="RW" value="<?= set_value('rw') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="rw" id="rw" onkeypress="return Angkasaja(event)" placeholder="RW" value="<?php echo $rw; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="rw" id="rw" />
                <?php } ?>                          
                
                <?php if ($formulir->nama_dusun=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Nama Dusun <?php echo form_error('nama_dusun') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_dusun" id="nama_dusun" placeholder="Nama Dusun" value="<?= set_value('nama_dusun') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_dusun" id="nama_dusun" placeholder="Nama Dusun" value="<?php echo $nama_dusun; ?>" />
                <?php } ?>        
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nama_dusun" id="nama_dusun" />
                <?php } ?>                          
                
                <?php if ($formulir->nama_kelurahan=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Nama Kelurahan <?php echo form_error('nama_kelurahan') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" placeholder="Nama Kelurahan" value="<?= set_value('nama_kelurahan') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" placeholder="Nama Kelurahan" value="<?php echo $nama_kelurahan; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nama_kelurahan" id="nama_kelurahan" />
                <?php } ?>                          
                
                <?php if ($formulir->kecamatan=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="kecamatan" id="kecamatan" />
                <?php } ?>   

                <?php if ($formulir->kabupaten=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Kabupaten/Kota <?php echo form_error('kabupaten') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten/Kota" value="<?= set_value('kabupaten') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten/Kota" value="<?php echo $kabupaten; ?>" />
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="kabupaten" id="kabupaten" />
                <?php } ?>   

                <?php if ($formulir->provinsi=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= set_value('provinsi') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="provinsi" id="provinsi" />
                <?php } ?>                                                        
                
                <?php if ($formulir->kode_pos=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Kode Pos <?php echo form_error('kode_pos') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" onkeypress="return Angkasaja(event)" placeholder="Kode Pos" value="<?= set_value('kode_pos') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" onkeypress="return Angkasaja(event)" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
                <?php } ?>
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
                          <div id="map" style="width:100%;height:450px;"></div>                             
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
                    <label for="varchar">Latitude <?php echo form_error('latitude') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Contoh : -4.621981" value="<?= set_value('latitude') ?>" />
                <?php } else { ?>        
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Contoh : -4.621981" value="<?php echo $latitude; ?>" />
                <?php } ?>        
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="latitude" id="latitude" />
                <?php } ?>                              
                
                <?php if ($formulir->longitude=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Contoh : 105.100493" value="<?= set_value('longitude') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Contoh : 105.100493" value="<?php echo $longitude; ?>" />
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="longitude" id="longitude" />
                <?php } ?>

                <?php if ($formulir->tempat_tinggal=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Tempat Tinggal <?php echo form_error('tempat_tinggal') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" placeholder="Pilih Tempat Tinggal" value="" />
                        <option value="<?= set_value('tempat_tinggal') ?>"><?= set_value('tempat_tinggal') ?></option>
                        <option value="Bersama orangtua">Bersama orangtua</option>
                        <option value="Wali">Wali</option>
                        <option value="Kos">Kos</option>
                        <option value="Asrama">Asrama</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                        <option value="Pesantren">Pesantren</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" placeholder="Pilih Tempat Tinggal" value="" />
                        <option value="<?php echo $peserta->tempat_tinggal; ?>"><?php echo $peserta->tempat_tinggal; ?></option>
                        <option value="Bersama orangtua">Bersama orangtua</option>
                        <option value="Wali">Wali</option>
                        <option value="Kos">Kos</option>
                        <option value="Asrama">Asrama</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                        <option value="Pesantren">Pesantren</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tempat_tinggal" id="tempat_tinggal" />
                <?php } ?>                          
                
                <?php if ($formulir->moda_transportasi=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Moda Transportasi <?php echo form_error('moda_transportasi') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="moda_transportasi" id="moda_transportasi" placeholder="Pilih Moda Transportasi" value="" />
                        <option value="<?= set_value('moda_transportasi') ?>"><?= set_value('moda_transportasi') ?></option>
                        <option value="Jalan kaki">Jalan kaki</option>
                        <option value="Kendaraan pribadi">Kendaraan pribadi</option>
                        <option value="Kendaraan umum">Kendaraan umum</option>
                        <option value="Jemputan sekolah">Jemputan sekolah</option>
                        <option value="Kereta Api">Kereta Api</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="moda_transportasi" id="moda_transportasi" placeholder="Pilih Moda Transportasi" value="" />
                        <option value="<?php echo $peserta->moda_transportasi; ?>"><?php echo $peserta->moda_transportasi; ?></option>
                        <option value="Jalan kaki">Jalan kaki</option>
                        <option value="Kendaraan pribadi">Kendaraan pribadi</option>
                        <option value="Kendaraan umum">Kendaraan umum</option>
                        <option value="Jemputan sekolah">Jemputan sekolah</option>
                        <option value="Kereta Api">Kereta Api</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="moda_transportasi" id="moda_transportasi" />
                <?php } ?> 
                
                <?php if ($formulir->no_kks=='Ya'){ ?> 
                <div class="form-group">
                    <label for="varchar">No KKS <?php echo form_error('no_kks') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_kks" id="no_kks" placeholder="No KKS" value="<?= set_value('no_kks') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_kks" id="no_kks" placeholder="No KKS" value="<?php echo $no_kks; ?>" />
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_kks" id="no_kks" />
                <?php } ?>                          
                
                <?php if ($formulir->anak_ke=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Anak Ke <?php echo form_error('anak_ke') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="anak_ke" id="anak_ke" onkeypress="return Angkasaja(event)" placeholder="Anak Ke" value="<?= set_value('anak_ke') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="anak_ke" id="anak_ke" onkeypress="return Angkasaja(event)" placeholder="Anak Ke" value="<?php echo $anak_ke; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="anak_ke" id="anak_ke" />
                <?php } ?>                          
                
                <?php if ($formulir->penerima_kps_pkh=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Penerima KPS/PKH <span style="color:red;">*</span> <?php echo form_error('penerima_kps_pkh') ?></label>  
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" placeholder="Penerima KPS/PKH" onchange="kps(this.value)" value="" required/>
                        <option value="<?= set_value('penerima_kps_pkh') ?>"><?= set_value('penerima_kps_pkh') ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" placeholder="Penerima KPS/PKH" onchange="kps(this.value)" value="" required/>
                        <option value="<?php echo $peserta->penerima_kps_pkh; ?>"><?php echo $peserta->penerima_kps_pkh; ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" />
                <?php } ?>                          
                
                <?php if ($formulir->no_kps_pkh=='Ya'){ ?>
                <div class="form-group" id="no_kps" style="display:none;">
                    <label for="varchar">No KPS/PKH <?php echo form_error('no_kps_pkh') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_kps_pkh" id="no_kps_pkh" placeholder="No KPS/PKH" value="<?= set_value('no_kps_pkh') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_kps_pkh" id="no_kps_pkh" placeholder="No KPS/PKH" value="<?php echo $no_kps_pkh; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_kps_pkh" id="no_kps_pkh" />
                <?php } ?>                          
                
                <?php if ($formulir->penerima_kip=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Penerima KIP <span style="color:red;">*</span> <?php echo form_error('penerima_kip') ?></label>
                <?php if ($button=="Tambah") { ?>      
                    <select type="text" class="form-control" name="penerima_kip" id="penerima_kip" placeholder="Penerima KIP" onchange="kip(this.value)" value="" required/>
                        <option value="<?= set_value('penerima_kip') ?>"><?= set_value('penerima_kip') ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="penerima_kip" id="penerima_kip" placeholder="Penerima KIP" onchange="kip(this.value)" value="" required/>
                        <option value="<?php echo $peserta->penerima_kip; ?>"><?php echo $peserta->penerima_kip; ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="penerima_kip" id="penerima_kip" />
                <?php } ?>                          
                
                <?php if ($formulir->no_kip=='Ya'){ ?>
                <div class="form-group" id="no_kip" style="display:none;">
                    <label for="varchar">No KIP <?php echo form_error('no_kip') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_kip" id="no_kip" placeholder="No KIP" value="<?= set_value('no_kip') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_kip" id="no_kip" placeholder="No KIP" value="<?php echo $no_kip; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_kip" id="no_kip" />
                <?php } ?>                          
                
                <?php if ($formulir->nama_tertera_di_kip=='Ya'){ ?>
                <div class="form-group" id="nama_tertera_di_kip" style="display:none;">
                    <label for="varchar">Nama Tertera di KIP <?php echo form_error('nama_tertera_di_kip') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" placeholder="Nama Tertera di KIP" value="<?= set_value('nama_tertera_di_kip') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" placeholder="Nama Tertera di KIP" value="<?php echo $nama_tertera_di_kip; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" />
                <?php } ?>                          
                
                <?php if ($formulir->terima_fisik_kartu_kip=='Ya'){ ?>
                <div class="form-group" id="terima_fisik_kartu_kip" style="display:none;">
                    <label for="varchar">Terima Fisik Kartu KIP <?php echo form_error('terima_fisik_kartu_kip') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" placeholder="Terima fisik kartu KIP" value="" />
                        <option value="<?= set_value('terima_fisik_kartu_kip') ?>"><?= set_value('terima_fisik_kartu_kip') ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" placeholder="Terima fisik kartu KIP" value="" />
                        <option value="<?php echo $peserta->terima_fisik_kartu_kip; ?>"><?php echo $peserta->terima_fisik_kartu_kip; ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" />
                <?php } ?>                          
                
                <?php if ($formulir->hobi=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Hobi <?php echo form_error('hobi') ?></label>
                <?php if ($button=="Tambah") { ?>        
                    <input type="text" class="form-control" name="hobi" id="hobi" placeholder="Hobi" value="<?= set_value('hobi') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="hobi" id="hobi" placeholder="Hobi" value="<?php echo $hobi; ?>" />
                <?php } ?>    
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
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?= set_value('nama_ayah') ?>" required />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" required />    
                <?php } ?>    
                </div>
                <?php } ?>
                
                <?php if ($formulir->nik_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">NIK Ayah <?php echo form_error('nik_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Ayah" value="<?= set_value('nik_ayah') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Ayah" value="<?php echo $nik_ayah; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nik_ayah" id="nik_ayah" />
                <?php } ?>
                
                <?php if ($formulir->tempat_lahir_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Tempat Lahir Ayah <?php echo form_error('tempat_lahir_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat lahir Ayah" value="<?= set_value('tempat_lahir_ayah') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat lahir Ayah" value="<?php echo $tempat_lahir_ayah; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" />
                <?php } ?>
                
                <?php if ($formulir->tanggal_lahir_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="date">Tanggal Lahir Ayah <?php echo form_error('tanggal_lahir_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" placeholder="Tanggal lahir Ayah" value="0000-00-00" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" placeholder="Tanggal lahir Ayah" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_ayah)); ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="0000-00-00" />
                <?php } ?>
                
                <?php if ($formulir->pendidikan_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pendidikan Ayah <?php echo form_error('pendidikan_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Pendidikan Ayah" value="" />
                        <option value="<?= set_value('pendidikan_ayah') ?>"><?= set_value('pendidikan_ayah') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Pendidikan Ayah" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" />
                <?php } ?>                          
                
                <?php if ($formulir->pekerjaan_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pekerjaan Ayah <?php echo form_error('pekerjaan_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="" />
                        <option value="<?= set_value('pekerjaan_ayah') ?>"><?= set_value('pekerjaan_ayah') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="" />
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
                <?php } ?>   
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" />
                <?php } ?>                          
                
                <?php if ($formulir->penghasilan_bulanan_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Penghasilan Bulanan Ayah <?php echo form_error('penghasilan_bulanan_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" placeholder="Penghasilan bulanan Ayah" value="" />
                        <option value="<?= set_value('penghasilan_bulanan_ayah') ?>"><?= set_value('penghasilan_bulanan_ayah') ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" placeholder="Penghasilan bulanan Ayah" value="" />
                        <option value="<?php echo $peserta->penghasilan_bulanan_ayah; ?>"><?php echo $peserta->penghasilan_bulanan_ayah; ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>
                <?php } ?>
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" />
                <?php } ?>                          
                
                <?php if ($formulir->berkebutuhan_khusus_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Berkebutuhan Khusus Ayah <?php echo form_error('berkebutuhan_khusus_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" placeholder="Berkebutuhan Khusus Ayah" value="" />
                        <option value="<?= set_value('berkebutuhan_khusus_ayah') ?>"><?= set_value('berkebutuhan_khusus_ayah') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" placeholder="Berkebutuhan Khusus Ayah" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" />
                <?php } ?> 

                <?php if ($formulir->no_hp_ayah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Hp Ayah <?php echo form_error('no_hp_ayah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_hp_ayah" id="no_hp_ayah" onkeypress="return Angkasaja(event)" placeholder="No Hp Ayah" value="<?= set_value('no_hp_ayah') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_hp_ayah" id="no_hp_ayah" onkeypress="return Angkasaja(event)" placeholder="No Hp Ayah" value="<?php echo $no_hp_ayah; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_hp_ayah" id="no_hp_ayah" />
                <?php } ?>                                         
                
                <?php if ($formulir->nama_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Nama Ibu <span style="color:red;">*</span> <?php echo form_error('nama_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?= set_value('nama_ibu') ?>" required />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" required />
                <?php } ?>        
                </div>
                <?php } ?>
                
                <?php if ($formulir->nik_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">NIK Ibu <?php echo form_error('nik_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Ibu" value="<?= set_value('nik_ibu') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Ibu" value="<?php echo $nik_ibu; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nik_ibu" id="nik_ibu" />
                <?php } ?> 
                
                <?php if ($formulir->tempat_lahir_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Tempat Lahir Ibu <?php echo form_error('tempat_lahir_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" value="<?= set_value('tempat_lahir_ibu') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" value="<?php echo $tempat_lahir_ibu; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" />
                <?php } ?> 
                
                <?php if ($formulir->tanggal_lahir_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="date">Tanggal Lahir Ibu <?php echo form_error('tanggal_lahir_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" placeholder="Tanggal Lahir Ibu" value="0000-00-00" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" placeholder="Tanggal Lahir Ibu" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_ibu)); ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="0000-00-00" />
                <?php } ?> 
                
                <?php if ($formulir->pendidikan_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pendidikan Ibu <?php echo form_error('pendidikan_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Pendidikan Ibu" value="" />
                        <option value="<?= set_value('pendidikan_ibu') ?>"><?= set_value('pendidikan_ibu') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Pendidikan Ibu" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" />
                <?php } ?>                          
                
                <?php if ($formulir->pekerjaan_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pekerjaan Ibu <?php echo form_error('pekerjaan_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="" />
                        <option value="<?= set_value('pekerjaan_ibu') ?>"><?= set_value('pekerjaan_ibu') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" />
                <?php } ?>                          
                
                <?php if ($formulir->penghasilan_bulanan_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Penghasilan Bulanan Ibu <?php echo form_error('penghasilan_bulanan_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" placeholder="Penghasilan bulanan Ibu" value="" />
                        <option value="<?= set_value('penghasilan_bulanan_ibu') ?>"><?= set_value('penghasilan_bulanan_ibu') ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" placeholder="Penghasilan bulanan Ibu" value="" />
                        <option value="<?php echo $peserta->penghasilan_bulanan_ibu; ?>"><?php echo $peserta->penghasilan_bulanan_ibu; ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" />
                <?php } ?>                          
                
                <?php if ($formulir->berkebutuhan_khusus_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Berkebutuhan Khusus Ibu <?php echo form_error('berkebutuhan_khusus_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" placeholder="Berkebutuhan Khusus Ibu" value="" />
                        <option value="<?= set_value('berkebutuhan_khusus_ibu') ?>"><?= set_value('berkebutuhan_khusus_ibu') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" placeholder="Berkebutuhan Khusus Ibu" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" />
                <?php } ?>  

                <?php if ($formulir->no_hp_ibu=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Hp Ibu <?php echo form_error('no_hp_ibu') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_hp_ibu" id="no_hp_ibu" onkeypress="return Angkasaja(event)" placeholder="No Hp Ibu" value="<?= set_value('no_hp_ibu') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_hp_ibu" id="no_hp_ibu" onkeypress="return Angkasaja(event)" placeholder="No Hp Ibu" value="<?php echo $no_hp_ibu; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_hp_ibu" id="no_hp_ibu" />
                <?php } ?>                                        
                
                <?php if ($formulir->nama_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Nama Wali <?php echo form_error('nama_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" value="<?= set_value('nama_wali') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" value="<?php echo $nama_wali; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nama_wali" id="nama_wali" />
                <?php } ?>                          
                
                <?php if ($formulir->nik_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">NIK Wali <?php echo form_error('nik_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nik_wali" id="nik_wali" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Wali" value="<?= set_value('nik_wali') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nik_wali" id="nik_wali" maxlength="16" onkeypress="return Angkasaja(event)" placeholder="NIK Wali" value="<?php echo $nik_wali; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nik_wali" id="nik_wali" />
                <?php } ?>  
                
                <?php if ($formulir->tempat_lahir_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Tempat Lahir Wali <?php echo form_error('tempat_lahir_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" placeholder="Tempat Lahir Wali" value="<?= set_value('tempat_lahir_wali') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" placeholder="Tempat Lahir Wali" value="<?php echo $tempat_lahir_wali; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" />
                <?php } ?>  
                
                <?php if ($formulir->tanggal_lahir_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="date">Tanggal Lahir Wali <?php echo form_error('tanggal_lahir_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" placeholder="Tanggal Lahir Wali" value="0000-00-00" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" placeholder="Tanggal Lahir Wali" value="<?php echo date('m/d/Y', strtotime($tanggal_lahir_wali)); ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" value="0000-00-00" />
                <?php } ?>  
                
                <?php if ($formulir->pendidikan_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pendidikan Wali <?php echo form_error('pendidikan_wali') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" placeholder="Pendidikan wali" value="" />
                        <option value="<?= set_value('pendidikan_wali') ?>"><?= set_value('pendidikan_wali') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" placeholder="Pendidikan wali" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pendidikan_wali" id="pendidikan_wali" />
                <?php } ?>                          
                
                <?php if ($formulir->pekerjaan_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Pekerjaan Wali <?php echo form_error('pekerjaan_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali" value="" />
                        <option value="<?= set_value('pekerjaan_wali') ?>"><?= set_value('pekerjaan_wali') ?></option>
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
                <?php } else { ?>
                    <select type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali" value="" />
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
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" />
                <?php } ?>                          
                
                <?php if ($formulir->penghasilan_bulanan_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Penghasilan Bulanan Wali <?php echo form_error('penghasilan_bulanan_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" placeholder="Penghasilan bulanan Wali" value="" />
                        <option value="<?= set_value('penghasilan_bulanan_wali') ?>"><?= set_value('penghasilan_bulanan_wali') ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" placeholder="Penghasilan bulanan Wali" value="" />
                        <option value="<?php echo $peserta->penghasilan_bulanan_wali; ?>"><?php echo $peserta->penghasilan_bulanan_wali; ?></option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                    </select>                    
                <?php } ?>   
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" />
                <?php } ?> 

                <?php if ($formulir->no_hp_wali=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Hp Wali <?php echo form_error('no_hp_wali') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_hp_wali" id="no_hp_wali" onkeypress="return Angkasaja(event)" placeholder="No Hp Wali" value="<?= set_value('no_hp_wali') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_hp_wali" id="no_hp_wali" onkeypress="return Angkasaja(event)" placeholder="No Hp Wali" value="<?php echo $no_hp_wali; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_hp_wali" id="no_hp_wali" />
                <?php } ?>                

                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Kontak</h3>              
                </div><br>                                         
                <?php if ($formulir->no_telepon_rumah=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Telepon Rumah <?php echo form_error('no_telepon_rumah') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" onkeypress="return Angkasaja(event)" placeholder="No Telepon Rumah" value="<?= set_value('no_telepon_rumah') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" onkeypress="return Angkasaja(event)" placeholder="No Telepon Rumah" value="<?php echo $no_telepon_rumah; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" />
                <?php } ?>                          
                
                <?php if ($formulir->nomor_hp=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">No Handphone <?php echo form_error('nomor_hp') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" onkeypress="return Angkasaja(event)" placeholder="No Handphone" value="<?= set_value('nomor_hp') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" onkeypress="return Angkasaja(event)" placeholder="No Handphone" value="<?php echo $nomor_hp; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nomor_hp" id="nomor_hp" />
                <?php } ?>
               
                <?php if ($formulir->email=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="email" id="email" />
                <?php } ?>

                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Priodik</h3>              
                </div><br>                
                <?php if ($formulir->tinggi_badan=='Ya'){ ?>       
                <div class="form-group">
                    <label for="varchar">Tinggi Badan <?php echo form_error('tinggi_badan') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" onkeypress="return Angkasaja(event)" placeholder="Tinggi Badan" value="<?= set_value('tinggi_badan') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" onkeypress="return Angkasaja(event)" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="tinggi_badan" id="tinggi_badan" />
                <?php } ?>                          
                
                <?php if ($formulir->berat_badan=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Berat Badan <?php echo form_error('berat_badan') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="berat_badan" id="berat_badan" onkeypress="return Angkasaja(event)" placeholder="Berat Badan" value="<?= set_value('berat_badan') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="berat_badan" id="berat_badan" onkeypress="return Angkasaja(event)" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="berat_badan" id="berat_badan" />
                <?php } ?>  

                <?php if ($formulir->lingkar_kepala=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Lingkar Kepala <?php echo form_error('lingkar_kepala') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala" onkeypress="return Angkasaja(event)" placeholder="Lingkar Kepala" value="<?= set_value('lingkar_kepala') ?>" />
                <?php } else { ?>
                    <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala" onkeypress="return Angkasaja(event)" placeholder="Lingkar Kepala" value="<?php echo $lingkar_kepala; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="lingkar_kepala" id="lingkar_kepala" />
                <?php } ?>                  

            <!-- jarak titik sekolah ke rumah -->
                <?php   
                    $lat1 = $pengaturan->latitude;
                    $lon1 = $pengaturan->longitude;
                    $lat2 = floatval($latitude);
                    $lon2 = floatval($longitude); 
                    
                    $theta = $lon1 - $lon2;
                    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                    $miles = acos($miles);
                    $miles = rad2deg($miles);
                    $miles = $miles * 60 * 1.1515;
                    $feet  = $miles * 5280;
                    $yards = $feet / 3;
                    $kilometers = $miles * 1.609344;
                    $meters = round($kilometers * 1000);  
                ?>        
            <!-- end jarak titik sekolah ke rumah -->                   

                <?php if ($formulir->latitude=='Ya' || $formulir->longitude=='Ya') { ?>
                <div class="form-group">
                    <label for="varchar">Info Jarak</label>    
                    <input type="text" class="form-control" name="jarak_sistem" id="jarak_sistem" value="<?= set_value('jarak_sistem') ?>" readonly/>
                </div>    
                <?php } ?>

                <?php if ($formulir->jarak_ke_sekolah=='Ya'){ ?>
                <div class="form-group">
                    <label for="int">Jarak ke sekolah <span style="color:red;">*</span> <?php echo form_error('id_jarak') ?></label> 
                        <?php if ($latitude=="" and $longitude==""){
                            echo "";
                        } else {?>
                            <span class="label label-success">jarak sistem <?php echo $meters; ?> meter</span>
                        <?php } ?>                    
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="select2 form-control" name="id_jarak" id="id_jarak" placeholder="Jarak" value="" required />
                        <option value="">Pilih rentang jarak</option>
                        <?php foreach ($jarak as $key => $value) { ?>
                            <option value="<?= $value->id_jarak;?>"<?php echo set_select('id_jarak', $value->id_jarak); ?>>
                                <?= $value->jarak;?>
                            </option>
                        <?php }?>
                    </select>
                <?php } else { ?>
                    <select type="text" class="select2 form-control" name="id_jarak" id="id_jarak" placeholder="Jarak" value="" />
                        <option value="<?php echo $peserta->id_jarak; ?>"><?php echo $peserta->jarak; ?></option>
                        <?php foreach ($jarak as $key => $value) { ?>
                            <option value="<?= $value->id_jarak;?>">
                                <?= $value->jarak;?>
                            </option>
                        <?php }?>
                    </select>                    
                <?php } ?>    
                </div>
                <?php } ?>
                
                <?php if ($formulir->waktu_tempuh=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Waktu Tempuh <?php echo form_error('waktu_tempuh') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="waktu_tempuh" id="waktu_tempuh" placeholder="Waktu Tempuh, contoh : 1 jam 20 menit" value="<?= set_value('waktu_tempuh') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="waktu_tempuh" id="waktu_tempuh" placeholder="Waktu Tempuh, contoh : 1 jam 20 menit" value="<?php echo $waktu_tempuh; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="waktu_tempuh" id="waktu_tempuh" />
                <?php } ?> 

                <?php if ($formulir->jumlah_saudara_kandung=='Ya'){ ?>
                <div class="form-group">
                    <label for="varchar">Jumlah Saudara Kandung <?php echo form_error('jumlah_saudara_kandung') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" onkeypress="return Angkasaja(event)" placeholder="Jumlah Saudara Kandung" value="<?= set_value('jumlah_saudara_kandung') ?>" />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" onkeypress="return Angkasaja(event)" placeholder="Jumlah Saudara Kandung" value="<?php echo $jumlah_saudara_kandung; ?>" />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" />
                <?php } ?> 

                <?php if ($formulir->nilai_usbn=='Ya' || $formulir->nilai_rapor=='Ya' || $formulir->nilai_unbk_unkp=='Ya'){ ?>   
                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Nilai</h3>              
                </div><br>
                <?php } ?>
                <?php if ($formulir->nilai_rapor=='Ya'){ ?>   
                <div class="form-group">
                    <label for="varchar">Nilai Rata-rata Rapor <span style="color:red;">*</span> <?php echo form_error('nilai_rapor') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nilai_rapor" id="nilai_rapor" placeholder="Nilai Rata-rata Rapor yang terdapat pada SKL/SKHU/Ijazah" value="<?= set_value('nilai_rapor') ?>" required />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nilai_rapor" id="nilai_rapor" placeholder="Nilai Rata-rata Rapor yang terdapat pada SKL/SKHU/Ijazah" value="<?php echo $nilai_rapor; ?>" required />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nilai_rapor" id="nilai_rapor" value="0"/>
                <?php } ?>
                
                <?php if ($formulir->nilai_usbn=='Ya'){ ?>   
                <div class="form-group">
                    <label for="varchar">Nilai Rata-rata US <span style="color:red;">*</span> <?php echo form_error('nilai_usbn') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nilai_usbn" id="nilai_usbn" placeholder="Nilai Rata-rata US yang terdapat pada SKL/SKHU/Ijazah" value="<?= set_value('nilai_usbn') ?>" required />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nilai_usbn" id="nilai_usbn" placeholder="Nilai Rata-rata US yang terdapat pada SKL/SKHU/Ijazah" value="<?php echo $nilai_usbn; ?>" required />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nilai_usbn" id="nilai_usbn" value="0"/>
                <?php } ?>
                
                <?php if ($formulir->nilai_unbk_unkp=='Ya'){ ?>   
                <div class="form-group">
                    <label for="varchar">Nilai Rata-rata UN <span style="color:red;">*</span> <?php echo form_error('nilai_unbk_unkp') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <input type="text" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" placeholder="Nilai Rata-rata UN yang terdapat pada SKL/SKHU/Ijazah" value="<?= set_value('nilai_unbk_unkp') ?>" required />
                <?php } else { ?>    
                    <input type="text" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" placeholder="Nilai Rata-rata UN yang terdapat pada SKL/SKHU/Ijazah" value="<?php echo $nilai_unbk_unkp; ?>" required />
                <?php } ?>    
                </div>
                <?php } else { ?>
                    <input type="hidden" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" value="0"/>
                <?php } ?>  

            <?php if ($button=="Ubah") { ?> 
                <?php if ($formulir->nilai_raporsemester=='Ya'){ ?>
                    <div class="callout callout-info">
                        <?php foreach ($pengumuman as $text) { ?>               
                            <?php echo $text->text ?>
                        <?php } ?>  
                    </div>                     
                    <div class="form-group">
                        <label for="varchar">Nilai Rapor per semester <span style="color:red;">*</span> 
                            <?php echo form_error('satu[]') ?>
                            <?php echo form_error('dua[]') ?>
                            <?php echo form_error('tiga[]') ?>
                            <?php echo form_error('empat[]') ?>
                            <?php echo form_error('lima[]') ?>
                        </label>

                        <table class="table table-bordered table-striped" id="mytablexxx" style="width:100%">
                            <thead>
                                <tr>
                                  <th rowspan="2" style="text-align: center" width="10px">No</th>
                                  <th rowspan="2" style="text-align: center">Mata Pelajaran</th>
                                  <th colspan="5" style="text-align: center">Nilai Semester</th>
                                </tr>
                                <tr>
                                  <th style="text-align: center">1</th>
                                  <th style="text-align: center">2</th>
                                  <th style="text-align: center">3</th>
                                  <th style="text-align: center">4</th>
                                  <th style="text-align: center">5</th>
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
                                  <td><input type="text" class="form-control" name="satu[]" id="satu" value="<?php echo $value->satu; ?>" maxlength="5" required/></td>
                                  <td><input type="text" class="form-control" name="dua[]" id="dua" value="<?php echo $value->dua; ?>" maxlength="5" required/></td>
                                  <td><input type="text" class="form-control" name="tiga[]" id="tiga" value="<?php echo $value->tiga; ?>" maxlength="5" required/></td>
                                  <td><input type="text" class="form-control" name="empat[]" id="empat" value="<?php echo $value->empat; ?>" maxlength="5" required/></td>
                                  <td><input type="text" class="form-control" name="lima[]" id="lima" value="<?php echo $value->lima; ?>" maxlength="5" required/></td>
                                </tr>                                
                            <?php endforeach; ?> 
                            </tbody>                              
                        </table>         
                    </div>                          
                <?php } ?>  
            <?php } ?>                                         

                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Status</h3>              
                </div><br>
                <div class="form-group">
                    <label for="varchar">Status Pendaftaran <?php echo form_error('status') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="status" id="status" placeholder="Status" value="" />
                        <option value="Belum diverifikasi">Pilih Status</option>
                        <option value="Belum diverifikasi">Belum diverifikasi</option>
                        <option value="Sudah diverifikasi">Sudah diverifikasi</option>
                        <option value="Berkas Kurang">Berkas tidak lengkap</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="status" id="status" placeholder="Status" value="" />
                        <option value="<?php echo $peserta->status; ?>"><?php echo $peserta->status; ?></option>
                        <option value="Belum diverifikasi">Belum diverifikasi</option>
                        <option value="Sudah diverifikasi">Sudah diverifikasi</option>
                        <option value="Berkas Kurang">Berkas tidak lengkap</option>
                    </select>                    
                <?php } ?>    
                </div>
                <div class="form-group">
                    <label for="varchar">Status Hasil <?php echo form_error('status_hasil') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="status_hasil" id="status_hasil" placeholder="Status Hasil" value="" />
                        <option value="Belum ada">Pilih Status hasil</option>
                        <option value="Belum ada">Belum ada</option>
                        <option value="Di Terima">Di Terima</option>
                        <option value="Tidak di terima">Tidak di terima</option>
                        <option value="Cadangan">Cadangan</option>
                    </select>
                <?php } else { ?> 
                    <select type="text" class="form-control" name="status_hasil" id="status_hasil" placeholder="Status Hasil" value="" />
                        <option value="<?php echo $peserta->status_hasil; ?>"><?php echo $peserta->status_hasil; ?></option>
                        <option value="Belum ada">Belum ada</option>
                        <option value="Di Terima">Di Terima</option>
                        <option value="Tidak di terima">Tidak di terima</option>
                        <option value="Cadangan">Cadangan</option>
                    </select>
                <?php } ?>                        
                </div>
                <div class="form-group">
                    <label for="varchar">Status Daftar Ulang <?php echo form_error('status_daftar_ulang') ?></label>
                <?php if ($button=="Tambah") { ?>    
                    <select type="text" class="form-control" name="status_daftar_ulang" id="status_daftar_ulang" placeholder="Status Hasil" value="" />
                        <option value="Belum daftar ulang">Pilih Status Daftar Ulang</option>
                        <option value="Belum daftar ulang">Belum daftar ulang</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Sudah daftar ulang">Sudah daftar ulang</option>
                        <option value="Tidak daftar ulang">Tidak daftar ulang</option>
                    </select>
                <?php } else { ?>
                    <select type="text" class="form-control" name="status_daftar_ulang" id="status_daftar_ulang" placeholder="Status Hasil" value="" />
                        <option value="<?php echo $peserta->status_daftar_ulang; ?>"><?php echo $peserta->status_daftar_ulang; ?></option>
                        <option value="Belum daftar ulang">Belum daftar ulang</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Sudah daftar ulang">Sudah daftar ulang</option>
                        <option value="Tidak daftar ulang">Tidak daftar ulang</option>
                    </select>   
                <?php } ?>                      
                </div>
                <div class="form-group">
                    <label for="varchar">Catatan <?php echo form_error('catatan') ?></label>
                    <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
                </div>
                <div class="callout callout-danger">
                <p> Mohon di baca penting :
                  <ul>
                    <li>catatan dapat dikosongkan.</li>
                    <li>catatan digunakan untuk memberi catatan hasil verifikasi pendaftaran, contoh jika terdapat data yang tidak sesuai atau berkas ada yang kurang</li>
                    <li>catatan tidak digunakan untuk memberi informasi hasil seleksi, seperti diterima/tidak diterima.</li>
                  </ul> 
                </p>                               
                </div>                
                <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?= $user->id; ?>" />
                <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('peserta') ?>" class="btn btn-default btn-flat">Batal</a>  
            </form>
            <?php } else { ?>
                <div class="callout callout-info"> 
                    <li>Tahun Penerimaan belum diaktifkan</li> 
                </div>                
            <?php } ?> 
            </div>
        </div>
    </div>
</div>

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
                    <label for="varchar">Alamat Sekolah</label>
                    <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah" />
                </div>
                <div class="form-group">
                    <label for="varchar">Kelurahan</label>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" />
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

<script type="text/javascript">
    function Angkasaja(evt) 
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

    function kps(value) {
        if (value == "Ya") {
            document.getElementById("no_kps").style.display = "block";
        } else {
            document.getElementById("no_kps").style.display = "none";
        }
    }

    function kip(value) {
        if (value == "Ya") {
            document.getElementById("no_kip").style.display = "block";
            document.getElementById("nama_tertera_di_kip").style.display = "block";
            document.getElementById("terima_fisik_kartu_kip").style.display = "block";
        } else {
            document.getElementById("no_kip").style.display = "none";
            document.getElementById("nama_tertera_di_kip").style.display = "none";
            document.getElementById("terima_fisik_kartu_kip").style.display = "none";
        }
    }       
</script>