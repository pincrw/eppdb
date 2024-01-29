<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pengaturan_model');        
        $this->load->model('Users_model');
        $this->load->model('Users_groups_model');
        $this->load->model('Mail_model');  
        $this->load->library('form_validation');             
    }

    public function update_mail()
    {
        $this->_rules_mail();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 
                form_error('host').
                form_error('username').
                form_error('password').
                form_error('smtpsecure').
                form_error('port')               
            );            
            redirect(site_url('pengaturan'));
        } else { 

            $data = array(
                'host' => $this->input->post('host',TRUE),
                'username' => $this->input->post('username',TRUE),
                'password' => $this->input->post('password',TRUE),
                'smtpsecure' => $this->input->post('smtpsecure',TRUE),
                'port' => $this->input->post('port',TRUE),
            );

            $this->Mail_model->update($this->input->post('id_mail', TRUE), $data);
                
            $this->session->set_flashdata('message', 'Data mail berhasil diubah');
            helper_log("edit", "Update data mail");             
            redirect(site_url('pengaturan'));
        }
    }   

    public function update_api()
    {
        $this->_rules_api();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 
                form_error('url_server').  
                form_error('token_api')                
            );            
            redirect(site_url('pengaturan'));
        } else { 

            $data = array(
                'url_server' => $this->input->post('url_server',TRUE),
                'token_api' => $this->input->post('token_api',TRUE),
            );

            $this->Mail_model->update($this->input->post('id_mail', TRUE), $data);
                
            $this->session->set_flashdata('message', 'Data api berhasil diubah');
            helper_log("edit", "Update data api");             
            redirect(site_url('pengaturan'));
        }
    }        

    public function _rules_mail()
    {
        $this->form_validation->set_rules('host', 'host', 'trim|required',
        array(
                'required'      => 'host tidak boleh kosong '
        ));
        $this->form_validation->set_rules('username', 'username', 'trim|valid_email|required',
        array(
                'valid_email'      => 'email tidak valid ',
                'required'      => 'email tidak boleh kosong '
        )); 
        $this->form_validation->set_rules('password', 'password', 'trim|required',
        array(
                'required'      => 'password tidak boleh kosong '
        ));
        $this->form_validation->set_rules('smtpsecure', 'smtpsecure', 'trim|required',
        array(
                'required'      => 'smtpsecure tidak boleh kosong '
        ));        
        $this->form_validation->set_rules('port', 'port', 'trim|numeric|required',
        array(
                'required'      => 'port tidak boleh kosong ',
                'numeric'       => 'port hanya angka '
        ));       

        $this->form_validation->set_rules('id_mail', 'id_mail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function _rules_api()
    {
        $this->form_validation->set_rules('url_server', 'url server', 'trim|required',
        array(
                'required'      => 'url server tidak boleh kosong '
        ));  
        $this->form_validation->set_rules('token_api', 'token api', 'trim|required',
        array(
                'required'      => 'token api tidak boleh kosong '
        ));          

        $this->form_validation->set_rules('id_mail', 'id_mail', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }    

	public function send_akun()
	{
	 	$data['mailer'] = $this->Mail_model->get_by_id_1();

		// PHPMailer object
		$response = false;
		$mail = new PHPMailer();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $data['mailer']->host;
		$mail->SMTPAuth = true;
		$mail->Username = $data['mailer']->username; // user email anda
		$mail->Password = $data['mailer']->password; // diisi dengan App Password yang sudah di generate dari akun gmail
		$mail->SMTPSecure = $data['mailer']->smtpsecure;
		$mail->Port     = $data['mailer']->port;

		$mail->setFrom($data['mailer']->username, 'nenemo project'); // user email anda
		$mail->addReplyTo($data['mailer']->username, ''); //user email anda

		// Email subject
		$mail->Subject = 'akun ppdb'; //subject email

		// Add a recipient
		$mail->addAddress($this->input->post('email')); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<p>Hallo <b>".$this->input->post('full_name')."</b> berikut ini adalah informasi akun Anda:</p>
		<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>".$this->input->post('full_name')."</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>".$this->input->post('email')."</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>".$this->input->post('password')."</td>
		</tr>
		</table>
		<p>Terimakasih <b>".$this->input->post('full_name')."</b> telah membuat akun.</p>"; // isi email
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()) {
			// $this->session->set_flashdata('message', 'Gagal terkirim ke email, silahkan login');
			$this->session->set_flashdata('success','Silahkan login, segera isi formulir');
		} else {
			$this->session->set_flashdata('success', 'Akun berhasil terkirim ke email, silahkan login');
		}
	}	

}

/* End of file Mail.php */