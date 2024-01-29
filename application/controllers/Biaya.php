<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Biaya_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->model('Tahunpelajaran_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Biaya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Biaya' => '',
        ];

        $data['code_js'] = 'biaya/codejs';
        $data['page'] = 'biaya/Biaya_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Biaya_model->json();
    }

    public function read($id)
    {
        $row = $this->Biaya_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_biaya' => $row->id_biaya,
        		'nama_biaya' => $row->nama_biaya,
        		'jumlah_biaya' => $row->jumlah_biaya,
                'jenis_biaya' => $row->jenis_biaya,                
        		'status_biaya' => $row->status_biaya,
                'tahun_pelajaran' => $row->tahun_pelajaran,
                'ket' => $row->ket,
	        );

        $data['title'] = 'Biaya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'biaya/Biaya_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('biaya'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('biaya/create_action'),
    	    'id_biaya' => set_value('id_biaya'),
    	    'nama_biaya' => set_value('nama_biaya'),
    	    'jumlah_biaya' => set_value('jumlah_biaya'),
            'jenis_biaya' => set_value('jenis_biaya'),
    	    'status_biaya' => set_value('status_biaya'),
            'id_tahun' => set_value('id_tahun'),
    	);

        $data['title'] = 'Biaya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'biaya/codejs';
        $data['tahun'] = $this->Tahunpelajaran_model->get_tahun_on();

        $data['page'] = 'biaya/Biaya_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nama_biaya' => $this->input->post('nama_biaya',TRUE),
        		'jumlah_biaya' => $this->input->post('jumlah_biaya',TRUE),
                'jenis_biaya' => $this->input->post('jenis_biaya',TRUE),
        		'status_biaya' => $this->input->post('status_biaya',TRUE),
                'id_tahun' => $this->input->post('id_tahun',TRUE),
	        );

            $this->Biaya_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            redirect(site_url('biaya'));
        }
    }

    public function update($id)
    {
        $row = $this->Biaya_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('biaya/update_action'),
        		'id_biaya' => set_value('id_biaya', $row->id_biaya),
        		'nama_biaya' => set_value('nama_biaya', $row->nama_biaya),
        		'jumlah_biaya' => set_value('jumlah_biaya', $row->jumlah_biaya),
                'jenis_biaya' => set_value('jenis_biaya', $row->jenis_biaya),
        		'status_biaya' => set_value('status_biaya', $row->status_biaya),
                'id_tahun' => set_value('id_tahun', $row->id_tahun),
                'tahun_pelajaran' => set_value('tahun_pelajaran', $row->tahun_pelajaran),
                'ket' => set_value('ket', $row->ket),
    	    );
        
        $data['title'] = 'Biaya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'biaya/codejs';
        $data['tahun'] = $this->Tahunpelajaran_model->get_tahun_on();

        $data['page'] = 'biaya/Biaya_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('biaya'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_biaya', TRUE));
        } else {
            $data = array(
        		'nama_biaya' => $this->input->post('nama_biaya',TRUE),
        		'jumlah_biaya' => $this->input->post('jumlah_biaya',TRUE),
                'jenis_biaya' => $this->input->post('jenis_biaya',TRUE),
        		'status_biaya' => $this->input->post('status_biaya',TRUE),
                'id_tahun' => $this->input->post('id_tahun',TRUE),                   
    	    );
                 
            $this->Biaya_model->update($this->input->post('id_biaya', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            redirect(site_url('biaya'));
        }
    }

    public function delete($id)
    {
        $row = $this->Biaya_model->get_by_id($id);

        if ($row) {
            $this->Biaya_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            redirect(site_url('biaya'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('biaya'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Biaya_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nama_biaya', 'nama biaya', 'trim|required');
    	$this->form_validation->set_rules('jumlah_biaya', 'jumlah biaya', 'trim');
        $this->form_validation->set_rules('jenis_biaya', 'jenis biaya', 'trim|required');
    	$this->form_validation->set_rules('status_biaya', 'status biaya', 'trim|required');
        $this->form_validation->set_rules('id_tahun', 'tahun', 'trim|required');   

    	$this->form_validation->set_rules('id_biaya', 'id_biaya', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "biaya.xls";
        $judul = "biaya";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Tahun"); 
        xlsWriteLabel($tablehead, $kolomhead++, "Periode"); 
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Biaya");
    	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Biaya");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Biaya");
    	xlsWriteLabel($tablehead, $kolomhead++, "Status Biaya");        

    	foreach ($this->Biaya_model->get_all() as $data) {
            $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->tahun_pelajaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->ket);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_biaya);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_biaya);
        xlsWriteLabel($tablebody, $kolombody++, $data->jenis_biaya);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_biaya);        

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=biaya.doc");

        $data = array(
            'biaya_data' => $this->Biaya_model->get_all(),
            'start' => 0
        );
        $this->load->view('biaya/Biaya_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'biaya_data' => $this->Biaya_model->get_all(),
            'start' => 0
        );
        $this->load->view('biaya/biaya_print', $data);
    }

}

/* End of file Biaya.php */
