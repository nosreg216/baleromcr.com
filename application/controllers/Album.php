<?php
class Album extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('album_model');
    }

	/* Displays the information of an album*/
	public function view_album($albumId = 1)
	{

		
		/*
		Retrieves the album information from the database.
		@params: ID of the album.
		@returns: Array of stdClass Objects (Album).
		*/
		$albumInfo = $this->album_model->getAlbumById($albumId);

		/*
		Retrieves the trackist of a given album.
		@params: ID of the album.
		@returns: Array of Objects (Song).
		*/
		$songList = $this->album_model->getSongListById($albumId);

		/* Set the data for the view */
		$data['title'] = $albumInfo->album_title;
		$data['albumInfo'] = $albumInfo;
		$data['songList'] = $songList;

		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('album_view', $data);
		$this->load->view('footer');
	}

	public function view_list()
	{
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "Todo el Contenido | Balerom";
		$data['albumList'] = $albumList;

		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('album_list', $data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$album_data = array(
			'album_title' => $this->input->post('album_title'),
			'album_year' => $this->input->post('album_year'),
			'album_price' => $this->input->post('album_price')
		);

		/* Insert the album and retrieve the album ID */
		$album_id = $this->album_model->add($album_data);
		
		/* Create directory for file upload */
		$path = "data/music/albums/$album_id";
		if (!is_dir($path) ) {
			mkdir($path, 755); // Create the album directory
		}
		/* Load the Upload class */
		$this->load->library('upload');
		/* Upload the album cover */
		$this->upload_cover($path);
		/* Upload the file list */
		$this->upload_filelist($path);
		
		/* Proceed to upload songs in the editor */
		header("Location: " . base_url() . "admin/albums/edit/$album_id");
	}

		public function upload_cover($path)
		{
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'png';
			$config['file_name'] = 'cover.png';
			$this->upload->initialize($config);
	        return $this->upload->do_upload('file_cover');
		}

		public function upload_filelist($path)
		{
			$config['upload_path'] = $path;
			$config['allowed_types'] = '*'; // txt is not allowed in this version
			$config['file_name'] = 'Canciones.txt';
			$this->upload->initialize($config);
	        return $this->upload->do_upload('file_songlist');	        
		}

	public function delete($album_id)
	{
		# Load the Model to delete Order Items
		$this->load->model("order_model");

		$this->album_model->delete($album_id);
		$this->order_model->delete_item(1 , $album_id);

		$this->delete_folder($album_id);
		header("Location: " . base_url() . "admin/albums");
	}
		
		/* Delete directory and files within */
		public function delete_folder($album_id)
		{
			$this->load->helper("file"); // load the helper
			$path = "data/music/albums/$album_id";
			if (is_dir($path) ) {
				delete_files($path, true); // delete all files/folders
				return rmdir($path); // delete directory
			}
		}

	public function insert_track()
	{
		$track_number = $this->input->post('track_number');
		$track_data = array(
			'track_title' => $this->input->post('track_title'),
			'track_album' => $this->input->post('track_album'),
			'track_price' => $this->input->post('track_price')
		);

		/* Build the file name */
		$file_name = $track_number . ' - ' . $track_data['track_title'];
		$track_data['track_title'] = $file_name;

		/* Insert the track to the db */
		$this->album_model->add_track($track_data);

		/* Load the Upload class */
		$this->load->library('upload');
		
		/* Upload the album cover */
		$album_id = $track_data['track_album'];
		$path = "data/music/albums/$album_id";
		$this->upload_track($file_name, $path);
		
		/* Proceed to upload songs in the editor */
		header("Location: " . base_url() . "admin/albums/edit/$album_id");
	}

		public function upload_track($file_name, $path)
		{
			$config['upload_path'] = $path;
			$config['allowed_types'] = '*';
			$config['file_name'] = $file_name . '.mp3';
			$this->upload->initialize($config);
	        $this->upload->do_upload('song_file');
		}
}