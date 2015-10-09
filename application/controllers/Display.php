<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function index($page = 'index'){
		
		/*Set the data for the view*/
		$data['title'] = "BaleromCR | Tienda";

		/*Load the view files*/
		$this->load->view('static/header', $data);
		$this->load->view('home/home', $data);
		$this->load->view('static/footer', $data);
	}
}