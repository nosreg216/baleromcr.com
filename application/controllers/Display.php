<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	public function page($page = 'index'){
		
		/*Set the data for the view*/
		$data['title'] = "BaleromCR | Tienda";

		/*Load the view files*/
		$this->load->view('header', $data);
		$this->load->view($page, $data);
		$this->load->view('footer');
	}

	public function dashboard($page = 'index'){

		/*Login Validation */
		if ($this->session->log_status == 'success') {

			if (method_exists($this, $page)) {
				$data = $this->$page();
			
				/*Load the view files*/
				$this->load->view('dashboard/header', $data);
				$this->load->view('dashboard/sidebar');
				$this->load->view("dashboard/$page", $data);
				$this->load->view('dashboard/footer');
			} else {
				$data = array('heading' => '404 Page Not Found', 'message' => 'The page you requested was not found.');
				$this->load->view('errors/html/error_404', $data);
			}

		} else {
			/*Load the login view file */
			$this->load->view('dashboard/login');	
		}
	}

	public function album_editor($albumId)
	{
		$data['title'] = "cPanel BaleromCR | Edit Album";

		/*Load the view files*/
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar');
		//$this->load->view("dashboard/album_edit", $data);
		$this->load->view('dashboard/footer');
	}



/*====================================================================================================================*/

	public function index()
	{
		$this->load->model('album_model');
		$this->load->model('song_model');
		$this->load->model('video_model');
		$this->load->model('bundle_model');

		$albumCount = $this->album_model->getCount();
		$songCount = $this->song_model->getCount();
		$videoCount = $this->video_model->getCount();
		$bundleCount = $this->bundle_model->getCount();

		$data['albumCount'] = $albumCount;
		$data['songCount'] = $songCount;
		$data['videoCount'] = $videoCount;
		$data['bundleCount'] = $bundleCount;
		$data['title'] = "cPanel BaleromCR | Dashboard";

		return $data;
	}

	public function albums()
	{
		/*Set the data for the view*/
		$this->load->model('album_model');
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "cPanel BaleromCR | Albums";
		$data['albumList'] = $albumList;


		return $data;
	}

	public function singles()
	{
		/*Set the data for the view*/
		$this->load->model('album_model');
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "cPanel BaleromCR | Albums";
		$data['albumList'] = $albumList;


		return $data;
	}

	public function videos()
	{
		/*Set the data for the view*/
		$this->load->model('album_model');
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "cPanel BaleromCR | Albums";
		$data['albumList'] = $albumList;


		return $data;
	}

	public function bundles()
	{
		/*Set the data for the view*/
		$this->load->model('album_model');
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "cPanel BaleromCR | Albums";
		$data['albumList'] = $albumList;


		return $data;
	}


}