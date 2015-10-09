<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index() {
		$this->load->view('test');
	}



	public function zip()
	{
		$this->load->library('zip');

		$title = 'Arigato No!';
		$path = 'data/music/albums/4096';

		// Add songs to the file
		$this->zip->read_dir($path);
		
		// Download the ZIP file
		$this->zip->download($title);

		
	}

	public function download()
	{

	}
}