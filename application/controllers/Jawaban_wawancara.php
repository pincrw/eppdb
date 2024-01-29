<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jawaban_wawancara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jawaban_wawancara_model');
        $this->load->model('Pengaturan_model');
        $this->load->model('Formulir_model');
        $this->load->model('Peserta_model');
        $this->load->model('Berkas_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Tahunpelajaran_model');
        $this->load->model('Tesdanwawancara_model');  
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Jawaban Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jawaban Wawancara' => '',
        ];

        $data['code_js'] = 'jawaban_wawancara/codejs';
        $data['page'] = 'jawaban_wawancara/Jawaban_wawancara_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Jawaban_wawancara_model->json();
    }

    public function read($id)
    {
        $row = $this->Jawaban_wawancara_model->get_by_id($id);
        if ($row) {
            $data = array(
            'button' => 'Simpan nilai',
            'action' => site_url('jawaban_wawancara/insert_nilai'),                
    		'id_jawaban' => $row->id_jawaban,
    		'id_peserta' => $row->id_peserta,
            'no_pendaftaran' => $row->no_pendaftaran,
            'nama_peserta' => $row->nama_peserta,
            'tanggal_lahir' => $row->tanggal_lahir,
            'nomor_hp' => $row->nomor_hp,
            'asal_sekolah' => $row->asal_sekolah,
            'tahun_pelajaran' => $row->tahun_pelajaran,            
	    );

        $data['title'] = 'Jawaban Wawancara';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $id_peserta=$row->id_peserta;
        $data['jawaban_wawancara'] = $this->Jawaban_wawancara_model->jawaban($id_peserta);
        $data['nilai_wawancara'] = $this->Tesdanwawancara_model->get_by_id_peserta($id_peserta);
        $data['page'] = 'jawaban_wawancara/Jawaban_wawancara_read';
        $this->load->view('template/backend', $data);

        // kirim pesan WA ........................................................
        $nama_peserta=$row->nama_peserta;
        $phone=$row->nomor_hp;
        $msg=$nama_peserta.", formulir wawancara telah di verifikasi panitia.";
        $this->Peserta_model->kirimpesan($phone,$msg);
        // .......................................................................

        } else {        
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jawaban_wawancara'));
        }
    }

    public function insert_nilai()
    {
        $data = array(
            'id_peserta' => $this->input->post('id_peserta',TRUE),
            'nilai_tes' => $this->input->post('nilai_tes',TRUE),
            'nilai_wawancara' => $this->input->post('nilai_wawancara',TRUE),
            'kesimpulan' => $this->input->post('kesimpulan',TRUE),                
        );

        $this->Tesdanwawancara_model->insert($data);
        $this->session->set_flashdata('message', 'Nilai Berhasil ditambahkan');
        helper_log("add", "Menambah data nilai tes dan wawancara ");             
        redirect(site_url('jawaban_wawancara'));
    }    

    public function printwawancara($id)
    {
        $row = $this->Jawaban_wawancara_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_jawaban' => $row->id_jawaban,
            'id_peserta' => $row->id_peserta,
            'no_pendaftaran' => $row->no_pendaftaran,
            'nama_peserta' => $row->nama_peserta,
            'tanggal_lahir' => $row->tanggal_lahir,
            'nomor_hp' => $row->nomor_hp,
            'asal_sekolah' => $row->asal_sekolah,
            'tahun_pelajaran' => $row->tahun_pelajaran,
            'tanggal_daftar' => $row->tanggal_daftar,
            'qrcode' => $row->qrcode,
        );

        $id_peserta=$row->id_peserta;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta); 
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulirW();         
        $data['jawaban'] = $this->Jawaban_wawancara_model->jawaban($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        $data['tp'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        // kirim pesan WA ........................................................
        $nama_peserta=$row->nama_peserta;
        $phone=$row->nomor_hp;
        $msg=$nama_peserta.", formulir wawancara telah di cek panitia.";
        $this->Peserta_model->kirimpesan($phone,$msg);
        // .......................................................................
        
        helper_log("print", "Cetak bukti wawancara ".$nama_peserta);

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        $html = $this->load->view('jawaban_wawancara/Print_wawancara', $data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('form wawancara '.$nama_peserta.'.pdf','I');    
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jawaban_wawancara'));
        }        
    }     

    public function delete($id)
    {
        $row = $this->Jawaban_wawancara_model->get_by_id($id);
        $id_peserta=$row->id_peserta;

        if ($row) {
            $this->Jawaban_wawancara_model->delete($id_peserta);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            redirect(site_url('jawaban_wawancara'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jawaban_wawancara'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Jawaban_wawancara_model->deletebulk();
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
    	$this->form_validation->set_rules('id_wawancara', 'id wawancara', 'trim|required');
    	$this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');

    	$this->form_validation->set_rules('id_jawaban', 'id_jawaban', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jawaban_wawancara.xls";
        $judul = "jawaban_wawancara";
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
    	// xlsWriteLabel($tablehead, $kolomhead++, "Id Wawancara");
        xlsWriteLabel($tablehead, $kolomhead++, "Pertanyaan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Jawaban");

	foreach ($this->Jawaban_wawancara_model->get_all() as $data) {
            $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->id_peserta);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->id_wawancara);
        xlsWriteLabel($tablebody, $kolombody++, $data->pertanyaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jawaban);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jawaban_wawancara.doc");

        $data = array(
            'jawaban_wawancara_data' => $this->Jawaban_wawancara_model->get_all(),
            'start' => 0
        );
        $this->load->view('jawaban_wawancara/Jawaban_wawancara_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'jawaban_wawancara_data' => $this->Jawaban_wawancara_model->get_all(),
            'start' => 0
        );
        $this->load->view('jawaban_wawancara/jawaban_wawancara_print', $data);
    }

}

/* End of file Jawaban_wawancara.php */
