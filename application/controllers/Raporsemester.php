<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Raporsemester extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pengaturan_model');
        $this->load->model('Peserta_model');
        $this->load->model('Raporsemester_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Rapor Semester';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Raporsemester' => '',
        ];

        $data['code_js'] = 'raporsemester/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();
        $data['page'] = 'raporsemester/Raporsemester_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Raporsemester_model->json();
    }

    public function read($id)
    {
        $row = $this->Raporsemester_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_raporsemester' => $row->id_raporsemester,
        		'id_peserta' => $row->id_peserta,
                'no_pendaftaran' => $row->no_pendaftaran,
                'nama_peserta' => $row->nama_peserta,
        		'mapel' => $row->mapel,
        		'satu' => $row->satu,
        		'dua' => $row->dua,
        		'tiga' => $row->tiga,
        		'empat' => $row->empat,
        		'lima' => $row->lima,
	    );

        $data['title'] = 'Rapor Semester';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'raporsemester/Raporsemester_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('raporsemester'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('raporsemester/create_action'),
    	    'id_raporsemester' => set_value('id_raporsemester'),
    	    'id_peserta' => set_value('id_peserta'),
    	    'mapel' => set_value('mapel'),
    	    'satu' => set_value('satu'),
    	    'dua' => set_value('dua'),
    	    'tiga' => set_value('tiga'),
    	    'empat' => set_value('empat'),
    	    'lima' => set_value('lima'),
	);

        $data['title'] = 'Rapor Semester';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'raporsemester/codejs';
        $data['peserta'] =$this->Peserta_model->get_all();  
        $data['page'] = 'raporsemester/Raporsemester_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_peserta' => $this->input->post('id_peserta',TRUE),
        		'mapel' => $this->input->post('mapel',TRUE),
        		'satu' => $this->input->post('satu',TRUE),
        		'dua' => $this->input->post('dua',TRUE),
        		'tiga' => $this->input->post('tiga',TRUE),
        		'empat' => $this->input->post('empat',TRUE),
        		'lima' => $this->input->post('lima',TRUE),
	    );
            $this->Raporsemester_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            redirect(site_url('raporsemester'));}
    }

    public function update($id)
    {
        $row = $this->Raporsemester_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('raporsemester/update_action'),
        		'id_raporsemester' => set_value('id_raporsemester', $row->id_raporsemester),
        		'id_peserta' => set_value('id_peserta', $row->id_peserta),
        		'mapel' => set_value('mapel', $row->mapel),
        		'satu' => set_value('satu', $row->satu),
        		'dua' => set_value('dua', $row->dua),
        		'tiga' => set_value('tiga', $row->tiga),
        		'empat' => set_value('empat', $row->empat),
        		'lima' => set_value('lima', $row->lima),
	    );
        
        $data['title'] = 'Rapor Semester';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'raporsemester/codejs';
        $data['raporsemester'] =$this->Raporsemester_model->get_by_id($id);   
        $data['page'] = 'raporsemester/Raporsemester_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('raporsemester'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_raporsemester', TRUE));
        } else {
            $data = array(
        		'id_peserta' => $this->input->post('id_peserta',TRUE),
        		'mapel' => $this->input->post('mapel',TRUE),
        		'satu' => $this->input->post('satu',TRUE),
        		'dua' => $this->input->post('dua',TRUE),
        		'tiga' => $this->input->post('tiga',TRUE),
        		'empat' => $this->input->post('empat',TRUE),
        		'lima' => $this->input->post('lima',TRUE),
	    );
            $this->Raporsemester_model->update($this->input->post('id_raporsemester', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            redirect(site_url('raporsemester'));
        }
    }

    public function delete($id)
    {
        $row = $this->Raporsemester_model->get_by_id($id);

        if ($row) {
            $this->Raporsemester_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            redirect(site_url('raporsemester'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('raporsemester'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Raporsemester_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
    	$this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
    	$this->form_validation->set_rules('satu', 'satu', 'trim|numeric|required');
    	$this->form_validation->set_rules('dua', 'dua', 'trim|numeric|required');
    	$this->form_validation->set_rules('tiga', 'tiga', 'trim|numeric|required');
    	$this->form_validation->set_rules('empat', 'empat', 'trim|numeric|required');
    	$this->form_validation->set_rules('lima', 'lima', 'trim|numeric|required');

    	$this->form_validation->set_rules('id_raporsemester', 'id_raporsemester', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "raporsemester.xls";
        $judul = "raporsemester";
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
    	// xlsWriteLabel($tablehead, $kolomhead++, "Id Peserta");
        xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
    	xlsWriteLabel($tablehead, $kolomhead++, "Mata Pelajaran");
    	xlsWriteLabel($tablehead, $kolomhead++, "Satu");
    	xlsWriteLabel($tablehead, $kolomhead++, "Dua");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tiga");
    	xlsWriteLabel($tablehead, $kolomhead++, "Empat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lima");

	foreach ($this->Raporsemester_model->get_all() as $data) {
            $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->id_peserta);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mapel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dua);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tiga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->empat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lima);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=raporsemester.doc");

        $data = array(
            'raporsemester_data' => $this->Raporsemester_model->get_all(),
            'start' => 0
        );
        $this->load->view('raporsemester/Raporsemester_doc',$data);
    }

  public function printdoc()
  {
        $data = array(
            'raporsemester_data' => $this->Raporsemester_model->get_all(),
            'start' => 0
        );
        $this->load->view('raporsemester/raporsemester_print', $data);
    }

}

/* End of file Raporsemester.php */
