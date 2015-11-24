<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


	public function login()
	{	
		$this->load->model('account_model');

		/* Hash of the password retrieved from the database */
		$hash = $this->account_model->getPasswordHash();
		/* Plain text password retrieved from the GUI */
		$pwd = $this->input->post('password');

		/* Redirect URL */
		$link = base_url() . "admin";

		/* Pasword verification */
		if (password_verify($pwd, $hash)) {
			$this->session->log_status = 'success';
			header("Location: $link");
		} else {
			header("Location: $link/?_ref=err");
		}		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$link = base_url() . "admin";
		header("Location: $link");
	}
	
	public function FunctionName($value='')
	{
	
	}

}