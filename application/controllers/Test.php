<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index() {

		$this->load->helper('security');

		$string	= "Prueba (Disco Gratis)";
		echo sanitize_filename($string);



	}


}