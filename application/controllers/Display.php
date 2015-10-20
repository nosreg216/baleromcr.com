<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function index($page = 'index'){
		
		/*Set the data for the view*/
		$data['title'] = "BaleromCR | Tienda";

		/*Load the view files*/
		$this->load->view('header', $data);
		$this->load->view($page, $data);
		$this->load->view('footer');
	}

	public function dashboard($page = 'index'){
		
		/*Login Validation */

		if ($page == 'auth') {
			/*Load the view files*/
			$this->load->view('dashboard/login');	
		} else {
			/*Set the data for the view*/
			$data['title'] = "cPanel BaleromCR | $page";

			/*Load the view files*/
			$this->load->view('dashboard/header', $data);
			$this->load->view('dashboard/sidebar', $data);
			$this->load->view("dashboard/$page", $data);
			$this->load->view('dashboard/footer');
		}

	}

	public function login()
	{
		$link = base_url() . "admin";
		header("Location: $link");
	}

	public function logout()
	{
		$link = base_url() . "admin/auth";
		header("Location: $link");
	}

}