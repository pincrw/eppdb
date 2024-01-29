<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pembayaran_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->model('Biaya_model');   
        $this->load->model('Users_model');    
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pembayaran' => '',
        ];

        $data['code_js'] = 'pembayaran/codejs';
        $data['page'] = 'pembayaran/Pembayaran_list';
        $this->load->view('template/backend', $data);
    }

    public function json() 
    {
        header('Content-Type: application/json');
        echo $this->Pembayaran_model->json();
    }

    public function read($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_pembayaran' => $row->id_pembayaran,
        		'no_transaksi' => $row->no_transaksi,
        		'full_name' => $row->full_name,
        		'pembayaran' => $row->pembayaran,
        		'jumlah_bayar' => $row->jumlah_bayar,
        		'tanggal_bayar' => $row->tanggal_bayar,
        		'petugas' => $row->petugas,
        		'bukti_bayar' => $row->bukti_bayar,
                'jenis_bayar' => $row->jenis_bayar,
        		'status_bayar' => $row->status_bayar,
    	    );

        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/Pembayaran_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pembayaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('pembayaran/create_action'),
    	    'id_pembayaran' => set_value('id_pembayaran'),
    	    'no_transaksi' => set_value('no_transaksi'),
    	    'id_users' => set_value('id_users'),
    	    'pembayaran' => set_value('pembayaran'),
    	    'jumlah_bayar' => set_value('jumlah_bayar'),
    	    'tanggal_bayar' => set_value('tanggal_bayar'),
    	    'petugas' => set_value('petugas'),
    	    'bukti_bayar' => set_value('bukti_bayar'),
            'jenis_bayar' => set_value('jenis_bayar'),
    	    'status_bayar' => set_value('status_bayar'),
    	);

        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'pembayaran/codejs';
        $data['user'] = $this->ion_auth->user()->row();
        $data['users'] = $this->Users_model->get_all_member();
        $data['biaya'] = $this->Biaya_model->get_all_wajib();  
        $data['page'] = 'pembayaran/Pembayaran_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $rand = mt_rand(100000, 999999);
            $no_transaksi = 'TR-'.$rand;
            // $checked = $this->input->post('pembayaran',TRUE);
            $data = array(
        		'no_transaksi' => $no_transaksi,
        		'id_users' => $this->input->post('id_users',TRUE),
        		'pembayaran' => $this->input->post('pembayaran',TRUE),
        		'jumlah_bayar' => $this->input->post('jumlah_bayar',TRUE),
                'tanggal_bayar' => date('Y-m-d', strtotime($this->input->post('tanggal_bayar',TRUE))),
        		'petugas' => $this->input->post('petugas',TRUE),
                'jenis_bayar' => $this->input->post('jenis_bayar',TRUE),
        		'status_bayar' => $this->input->post('status_bayar',TRUE),
    	    );

            $config['upload_path'] = './assets/uploads/attachment/';
            $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
            $config['overwrite'] = true;
            $config['max_size'] = 500;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            // upload bukti
            if ($this->upload->do_upload('bukti_bayar')) {
                $uploadData = $this->upload->data();
                $data['bukti_bayar'] = $uploadData['file_name'];
            
                $this->Pembayaran_model->insert($data);
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                helper_log("add", "Konfirmasi pembayaran");             
                redirect(site_url('pembayaran'));
            } else {
                $this->Pembayaran_model->insert($data);
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                helper_log("add", "Konfirmasi pembayaran");             
                redirect(site_url('pembayaran'));      
            }               
        }
    }

    public function update($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('pembayaran/update_action'),
        		'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
        		'no_transaksi' => set_value('no_transaksi', $row->no_transaksi),
                'id_users' => set_value('id_users', $row->id_users),
        		'full_name' => set_value('full_name', $row->full_name),
        		'pembayaran' => set_value('pembayaran', $row->pembayaran),
        		'jumlah_bayar' => set_value('jumlah_bayar', $row->jumlah_bayar),
        		'tanggal_bayar' => set_value('tanggal_bayar', $row->tanggal_bayar),
        		'petugas' => set_value('petugas', $row->petugas),
        		'bukti_bayar' => set_value('bukti_bayar', $row->bukti_bayar),
                'jenis_bayar' => set_value('jenis_bayar', $row->jenis_bayar),
        		'status_bayar' => set_value('status_bayar', $row->status_bayar),
    	    );
        
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'pembayaran/codejs';
        $data['user'] = $this->ion_auth->user()->row();
        $data['biaya'] = $this->Biaya_model->get_all_wajib();  
        $data['page'] = 'pembayaran/Pembayaran_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pembayaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
        		'no_transaksi' => $this->input->post('no_transaksi',TRUE),
        		'id_users' => $this->input->post('id_users',TRUE),
        		'pembayaran' => $this->input->post('pembayaran',TRUE),
        		'jumlah_bayar' => $this->input->post('jumlah_bayar',TRUE),
                'tanggal_bayar' => date('Y-m-d', strtotime($this->input->post('tanggal_bayar',TRUE))),
        		'petugas' => $this->input->post('petugas',TRUE),
                'jenis_bayar' => $this->input->post('jenis_bayar',TRUE),
        		'status_bayar' => $this->input->post('status_bayar',TRUE),
    	    );

            $config['upload_path'] = './assets/uploads/attachment/';
            $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
            $config['overwrite'] = true;
            $config['max_size'] = 500;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            // upload bukti
            if ($this->upload->do_upload('bukti_bayar')) {
                $uploadData = $this->upload->data();
                $data['bukti_bayar'] = $uploadData['file_name'];
            
                $full_name = $this->input->post('full_name',TRUE);
                $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
                $this->session->set_flashdata('message', 'Data berhasil diubah');
                helper_log("edit", "Update konfirmasi pembayaran ".$full_name );              
                redirect(site_url('pembayaran'));
            } else {
                $full_name = $this->input->post('full_name',TRUE);
                $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
                $this->session->set_flashdata('message', 'Data berhasil diubah');
                helper_log("edit", "Update konfirmasi pembayaran ".$full_name );              
                redirect(site_url('pembayaran'));      
            } 
        }
    }

    public function delete($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            helper_log("delete", "hapus konfirmasi pembayaran ".$row->pembayaran." ".$row->full_name ); 
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pembayaran'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Pembayaran_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('no_transaksi', 'no transaksi', 'trim');
    	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
    	$this->form_validation->set_rules('pembayaran', 'pembayaran', 'trim|required');
    	$this->form_validation->set_rules('jumlah_bayar', 'jumlah bayar', 'trim|numeric|required');
    	$this->form_validation->set_rules('tanggal_bayar', 'tanggal bayar', 'trim|required');
    	$this->form_validation->set_rules('petugas', 'petugas', 'trim|required');
    	$this->form_validation->set_rules('bukti_bayar', 'bukti bayar', 'trim');
        $this->form_validation->set_rules('jenis_bayar', 'jenis bayar', 'trim|required');
    	$this->form_validation->set_rules('status_bayar', 'status bayar', 'trim|required');

    	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembayaran.xls";
        $judul = "pembayaran";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "No Transaksi");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
    	xlsWriteLabel($tablehead, $kolomhead++, "Pembayaran");
    	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Bayar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Bayar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Petugas");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Bayar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Status Bayar");

    	foreach ($this->Pembayaran_model->get_all() as $data) {
            $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_transaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->petugas);
        xlsWriteLabel($tablebody, $kolombody++, $data->jenis_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_bayar);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function rekap_pendaftaran()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rekappendaftaran.xls";
        $judul = "rekap pembayaran pendaftaran";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
        xlsWriteLabel($tablehead, $kolomhead++, "NISN");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
        xlsWriteLabel($tablehead, $kolomhead++, "No Handphone");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
        xlsWriteLabel($tablehead, $kolomhead++, "Bayar");
        xlsWriteLabel($tablehead, $kolomhead++, "Sisa");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Ket");

        foreach ($this->Pembayaran_model->get_all_pendaftaran() as $data) {
            $kolombody = 0;

        $biaya = $this->Biaya_model->get_tot_biaya(); 
        $total = $biaya->total;
        $sisa = $total - $data->jumlah;

        if($total==$data->jumlah) {
            $status = "Lunas";
          } else if($total>$data->jumlah) {
            $status = "Belum Lunas";
          } else {
            $status = "Kelebihan bayar";  
        }

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nisn);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
        xlsWriteLabel($tablebody, $kolombody++, $data->nomor_hp);
        xlsWriteNumber($tablebody, $kolombody++, $total);
        xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
        xlsWriteNumber($tablebody, $kolombody++, $sisa);
        xlsWriteLabel($tablebody, $kolombody++, $status);
        xlsWriteLabel($tablebody, $kolombody++, $data->ket);

        $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }  

    public function rekap_pembayarandu()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rekappembayarandu.xls";
        $judul = "rekap pembayaran daftar ulang";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
        xlsWriteLabel($tablehead, $kolomhead++, "NISN");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
        xlsWriteLabel($tablehead, $kolomhead++, "No Handphone");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
        xlsWriteLabel($tablehead, $kolomhead++, "Bayar");
        xlsWriteLabel($tablehead, $kolomhead++, "Sisa");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Ket");

        foreach ($this->Pembayaran_model->get_all_() as $data) {
            $kolombody = 0;

        $biaya_du = $this->Biaya_model->get_tot_biaya_du(); 
        $totaldu = $biaya_du->total;
        $sisa = $totaldu - $data->jumlah;

        if($totaldu==$data->jumlah) {
            $status = "Lunas";
          } else if($totaldu>$data->jumlah) {
            $status = "Belum Lunas";
          } else {
            $status = "Kelebihan bayar";  
        }

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nisn);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
        xlsWriteLabel($tablebody, $kolombody++, $data->nomor_hp);
        xlsWriteNumber($tablebody, $kolombody++, $totaldu);
        xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
        xlsWriteNumber($tablebody, $kolombody++, $sisa);
        xlsWriteLabel($tablebody, $kolombody++, $status);
        xlsWriteLabel($tablebody, $kolombody++, $data->ket);

        $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pembayaran.doc");

        $data = array(
            'pembayaran_data' => $this->Pembayaran_model->get_all(),
            'start' => 0
        );
        $this->load->view('pembayaran/Pembayaran_doc',$data);
    }

    public function printdoc()
    {
        $data = array(
            'pembayaran_data' => $this->Pembayaran_model->get_all(),
            'start' => 0
        );
        $this->load->view('pembayaran/pembayaran_print', $data);
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

/* End of file Pembayaran.php */
