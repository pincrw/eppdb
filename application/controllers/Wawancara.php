<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wawancara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Wawancara_model');
        $this->load->model('Pengaturan_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Formulir_model');
        $this->load->model('Tahunpelajaran_model');        
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Wawancara' => '',
        ];

        $data['code_js'] = 'wawancara/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();    
        $data['page'] = 'wawancara/Wawancara_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Wawancara_model->json();
    }

    public function read($id)
    {
        $row = $this->Wawancara_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id_wawancara' => $row->id_wawancara,
    		'pertanyaan' => $row->pertanyaan,
	    );

        $data['title'] = 'Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'wawancara/Wawancara_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('wawancara'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('wawancara/create_action'),
    	    'id_wawancara' => set_value('id_wawancara'),
    	    'pertanyaan' => set_value('pertanyaan'),
	    );

        $data['title'] = 'Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'wawancara/codejs';
        $data['page'] = 'wawancara/Wawancara_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		      'pertanyaan' => $this->input->post('pertanyaan',TRUE),
	    );
            $this->Wawancara_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data pertanyaan");              
            redirect(site_url('wawancara'));}
    }

    public function update($id)
    {
        $row = $this->Wawancara_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wawancara/update_action'),
        		'id_wawancara' => set_value('id_wawancara', $row->id_wawancara),
        		'pertanyaan' => set_value('pertanyaan', $row->pertanyaan),
	        );
        
        $data['title'] = 'Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'wawancara/codejs';
        $data['page'] = 'wawancara/Wawancara_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('wawancara'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_wawancara', TRUE));
        } else {
            $data = array(
		'pertanyaan' => $this->input->post('pertanyaan',TRUE),
	    );
            $this->Wawancara_model->update($this->input->post('id_wawancara', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data pertanyaan");              
            redirect(site_url('wawancara'));
        }
    }

    public function delete($id)
    {
        $row = $this->Wawancara_model->get_by_id($id);

        if ($row) {
            $this->Wawancara_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data pertanyaan");              
            redirect(site_url('wawancara'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('wawancara'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Wawancara_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
    	$this->form_validation->set_rules('id_wawancara', 'id_wawancara', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "wawancara.xls";
        $judul = "wawancara";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Pertanyaan");

    	foreach ($this->Wawancara_model->get_all() as $data) {
                $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pertanyaan);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=wawancara.doc");

        $data = array(
            'wawancara_data' => $this->Wawancara_model->get_all(),
            'start' => 0
        );
        $this->load->view('wawancara/Wawancara_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'wawancara_data' => $this->Wawancara_model->get_all(),
            'start' => 0
        );

        $data['tp'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirW();        
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();         
        helper_log("print", "Cetak Wawancara");        

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        $html = $this->load->view('wawancara/Wawancara_print', $data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('wawancara.pdf','I');        
    }
}

/* End of file Wawancara.php */
