<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta_model extends CI_Model
{

    public $table = 'peserta';
    public $table2 = 'raporsemester';    
    public $table3 = 'tesdanwawancara'; 
    public $table4 = 'jawaban_wawancara'; 
    public $id = 'id_peserta';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() 
    {      
        $this->datatables->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,tahunpelajaran.id_tahun,tahun_pelajaran,status_tahun,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,pilihan_sekolah_lain,catatan');        
        $this->datatables->from('peserta');        
        //add this line for join
        //$this->datatables->join('table2', 'peserta.field = table2.field');
        $this->datatables->join('sekolah', 'peserta.id_sekolah = sekolah.id_sekolah');
        $this->datatables->join('jarak', 'peserta.id_jarak = jarak.id_jarak');
        $this->datatables->join('jalur', 'peserta.id_jalur = jalur.id_jalur');
        $this->datatables->join('jurusan', 'peserta.id_jurusan = jurusan.id_jurusan');
        $this->datatables->join('tahunpelajaran', 'peserta.id_tahun = tahunpelajaran.id_tahun');
        $this->datatables->where('status_tahun','Aktif'); 
        $this->datatables->add_column('action', 
            anchor(site_url('peserta/status/$1'),'<i class="fa fa-check"></i>', 'class="btn btn-xs bg-purple btn-flat" data-toggle="tooltip" title="Status"')."  ".                         
            anchor(site_url('peserta/printform/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs btn-success btn-flat" data-toggle="tooltip" title="Print Formulir" target="blank"')."  ".
            anchor(site_url('peserta/printkartu/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs bg-blue btn-flat" data-toggle="tooltip" title="Print Kartu" target="blank"')."  ".             
            anchor(site_url('peserta/printSKL/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs btn-info btn-flat" data-toggle="tooltip" title="Print SK" target="blank"')."  ".   
            anchor(site_url('peserta/printDU/$1'),'<i class="fa fa-print"></i>', 'class="btn btn-xs bg-maroon btn-flat" data-toggle="tooltip" title="Print DU" target="blank"')."  ".                                  
            anchor(site_url('peserta/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat" data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('peserta/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('peserta/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'peserta/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_peserta');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,tahunpelajaran.id_tahun,tahun_pelajaran,status_tahun,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,pilihan_sekolah_lain,catatan,ket');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('jarak', $this->table.".id_jarak = jarak.id_jarak");
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('jurusan', $this->table.".id_jurusan = jurusan.id_jurusan");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif');     
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }  

    // get by status pendaftaran
    function status_pendaftaran($status)
    {
        $this->db->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,tahunpelajaran.id_tahun,tahun_pelajaran,status_tahun,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,pilihan_sekolah_lain,catatan,ket');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('jarak', $this->table.".id_jarak = jarak.id_jarak");
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('jurusan', $this->table.".id_jurusan = jurusan.id_jurusan");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status',$status);
        $this->db->where('status_tahun','Aktif');     
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }     

    // get_count by jurusan
    function get_countjurusan()
    {
        $this->db->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,persentase,tahunpelajaran.id_tahun,tahun_pelajaran,kuota,status_tahun,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,count(jurusan.id_jurusan) as countjurusan,count(jalur.id_jalur) as countjalur,pilihan_sekolah_lain,catatan');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('jarak', $this->table.".id_jarak = jarak.id_jarak");
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('jurusan', $this->table.".id_jurusan = jurusan.id_jurusan");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('jurusan.id_jurusan'); 
        $this->db->group_by('jalur.id_jalur');       
        $this->db->order_by('jurusan.id_jurusan', $this->order);
        return $this->db->get($this->table)->result();
    }         

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,qrcode,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,sekolah.kecamatan as kecsekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,tahunpelajaran.id_tahun,tahun_pelajaran,tanggal_mulai_daftar_ulang,tanggal_selesai_daftar_ulang,tanggal_pengumuman,status_tahun,ket,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,pilihan_sekolah_lain,catatan,tgl_daftar_ulang');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('jarak', $this->table.".id_jarak = jarak.id_jarak");
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('jurusan', $this->table.".id_jurusan = jurusan.id_jurusan");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");               
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    } 

    // get data by no_pendaftaran
    function get_by_no_pendaftaran($no_pendaftaran)
    {
        $this->db->select('id_peserta,no_pendaftaran,tanggal_daftar,nama_peserta,jenis_kelamin,nisn,nik,no_kk,tempat_lahir,tanggal_lahir,no_registrasi_akta_lahir,agama,kewarganegaraan,berkebutuhan_khusus,alamat,rt,rw,nama_dusun,nama_kelurahan,peserta.kecamatan,kabupaten,provinsi,kode_pos,latitude,longitude,tempat_tinggal,moda_transportasi,no_kks,anak_ke,penerima_kps_pkh,no_kps_pkh,penerima_kip,no_kip,nama_tertera_di_kip,terima_fisik_kartu_kip,nama_ayah,nik_ayah,tempat_lahir_ayah,tanggal_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_bulanan_ayah,berkebutuhan_khusus_ayah,no_hp_ayah,nama_ibu,nik_ibu,tempat_lahir_ibu,tanggal_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_bulanan_ibu,berkebutuhan_khusus_ibu,no_hp_ibu,nama_wali,nik_wali,tempat_lahir_wali,tanggal_lahir_wali,pendidikan_wali,pekerjaan_wali,penghasilan_bulanan_wali,no_hp_wali,no_telepon_rumah,nomor_hp,email,hobi,tinggi_badan,berat_badan,lingkar_kepala,waktu_tempuh,jumlah_saudara_kandung,pilihan_dua,akreditasi,no_un,no_seri_ijazah,no_seri_skhu,tahun_lulus,nilai_rapor,nilai_usbn,nilai_unbk_unkp,status,status_hasil,status_daftar_ulang,id_users,qrcode,sekolah.id_sekolah,npsn_sekolah,asal_sekolah,sekolah.kecamatan as kecsekolah,jarak.id_jarak,jarak,skor_jarak,jalur.id_jalur,jalur,tahunpelajaran.id_tahun,tahun_pelajaran,tanggal_mulai_daftar_ulang,tanggal_selesai_daftar_ulang,tanggal_pengumuman,status_tahun,ket,jurusan.id_jurusan,nama_jurusan,kuota_jurusan,pilihan_sekolah_lain,catatan,tgl_daftar_ulang');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('jarak', $this->table.".id_jarak = jarak.id_jarak");
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('jurusan', $this->table.".id_jurusan = jurusan.id_jurusan");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");               
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        return $this->db->get($this->table)->row();
    }       

    // get data id
    function get_id($id)
    {
        $this->db->select('id_peserta,nama_peserta,status,status_hasil,status_daftar_ulang,id_users,catatan,nomor_hp');        
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }          

    // get tgl lahir by id_peserta
    function tgl_lhr($id)
    {
        $this->db->select('tanggal_lahir');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();  
    }  

    // get bobot by id_peserta
    function bobot($id)
    {
        $this->db->select('bobot_jarak,bobot_nilai,bobot_prestasi,bobot_tes,bobot_wawancara');
        $this->db->join('jalur', 'peserta.id_jalur = jalur.id_jalur');  
        $this->db->join('bobot', 'jalur.id_jalur = bobot.id_jalur'); 
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();  
    }      

    // get no daftar by users_id    
    function nodaftar()
    {
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id_peserta,no_pendaftaran,nama_peserta,jenis_kelamin,tempat_lahir,tanggal_lahir,nisn,asal_sekolah,nomor_hp,status,status_hasil,status_daftar_ulang,id_users,catatan');
        $this->db->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->db->where('id_users', $user->id);
        return $query = $this->db->get($this->table)->row();
    }  

    // get jawaban wawancara by id_peserta
    function jawaban($id)
    {
        $this->db->select('id_jawaban,peserta.id_peserta,nama_peserta,no_pendaftaran,nomor_hp,asal_sekolah,wawancara.id_wawancara,pertanyaan,jawaban');
        $this->db->join('peserta', 'peserta.id_peserta = jawaban_wawancara.id_peserta');  
        $this->db->join('sekolah', 'sekolah.id_sekolah = peserta.id_sekolah');
        $this->db->join('wawancara', 'wawancara.id_wawancara = jawaban_wawancara.id_wawancara'); 
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table4)->result();                
    }      

// ------------------------------ Chart Statistik ---------------------
    // chart pendaftar
    function get_chart_pendaftar()
    {
        $query = $this->db->query("SELECT jalur,count(peserta.id_jalur) AS jml_jalur FROM peserta,tahunpelajaran,jalur where peserta.id_tahun=tahunpelajaran.id_tahun and peserta.id_jalur=jalur.id_jalur and status_tahun='Aktif' GROUP BY peserta.id_jalur");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }      

    // chart jenis kelamin
    function get_chart_jk()
    {
        $query = $this->db->query("SELECT jenis_kelamin,count(jenis_kelamin) AS jml_jk FROM peserta,tahunpelajaran where peserta.id_tahun=tahunpelajaran.id_tahun and status_tahun='Aktif' GROUP BY jenis_kelamin");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }  

    // chart agama
    function get_chart_agama()
    {
        $query = $this->db->query("SELECT agama,count(agama) AS jml_agama FROM peserta,tahunpelajaran where peserta.id_tahun=tahunpelajaran.id_tahun and status_tahun='Aktif' GROUP BY agama");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }       

    // chart asal sekolah
    function get_chart_sekolah()
    {
        $query = $this->db->query("SELECT asal_sekolah,count(peserta.id_sekolah) AS jml_sekolah FROM peserta,sekolah,tahunpelajaran where peserta.id_sekolah=sekolah.id_sekolah and peserta.id_tahun=tahunpelajaran.id_tahun and status_tahun='Aktif' GROUP BY peserta.id_sekolah order by jml_sekolah desc");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    // chart status hasil seleksi
    function get_chart_hasil()
    {
        $query = $this->db->query("SELECT status_hasil,count(status_hasil) AS jml_hasil FROM peserta,tahunpelajaran where peserta.id_tahun=tahunpelajaran.id_tahun and status_tahun='Aktif' GROUP BY status_hasil");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }    

    // get_count by pendaftar
    function get_countpendaftar()
    {
        $this->db->select('jalur,count(peserta.id_jalur) as jml_jalur');
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('peserta.id_jalur');
        $this->db->order_by('jalur', $this->order);
        return $this->db->get($this->table)->result();
    }    

    // get_count by jenis kelamin
    function get_countjk()
    {
        $this->db->select('jenis_kelamin,count(jenis_kelamin) as jml_jk');
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('jenis_kelamin');
        $this->db->order_by('jml_jk', $this->order);
        return $this->db->get($this->table)->result();
    }

    // get_count by agama
    function get_countagama()
    {
        $this->db->select('agama,count(agama) as jml_agama');
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('agama');
        $this->db->order_by('jml_agama', $this->order);
        return $this->db->get($this->table)->result();
    }

    // get_count by sekolah
    function get_countsekolah()
    {
        $this->db->select('count(peserta.id_sekolah) as jml_sekolah,asal_sekolah,npsn_sekolah');
        $this->db->join('sekolah',$this->table.".id_sekolah = sekolah.id_sekolah"); 
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('peserta.id_sekolah');
        $this->db->order_by('jml_sekolah', $this->order);
        return $this->db->get($this->table)->result();
    }

    // get_count by status hasil
    function get_counthasil()
    {
        $this->db->select('status_hasil,count(status_hasil) as jml_hasil');
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('status_hasil');
        $this->db->order_by('jml_hasil', $this->order);
        return $this->db->get($this->table)->result();
    }

    // get_count by status hasil berdasar jalur
    function get_counthasilperjalur()
    {
        $this->db->select('status_hasil,count(status_hasil) as jml_hasil,jalur');
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('status_hasil');
        $this->db->group_by('peserta.id_jalur');
        $this->db->order_by('status_hasil', $this->order);
        return $this->db->get($this->table)->result();
    }    

    // get_count by status hasil berdasar jenis kelamin
    function get_counthasilperjk()
    {
        $this->db->select('status_hasil,count(status_hasil) as jml_hasil,jenis_kelamin');
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('status_hasil');
        $this->db->group_by('jenis_kelamin');
        $this->db->order_by('status_hasil', $this->order);
        return $this->db->get($this->table)->result();
    }       

    // get_count by status hasil berdasar agama
    function get_counthasilperagama()
    {
        $this->db->select('status_hasil,count(status_hasil) as jml_hasil,agama');
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->group_by('status_hasil');
        $this->db->group_by('agama');
        $this->db->order_by('status_hasil', $this->order);
        return $this->db->get($this->table)->result();
    }           

// ------------------------------ DASHBOARD ---------------------
    // get total rows peserta tahun aktif
    function hitungDataPeserta()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows id_jalur 1
    function hitungDataJalur1()
    {    
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('id_jalur','1');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows id_jalur 2
    function hitungDataJalur2()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('id_jalur','2');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows id_jalur 3
    function hitungDataJalur3()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('id_jalur','3');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows id_jalur 4
    function hitungDataJalur4()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('id_jalur','4');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }    

    // get total rows peserta diverifikasi
    function hitungDataVerifikasi()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status','Sudah diverifikasi');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta belum diverifikasi
    function hitungDataBaru()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status','Belum diverifikasi');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta berkas belum lengkap
    function hitungDataKurang()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status','Berkas Kurang');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get_count by status hasil diterima
    function get_counthasilditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('status_hasil','Di Terima'); 
        $this->db->order_by('status_hasil', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }  

    // get_count by status hasil tidak diterima
    function get_counthasiltdkditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('status_hasil','Tidak di terima'); 
        $this->db->order_by('status_hasil', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    } 

    // get_count by jenis kelamin laki-laki
    function get_countlaki()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','L'); 
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }  

    // get_count by jenis kelamin perempuan
    function get_countperempuan()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','P'); 
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }            

    // get_count by jenis kelamin laki-laki diterima
    function get_countlakiditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','L'); 
        $this->db->where('status_hasil','Di Terima');
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }  

    // get_count by jenis kelamin perempuan diterima
    function get_countperempuanditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','P'); 
        $this->db->where('status_hasil','Di Terima');
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get_count by jenis kelamin laki-laki tdk diterima
    function get_countlakitdkditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','L'); 
        $this->db->where('status_hasil','Tidak di terima');
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();
    }  

    // get_count by jenis kelamin perempuan tdk diterima
    function get_countperempuantdkditerima()
    {
        $this->db->join('tahunpelajaran', $this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_tahun','Aktif'); 
        $this->db->where('jenis_kelamin','P'); 
        $this->db->where('status_hasil','Tidak di terima');
        $this->db->order_by('jenis_kelamin', $this->order);
        return $query = $this->db->get($this->table)->num_rows();    
    }    

// ------------------------------ END DASHBOARD ---------------------    

    // get total rows peserta di terima
    function hitungDataDiterima()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_hasil','Di Terima');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta tidak di terima
    function hitungDataDitolak()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_hasil','Tidak di terima');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta cadangan
    function hitungDataCadangan()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_hasil','Cadangan');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta sudah daftar ulang
    function hitungDataSudahDU()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_daftar_ulang','Sudah daftar ulang');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta belum daftar ulang
    function hitungDataBelumDU()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_daftar_ulang','Belum daftar ulang');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows peserta tidak daftar ulang
    function hitungDataTidakDU()
    {
        $this->db->join('tahunpelajaran',$this->table.".id_tahun = tahunpelajaran.id_tahun");
        $this->db->where('status_daftar_ulang','Tidak daftar ulang');
        $this->db->where('status_tahun','Aktif');
        return $query = $this->db->get($this->table)->num_rows();
    }

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_peserta', $q);
		$this->db->or_like('no_pendaftaran', $q);
		$this->db->or_like('tanggal_daftar', $q);
		$this->db->or_like('id_tahun', $q);
		$this->db->or_like('id_jalur', $q);
		$this->db->or_like('nama_peserta', $q);
		$this->db->or_like('jenis_kelamin', $q);
		$this->db->or_like('nisn', $q);
		$this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
		$this->db->or_like('tempat_lahir', $q);
		$this->db->or_like('tanggal_lahir', $q);
		$this->db->or_like('no_registrasi_akta_lahir', $q);
		$this->db->or_like('agama', $q);
		$this->db->or_like('kewarganegaraan', $q);
		$this->db->or_like('berkebutuhan_khusus', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('rt', $q);
		$this->db->or_like('rw', $q);
		$this->db->or_like('nama_dusun', $q);
		$this->db->or_like('nama_kelurahan', $q);
		$this->db->or_like('kecamatan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('provinsi', $q);
		$this->db->or_like('kode_pos', $q);
		$this->db->or_like('latitude', $q);
		$this->db->or_like('longitude', $q);
		$this->db->or_like('tempat_tinggal', $q);
		$this->db->or_like('moda_transportasi', $q);
		$this->db->or_like('no_kks', $q);
		$this->db->or_like('anak_ke', $q);
		$this->db->or_like('penerima_kps_pkh', $q);
		$this->db->or_like('no_kps_pkh', $q);
		$this->db->or_like('penerima_kip', $q);
		$this->db->or_like('no_kip', $q);
		$this->db->or_like('nama_tertera_di_kip', $q);
		$this->db->or_like('terima_fisik_kartu_kip', $q);
		$this->db->or_like('nama_ayah', $q);
		$this->db->or_like('nik_ayah', $q);
        $this->db->or_like('tempat_lahir_ayah', $q);
		$this->db->or_like('tanggal_lahir_ayah', $q);
		$this->db->or_like('pendidikan_ayah', $q);
		$this->db->or_like('pekerjaan_ayah', $q);
		$this->db->or_like('penghasilan_bulanan_ayah', $q);
		$this->db->or_like('berkebutuhan_khusus_ayah', $q);
        $this->db->or_like('no_hp_ayah', $q);
		$this->db->or_like('nama_ibu', $q);
		$this->db->or_like('nik_ibu', $q);
        $this->db->or_like('tempat_lahir_ibu', $q);
		$this->db->or_like('tanggal_lahir_ibu', $q);
		$this->db->or_like('pendidikan_ibu', $q);
		$this->db->or_like('pekerjaan_ibu', $q);
		$this->db->or_like('penghasilan_bulanan_ibu', $q);
		$this->db->or_like('berkebutuhan_khusus_ibu', $q);
        $this->db->or_like('no_hp_ibu', $q);
		$this->db->or_like('nama_wali', $q);
		$this->db->or_like('nik_wali', $q);
        $this->db->or_like('tempat_lahir_wali', $q);
		$this->db->or_like('tanggal_lahir_wali', $q);
		$this->db->or_like('pendidikan_wali', $q);
		$this->db->or_like('pekerjaan_wali', $q);
		$this->db->or_like('penghasilan_bulanan_wali', $q);
        $this->db->or_like('no_hp_wali', $q);
		$this->db->or_like('no_telepon_rumah', $q);
		$this->db->or_like('nomor_hp', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('hobi', $q);
		$this->db->or_like('tinggi_badan', $q);
		$this->db->or_like('berat_badan', $q);
        $this->db->or_like('lingkar_kepala', $q);
		$this->db->or_like('id_jarak', $q);
        $this->db->or_like('waktu_tempuh', $q);
		$this->db->or_like('jumlah_saudara_kandung', $q);
		$this->db->or_like('id_jurusan', $q);
        $this->db->or_like('pilihan_dua', $q);
		$this->db->or_like('id_sekolah', $q);
        $this->db->or_like('akreditasi', $q);
		$this->db->or_like('no_un', $q);
		$this->db->or_like('no_seri_ijazah', $q);
		$this->db->or_like('no_seri_skhu', $q);
        $this->db->or_like('tahun_lulus', $q);
        $this->db->or_like('nilai_rapor', $q);
		$this->db->or_like('nilai_usbn', $q);
        $this->db->or_like('nilai_unbk_unkp', $q);
		$this->db->or_like('status', $q);
		$this->db->or_like('status_hasil', $q);
		$this->db->or_like('status_daftar_ulang', $q);
		$this->db->or_like('id_users', $q);
        $this->db->or_like('pilihan_sekolah_lain', $q);
        $this->db->or_like('catatan', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_peserta', $q);
		$this->db->or_like('no_pendaftaran', $q);
		$this->db->or_like('tanggal_daftar', $q);
		$this->db->or_like('id_tahun', $q);
		$this->db->or_like('id_jalur', $q);
		$this->db->or_like('nama_peserta', $q);
		$this->db->or_like('jenis_kelamin', $q);
		$this->db->or_like('nisn', $q);
		$this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
		$this->db->or_like('tempat_lahir', $q);
		$this->db->or_like('tanggal_lahir', $q);
		$this->db->or_like('no_registrasi_akta_lahir', $q);
		$this->db->or_like('agama', $q);
		$this->db->or_like('kewarganegaraan', $q);
		$this->db->or_like('berkebutuhan_khusus', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('rt', $q);
		$this->db->or_like('rw', $q);
		$this->db->or_like('nama_dusun', $q);
		$this->db->or_like('nama_kelurahan', $q);
		$this->db->or_like('kecamatan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('provinsi', $q);
		$this->db->or_like('kode_pos', $q);
		$this->db->or_like('latitude', $q);
		$this->db->or_like('longitude', $q);
		$this->db->or_like('tempat_tinggal', $q);
		$this->db->or_like('moda_transportasi', $q);
		$this->db->or_like('no_kks', $q);
		$this->db->or_like('anak_ke', $q);
		$this->db->or_like('penerima_kps_pkh', $q);
		$this->db->or_like('no_kps_pkh', $q);
		$this->db->or_like('penerima_kip', $q);
		$this->db->or_like('no_kip', $q);
		$this->db->or_like('nama_tertera_di_kip', $q);
		$this->db->or_like('terima_fisik_kartu_kip', $q);
		$this->db->or_like('nama_ayah', $q);
		$this->db->or_like('nik_ayah', $q);
        $this->db->or_like('tempat_lahir_ayah', $q);
		$this->db->or_like('tanggal_lahir_ayah', $q);
		$this->db->or_like('pendidikan_ayah', $q);
		$this->db->or_like('pekerjaan_ayah', $q);
		$this->db->or_like('penghasilan_bulanan_ayah', $q);
		$this->db->or_like('berkebutuhan_khusus_ayah', $q);
        $this->db->or_like('no_hp_ayah', $q);
		$this->db->or_like('nama_ibu', $q);
		$this->db->or_like('nik_ibu', $q);
        $this->db->or_like('tempat_lahir_ibu', $q);
		$this->db->or_like('tanggal_lahir_ibu', $q);
		$this->db->or_like('pendidikan_ibu', $q);
		$this->db->or_like('pekerjaan_ibu', $q);
		$this->db->or_like('penghasilan_bulanan_ibu', $q);
		$this->db->or_like('berkebutuhan_khusus_ibu', $q);
        $this->db->or_like('no_hp_ibu', $q);
		$this->db->or_like('nama_wali', $q);
		$this->db->or_like('nik_wali', $q);
        $this->db->or_like('tempat_lahir_wali', $q);
		$this->db->or_like('tanggal_lahir_wali', $q);
		$this->db->or_like('pendidikan_wali', $q);
		$this->db->or_like('pekerjaan_wali', $q);
		$this->db->or_like('penghasilan_bulanan_wali', $q);
        $this->db->or_like('no_hp_wali', $q);
		$this->db->or_like('no_telepon_rumah', $q);
		$this->db->or_like('nomor_hp', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('hobi', $q);
		$this->db->or_like('tinggi_badan', $q);
		$this->db->or_like('berat_badan', $q);
        $this->db->or_like('lingkar_kepala', $q);
		$this->db->or_like('id_jarak', $q);
        $this->db->or_like('waktu_tempuh', $q);
		$this->db->or_like('jumlah_saudara_kandung', $q);
		$this->db->or_like('id_jurusan', $q);
        $this->db->or_like('pilihan_dua', $q);
		$this->db->or_like('id_sekolah', $q);
        $this->db->or_like('akreditasi', $q);
		$this->db->or_like('no_un', $q);
		$this->db->or_like('no_seri_ijazah', $q);
		$this->db->or_like('no_seri_skhu', $q);
        $this->db->or_like('tahun_lulus', $q);
        $this->db->or_like('nilai_rapor', $q);
		$this->db->or_like('nilai_usbn', $q);
        $this->db->or_like('nilai_unbk_unkp', $q);
		$this->db->or_like('status', $q);
		$this->db->or_like('status_hasil', $q);
		$this->db->or_like('status_daftar_ulang', $q);
		$this->db->or_like('id_users', $q);
        $this->db->or_like('pilihan_sekolah_lain', $q);
        $this->db->or_like('catatan', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./assets/uploads/image/grcode/$row->qrcode");
        $this->db->delete($this->table, array($this->id => $id));
    }

    // delete bulkdata
    function deletebulk() 
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);    
    }

    // update data nomer pendaftaran - akun member
    function update_data($data_update)
    {
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id_peserta');
        $this->db->where('id_users', $user->id);
        $query = $this->db->get('peserta');      //cek dulu apakah sudah ada id peserta di tabel.
        if($query->num_rows() <> 0){
        //jika id peserta ternyata sudah ada.
        $data = $query->row();
        $id = $data->id_peserta;
        }

        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data_update);
    }    

    // update data status daftar ulang - member
    function update_daftarulang($id,$data_update)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data_update);
    }   

    // no pendaftaran otomatis - akun member
    public function no_pendaftaran_() 
    { 
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id_peserta');
        $this->db->where('id_users', $user->id);
        $query = $this->db->get('peserta');      //cek dulu apakah sudah ada id peserta di tabel.
        if($query->num_rows() <> 0){
        //jika id peserta ternyata sudah ada.
        $data = $query->row();
        $nomer = $data->id_peserta;
        }

        $nopen = str_pad($nomer, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $nopenjadi = $nopen;    // hasilnya 12130002-0001 dst.
        return $nopenjadi;
    }

    // no pendaftaran otomatis - akun admin
    public function no_pendaftaran() 
    { 
        $this->db->select('RIGHT(peserta.no_pendaftaran,4) as nomer', FALSE);
        $this->db->order_by('no_pendaftaran','DESC');
        $this->db->limit(1);
        $query = $this->db->get('peserta');      //cek dulu apakah sudah ada kode di tabel.
        if($query->num_rows() <> 0){
        //jika kode ternyata sudah ada.
        $data = $query->row();
        $nomer = intval($data->nomer) + 1;
        } else {
            //jika kode belum ada
            $nomer = 1;
        }
            $nopen = str_pad($nomer, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
            $nopenjadi = $nopen;    // hasilnya 12130002-0001 dst.
            return $nopenjadi;
    }    

    // no pendaftaran otomatis luring - akun admin
    public function no_pendaftaran_luring() 
    {  
        $this->db->select('MID(peserta.no_pendaftaran,-6,4) as nomer', FALSE);
        $this->db->order_by('no_pendaftaran','DESC');
        $this->db->limit(1);
        $this->db->like('no_pendaftaran','L');
        $query = $this->db->get('peserta');      //cek dulu apakah sudah ada kode di tabel.
        if($query->num_rows() <> 0){
        //jika kode ternyata sudah ada.
        $data = $query->row();
        $nomer = intval($data->nomer) + 1;
        } else {
            //jika kode belum ada
            $nomer = 1;
        }
            $nopen = str_pad($nomer, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
            $nopenjadi = $nopen;    // hasilnya 12130002-0001 dst.
            return $nopenjadi;
    }

    // get cek no_pendaftaran
    function get_cek($no_pendaftaran)
    {
        $this->db->select('id_peserta,nama_peserta,no_pendaftaran');        
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        return $this->db->get($this->table)->row();   
    }    

    // get cek nisn
    function get_cek_nisn($nisn)
    {
        $this->db->select('id_peserta,nama_peserta,nisn');        
        $this->db->where('nisn', $nisn);
        $this->db->where('nisn', $nisn);
        return $this->db->get($this->table)->row();   
    }    

// ------------------------------------------------------------------------------------------
    // update status hasil semua
    function get_hasil($hasil)
    {
        $hasil=$this->db->query("UPDATE peserta SET status_hasil='$hasil'");
        return $hasil;  
    } 

    // update reset status hasil semua
    function get_reset($hasil)
    {
        $hasil=$this->db->query("UPDATE peserta SET status_hasil='$hasil'");
        return $hasil;       
    }      
// ------------------------------------------------------------------------------------------

    // update data penomoran
    function update_penomoran($id_identitas, $data)
    {
        $this->db->where('id_identitas', $id_identitas);
        $this->db->update('identitas', $data);
    } 

    // insert rapor semester - akun member
    function insert_raporsemester()
    {
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id_peserta');
        $this->db->where('id_users', $user->id);
        $query = $this->db->get('peserta');      //cek dulu apakah sudah ada id peserta di tabel.
        if($query->num_rows() <> 0){
        //jika id peserta ternyata sudah ada.
        $data = $query->row();
        $id = $data->id_peserta;
        }

        $m = $this->input->post('mapel',TRUE);
        $result = array();
        foreach ($m AS $key => $val)
        {
            $result[] = array(
                "mapel" => $_POST['mapel'][$key],
                "satu" => $_POST['satu'][$key],
                "dua" => $_POST['dua'][$key],
                "tiga" => $_POST['tiga'][$key],
                "empat" => $_POST['empat'][$key],
                "lima" => $_POST['lima'][$key],
                "id_peserta" => $id  
            );
        }            
            
        $this->db->insert_batch('raporsemester', $result); 
    }

    // update rapor semester
    function update_raporsemester()
    {
        $id_raporsemester = $this->input->post('id_raporsemester');
        $result = array();
        foreach ($id_raporsemester AS $key => $val)
        {
            $result[] = array(
                "mapel" => $_POST['mapel'][$key],
                "satu" => $_POST['satu'][$key],
                "dua" => $_POST['dua'][$key],
                "tiga" => $_POST['tiga'][$key],
                "empat" => $_POST['empat'][$key],
                "lima" => $_POST['lima'][$key],
                "id_raporsemester" => $id_raporsemester[$key]
            );
        }            

        $this->db->update_batch('raporsemester', $result,'id_raporsemester'); 
    }

    // nilai rapor per semester
    function get_raporsemester($id)
    {
        $this->db->select('id_raporsemester,mapel,satu,dua,tiga,empat,lima,peserta.id_peserta,nama_peserta,(satu+dua+tiga+empat+lima) as jumlah,(satu+dua+tiga+empat+lima)/5 as rerata');            
        $this->db->join('peserta', 'raporsemester.id_peserta = peserta.id_peserta');       
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table2)->result();
    }     

    // nilai rerata rapor per semester
    function get_rerataraporsemester($id)
    {
        $this->db->select('id_raporsemester,peserta.id_peserta,nama_peserta,akreditasi,sum(satu+dua+tiga+empat+lima) as jumlah,avg(satu+dua+tiga+empat+lima)/5 as rerata');            
        $this->db->join('peserta', 'raporsemester.id_peserta = peserta.id_peserta');       
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table2)->result();
    } 

    // nilai tes dan wawancara
    function get_tesdanwawancara($id)
    {
        $this->db->select('id_tesdanwawancara,peserta.id_peserta,nilai_tes,nilai_wawancara,kesimpulan');            
        $this->db->join('peserta', 'tesdanwawancara.id_peserta = peserta.id_peserta');       
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table3)->result();
    }        

    // function get_nilai
    function get_nilai()
    {    
        $query=$this->db->query("SELECT peserta.id_peserta,peserta.no_pendaftaran,peserta.nama_peserta,peserta.akreditasi,peserta.id_tahun,tahunpelajaran.status_tahun,jurusan.nama_jurusan,jalur.jalur,peserta.nilai_rapor,peserta.nilai_usbn,peserta.nilai_unbk_unkp as nilai_un,Coalesce(rerata,0) as rerata,peserta.nilai_rapor+peserta.nilai_usbn+peserta.nilai_unbk_unkp+Coalesce(rerata,0) as total_nilai,jarak.skor_jarak as poin_jarak,Coalesce(sum(prestasi.skor_prestasi),0) as poin_prestasi,tesdanwawancara.nilai_tes,tesdanwawancara.nilai_wawancara,(Coalesce(peserta.nilai_rapor,0)+Coalesce(peserta.nilai_usbn,0)+Coalesce(peserta.nilai_unbk_unkp,0)+Coalesce(rerata,0))*Coalesce(bobot.bobot_nilai,0)/100+Coalesce(jarak.skor_jarak,0)*Coalesce(bobot.bobot_jarak,0)/100+Coalesce(sum(prestasi.skor_prestasi),0)*Coalesce(bobot.bobot_prestasi,0)/100+Coalesce(tesdanwawancara.nilai_tes,0)*Coalesce(bobot.bobot_tes,0)/100+Coalesce(tesdanwawancara.nilai_wawancara,0)*Coalesce(bobot.bobot_wawancara,0)/100 as nilai_akhir, status_hasil from 
            peserta
            left join jalur on peserta.id_jalur=jalur.id_jalur
            left join jarak on peserta.id_jarak=jarak.id_jarak
            left join prestasipeserta on peserta.id_peserta=prestasipeserta.id_peserta
            left join prestasi on prestasipeserta.id_prestasi=prestasi.id_prestasi  
            left join bobot on jalur.id_jalur=bobot.id_jalur
            left join jurusan on peserta.id_jurusan=jurusan.id_jurusan
            left join tesdanwawancara on peserta.id_peserta=tesdanwawancara.id_peserta
            left join tahunpelajaran on peserta.id_tahun=tahunpelajaran.id_tahun
            left join (select id_raporsemester,peserta.id_peserta,avg(satu+dua+tiga+empat+lima)/5 as rerata from peserta,raporsemester where peserta.id_peserta=raporsemester.id_peserta group by peserta.id_peserta) as rerata on peserta.id_peserta=rerata.id_peserta
            where status_tahun='Aktif' group by id_peserta order by nilai_akhir desc");        

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

// -----------------------------------------------------------------------
    // kirim WA
    function kirimpesan($phone,$msg)
    {   
    // hapus tanda // baris 994
        // $api = $this->Mail_model->get_by_id_1();

    // ------ untuk demo/langganan WhatsApp API Gateway dapat mengunjungi https://wablas.com ------
    // hapus tanda // baris 998 sampai 1021 untuk aktifkan demo/langganan    
        // $link  =  $api->url_server;
        // $data = [
        //     'phone' => $phone,
        //     'message' => $msg,
        // ];
                      
        // $curl = curl_init();
        // $token =  $api->token_api;
     
        // curl_setopt($curl, CURLOPT_HTTPHEADER,
        //     array(
        //         "Authorization: $token",
        //         "Content-Type: application/json"
        //     )
        // );
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); 
        // curl_setopt($curl, CURLOPT_URL, $link);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // $result = curl_exec($curl);
        // curl_close($curl); 
        // return $result;
    // ------ untuk demo/langganan -----------------------------------------------------------------------    

    // ------ alternatif lain untuk berlangganan WhatsApp API Gateway dapat mengunjungi https://www.ruangwa.id/ ------
    // hapus tanda // baris 1027 sampai 1043 untuk aktifkan
    // edit $token sesuai api yang di dapat
        // $link  =  $api->url_server;     
        // $token = $api->token_api;
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => $link,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$msg,
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);
        // echo $response;
    // ------------------------------------------------------------------------------------------------    
    }    

// -----------------------------------------------------------------------
}