<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->model('Peserta_model');
        $this->load->model('Pengaturan_model');  
	}
	
	public function index()
	{
		$data['title'] = 'Statistik';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Statistik' => '',
        ];
        
        // $data['code_js'] = 'Statistik/codejs'; 
        $data['chart_jk']=$this->Peserta_model->get_chart_jk();
        $data['chart_agama']=$this->Peserta_model->get_chart_agama(); 
        $data['chart_sekolah']=$this->Peserta_model->get_chart_sekolah();
        $data['chart_hasil']=$this->Peserta_model->get_chart_hasil();
        $data['chart_pendaftar']=$this->Peserta_model->get_chart_pendaftar();

        $data['count_jk']=$this->Peserta_model->get_countjk();
        $data['count_agama']=$this->Peserta_model->get_countagama();
        $data['count_sekolah']=$this->Peserta_model->get_countsekolah();
        $data['count_hasil']=$this->Peserta_model->get_counthasil();
        $data['count_hasilperjalur']=$this->Peserta_model->get_counthasilperjalur();
        $data['count_hasilperjk']=$this->Peserta_model->get_counthasilperjk();
        $data['count_hasilperagama']=$this->Peserta_model->get_counthasilperagama();        
        $data['count_pendaftar']=$this->Peserta_model->get_countpendaftar();

        $data['page'] = 'statistik/Statistik_list';
    	$this->load->view('template/backend', $data);
	}

}