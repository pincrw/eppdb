<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->library(array('googlemaps'));
		$this->load->model('Users_model');
        $this->load->model('Users_groups_model');
        $this->load->model('Peserta_model');
        $this->load->model('Prestasipeserta_model');
        $this->load->model('Sekolah_model');
        $this->load->model('Jalur_model');
        $this->load->model('Jarak_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Tahunpelajaran_model');
		$this->load->model('Formulir_model');  
        $this->load->model('Pengumuman_model'); 
        $this->load->model('Pengaturan_model');  
        $this->load->model('Jurusan_model');
        $this->load->model('Berkas_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Biaya_model');
        $this->load->model('Log_model'); 
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'Dashboard/codejs';
        // $data['log'] = $this->Log_model->get_log();  
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        if ($identity_column !== 'email') {        
            $data['log']=$this->Log_model->get_log_user();
        } else {    
            $data['log']=$this->Log_model->get_log_email();  
        } 
        if ($this->config->item('creator')==$this->config->item('developer') and
            $this->config->item('hp')==$this->config->item('contact') and
            $this->config->item('copy')==$this->config->item('copyright')) 
        {                
        $data['peserta'] = $this->Peserta_model->get_all();
        $data['countjurusan'] = $this->Peserta_model->get_countjurusan();      
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();  
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();        
        $data['nomer'] = $this->Peserta_model->nodaftar(); 
        $data['tgl_ppdb'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
         
        if ($data['nomer']) {   
            $id=$data['nomer']->id_peserta;
            $data['berkas'] = $this->Berkas_model->get_id($id);        
        }

        $data['group']=$this->Users_groups_model->get_id();
        $data['infomember']=$this->Pengumuman_model->get_by_member();
        $data['contact'] = $this->Users_model->get_panitia();        

        //total peserta tahun aktif
        $data['totalpeserta'] =  $this->Peserta_model->hitungDataPeserta();
        $data['totaljalur1'] =  $this->Peserta_model->hitungDataJalur1();
        $data['totaljalur2'] =  $this->Peserta_model->hitungDataJalur2();
        $data['totaljalur3'] =  $this->Peserta_model->hitungDataJalur3();  
        $data['totaljalur4'] =  $this->Peserta_model->hitungDataJalur4();  
        $data['totaldiverifikasi'] =  $this->Peserta_model->hitungDataVerifikasi();
        $data['totalbaru'] =  $this->Peserta_model->hitungDataBaru();
        $data['totalberkaskurang'] =  $this->Peserta_model->hitungDataKurang();
        $data['totalditerima'] =  $this->Peserta_model->get_counthasilditerima();
        $data['totaltdkditerima'] =  $this->Peserta_model->get_counthasiltdkditerima();
        $data['totallaki'] =  $this->Peserta_model->get_countlaki();
        $data['totalperempuan'] =  $this->Peserta_model->get_countperempuan();
        $data['totallakiditerima'] =  $this->Peserta_model->get_countlakiditerima();
        $data['totalperempuanditerima'] =  $this->Peserta_model->get_countperempuanditerima();
        $data['totallakitdkditerima'] =  $this->Peserta_model->get_countlakitdkditerima();
        $data['totalperempuantdkditerima'] =  $this->Peserta_model->get_countperempuantdkditerima();        

        $data['jalur'] =  $this->Jalur_model->get_all();
        $data['status_bayar'] =  $this->Pembayaran_model->get_countbayar();
        $data['status_pending'] =  $this->Pembayaran_model->get_countpending();
        $data['pembayaran'] =  $this->Pembayaran_model->get_by_id_user();
        $data['infopembayaran']=$this->Pengumuman_model->get_by_pembayaran();
        $data['biaya'] = $this->Biaya_model->get_all_wajib();
        $data['biaya_du'] = $this->Biaya_model->get_all_wajib_du();
        $data['tot_biaya'] = $this->Biaya_model->get_tot_biaya();
        $data['tot_biaya_du'] = $this->Biaya_model->get_tot_biaya_du(); 
        $data['tot_bayar'] = $this->Pembayaran_model->get_tot_bayar();
        $data['daftar_ulang'] = $this->Pembayaran_model->get_by_user_du();
        $data['countdu'] = $this->Pembayaran_model->get_countdu();
        $data['bayar'] = $this->Pembayaran_model->get_all_();
        // pendaftaran
        $data['bayar_pendaftaran'] = $this->Pembayaran_model->get_all_pendaftaran();
        $data['total_pendaftaran'] = $this->Pembayaran_model->get_tot_pendaftaran();
        $data['total_du'] = $this->Pembayaran_model->get_tot_du();
        
        //kuota peserta tahun aktif
        $data['kuotax'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        if (empty($data['kuotax'])) {
          $data['kuota']='0';
        } else {
          $data['kuota']=$data['kuotax']->kuota;
        }

        $data['jalur1'] =  $this->Jalur_model->KuotaJalur1();
        $data['jalur2'] =  $this->Jalur_model->KuotaJalur2();
        $data['jalur3'] =  $this->Jalur_model->KuotaJalur3();    
        $data['jalur4'] =  $this->Jalur_model->KuotaJalur4();
       
        $data['KuotaJalur1']=$data['kuota']*$data['jalur1']->persentase/100;
        $data['KuotaJalur2']=$data['kuota']*$data['jalur2']->persentase/100;
        $data['KuotaJalur3']=$data['kuota']*$data['jalur3']->persentase/100;
        $data['KuotaJalur4']=$data['kuota']*$data['jalur4']->persentase/100;

        // progress bar tahun aktif
        // bar jalur 1
        if (empty($data['KuotaJalur1'])) {   
            $data['barjalur1']='0';  
        } else {
            $data['barjalur1']=($data['totaljalur1']!=0)?($data['totaljalur1']/$data['KuotaJalur1'])*100:0;  
        }            
        // bar jalur 2
        if (empty($data['KuotaJalur2'])) {        
            $data['barjalur2']='0'; 
        } else {
            $data['barjalur2']=($data['totaljalur2']!=0)?($data['totaljalur2']/$data['KuotaJalur2'])*100:0; 
        }
        // bar jalur 3
        if (empty($data['KuotaJalur3'])) { 
            $data['barjalur3']='0';
        } else {
            $data['barjalur3']=($data['totaljalur3']!=0)?($data['totaljalur3']/$data['KuotaJalur3'])*100:0; 
        }            
        // bar jalur 4  
        if (empty($data['KuotaJalur4'])) {      
            $data['barjalur4']='0';
        } else {    
            $data['barjalur4']=($data['totaljalur4']!=0)?($data['totaljalur4']/$data['KuotaJalur4'])*100:0;
        }
        }    
        
        $data['page'] = 'Dashboard/Index';
    	$this->load->view('template/backend', $data);
	}    

    // leatlet map json
    public function peserta_json()
    {
        $data = $this->Peserta_model->get_all();
        echo json_encode($data);
    }

}