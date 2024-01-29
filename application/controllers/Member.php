<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Users_model');
        $this->load->model('Pengaturan_model');
        $this->load->model('Pengumuman_model');        
        $this->load->model('Peserta_model');
        $this->load->model('Prestasipeserta_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Sekolah_model');
        $this->load->model('Jalur_model');
        $this->load->model('Jarak_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Tahunpelajaran_model');
        $this->load->model('Formulir_model');    
        $this->load->model('Berkas_model');  
        $this->load->model('Wawancara_model'); 
        $this->load->model('Pembayaran_model');       
    	$this->load->model('Biaya_model'); 
    	$this->load->model('Mail_model');           
        $this->load->library('form_validation');
	    $this->load->library('datatables');	

	    require APPPATH.'libraries/phpmailer/src/Exception.php';
	    require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
	    require APPPATH.'libraries/phpmailer/src/SMTP.php';	    	
    } 

	public function create()
	{
		$nomer = $this->Peserta_model->nodaftar();
	    if ($nomer) {
			redirect(site_url('member/update'));	
	    } else {
	        $data = array(
	            'action' => site_url('member/create_form'),
			    'id_peserta' => set_value('id_peserta'),
			    'tanggal_daftar' => set_value('tanggal_daftar'),
			    'id_tahun' => set_value('id_tahun'),
			    'id_jalur' => set_value('id_jalur'),
			    'nama_peserta' => set_value('nama_peserta'),
			    'jenis_kelamin' => set_value('jenis_kelamin'),
			    'nisn' => set_value('nisn'),
			    'nik' => set_value('nik'),
			    'no_kk' => set_value('no_kk'),
			    'tempat_lahir' => set_value('tempat_lahir'),
			    'tanggal_lahir' => set_value('tanggal_lahir'),
			    'no_registrasi_akta_lahir' => set_value('no_registrasi_akta_lahir'),
			    'agama' => set_value('agama'),
			    'kewarganegaraan' => set_value('kewarganegaraan'),
			    'berkebutuhan_khusus' => set_value('berkebutuhan_khusus'),
			    'alamat' => set_value('alamat'),
			    'rt' => set_value('rt'),
			    'rw' => set_value('rw'),
			    'nama_dusun' => set_value('nama_dusun'),
			    'nama_kelurahan' => set_value('nama_kelurahan'),
			    'kecamatan' => set_value('kecamatan'),
			    'kabupaten' => set_value('kabupaten'),
			    'provinsi' => set_value('provinsi'),
			    'kode_pos' => set_value('kode_pos'),
			    'latitude' => set_value('latitude'),
			    'longitude' => set_value('longitude'),
			    'tempat_tinggal' => set_value('tempat_tinggal'),
			    'moda_transportasi' => set_value('moda_transportasi'),
			    'no_kks' => set_value('no_kks'),
			    'anak_ke' => set_value('anak_ke'),
			    'penerima_kps_pkh' => set_value('penerima_kps_pkh'),
			    'no_kps_pkh' => set_value('no_kps_pkh'),
			    'penerima_kip' => set_value('penerima_kip'),
			    'no_kip' => set_value('no_kip'),
			    'nama_tertera_di_kip' => set_value('nama_tertera_di_kip'),
			    'terima_fisik_kartu_kip' => set_value('terima_fisik_kartu_kip'),
			    'nama_ayah' => set_value('nama_ayah'),
			    'nik_ayah' => set_value('nik_ayah'),
				'tempat_lahir_ayah' => set_value('tempat_lahir_ayah'),
			    'tanggal_lahir_ayah' => set_value('tanggal_lahir_ayah'),
			    'pendidikan_ayah' => set_value('pendidikan_ayah'),
			    'pekerjaan_ayah' => set_value('pekerjaan_ayah'),
			    'penghasilan_bulanan_ayah' => set_value('penghasilan_bulanan_ayah'),
			    'berkebutuhan_khusus_ayah' => set_value('berkebutuhan_khusus_ayah'),
			    'no_hp_ayah' => set_value('no_hp_ayah'),
			    'nama_ibu' => set_value('nama_ibu'),
			    'nik_ibu' => set_value('nik_ibu'),
				'tempat_lahir_ibu' => set_value('tempat_lahir_ibu'),
			    'tanggal_lahir_ibu' => set_value('tanggal_lahir_ibu'),
			    'pendidikan_ibu' => set_value('pendidikan_ibu'),
			    'pekerjaan_ibu' => set_value('pekerjaan_ibu'),
			    'penghasilan_bulanan_ibu' => set_value('penghasilan_bulanan_ibu'),
			    'berkebutuhan_khusus_ibu' => set_value('berkebutuhan_khusus_ibu'),
			    'no_hp_ibu' => set_value('no_hp_ibu'),
			    'nama_wali' => set_value('nama_wali'),
			    'nik_wali' => set_value('nik_wali'),
				'tempat_lahir_wali' => set_value('tempat_lahir_wali'),
			    'tanggal_lahir_wali' => set_value('tanggal_lahir_wali'),
			    'pendidikan_wali' => set_value('pendidikan_wali'),
			    'pekerjaan_wali' => set_value('pekerjaan_wali'),
			    'penghasilan_bulanan_wali' => set_value('penghasilan_bulanan_wali'),
			    'no_hp_wali' => set_value('no_hp_wali'),
			    'no_telepon_rumah' => set_value('no_telepon_rumah'),
			    'nomor_hp' => set_value('nomor_hp'),
			    'email' => set_value('email'),
			    'hobi' => set_value('hobi'),
			    'tinggi_badan' => set_value('tinggi_badan'),
			    'berat_badan' => set_value('berat_badan'),
			    'lingkar_kepala' => set_value('lingkar_kepala'),
			    'id_jarak' => set_value('id_jarak'),
			    'waktu_tempuh' => set_value('waktu_tempuh'),
			    'jumlah_saudara_kandung' => set_value('jumlah_saudara_kandung'),
			    'id_jurusan' => set_value('id_jurusan'),
			    'pilihan_dua' => set_value('pilihan_dua'),
			    'id_sekolah' => set_value('id_sekolah'),
			    'akreditasi' => set_value('akreditasi'),
			    'no_un' => set_value('no_un'),
			    'no_seri_ijazah' => set_value('no_seri_ijazah'),
			    'no_seri_skhu' => set_value('no_seri_skhu'),
			    'tahun_lulus' => set_value('tahun_lulus'),
			    'nilai_rapor' => set_value('nilai_rapor'),
			    'nilai_usbn' => set_value('nilai_usbn'),
				'nilai_unbk_unkp' => set_value('nilai_unbk_unkp'),
			    'status' => set_value('status'),
			    'status_hasil' => set_value('status_hasil'),
			    'status_daftar_ulang' => set_value('status_daftar_ulang'),
			    'id_users' => set_value('id_users'),
			    'pilihan_sekolah_lain' => set_value('pilihan_sekolah_lain'),
			);

	        $data['title'] = 'Formulir Peserta';
	        $data['subtitle'] = '';
	        $data['crumb'] = [
	            'Dashboard' => '',
	        ];

	        $data['code_js'] = 'peserta/codejs';
	        $data['sekolah'] =$this->Sekolah_model->get_all();
	        $data['jalur'] =$this->Jalur_model->get_all();
	        $data['jarak'] =$this->Jarak_model->get_all();
	        $data['jurusan'] =$this->Jurusan_model->get_all();
	        $data['tahunpelajaran'] =$this->Tahunpelajaran_model->get_tahun_aktif();
	        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
	        $data['panitia'] = $this->Users_model->get_panitia();
	        $data['user'] = $this->ion_auth->user()->row();  
	        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
		    $data['nomer'] = $this->Peserta_model->nodaftar();   
			$data['pengumuman'] = $this->Pengumuman_model->get_by_raporsemester();		                       	             

	        if ($data['formulir']->tipe=="1") {
	        	$data['page'] = 'peserta/Form_peserta_wizard';
	        } else if ($data['formulir']->tipe=="2") {
	        	$data['page'] = 'peserta/Form_peserta';
	        } else if ($data['formulir']->tipe=="3") {
	        	$data['page'] = 'peserta/Form_peserta_general';
	        }		
	        $this->load->view('template/backend', $data);
	    }
	}

    public function formcreate()
    {
	    $formulir = $this->Formulir_model->get_by_id_1(); 
	    $pembayaran =  $this->Pembayaran_model->get_by_id_user();
	    $biaya = $this->Biaya_model->get_all_wajib();
	    if ($formulir->biaya=="Ya") {
			if ($biaya) {
	            if ($pembayaran) { 
	            	if ($pembayaran->status_bayar=='Sudah bayar') {
					    $this->create();
	            	} else {
	            		redirect(site_url('dashboard'));	
	            	}
	            } else {
	            	redirect(site_url('dashboard'));	
	            }
			} else {
			    $this->create();
			}
	    } else {
		    $this->create();
	    }	
    }

    public function create_form()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->formcreate();                 
        } else {
            $data = array(
				// 'no_pendaftaran' => $no_pendaftaran,
        		'tanggal_daftar' => date('Y-m-d'),
				'id_tahun' => $this->input->post('id_tahun',TRUE),
				'id_jalur' => $this->input->post('id_jalur',TRUE),
				'nama_peserta' => $this->input->post('nama_peserta',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'nisn' => $this->input->post('nisn',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'no_kk' => $this->input->post('no_kk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        		'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir',TRUE))),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir',TRUE),
				'agama' => $this->input->post('agama',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'rw' => $this->input->post('rw',TRUE),
				'nama_dusun' => $this->input->post('nama_dusun',TRUE),
				'nama_kelurahan' => $this->input->post('nama_kelurahan',TRUE),
				'kecamatan' => $this->input->post('kecamatan',TRUE),
				'kabupaten' => $this->input->post('kabupaten',TRUE),
				'provinsi' => $this->input->post('provinsi',TRUE),
				'kode_pos' => $this->input->post('kode_pos',TRUE),
				'latitude' => $this->input->post('latitude',TRUE),
				'longitude' => $this->input->post('longitude',TRUE),
				'tempat_tinggal' => $this->input->post('tempat_tinggal',TRUE),
				'moda_transportasi' => $this->input->post('moda_transportasi',TRUE),
				'no_kks' => $this->input->post('no_kks',TRUE),
				'anak_ke' => $this->input->post('anak_ke',TRUE),
				'penerima_kps_pkh' => $this->input->post('penerima_kps_pkh',TRUE),
				'no_kps_pkh' => $this->input->post('no_kps_pkh',TRUE),
				'penerima_kip' => $this->input->post('penerima_kip',TRUE),
				'no_kip' => $this->input->post('no_kip',TRUE),
				'nama_tertera_di_kip' => $this->input->post('nama_tertera_di_kip',TRUE),
				'terima_fisik_kartu_kip' => $this->input->post('terima_fisik_kartu_kip',TRUE),
				'nama_ayah' => $this->input->post('nama_ayah',TRUE),
				'nik_ayah' => $this->input->post('nik_ayah',TRUE),
				'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah',TRUE),
        		'tanggal_lahir_ayah' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ayah',TRUE))),				
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah',TRUE),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah',TRUE),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah',TRUE),
				'no_hp_ayah' => $this->input->post('no_hp_ayah',TRUE),
				'nama_ibu' => $this->input->post('nama_ibu',TRUE),
				'nik_ibu' => $this->input->post('nik_ibu',TRUE),
				'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu',TRUE),
				'tanggal_lahir_ibu' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ibu',TRUE))),				
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu',TRUE),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu',TRUE),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu',TRUE),
				'no_hp_ibu' => $this->input->post('no_hp_ibu',TRUE),
				'nama_wali' => $this->input->post('nama_wali',TRUE),
				'nik_wali' => $this->input->post('nik_wali',TRUE),
				'tempat_lahir_wali' => $this->input->post('tempat_lahir_wali',TRUE),
				'tanggal_lahir_wali' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_wali',TRUE))),				
				'pendidikan_wali' => $this->input->post('pendidikan_wali',TRUE),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali',TRUE),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali',TRUE),
				'no_hp_wali' => $this->input->post('no_hp_wali',TRUE),
				'no_telepon_rumah' => $this->input->post('no_telepon_rumah',TRUE),
				'nomor_hp' => $this->input->post('nomor_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'hobi' => $this->input->post('hobi',TRUE),
				'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
				'berat_badan' => $this->input->post('berat_badan',TRUE),
				'lingkar_kepala' => $this->input->post('lingkar_kepala',TRUE),
				'id_jarak' => $this->input->post('id_jarak',TRUE),
				'waktu_tempuh' => $this->input->post('waktu_tempuh',TRUE),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung',TRUE),
				'id_jurusan' => $this->input->post('id_jurusan',TRUE),
				'pilihan_dua' => $this->input->post('pilihan_dua',TRUE),
				'id_sekolah' => $this->input->post('id_sekolah',TRUE),
				'akreditasi' => $this->input->post('akreditasi',TRUE),
				'no_un' => $this->input->post('no_un',TRUE),
				'no_seri_ijazah' => $this->input->post('no_seri_ijazah',TRUE),
				'no_seri_skhu' => $this->input->post('no_seri_skhu',TRUE),
				'tahun_lulus' => $this->input->post('tahun_lulus',TRUE),
				'nilai_rapor' => $this->input->post('nilai_rapor',TRUE),
				'nilai_usbn' => $this->input->post('nilai_usbn',TRUE),
				'nilai_unbk_unkp' => $this->input->post('nilai_unbk_unkp',TRUE),
				'status' => $this->input->post('status',TRUE),
				'status_hasil' => $this->input->post('status_hasil',TRUE),
				'status_daftar_ulang' => $this->input->post('status_daftar_ulang',TRUE),
				'id_users' => $this->input->post('id_users',TRUE),
				// 'qrcode' => $qrcode,
				'pilihan_sekolah_lain' => $this->input->post('pilihan_sekolah_lain',TRUE),
		    );

	        $this->Peserta_model->insert($data);

			// ...........................................
	        // no pendaftaran
			$data['formulir'] =  $this->Formulir_model->get_by_id_1();
			if ($data['formulir']->kode_formulir=="Ya") {  
				$data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran_(); 
				$data['nodaftar'] = $data['formulir']->kode_daring.$data['no_pendaftaran']."-D";  		
		    	$no_pendaftaran=$data['nodaftar'];
		    } else {
				$data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran_(); 
				$data['nodaftar'] = $data['formulir']->kode_daring.$data['no_pendaftaran'];  		
		    	$no_pendaftaran=$data['nodaftar'];	    	
		    }
	    	
	    	$nama_peserta=$data['nama_peserta'];
	        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
	 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './assets/'; //string, the default is application/cache/
	        $config['errorlog']     = './assets/'; //string, the default is application/logs/
	        $config['imagedir']     = './assets/uploads/image/grcode/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $qrcode=$no_pendaftaran.'.png'; //buat name dari qr code sesuai dengan no pendaftaran
	 
	        $params['data'] = $no_pendaftaran; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/uploads/image/grcode/
	        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			$data_update = array(
					'no_pendaftaran' => $no_pendaftaran,
					'qrcode' => $qrcode,
			);	

			$this->Peserta_model->update_data($data_update);
			if ($data['formulir']->nilai_raporsemester=="Ya") { 
				$this->Peserta_model->insert_raporsemester();
			}

		    $this->session->set_flashdata('message', 'Formulir berhasil disimpan');
			// kirim pesan WA ........................................................
		    $phone=$data['nomor_hp'];
		    $msg="Selamat ".$nama_peserta." formulir berhasil disimpan, tambahkan prestasi jika ada dan upload berkas jika di minta. Selanjutnya cetak bukti pendaftaran anda.";
		    $this->Peserta_model->kirimpesan($phone,$msg);
			// .......................................................................
	        helper_log("add", "Mengisi formulir pendaftaran");	            
		    redirect(site_url('dashboard'));		
			// ...........................................
		}
	}

    public function update()
    {
  		$nomer = $this->Peserta_model->nodaftar();
		$id = $nomer->id_peserta; 
  		
	    $row = $this->Peserta_model->get_by_id($id);
	    if ($row) {
	        $data = array(
	            // 'button' => 'Ubah',
	            'action' => site_url('member/update_action'),
				'id_peserta' => set_value('id_peserta', $row->id_peserta),
				// 'no_pendaftaran' => set_value('no_pendaftaran', $row->no_pendaftaran),
				// 'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
				// 'id_tahun' => set_value('id_tahun', $row->id_tahun),
				'id_jalur' => set_value('id_jalur', $row->id_jalur),
				'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'nisn' => set_value('nisn', $row->nisn),
				'nik' => set_value('nik', $row->nik),
				'no_kk' => set_value('no_kk', $row->no_kk),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'no_registrasi_akta_lahir' => set_value('no_registrasi_akta_lahir', $row->no_registrasi_akta_lahir),
				'agama' => set_value('agama', $row->agama),
				'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
				'berkebutuhan_khusus' => set_value('berkebutuhan_khusus', $row->berkebutuhan_khusus),
				'alamat' => set_value('alamat', $row->alamat),
				'rt' => set_value('rt', $row->rt),
				'rw' => set_value('rw', $row->rw),
				'nama_dusun' => set_value('nama_dusun', $row->nama_dusun),
				'nama_kelurahan' => set_value('nama_kelurahan', $row->nama_kelurahan),
				'kecamatan' => set_value('kecamatan', $row->kecamatan),
				'kabupaten' => set_value('kabupaten', $row->kabupaten),
				'provinsi' => set_value('provinsi', $row->provinsi),
				'kode_pos' => set_value('kode_pos', $row->kode_pos),
				'latitude' => set_value('latitude', $row->latitude),
				'longitude' => set_value('longitude', $row->longitude),
				'tempat_tinggal' => set_value('tempat_tinggal', $row->tempat_tinggal),
				'moda_transportasi' => set_value('moda_transportasi', $row->moda_transportasi),
				'no_kks' => set_value('no_kks', $row->no_kks),
				'anak_ke' => set_value('anak_ke', $row->anak_ke),
				'penerima_kps_pkh' => set_value('penerima_kps_pkh', $row->penerima_kps_pkh),
				'no_kps_pkh' => set_value('no_kps_pkh', $row->no_kps_pkh),
				'penerima_kip' => set_value('penerima_kip', $row->penerima_kip),
				'no_kip' => set_value('no_kip', $row->no_kip),
				'nama_tertera_di_kip' => set_value('nama_tertera_di_kip', $row->nama_tertera_di_kip),
				'terima_fisik_kartu_kip' => set_value('terima_fisik_kartu_kip', $row->terima_fisik_kartu_kip),
				'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
				'nik_ayah' => set_value('nik_ayah', $row->nik_ayah),
				'tempat_lahir_ayah' => set_value('tempat_lahir_ayah', $row->tempat_lahir_ayah),
				'tanggal_lahir_ayah' => set_value('tanggal_lahir_ayah', $row->tanggal_lahir_ayah),
				'pendidikan_ayah' => set_value('pendidikan_ayah', $row->pendidikan_ayah),
				'pekerjaan_ayah' => set_value('pekerjaan_ayah', $row->pekerjaan_ayah),
				'penghasilan_bulanan_ayah' => set_value('penghasilan_bulanan_ayah', $row->penghasilan_bulanan_ayah),
				'berkebutuhan_khusus_ayah' => set_value('berkebutuhan_khusus_ayah', $row->berkebutuhan_khusus_ayah),
				'no_hp_ayah' => set_value('no_hp_ayah', $row->no_hp_ayah),
				'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
				'nik_ibu' => set_value('nik_ibu', $row->nik_ibu),
				'tempat_lahir_ibu' => set_value('tempat_lahir_ibu', $row->tempat_lahir_ibu),
				'tanggal_lahir_ibu' => set_value('tanggal_lahir_ibu', $row->tanggal_lahir_ibu),
				'pendidikan_ibu' => set_value('pendidikan_ibu', $row->pendidikan_ibu),
				'pekerjaan_ibu' => set_value('pekerjaan_ibu', $row->pekerjaan_ibu),
				'penghasilan_bulanan_ibu' => set_value('penghasilan_bulanan_ibu', $row->penghasilan_bulanan_ibu),
				'berkebutuhan_khusus_ibu' => set_value('berkebutuhan_khusus_ibu', $row->berkebutuhan_khusus_ibu),
				'no_hp_ibu' => set_value('no_hp_ibu', $row->no_hp_ibu),
				'nama_wali' => set_value('nama_wali', $row->nama_wali),
				'nik_wali' => set_value('nik_wali', $row->nik_wali),
				'tempat_lahir_wali' => set_value('tempat_lahir_wali', $row->tempat_lahir_wali),
				'tanggal_lahir_wali' => set_value('tanggal_lahir_wali', $row->tanggal_lahir_wali),
				'pendidikan_wali' => set_value('pendidikan_wali', $row->pendidikan_wali),
				'pekerjaan_wali' => set_value('pekerjaan_wali', $row->pekerjaan_wali),
				'penghasilan_bulanan_wali' => set_value('penghasilan_bulanan_wali', $row->penghasilan_bulanan_wali),
				'no_hp_wali' => set_value('no_hp_wali', $row->no_hp_wali),
				'no_telepon_rumah' => set_value('no_telepon_rumah', $row->no_telepon_rumah),
				'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
				'email' => set_value('email', $row->email),
				'hobi' => set_value('hobi', $row->hobi),
				'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
				'berat_badan' => set_value('berat_badan', $row->berat_badan),
				'lingkar_kepala' => set_value('lingkar_kepala', $row->lingkar_kepala),
				'id_jarak' => set_value('id_jarak', $row->id_jarak),
				'waktu_tempuh' => set_value('waktu_tempuh', $row->waktu_tempuh),
				'jumlah_saudara_kandung' => set_value('jumlah_saudara_kandung', $row->jumlah_saudara_kandung),
				'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
				'pilihan_dua' => set_value('pilihan_dua', $row->pilihan_dua),
				'id_sekolah' => set_value('id_sekolah', $row->id_sekolah),
				'akreditasi' => set_value('akreditasi', $row->akreditasi),
				'no_un' => set_value('no_un', $row->no_un),
				'no_seri_ijazah' => set_value('no_seri_ijazah', $row->no_seri_ijazah),
				'no_seri_skhu' => set_value('no_seri_skhu', $row->no_seri_skhu),
				'tahun_lulus' => set_value('tahun_lulus', $row->tahun_lulus),
				'nilai_rapor' => set_value('nilai_rapor', $row->nilai_rapor),
				'nilai_usbn' => set_value('nilai_usbn', $row->nilai_usbn),
				'nilai_unbk_unkp' => set_value('nilai_unbk_unkp', $row->nilai_unbk_unkp),
				'status' => set_value('status', $row->status),
				'status_hasil' => set_value('status_hasil', $row->status_hasil),
				'status_daftar_ulang' => set_value('status_daftar_ulang', $row->status_daftar_ulang),
				// 'id_users' => set_value('id_users', $row->id_users),
				'pilihan_sekolah_lain' => set_value('pilihan_sekolah_lain', $row->pilihan_sekolah_lain),
				'catatan' => set_value('catatan', $row->catatan),
			);
	        
		    $data['title'] = 'Peserta';
		    $data['subtitle'] = '';
		    $data['crumb'] = [
		        'Dashboard' => '',
		    ];

		    $data['code_js'] = 'peserta/codejs';
		    $data['sekolah'] =$this->Sekolah_model->get_all();
		    $data['jalur'] =$this->Jalur_model->get_all();
		    $data['jarak'] =$this->Jarak_model->get_all();
		    $data['jurusan'] =$this->Jurusan_model->get_all();
		    $data['tahunpelajaran'] =$this->Tahunpelajaran_model->get_tahun_aktif();
		    $data['peserta'] = $this->Peserta_model->get_by_id($id);
		    $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		    $data['user'] = $this->ion_auth->user()->row();
	        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();  
	        $data['raporsemester'] = $this->Peserta_model->get_raporsemester($id);
			$data['pengumuman'] = $this->Pengumuman_model->get_by_raporsemester();	  
			$data['nomer'] = $this->Peserta_model->nodaftar();             

	        if ($data['formulir']->tipe=="1") {
	        	$data['page'] = 'peserta/Form_peserta_wizard';
	        } else if ($data['formulir']->tipe=="2") {
	        	$data['page'] = 'peserta/Form_peserta';
	        } else if ($data['formulir']->tipe=="3") {
	        	$data['page'] = 'peserta/Form_peserta_general';
	        }	
	    	$this->load->view('template/backend', $data);
	    } else {
	        $this->session->set_flashdata('message', 'Data tidak ditemukan');
	        redirect(site_url('dashboard'));
	    }  
    }

    public function update_action()
    {
        $this->_rules_update();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
				// 'no_pendaftaran' => $this->input->post('no_pendaftaran',TRUE),
        		// 'tanggal_daftar' => date('Y-m-d'),
				// 'id_tahun' => $this->input->post('id_tahun',TRUE),
				'id_jalur' => $this->input->post('id_jalur',TRUE),
				'nama_peserta' => $this->input->post('nama_peserta',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'nisn' => $this->input->post('nisn',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'no_kk' => $this->input->post('no_kk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        		'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir',TRUE))),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir',TRUE),
				'agama' => $this->input->post('agama',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'rw' => $this->input->post('rw',TRUE),
				'nama_dusun' => $this->input->post('nama_dusun',TRUE),
				'nama_kelurahan' => $this->input->post('nama_kelurahan',TRUE),
				'kecamatan' => $this->input->post('kecamatan',TRUE),
				'kabupaten' => $this->input->post('kabupaten',TRUE),
				'provinsi' => $this->input->post('provinsi',TRUE),
				'kode_pos' => $this->input->post('kode_pos',TRUE),
				'latitude' => $this->input->post('latitude',TRUE),
				'longitude' => $this->input->post('longitude',TRUE),
				'tempat_tinggal' => $this->input->post('tempat_tinggal',TRUE),
				'moda_transportasi' => $this->input->post('moda_transportasi',TRUE),
				'no_kks' => $this->input->post('no_kks',TRUE),
				'anak_ke' => $this->input->post('anak_ke',TRUE),
				'penerima_kps_pkh' => $this->input->post('penerima_kps_pkh',TRUE),
				'no_kps_pkh' => $this->input->post('no_kps_pkh',TRUE),
				'penerima_kip' => $this->input->post('penerima_kip',TRUE),
				'no_kip' => $this->input->post('no_kip',TRUE),
				'nama_tertera_di_kip' => $this->input->post('nama_tertera_di_kip',TRUE),
				'terima_fisik_kartu_kip' => $this->input->post('terima_fisik_kartu_kip',TRUE),
				'nama_ayah' => $this->input->post('nama_ayah',TRUE),
				'nik_ayah' => $this->input->post('nik_ayah',TRUE),
				'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah',TRUE),
        		'tanggal_lahir_ayah' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ayah',TRUE))),				
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah',TRUE),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah',TRUE),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah',TRUE),
				'no_hp_ayah' => $this->input->post('no_hp_ayah',TRUE),
				'nama_ibu' => $this->input->post('nama_ibu',TRUE),
				'nik_ibu' => $this->input->post('nik_ibu',TRUE),
				'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu',TRUE),
        		'tanggal_lahir_ibu' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_ibu',TRUE))),					
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu',TRUE),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu',TRUE),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu',TRUE),
				'no_hp_ibu' => $this->input->post('no_hp_ibu',TRUE),
				'nama_wali' => $this->input->post('nama_wali',TRUE),
				'nik_wali' => $this->input->post('nik_wali',TRUE),
				'tempat_lahir_wali' => $this->input->post('tempat_lahir_wali',TRUE),
        		'tanggal_lahir_wali' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir_wali',TRUE))),					
				'pendidikan_wali' => $this->input->post('pendidikan_wali',TRUE),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali',TRUE),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali',TRUE),
				'no_hp_wali' => $this->input->post('no_hp_wali',TRUE),
				'no_telepon_rumah' => $this->input->post('no_telepon_rumah',TRUE),
				'nomor_hp' => $this->input->post('nomor_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'hobi' => $this->input->post('hobi',TRUE),
				'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
				'berat_badan' => $this->input->post('berat_badan',TRUE),
				'lingkar_kepala' => $this->input->post('lingkar_kepala',TRUE),
				'id_jarak' => $this->input->post('id_jarak',TRUE),
				'waktu_tempuh' => $this->input->post('waktu_tempuh',TRUE),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung',TRUE),
				'id_jurusan' => $this->input->post('id_jurusan',TRUE),
				'pilihan_dua' => $this->input->post('pilihan_dua',TRUE),
				'id_sekolah' => $this->input->post('id_sekolah',TRUE),
				'akreditasi' => $this->input->post('akreditasi',TRUE),
				'no_un' => $this->input->post('no_un',TRUE),
				'no_seri_ijazah' => $this->input->post('no_seri_ijazah',TRUE),
				'no_seri_skhu' => $this->input->post('no_seri_skhu',TRUE),
				'tahun_lulus' => $this->input->post('tahun_lulus',TRUE),
				'nilai_rapor' => $this->input->post('nilai_rapor',TRUE),
				'nilai_usbn' => $this->input->post('nilai_usbn',TRUE),
				'nilai_unbk_unkp' => $this->input->post('nilai_unbk_unkp',TRUE),
				'status' => $this->input->post('status',TRUE),
				'status_hasil' => $this->input->post('status_hasil',TRUE),
				'status_daftar_ulang' => $this->input->post('status_daftar_ulang',TRUE),
				'pilihan_sekolah_lain' => $this->input->post('pilihan_sekolah_lain',TRUE),
				'catatan' => $this->input->post('catatan',TRUE),
			);
            
            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);

            $id=$this->input->post('id_peserta');
			$cek=$data['raporsemester'] = $this->Peserta_model->get_raporsemester($id);

		    $formulir =  $this->Formulir_model->get_by_id_1(); 
		    if ($formulir->nilai_raporsemester=="Ya") {     
				if ($cek){
					$this->Peserta_model->update_raporsemester();			
				}
			}	
            
            $this->session->set_flashdata('message', 'Data berhasil diubah');
			// kirim pesan WA ........................................................
			$nama_peserta=$data['nama_peserta'];
		    $phone=$data['nomor_hp'];
		    $msg="Selamat ".$nama_peserta." formulir berhasil diperbaharui, segera cetak ulang bukti pendaftaran anda.";
		    $this->Peserta_model->kirimpesan($phone,$msg);
			// .......................................................................
            helper_log("edit", "Update data peserta ".$data['nama_peserta']);             
            redirect(site_url('dashboard'));
        }
    }	

    public function _rules()
    {
    	$pengaturan = $this->Pengaturan_model->get_by_id_1();

		$this->form_validation->set_rules('no_pendaftaran', 'no pendaftaran', 'trim');
		$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim');
		$this->form_validation->set_rules('id_tahun', 'tahun', 'trim');
		$this->form_validation->set_rules('id_jalur', 'jalur', 'trim|required');
		$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		if ($pengaturan->jenjang=="TK/PAUD" || $pengaturan->jenjang=="SD/MI") {
		$this->form_validation->set_rules('nisn', 'nisn', 'trim|numeric|exact_length[10]');		
		} else {
		$this->form_validation->set_rules('nisn', 'nisn', 'trim|required|numeric|exact_length[10]|is_unique[peserta.nisn]',
        array(
                'is_unique'     => 'NISN Peserta sudah terdaftar ',  
                'required' => 'NISN tidak boleh kosong'              
        ));
		}
		$this->form_validation->set_rules('nik', 'nik', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('no_kk', 'no_kk', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('no_registrasi_akta_lahir', 'no registrasi akta lahir', 'trim');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus', 'berkebutuhan khusus', 'trim');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'rt', 'trim|numeric');
		$this->form_validation->set_rules('rw', 'rw', 'trim|numeric');
		$this->form_validation->set_rules('nama_dusun', 'nama dusun', 'trim');
		$this->form_validation->set_rules('nama_kelurahan', 'nama kelurahan', 'trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim');
		$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');
		$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|numeric');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim');
		$this->form_validation->set_rules('tempat_tinggal', 'tempat tinggal', 'trim');
		$this->form_validation->set_rules('moda_transportasi', 'moda transportasi', 'trim');
		$this->form_validation->set_rules('no_kks', 'no kks', 'trim|exact_length[6]');
		$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|numeric');
		$this->form_validation->set_rules('penerima_kps_pkh', 'penerima kps pkh', 'trim');
		$this->form_validation->set_rules('no_kps_pkh', 'no kps pkh', 'trim');
		$this->form_validation->set_rules('penerima_kip', 'penerima kip', 'trim');
		$this->form_validation->set_rules('no_kip', 'no kip', 'trim');
		$this->form_validation->set_rules('nama_tertera_di_kip', 'nama tertera di kip', 'trim');
		$this->form_validation->set_rules('terima_fisik_kartu_kip', 'terima fisik kartu kip', 'trim');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
		$this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_ayah', 'tempat lahir ayah', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_ayah', 'tanggal lahir ayah', 'trim');
		$this->form_validation->set_rules('pendidikan_ayah', 'pendidikan ayah', 'trim');
		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ayah', 'penghasilan bulanan ayah', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ayah', 'berkebutuhan khusus ayah', 'trim');
		$this->form_validation->set_rules('no_hp_ayah', 'nomor hp ayah', 'trim|numeric');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
		$this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_ibu', 'tempat lahir ibu', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_ibu', 'tanggal lahir ibu', 'trim');
		$this->form_validation->set_rules('pendidikan_ibu', 'pendidikan ibu', 'trim');
		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ibu', 'penghasilan bulanan ibu', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ibu', 'berkebutuhan khusus ibu', 'trim');
		$this->form_validation->set_rules('no_hp_ibu', 'nomor hp ibu', 'trim|numeric');
		$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim');
		$this->form_validation->set_rules('nik_wali', 'nik wali', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_wali', 'tempat lahir wali', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_wali', 'tanggal lahir wali', 'trim');
		$this->form_validation->set_rules('pendidikan_wali', 'pendidikan wali', 'trim');
		$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan wali', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_wali', 'penghasilan bulanan wali', 'trim');
		$this->form_validation->set_rules('no_hp_wali', 'nomor hp wali', 'trim|numeric');
		$this->form_validation->set_rules('no_telepon_rumah', 'no telepon rumah', 'trim|numeric');
		$this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email');
		$this->form_validation->set_rules('hobi', 'hobi', 'trim');
		$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|numeric');
		$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|numeric');
		$this->form_validation->set_rules('lingkar_kepala', 'lingkar_kepala', 'trim|numeric');
		$this->form_validation->set_rules('id_jarak', 'jarak', 'trim|required');
		$this->form_validation->set_rules('waktu_tempuh', 'waktu_tempuh', 'trim');
		$this->form_validation->set_rules('jumlah_saudara_kandung', 'jumlah saudara kandung', 'trim|numeric');
		$this->form_validation->set_rules('id_jurusan', 'jurusan pilihan satu', 'trim');
		$this->form_validation->set_rules('pilihan_dua', 'jurusan pilihan dua', 'trim');
		$this->form_validation->set_rules('id_sekolah', 'sekolah', 'trim|required');
		$this->form_validation->set_rules('akreditasi', 'akreditasi', 'trim');
		$this->form_validation->set_rules('no_un', 'no peserta un', 'trim');
		$this->form_validation->set_rules('no_seri_ijazah', 'no seri ijazah', 'trim');
		$this->form_validation->set_rules('no_seri_skhu', 'no seri skhu', 'trim');
		$this->form_validation->set_rules('tahun_lulus', 'tahun lulus', 'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('nilai_rapor', 'nilai rapor', 'trim|numeric');
		$this->form_validation->set_rules('nilai_usbn', 'nilai us', 'trim|numeric');
		$this->form_validation->set_rules('nilai_unbk_unkp', 'nilai un', 'trim|numeric');
		$this->form_validation->set_rules('status', 'status', 'trim');
		$this->form_validation->set_rules('status_hasil', 'status hasil', 'trim');
		$this->form_validation->set_rules('status_daftar_ulang', 'status daftar ulang', 'trim');
		$this->form_validation->set_rules('id_users', 'id users', 'trim');
		$this->form_validation->set_rules('pilihan_sekolah_lain', 'pilihan sekolah lain', 'trim');

		$this->form_validation->set_rules('satu[]', 'satu', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan nilai hanya angka. '             
        ));
		$this->form_validation->set_rules('dua[]', 'dua', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan nilai hanya angka. '            
        ));
		$this->form_validation->set_rules('tiga[]', 'tiga', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan nilai hanya angka. '            
        ));
		$this->form_validation->set_rules('empat[]', 'empat', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan nilai hanya angka. '           
        ));
		$this->form_validation->set_rules('lima[]', 'lima', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan nilai hanya angka. '            
        ));;

		$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_update()
    {
		$this->form_validation->set_rules('no_pendaftaran', 'no pendaftaran', 'trim');
		$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim');
		$this->form_validation->set_rules('id_tahun', 'tahun', 'trim');
		$this->form_validation->set_rules('id_jalur', 'jalur', 'trim|required');
		$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('no_kk', 'no_kk', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('no_registrasi_akta_lahir', 'no registrasi akta lahir', 'trim');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus', 'berkebutuhan khusus', 'trim');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'rt', 'trim|numeric');
		$this->form_validation->set_rules('rw', 'rw', 'trim|numeric');
		$this->form_validation->set_rules('nama_dusun', 'nama dusun', 'trim');
		$this->form_validation->set_rules('nama_kelurahan', 'nama kelurahan', 'trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim');
		$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');
		$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|numeric');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim');
		$this->form_validation->set_rules('tempat_tinggal', 'tempat tinggal', 'trim');
		$this->form_validation->set_rules('moda_transportasi', 'moda transportasi', 'trim');
		$this->form_validation->set_rules('no_kks', 'no kks', 'trim|exact_length[6]');
		$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|numeric');
		$this->form_validation->set_rules('penerima_kps_pkh', 'penerima kps pkh', 'trim');
		$this->form_validation->set_rules('no_kps_pkh', 'no kps pkh', 'trim');
		$this->form_validation->set_rules('penerima_kip', 'penerima kip', 'trim');
		$this->form_validation->set_rules('no_kip', 'no kip', 'trim');
		$this->form_validation->set_rules('nama_tertera_di_kip', 'nama tertera di kip', 'trim');
		$this->form_validation->set_rules('terima_fisik_kartu_kip', 'terima fisik kartu kip', 'trim');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
		$this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_ayah', 'tempat lahir ayah', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_ayah', 'tanggal lahir ayah', 'trim');
		$this->form_validation->set_rules('pendidikan_ayah', 'pendidikan ayah', 'trim');
		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ayah', 'penghasilan bulanan ayah', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ayah', 'berkebutuhan khusus ayah', 'trim');
		$this->form_validation->set_rules('no_hp_ayah', 'no hp ayah', 'trim|numeric');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
		$this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_ibu', 'tempat lahir ibu', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_ibu', 'tanggal lahir ibu', 'trim');
		$this->form_validation->set_rules('pendidikan_ibu', 'pendidikan ibu', 'trim');
		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ibu', 'penghasilan bulanan ibu', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ibu', 'berkebutuhan khusus ibu', 'trim');
		$this->form_validation->set_rules('no_hp_ibu', 'no hp ibu', 'trim|numeric');
		$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim');
		$this->form_validation->set_rules('nik_wali', 'nik wali', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir_wali', 'tempat lahir wali', 'trim');
		$this->form_validation->set_rules('tanggal_lahir_wali', 'tanggal lahir wali', 'trim');
		$this->form_validation->set_rules('pendidikan_wali', 'pendidikan wali', 'trim');
		$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan wali', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_wali', 'penghasilan bulanan wali', 'trim');
		$this->form_validation->set_rules('no_hp_wali', 'no hp wali', 'trim|numeric');
		$this->form_validation->set_rules('no_telepon_rumah', 'no telepon rumah', 'trim|numeric');
		$this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email');
		$this->form_validation->set_rules('hobi', 'hobi', 'trim');
		$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|numeric');
		$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|numeric');
		$this->form_validation->set_rules('lingkar_kepala', 'lingkar_kepala', 'trim|numeric');
		$this->form_validation->set_rules('id_jarak', 'jarak', 'trim|required');
		$this->form_validation->set_rules('waktu_tempuh', 'waktu_tempuh', 'trim');
		$this->form_validation->set_rules('jumlah_saudara_kandung', 'jumlah saudara kandung', 'trim|numeric');
		$this->form_validation->set_rules('id_jurusan', 'jurusan pilihan satu', 'trim');
		$this->form_validation->set_rules('pilihan_dua', 'jurusan pilihan dua', 'trim');
		$this->form_validation->set_rules('id_sekolah', 'sekolah', 'trim|required');
		$this->form_validation->set_rules('akreditasi', 'akreditasi', 'trim');
		$this->form_validation->set_rules('no_un', 'no peserta un', 'trim');
		$this->form_validation->set_rules('no_seri_ijazah', 'no seri ijazah', 'trim');
		$this->form_validation->set_rules('no_seri_skhu', 'no seri skhu', 'trim');
		$this->form_validation->set_rules('tahun_lulus', 'tahun lulus', 'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('nilai_rapor', 'nilai rapor', 'trim|numeric');
		$this->form_validation->set_rules('nilai_usbn', 'nilai us', 'trim|numeric');
		$this->form_validation->set_rules('nilai_unbk_unkp', 'nilai un', 'trim|numeric');
		$this->form_validation->set_rules('status', 'status', 'trim');
		$this->form_validation->set_rules('status_hasil', 'status hasil', 'trim');
		$this->form_validation->set_rules('status_daftar_ulang', 'status daftar ulang', 'trim');
		$this->form_validation->set_rules('id_users', 'id users', 'trim');
		$this->form_validation->set_rules('pilihan_sekolah_lain', 'pilihan sekolah lain', 'trim');

		$this->form_validation->set_rules('satu[]', 'satu', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan perubahan nilai hanya angka. '             
        ));
		$this->form_validation->set_rules('dua[]', 'dua', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan perubahan nilai hanya angka. '            
        ));
		$this->form_validation->set_rules('tiga[]', 'tiga', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan perubahan nilai hanya angka. '            
        ));
		$this->form_validation->set_rules('empat[]', 'empat', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan perubahan nilai hanya angka. '           
        ));
		$this->form_validation->set_rules('lima[]', 'lima', 'trim|numeric',
        array(
                'numeric'  => 'Pastikan perubahan nilai hanya angka. '            
        ));;

		$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }    

    public function formwawancara()
    {
        $data = array(
            'wawancara' => $this->Wawancara_model->get_all(),
            'start' => 0
        );        

    	$data['title'] = 'Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else {
        	$id = $data['nomer']->id_peserta; 
	        $data['code_js'] = 'wawancara/codejs';
	        $data['user'] = $this->ion_auth->user()->row();  
	        $data['peserta'] =$this->Peserta_model->get_all(); 
		    $data['nomer'] = $this->Peserta_model->nodaftar(); 	 
		    $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		    $data['jawaban'] = $this->Peserta_model->jawaban($id);
		    $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirW();	        
	        // $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
	                       	             
	       	$data['page'] = 'wawancara/Form_wawancara';	
	        $this->load->view('template/backend', $data);
	    }    
    } 

    public function add_jawaban() 
    { 	
		$j = $this->input->post('id_wawancara',TRUE);
		$result = array();
		foreach ($j AS $key => $val)
		{
			$result[] = array(
				"id_peserta" => $_POST['id_peserta'][$key],		
				"id_wawancara" => $_POST['id_wawancara'][$key],							
				"jawaban" => $_POST['jawaban'][$key]
			);
		}            
		    
		$this->db->insert_batch('jawaban_wawancara', $result); 
	    $this->session->set_flashdata('message', 'Data Wawancara berhasil disimpan');
		// kirim pesan WA ........................................................
		$data['peserta'] = $this->Peserta_model->nodaftar();
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg="Selamat ".$nama_peserta." formulir wawancara berhasil disimpan. Selanjutnya cetak bukti wawancara anda.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................	    
	    helper_log("add", "Menambah data wawancara");	                    
	    redirect(site_url('member/formwawancara'));
    }     

  	public function printwawancara()
  	{
    	$data['nomer'] = $this->Peserta_model->nodaftar(); 
    	$id = $data['nomer']->id_peserta;  		

        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $id_peserta=$id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta); 
        $data['tp'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirW();   
        $data['jawaban'] = $this->Peserta_model->jawaban($id);
	    $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		
		// kirim pesan WA ........................................................
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg=$nama_peserta." formulir wawancara silahkan dicetak sebagai bukti telah mengisi wawancara.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
        
	    // kirim formulir ke email .....................................................
		if ($data['formulir']->email == 'Ya') {    
		 	$data['mailer'] = $this->Mail_model->get_by_id_1();

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// Server settings
			$mail->isSMTP();
			$mail->Host     = $data['mailer']->host;
			$mail->SMTPAuth = true;
			$mail->Username = $data['mailer']->username; // user email anda
			$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
			$mail->SMTPSecure = $data['mailer']->smtpsecure;
			$mail->Port     = $data['mailer']->port;

			// Recipients
			$mail->setFrom($data['mailer']->username, 'admin ppdb');
			$mail->addReplyTo($data['mailer']->username, '');			// user email anda
			$mail->addAddress($data['peserta']->email);                 // email tujuan pengiriman email
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			$mail->addAttachment('assets/uploads/files/wawancara/'.$data['peserta']->no_pendaftaran.'.pdf', 'formulir wawancara.pdf');    // Optional name

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'formulir wawancara'; //subject email
			$mailContent = "Berikut ini adalah formulir wawancara Anda.</p>
			<p>Silahkan dicetak sebagai bukti telah mengisi wawancara.</p>"; // isi email
			$mail->Body = $mailContent;
			
			// email send
			$mail->send();
		}	
		// .......................................................................

        helper_log("print", "Cetak bukti wawancara ".$nama_peserta);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator); 		
		$html = $this->load->view('wawancara/Print_wawancara', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('form wawancara '.$data['peserta']->nama_peserta.'.pdf','I');

		$mpdf1 = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf1->SetWatermarkText('VALID');
        $mpdf1->showWatermarkText = true;
        $mpdf1->SetSubject($subject.' v.'.$ver);  
        $mpdf1->SetAuthor($creator);
        $mpdf1->SetCreator($creator); 		
		$html1 = $this->load->view('wawancara/Print_wawancara', $data,true);
		$mpdf1->WriteHTML($html1);		
		$mpdf1->Output('assets/uploads/files/wawancara/'.$data['peserta']->no_pendaftaran.'.pdf','F');			  
    }     

  	public function printformulir()
  	{
  		$data['nomer'] = $this->Peserta_model->nodaftar(); 
    	$id = $data['nomer']->id_peserta;    		
  		
        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $id_peserta=$id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta); 
    	$data['berkasall']=$this->Berkas_model->get_id($id);        
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirPD();
    	$data['jadwaltes'] = $this->Pengumuman_model->get_by_kartu();                
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		$data['raporsemester'] = $this->Peserta_model->get_raporsemester($id);	        
		
		// kirim pesan WA ........................................................
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg=$nama_peserta." formulir pendaftaran silahkan dicetak sebagai bukti telah mengisi pendaftaran.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
	    
	    // kirim formulir ke email .....................................................
		if ($data['formulir']->email == 'Ya') {    
		 	$data['mailer'] = $this->Mail_model->get_by_id_1();

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// Server settings
			$mail->isSMTP();
			$mail->Host     = $data['mailer']->host;
			$mail->SMTPAuth = true;
			$mail->Username = $data['mailer']->username; // user email anda
			$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
			$mail->SMTPSecure = $data['mailer']->smtpsecure;
			$mail->Port     = $data['mailer']->port;

			// Recipients
			$mail->setFrom($data['mailer']->username, 'admin ppdb');
			$mail->addReplyTo($data['mailer']->username, '');			// user email anda
			$mail->addAddress($data['peserta']->email);                 // email tujuan pengiriman email
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			$mail->addAttachment('assets/uploads/files/pendaftaran/'.$data['peserta']->no_pendaftaran.'.pdf', 'formulir pendaftaran.pdf');    // Optional name

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'formulir pendaftaran'; //subject email
			$mailContent = "Berikut ini adalah formulir pendaftaran Anda.</p>
			<p>Silahkan dicetak sebagai bukti telah mengisi pendaftaran.</p>"; // isi email
			$mail->Body = $mailContent;
			
			// email send
			$mail->send();
		}	
		// .......................................................................

        helper_log("print", "Cetak bukti pendaftaran ".$nama_peserta);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');        
        
		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator); 		
		$html = $this->load->view('peserta/Print_formulir', $data,true);
		$mpdf->WriteHTML($html);
		// Tambahkan halaman kedua
		if ($data['formulir']->kartu_tes=='Ya' and $data['peserta']->status=='Sudah diverifikasi') {
			$mpdf->AddPage();
			$html2 = $this->load->view('peserta/Print_kartu', $data,true);
			$mpdf->WriteHTML($html2);		
		}		
		$mpdf->Output('form pendaftaran '.$data['peserta']->nama_peserta.'.pdf','I');

		$mpdf1 = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf1->SetWatermarkText('VALID');
        $mpdf1->showWatermarkText = true;
        $mpdf1->SetSubject($subject.' v.'.$ver);  
        $mpdf1->SetAuthor($creator);
        $mpdf1->SetCreator($creator); 		
		$html1 = $this->load->view('peserta/Print_formulir', $data,true);
		$mpdf1->WriteHTML($html1);
		// Tambahkan halaman kedua
		if ($data['formulir']->kartu_tes=='Ya' and $data['peserta']->status=='Sudah diverifikasi') {
			$mpdf1->AddPage();
			$html3 = $this->load->view('peserta/Print_kartu', $data,true);
			$mpdf1->WriteHTML($html3);		
		}				
		$mpdf1->Output('assets/uploads/files/pendaftaran/'.$data['peserta']->no_pendaftaran.'.pdf','F');
    } 

  	public function printDU()
  	{
  		$data['nomer'] = $this->Peserta_model->nodaftar(); 
    	$id = $data['nomer']->id_peserta;    		
  		
        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $id_peserta=$id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta);         
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirDU();                
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		$data['raporsemester'] = $this->Peserta_model->get_raporsemester($id);	    

		// kirim pesan WA ........................................................
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg=$nama_peserta." formulir daftar ulang silahkan dicetak sebagai bukti telah mengisi daftar ulang.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
        
	    // kirim formulir ke email .....................................................
		if ($data['formulir']->email == 'Ya') {    
		 	$data['mailer'] = $this->Mail_model->get_by_id_1();

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// Server settings
			$mail->isSMTP();
			$mail->Host     = $data['mailer']->host;
			$mail->SMTPAuth = true;
			$mail->Username = $data['mailer']->username; // user email anda
			$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
			$mail->SMTPSecure = $data['mailer']->smtpsecure;
			$mail->Port     = $data['mailer']->port;

			// Recipients
			$mail->setFrom($data['mailer']->username, 'admin ppdb');
			$mail->addReplyTo($data['mailer']->username, '');			// user email anda
			$mail->addAddress($data['peserta']->email);                 // email tujuan pengiriman email
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			$mail->addAttachment('assets/uploads/files/daftarulang/'.$data['peserta']->no_pendaftaran.'.pdf', 'formulir daftar ulang.pdf');    // Optional name

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'formulir daftar ulang'; //subject email
			$mailContent = "Berikut ini adalah formulir daftar ulang Anda.</p>
			<p>Silahkan dicetak sebagai bukti telah mengisi daftar ulang.</p>"; // isi email
			$mail->Body = $mailContent;
			
			// email send
			$mail->send();
		}	
		// .......................................................................

        helper_log("print", "Cetak bukti daftar ulang ".$nama_peserta);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');        
        
		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator); 		
		$html = $this->load->view('peserta/Print_formulir_du', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('form daftar ulang '.$data['peserta']->nama_peserta.'.pdf','I'); 

		$mpdf1 = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf1->SetWatermarkText('VALID');
        $mpdf1->showWatermarkText = true;
        $mpdf1->SetSubject($subject.' v.'.$ver);  
        $mpdf1->SetAuthor($creator);
        $mpdf1->SetCreator($creator); 		
		$html1 = $this->load->view('peserta/Print_formulir_du', $data,true);
		$mpdf1->WriteHTML($html1);		
		$mpdf1->Output('assets/uploads/files/daftarulang/'.$data['peserta']->no_pendaftaran.'.pdf','F');			     
    } 

  	public function printSKL()
  	{
		$data['nomer'] = $this->Peserta_model->nodaftar(); 
    	$id = $data['nomer']->id_peserta;  		
		  		
  		$data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );    

        $id_peserta = $id;              
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
        $data['pengumuman'] = $this->Pengumuman_model->get_by_skl(); 
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();        
		
		// kirim pesan WA ........................................................
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg="Surat keterangan hasil seleksi ".$nama_peserta.". Jika dinyatakan DI TERIMA silahkan cetak sebagai bukti dan segera lakukan daftar ulang sesuai ketentuan.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
        
	    // kirim formulir ke email .....................................................
		if ($data['formulir']->email == 'Ya') {    
		 	$data['mailer'] = $this->Mail_model->get_by_id_1();

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// Server settings
			$mail->isSMTP();
			$mail->Host     = $data['mailer']->host;
			$mail->SMTPAuth = true;
			$mail->Username = $data['mailer']->username; // user email anda
			$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
			$mail->SMTPSecure = $data['mailer']->smtpsecure;
			$mail->Port     = $data['mailer']->port;

			// Recipients
			$mail->setFrom($data['mailer']->username, 'admin ppdb');
			$mail->addReplyTo($data['mailer']->username, '');			// user email anda
			$mail->addAddress($data['peserta']->email);                 // email tujuan pengiriman email
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			$mail->addAttachment('assets/uploads/files/suratketerangan/'.$data['peserta']->no_pendaftaran.'.pdf', 'surat keterangan.pdf');    // Optional name

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'surat keterangan'; //subject email
			$mailContent = "Berikut ini adalah surat keterangan hasil seleksi Anda.</p>
			<p>Jika dinyatakan DI TERIMA silahkan cetak sebagai bukti dan segera lakukan daftar ulang sesuai ketentuan.</p>"; // isi email
			$mail->Body = $mailContent;
			
			// email send
			$mail->send();
		}	
		// .......................................................................

        helper_log("print", "Cetak bukti SKL ".$nama_peserta);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');        

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        // $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator);  		
		$html = $this->load->view('peserta/Print_skl', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('surat keterangan '.$data['peserta']->nama_peserta.'.pdf','I'); 

		$mpdf1 = new \Mpdf\Mpdf(['format' => 'A4']);
        // $mpdf1->SetWatermarkText('VALID');
        $mpdf1->showWatermarkText = true;
        $mpdf1->SetSubject($subject.' v.'.$ver);  
        $mpdf1->SetAuthor($creator);
        $mpdf1->SetCreator($creator);  		
		$html1 = $this->load->view('peserta/Print_skl', $data,true);
		$mpdf1->WriteHTML($html1);		
		$mpdf1->Output('assets/uploads/files/suratketerangan/'.$data['peserta']->no_pendaftaran.'.pdf','F');		       
    }          

  	public function printkartu()
  	{
  		$data['nomer'] = $this->Peserta_model->nodaftar(); 
    	$id = $data['nomer']->id_peserta;    		
  		
        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $id_peserta=$id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta);         
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['jadwaltes'] = $this->Pengumuman_model->get_by_kartu();                
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		$data['raporsemester'] = $this->Peserta_model->get_raporsemester($id);	        
		
		// kirim pesan WA ........................................................
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg=$nama_peserta." kartu peserta tes silahkan dicetak sebagai syarat mengikuti tes.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
	    
	    // kirim formulir ke email .....................................................
		if ($data['formulir']->email == 'Ya') {    
		 	$data['mailer'] = $this->Mail_model->get_by_id_1();

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// Server settings
			$mail->isSMTP();
			$mail->Host     = $data['mailer']->host;
			$mail->SMTPAuth = true;
			$mail->Username = $data['mailer']->username; // user email anda
			$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
			$mail->SMTPSecure = $data['mailer']->smtpsecure;
			$mail->Port     = $data['mailer']->port;

			// Recipients
			$mail->setFrom($data['mailer']->username, 'admin ppdb');
			$mail->addReplyTo($data['mailer']->username, '');			// user email anda
			$mail->addAddress($data['peserta']->email);                 // email tujuan pengiriman email
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// Attachments
			$mail->addAttachment('assets/uploads/files/kartutes/'.$data['peserta']->no_pendaftaran.'.pdf', 'kartu tes.pdf');    // Optional name

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'formulir pendaftaran'; //subject email
			$mailContent = "Berikut ini adalah kartu peserta tes PPDB Anda.</p>
			<p>Silahkan dicetak sebagai syarat mengikuti tes.</p>"; // isi email
			$mail->Body = $mailContent;
			
			// email send
			$mail->send();
		}	
		// .......................................................................

        helper_log("print", "Cetak kartu tes ".$nama_peserta);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');        
        
		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator);     		
		$html = $this->load->view('peserta/Print_kartu', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('kartu tes '.$data['peserta']->nama_peserta.'.pdf','I');

		$mpdf1 = new \Mpdf\Mpdf(['format' => 'Legal']);
        // $mpdf1->SetWatermarkText('VALID');
        $mpdf1->showWatermarkText = true;
        $mpdf1->SetSubject($subject.' v.'.$ver);  
        $mpdf1->SetAuthor($creator);
        $mpdf1->SetCreator($creator);     		
		$html1 = $this->load->view('peserta/Print_kartu', $data,true);
		$mpdf1->WriteHTML($html1);		
		$mpdf1->Output('assets/uploads/files/kartutes/'.$data['peserta']->no_pendaftaran.'.pdf','F');				    
    } 

    public function _rulespres()
    {
		$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
		$this->form_validation->set_rules('nama_prestasi', 'nama prestasi', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required|numeric|exact_length[4]');
		$this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');
		$this->form_validation->set_rules('id_peserta', 'nama peserta', 'trim|required');
		$this->form_validation->set_rules('id_prestasi', 'detail prestasi', 'trim|required');

		$this->form_validation->set_rules('id_prestasipeserta', 'id_prestasipeserta', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }     

// 	start multi add prestasi ---------------------------------------
    public function multiprestasi()
    {
    	$data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

    	$banyak_data = $this->input->post('banyak_data',TRUE);
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else if ($banyak_data==NULL) {
            redirect(site_url('dashboard'));
        } else {
	        $data['code_js'] = 'prestasipeserta/codejs';
	        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();         
	        $data['peserta'] =$this->Peserta_model->get_all();  
	        $data['prestasi'] =$this->Prestasi_model->get_all();
	        $data['nomer'] = $this->Peserta_model->nodaftar();       
	                  
            $data['banyak_data'] = $this->input->post('banyak_data',TRUE);
            $data['page'] = 'prestasipeserta/Multi_prestasipeserta';
	        $this->load->view('template/backend', $data);  
        }
    }

    public function add_multiprestasi() 
    { 	
		$j = $this->input->post('jenis',TRUE);
		$result = array();
		foreach ($j AS $key => $val)
		{
			$result[] = array(
				"jenis" => $_POST['jenis'][$key],
				"nama_prestasi" => $_POST['nama_prestasi'][$key],
				"tahun" => $_POST['tahun'][$key],
				"penyelenggara" => $_POST['penyelenggara'][$key],
				"id_prestasi" => $_POST['id_prestasi'][$key],
				"id_peserta" => $_POST['id_peserta'][$key]	
			);
		}            
		    
		$this->db->insert_batch('prestasipeserta', $result); 
	    $this->session->set_flashdata('message', 'Data prestasi peserta berhasil ditambahkan');
		// kirim pesan WA ........................................................
		$data['peserta'] = $this->Peserta_model->nodaftar();
        $nama_peserta=$data['peserta']->nama_peserta;
	    $phone=$data['peserta']->nomor_hp;
	    $msg="Prestasi ".$nama_peserta." berhasil ditambahkan. Selanjutnya silahkan upload bukti prestasi.";
	    $this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................	   
	    helper_log("add", "Menambah data prestasi");	                    
	    redirect(site_url('member/prestasipeserta'));
    }    
// 	end multi add prestasi ---------------------------------------

// delete prestasipeserta
    public function del_prestasipeserta($id)
    {
		$status_hasil = $this->Peserta_model->nodaftar();    
		$status = $status_hasil->status;
		if ($status=='Sudah diverifikasi') {
            $this->session->set_flashdata('message', 'Prestasi sudah diverifikasi tidak dapat dihapus');
            redirect(site_url('member/prestasipeserta'));
		} else {
	        $row = $this->Prestasipeserta_model->get_by_id($id);
	        if ($row) {
	            $this->Prestasipeserta_model->delete($id);
	            $this->session->set_flashdata('message', 'Prestasi peserta berhasil dihapus');
	            helper_log("delete", "Menghapus Jenis Prestasi ".$row->jenis);  
	            redirect(site_url('member/prestasipeserta'));
	        } else {
	            $this->session->set_flashdata('message', 'Prestasi peserta tidak ditemukan');
	            redirect(site_url('dashboard'));
	        }
	    }    			        
    }

// list prestasipeserta
    public function prestasipeserta()
    {
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
    	
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else {    	
	        $data['title'] = 'Prestasi Peserta';
	        $data['subtitle'] = '';
	        $data['crumb'] = [
	            'Dashboard' => '',
	        ];    

		    $peserta = $this->Peserta_model->nodaftar(); 
		    $id=$peserta->id_peserta;
		    $data['formulir'] =  $this->Formulir_model->get_by_id_1();
		    $data['prestasipeserta'] = $this->Prestasipeserta_model->get_id($id); 
	        $data['page'] = 'prestasipeserta/Member_prestasipeserta';
	        $this->load->view('template/backend', $data);
	    }    
    }         

// upload berkas pendukung
	public function uploadberkas()
	{
		$config['upload_path']          = './assets/uploads/attachment/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|JPG|JPEG|PNG';
		$config['max_size']             = 500;
		// $config['max_width']            = 2048;
		// $config['max_height']           = 1000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		$id_peserta = $this->input->post('id_peserta');
		$keterangan_berkas = $this->input->post('keterangan_berkas');
		$jumlah_berkas = count($_FILES['berkas']['name']);
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['berkas']['name'][$i]) || !empty($_POST['keterangan_berkas']['name'][$i]))
            {
				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();
					$data['nama_berkas'] = $uploadData['file_name'];
					$data['keterangan_berkas'] = $keterangan_berkas[$i];
					$data['tipe_berkas'] = $uploadData['file_ext'];
					$data['ukuran_berkas'] = $uploadData['file_size'];
					$data['id_peserta'] = $id_peserta[$i];
					$this->db->insert('berkas',$data);
					$this->session->set_flashdata('message', 'Berkas berhasil terupload'); 
					helper_log("add", "Upload berkas ".$data['keterangan_berkas']);  						
				}
			} 
		}
		redirect(site_url('member/berkas'));	
	}
	
// list berkas
    public function berkas()
    {
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else {    	
	        $data['title'] = 'Berkas Pendukung';
	        $data['subtitle'] = '';
	        $data['crumb'] = [
	            'Dashboard' => '',
	        ];    

		    $peserta = $this->Peserta_model->nodaftar(); 
		    $id=$peserta->id_peserta;
		    $data['berkas'] = $this->Berkas_model->get_id($id);    
	        $data['formulir'] =  $this->Formulir_model->get_by_id_1();  
	        $data['nomer'] = $this->Peserta_model->nodaftar();          		                

	        $data['page'] = 'berkas/Berkas_member';
	        $this->load->view('template/backend', $data);
	    }    
    }	 

// delete berkas
    public function del_berkas($id)
    {
		$status_hasil = $this->Peserta_model->nodaftar();    
		$status = $status_hasil->status;
		if ($status=='Sudah diverifikasi') {
            $this->session->set_flashdata('message', 'Berkas sudah diverifikasi tidak dapat dihapus');
            redirect(site_url('member/berkas'));
		} else {
	        $row = $this->Berkas_model->get_by_id($id);
	        if ($row) {
	            $this->Berkas_model->delete($id);
	            $this->session->set_flashdata('message', 'Berkas berhasil dihapus');
	            helper_log("delete", "Menghapus berkas ".$row->keterangan_berkas);  
	            redirect(site_url('member/berkas'));
	        } else {
	            $this->session->set_flashdata('message', 'Berkas tidak ditemukan');
	            redirect(site_url('dashboard'));
	        }			
		}        
    }  

// list pembayaran
    public function pembayaran()
    {	
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];    

        $data['user'] = $this->ion_auth->user()->row();
        $data['nomer'] = $this->Peserta_model->nodaftar(); 
        $data['formulir'] = $this->Formulir_model->get_by_id_1(); 
        $data['pembayaran'] = $this->Pembayaran_model->get_by_id_users();
        $data['pendaftaran'] = $this->Pembayaran_model->get_by_pendaftaran();
        $data['daftar_ulang'] = $this->Pembayaran_model->get_by_daftar_ulang(); 
        $data['biaya'] = $this->Biaya_model->get_all_wajib();  
        $data['biaya_du'] = $this->Biaya_model->get_all_wajib_du(); 
        $data['tot_biaya'] = $this->Biaya_model->get_tot_biaya();
        $data['tot_biaya_du'] = $this->Biaya_model->get_tot_biaya_du();   
        $data['tot_bayar_user'] = $this->Pembayaran_model->get_tot_bayar_user();
        //biaya per peserta
		if ($data['nomer']) {
			$id=$data['nomer']->id_peserta;
			$data['biaya_du_peserta'] = $this->Biaya_model->get_all_wajib_du_peserta($id); 
			$data['tot_biaya_du_peserta'] = $this->Biaya_model->get_tot_biaya_du_peserta($id);   			
		}       
                     		                
        $data['page'] = 'pembayaran/Pembayaran_member';
        $this->load->view('template/backend', $data);    
    }	

// konfirmasi pembayaran
    public function konfirmasi_pembayaran()
    {	
    	$rand = mt_rand(100000, 999999);
    	$no_transaksi = 'TR-'.$rand;
		$checked = $this->input->post('pembayaran',TRUE);	    	
        $data = array(
    		'no_transaksi' => $no_transaksi,
    		'id_users' => $this->input->post('id_users',TRUE),
    		'pembayaran' => implode(", ",$checked),
    		'jumlah_bayar' => $this->input->post('jumlah_bayar',TRUE),
			'tanggal_bayar' => date('Y-m-d', strtotime($this->input->post('tanggal_bayar',TRUE))),   
			'jenis_bayar' => $this->input->post('jenis_bayar',TRUE), 		
    		'status_bayar' => $this->input->post('status_bayar',TRUE),
	    );	

        $config["upload_path"] = "./assets/uploads/attachment/";
        $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
        $config['max_size'] = 500;
        $config['encrypt_name'] = true;

        $this->load->library("upload", $config);
        // upload bukti
        if ($this->upload->do_upload("bukti_bayar")) {
			$uploadData = $this->upload->data();
			$data['bukti_bayar'] = $uploadData['file_name'];   
			                   
			$this->Pembayaran_model->insert($data);	
	        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
	        helper_log("add", "Konfirmasi pembayaran ".$data['pembayaran']);        
	        redirect(site_url('member/pembayaran'));	
	    } else {
	        $this->session->set_flashdata('message', 'Upload bukti pembayaran gagal');
	        redirect(site_url('member/pembayaran'));    	
	    }    

    }	    

// delete pembayaran
    public function del_pembayaran($id)
    {
		$status_bayar = $this->Pembayaran_model->get_by_id($id);
		$status = $status_bayar->status_bayar;
		if ($status=='Sudah bayar') {
            $this->session->set_flashdata('message', 'Pembayaran sudah diverifikasi tidak dapat dihapus');
            redirect(site_url('member/pembayaran'));
		} else {
	        $row = $this->Pembayaran_model->get_by_id($id);
	        if ($row) {
	            $this->Pembayaran_model->delete($id);
	            $this->session->set_flashdata('message', 'Pembayaran berhasil dihapus');  
	            helper_log("delete", "Menghapus pembayaran ".$row->pembayaran." ".$row->full_name ); 
	            redirect(site_url('member/pembayaran'));
	        } else {
	            $this->session->set_flashdata('message', 'Pembayaran tidak ditemukan');
	            redirect(site_url('dashboard'));
	        }			
		}        
    }  

    public function tambah_sekolah()
    {
        $this->_rules_sekolah();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('npsn_sekolah').
                form_error('asal_sekolah').
                form_error('status_sekolah').
                form_error('kecamatan')
            );
            redirect(site_url('member/formcreate'));            
        } else {
        $data = array(
    		'npsn_sekolah' => $this->input->post('npsn_sekolah',TRUE),
    		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
    		'alamat_sekolah' => $this->input->post('alamat_sekolah',TRUE),
    		'kelurahan' => $this->input->post('kelurahan',TRUE),
    		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
    		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );
        
        $this->Sekolah_model->insert($data);
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        helper_log("add", "Menambah data sekolah ".$data['asal_sekolah']);        
        redirect(site_url('member/formcreate'));
        }
    } 

    public function _rules_sekolah()
    {
    	$this->form_validation->set_rules('npsn_sekolah', 'npsn sekolah', 'trim|required|numeric|exact_length[8]|is_unique[sekolah.npsn_sekolah]',
        array(
                'required'      => 'NPSN Sekolah tidak boleh kosong ',
                'numeric'       => 'NPSN Sekolah hanya angka ',
                'is_unique'     => 'Sekolah sudah terdaftar '
        ));
    	$this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }     

    public function daftarulang()
    {
		$id = $this->input->post('id_peserta');
  		
        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $status_daftar_ulang='Menunggu';

		$data_update = array(
			'status_daftar_ulang' => $status_daftar_ulang,
			'tgl_daftar_ulang' => date('Y-m-d')
		);	

		$this->Peserta_model->update_daftarulang($id,$data_update);

		$this->session->set_flashdata('message', 'Daftar Ulang berhasil');
		// kirim pesan WA ........................................................
		$nama_peserta=$data['peserta']->nama_peserta;
		$phone=$data['peserta']->nomor_hp;
		$msg="Selamat ".$nama_peserta." berhasil daftar ulang. Selanjutnya daftar ulang anda akan segera kami proses.";
		$this->Peserta_model->kirimpesan($phone,$msg);
		// .......................................................................
	    helper_log("add", "Daftar ulang ".$data['peserta']->nama_peserta);	            
		redirect(site_url('dashboard'));		
		// ................................		
	}	

    public function transactions($id)
    {
        $data = array(
            'pembayaran' => $this->Pembayaran_model->get_by_id($id),
            'start' => 0
        );    

        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();       
        helper_log("print", "Cetak bukti pembayaran ".$data['pembayaran']->full_name);

        $creator = $this->config->item('creator');
        $subject = $this->config->item('subject');
        $ver = $this->config->item('ver');

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->SetWatermarkText('VALID');
        $mpdf->showWatermarkText = true;
        $mpdf->SetSubject($subject.' v.'.$ver);  
        $mpdf->SetAuthor($creator);
        $mpdf->SetCreator($creator);           
        $html = $this->load->view('pembayaran/Print_pembayaran', $data,true);
        $mpdf->WriteHTML($html);    
        $mpdf->Output('bukti pembayaran '.$data['pembayaran']->full_name.'.pdf','I');              
    }		

}    
/* End of file Member.php */