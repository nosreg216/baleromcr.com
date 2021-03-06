<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /* Homepage Display */
	public function page($page = 'index'){
	
		/* Load Data Models */		
		$this->load->model('banner_model');
		$this->load->model('album_model');
		$this->load->model('song_model');
		$this->load->model('video_model');

		/* Get all content Lists */
		$data['banner_list'] = $this->banner_model->get_all();
		$data['albumList'] = $this->album_model->getAlbumList();
		$data['songList'] = $this->song_model->getSongList();
		$data['videoList'] = $this->video_model->getVideoList();

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
		$this->load->model('album_model');
		
		$data['title'] = "cPanel BaleromCR | Editar Album";
		$data['albumInfo'] = $this->album_model->getAlbumById($albumId);
		$data['trackList'] = $this->album_model->getTrackListById($albumId);

		/*Load the view files*/
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar');
		$this->load->view("dashboard/albums_edit", $data);
		$this->load->view('dashboard/footer');
	}

	public function song_editor($songId)
	{
		$this->load->model('song_model');
		
		$data['title'] = "cPanel BaleromCR | Editar Sencillo";
		$data['songInfo'] = $this->song_model->getSongById($songId);

		/*Load the view files*/
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar');
		$this->load->view("dashboard/singles_edit", $data);
		$this->load->view('dashboard/footer');
	}

	public function video_editor($videoId)
	{
		$this->load->model('video_model');
		
		$data['title'] = "cPanel BaleromCR | Editar Video";
		$data['videoInfo'] = $this->video_model->getVideoById($videoId);

		/*Load the view files*/
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar');
		$this->load->view("dashboard/videos_edit", $data);
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
		$data['albumList'] = $this->album_model->getAlbumList();
		$data['title'] = "cPanel BaleromCR | Albums";
		return $data;
	}

	public function singles()
	{
		/*Set the data for the view*/
		$this->load->model('song_model');
		$data['songList'] = $this->song_model->getSongList();
		$data['title'] = "cPanel BaleromCR | Sencillos";
		return $data;
	}

	public function videos()
	{
		/*Set the data for the view*/
		$this->load->model('video_model');
		$videoList = $this->video_model->getVideoList();
		$data['title'] = "cPanel BaleromCR | Videos";
		$data['videoList'] = $videoList;
		return $data;
	}

	public function bundles()
	{

	}
/*====================================================================================================================*/

	public function banners()
	{
		/*Set the data for the view*/
		$this->load->model('banner_model');
		$bannerList = $this->banner_model->get_all();
		$data['title'] = "cPanel BaleromCR | Banners";
		$data['bannerList'] = $bannerList;
		return $data;
	}

}