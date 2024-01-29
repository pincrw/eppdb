<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Prestasi_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('prestasi/create_action'),
            'id_prestasi' => set_value('id_prestasi'),
            'tingkat' => set_value('tingkat'),
            'kategori' => set_value('kategori'),
            'juara' => set_value('juara'),
            'skor_prestasi' => set_value('skor_prestasi'),
        );
        
        $data['title'] = 'Prestasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Prestasi' => '',
        ];

        $data['code_js'] = 'prestasi/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();          
        $data['page'] = 'prestasi/Prestasi_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Prestasi_model->json();
    }

    public function read($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_prestasi' => $row->id_prestasi,
        		'tingkat' => $row->tingkat,
        		'kategori' => $row->kategori,
        		'juara' => $row->juara,
        		'skor_prestasi' => $row->skor_prestasi,
    	    );

        $data['title'] = 'Prestasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'prestasi/Prestasi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('prestasi/create_action'),
    	    'id_prestasi' => set_value('id_prestasi'),
    	    'tingkat' => set_value('tingkat'),
    	    'kategori' => set_value('kategori'),
    	    'juara' => set_value('juara'),
    	    'skor_prestasi' => set_value('skor_prestasi'),
    	);

        $data['title'] = 'Prestasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'prestasi/Prestasi_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'tingkat' => $this->input->post('tingkat',TRUE),
        		'kategori' => $this->input->post('kategori',TRUE),
        		'juara' => $this->input->post('juara',TRUE),
        		'skor_prestasi' => $this->input->post('skor_prestasi',TRUE),
    	    );
            $this->Prestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
            helper_log("add", "Menambah data prestasi ".$data['tingkat']);             
            redirect(site_url('prestasi'));}
    }

    public function update($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('prestasi/update_action'),
        		'id_prestasi' => set_value('id_prestasi', $row->id_prestasi),
        		'tingkat' => set_value('tingkat', $row->tingkat),
        		'kategori' => set_value('kategori', $row->kategori),
        		'juara' => set_value('juara', $row->juara),
        		'skor_prestasi' => set_value('skor_prestasi', $row->skor_prestasi),
        	);
        
        $data['title'] = 'Prestasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'prestasi/Prestasi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prestasi', TRUE));
        } else {
            $data = array(
        		'tingkat' => $this->input->post('tingkat',TRUE),
        		'kategori' => $this->input->post('kategori',TRUE),
        		'juara' => $this->input->post('juara',TRUE),
        		'skor_prestasi' => $this->input->post('skor_prestasi',TRUE),
    	    );
            $this->Prestasi_model->update($this->input->post('id_prestasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            helper_log("edit", "Update data prestasi ".$data['tingkat']);             
            redirect(site_url('prestasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            $this->Prestasi_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            helper_log("delete", "Menghapus data prestasi ".$row->tingkat);             
            redirect(site_url('prestasi'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasi'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Prestasi_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            helper_log("delete", "Menghapus multi data prestasi");             
        }else{
            $this->session->set_flashdata('message_error', 'Data gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('tingkat', 'tingkat', 'trim|required');
    	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
    	$this->form_validation->set_rules('juara', 'juara', 'trim|required');
    	$this->form_validation->set_rules('skor_prestasi', 'skor prestasi', 'trim|required|numeric');

    	$this->form_validation->set_rules('id_prestasi', 'id_prestasi', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "prestasi.xls";
        $judul = "prestasi";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
    	xlsWriteLabel($tablehead, $kolomhead++, "Peringkat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Poin Prestasi");

	foreach ($this->Prestasi_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->juara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skor_prestasi);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=prestasi.doc");

        $data = array(
            'prestasi_data' => $this->Prestasi_model->get_all(),
            'start' => 0
        );
        $this->load->view('prestasi/Prestasi_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'prestasi_data' => $this->Prestasi_model->get_all(),
            'start' => 0
        );
        $this->load->view('prestasi/Prestasi_print', $data);
    }

    public function upload()
    {

        $file_mimes = array('text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
         
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
         
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();                
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
         
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
             
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $this->db->TRUNCATE('prestasi');
            for($i = 1;$i < count($sheetData);$i++)
            {
                $tingkat = $sheetData[$i]['1'];
                $kategori = $sheetData[$i]['2'];
                $juara = $sheetData[$i]['3'];
                $skor_prestasi = $sheetData[$i]['4'];

                $this->db->query("insert into prestasi (id_prestasi,tingkat,kategori,juara,skor_prestasi) values ('','$tingkat','$kategori','$juara',$skor_prestasi')");
            }
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                helper_log("add", "Import data prestasi");                 
                redirect(site_url('prestasi'));
        } else {
                $this->session->set_flashdata('message', 'Data tidak sesuai');               
                redirect(site_url('prestasi'));            
        }
    }    

}

/* End of file Prestasi.php */