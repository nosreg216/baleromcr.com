<?php
class Song extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('song_model');
    }

	public function view_song($songId = 0) {

		/*
		Retrieves the song information from the database
		@params: ID of the song.
		@returns: Array of stdClass Objects (Song)
		*/
		$songInfo = $this->song_model->getSongById($songId);

		/* Set the data for the view */
		$data['title'] = $songInfo->song_title . " - Balerom!";
		$data['songInfo'] = $songInfo;
		
		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('song_view', $data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$song_data = array(
			'song_title' => $this->input->post('song_title'),
			'song_year' => $this->input->post('song_year'),
			'song_price' => $this->input->post('song_price')
		);

		/* Insert the song and retrieve the song ID */
		$song_id = $this->song_model->add($song_data);
		$file_name = $song_data['song_title'];


		/* Create directory for file upload */
		$path = "data/music/songs/$song_id";
		if (!is_dir($path) ) {
			mkdir($path, 755); // Create the song directory
		}
		/* Load the Upload class */
		$this->load->library('upload');
		/* Upload the song cover */
		$this->upload_cover($path);
		/* Upload the file list */
		$this->upload_songfile($file_name, $path);
		
		/* Proceed to upload songs in the editor */
		header("Location: " . base_url() . "admin/singles/");
	}

	public function update($song_id)
	{
		$data = array(
			'song_id' => $song_id,
			'song_price' => $this->input->post('song_price')
		 );

		$this->song_model->update($data);
		$path = "data/music/songs/$song_id";
		
		/* Load the Upload class */
		$this->load->library('upload');
		$this->upload_cover($path);

		header("Location: " . base_url() . "admin/singles/");
	}

	public function delete($song_id)
	{
		# Load the Model to delete Order Items
		$this->load->model("order_model");

		$this->song_model->delete($song_id);
		$this->order_model->delete_item(3 , $song_id);

		if ($this->delete_folder($song_id)) {
			header("Location: " . base_url() . "admin/singles");
		}
		
	}
		
	#################################################################################### # End IMEC

	public function upload_cover($path)
	{
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png';
		$config['file_name'] = 'cover.png';
		$config['overwrite'] = TRUE;

		$this->upload->initialize($config);
        return $this->upload->do_upload('file_cover');
	}

	public function upload_songfile($file_name, $path)
	{
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';
		$config['file_name'] = $file_name . '.mp3';
		$this->upload->initialize($config);
        $this->upload->do_upload('song_file');
	}

	/* Delete directory and files within */
	public function delete_folder($song_id)
	{
		$this->load->helper("file"); // load the helper
		$path = "data/music/songs/$song_id";
		if (is_dir($path) ) {
			delete_files($path, true); // delete all files/folders
			return rmdir($path); // delete directory
		}
	}

}