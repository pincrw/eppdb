<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tesdanwawancara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Tesdanwawancara_model');
        $this->load->model('Peserta_model');
        $this->load->model('Pengaturan_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Nilai Tes dan Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Tesdanwawancara' => '',
        ];

        $data['code_js'] = 'tesdanwawancara/codejs';
        $data['page'] = 'tesdanwawancara/Tesdanwawancara_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Tesdanwawancara_model->json();
    }

    public function read($id)
    {
        $row = $this->Tesdanwawancara_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_tesdanwawancara' => $row->id_tesdanwawancara,
        		'id_peserta' => $row->id_peserta,
                'no_pendaftaran' => $row->no_pendaftaran,
                'nama_peserta' => $row->nama_peserta,
        		'nilai_tes' => $row->nilai_tes,
        		'nilai_wawancara' => $row->nilai_wawancara,
                'kesimpulan' => $row->kesimpulan,
    	    );

        $data['title'] = 'Nilai Tes dan Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'tesdanwawancara/Tesdanwawancara_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tesdanwawancara'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tesdanwawancara/create_action'),
    	    'id_tesdanwawancara' => set_value('id_tesdanwawancara'),
    	    'id_peserta' => set_value('id_peserta'),
    	    'nilai_tes' => set_value('nilai_tes'),
    	    'nilai_wawancara' => set_value('nilai_wawancara'),
            'kesimpulan' => set_value('kesimpulan'),
    	);

        $data['title'] = 'Tes dan wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'tesdanwawancara/codejs';
        $data['peserta'] = $this->Peserta_model->get_all(); 
        $data['page'] = 'tesdanwawancara/Tesdanwawancara_form';
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
        		'nilai_tes' => $this->input->post('nilai_tes',TRUE),
        		'nilai_wawancara' => $this->input->post('nilai_wawancara',TRUE),
                'kesimpulan' => $this->input->post('kesimpulan',TRUE),                
    	    );

            $this->Tesdanwawancara_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data nilai tes dan wawancara ");             
            redirect(site_url('tesdanwawancara'));
        }
    }

    public function update($id)
    {
        $row = $this->Tesdanwawancara_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('tesdanwawancara/update_action'),
        		'id_tesdanwawancara' => set_value('id_tesdanwawancara', $row->id_tesdanwawancara),
        		'id_peserta' => set_value('id_peserta', $row->id_peserta),
        		'nilai_tes' => set_value('nilai_tes', $row->nilai_tes),
        		'nilai_wawancara' => set_value('nilai_wawancara', $row->nilai_wawancara),
                'kesimpulan' => set_value('kesimpulan', $row->kesimpulan),                
    	    );
        
        $data['title'] = 'Tes dan wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['tesdanwawancara'] = $this->Tesdanwawancara_model->get_by_id($id);
        $data['page'] = 'tesdanwawancara/Tesdanwawancara_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');             
            redirect(site_url('tesdanwawancara'));
        }
    }

    public function update_action()
    {
        // $this->_rules();
        $this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
        $this->form_validation->set_rules('nilai_tes', 'nilai tes', 'trim|numeric|required');
        $this->form_validation->set_rules('nilai_wawancara', 'nilai wawancara', 'trim|numeric|required');
        $this->form_validation->set_rules('kesimpulan', 'kesimpulan wawancara', 'trim');        

        $this->form_validation->set_rules('id_tesdanwawancara', 'id_tesdanwawancara', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');        

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tesdanwawancara', TRUE));
        } else {
            $data = array(
        		'id_peserta' => $this->input->post('id_peserta',TRUE),
        		'nilai_tes' => $this->input->post('nilai_tes',TRUE),
        		'nilai_wawancara' => $this->input->post('nilai_wawancara',TRUE),
                'kesimpulan' => $this->input->post('kesimpulan',TRUE),                
    	    );

            $this->Tesdanwawancara_model->update($this->input->post('id_tesdanwawancara', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data nilai tes dan wawancara ");               
            redirect(site_url('tesdanwawancara'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tesdanwawancara_model->get_by_id($id);

        if ($row) {
            $this->Tesdanwawancara_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data nilai tes dan wawancara ".$row->nama_peserta);             
            redirect(site_url('tesdanwawancara'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tesdanwawancara'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Tesdanwawancara_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data nilai tes dan wawancara "); 
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required|is_unique[tesdanwawancara.id_peserta]',
            array(
                    'required'      => 'Nama Peserta tidak boleh kosong ',
                    'is_unique'     => 'Data nilai peserta sudah pernah ditambahkan '                
            ));        
    	$this->form_validation->set_rules('nilai_tes', 'nilai tes', 'trim|numeric|required');
    	$this->form_validation->set_rules('nilai_wawancara', 'nilai wawancara', 'trim|numeric|required');
        $this->form_validation->set_rules('kesimpulan', 'kesimpulan wawancara', 'trim');        

    	$this->form_validation->set_rules('id_tesdanwawancara', 'id_tesdanwawancara', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nilaitesdanwawancara.xls";
        $judul = "nilaitesdanwawancara";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Tes");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Wawancara");
        xlsWriteLabel($tablehead, $kolomhead++, "Kesimpulan Wawancara");        

	foreach ($this->Tesdanwawancara_model->get_all() as $data) {
            $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->id_peserta);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_tes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_wawancara);
        xlsWriteLabel($tablebody, $kolombody++, $data->kesimpulan);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tesdanwawancara.doc");

        $data = array(
            'tesdanwawancara_data' => $this->Tesdanwawancara_model->get_all(),
            'start' => 0
        );
        $this->load->view('tesdanwawancara/Tesdanwawancara_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'tesdanwawancara_data' => $this->Tesdanwawancara_model->get_all(),
            'start' => 0
        );
        $this->load->view('tesdanwawancara/tesdanwawancara_print', $data);
    }

    // upload nilai tes dan wawancara
    public function upload_nilaitesdanwawancara()
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
            $this->db->TRUNCATE('tesdanwawancara');
            for($i = 1;$i < count($sheetData);$i++)
            {
                $id_peserta = $sheetData[$i]['1'];
                $nilai_tes = $sheetData[$i]['4'];
                $nilai_wawancara = $sheetData[$i]['5'];
                $kesimpulan = $sheetData[$i]['6'];

                $this->db->query("insert into tesdanwawancara (id_tesdanwawancara,id_peserta,nilai_tes,nilai_wawancara,kesimpulan) values ('','$id_peserta','$nilai_tes','$nilai_wawancara','$kesimpulan')");
            }
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                helper_log("add", "Import data nilai tes dan wawancara");                 
                redirect(site_url('tesdanwawancara'));
        } else {
                $this->session->set_flashdata('message', 'Data tidak sesuai');               
                redirect(site_url('tesdanwawancara'));            
        }
    }

}

/* End of file Tesdanwawancara.php */
