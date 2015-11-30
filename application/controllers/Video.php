<?php
class Video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('video_model');
    }
	public function view_video($videoId = 0) {

		$this->load->model('video_model');

		/*
		Retrieves the video information from the database
		@params: ID of the video.
		@returns: Array of stdClass Objects (video)
		*/
		$videoInfo = $this->video_model->getVideoById($videoId);

		/* Set the data for the view */
		$data['title'] = $videoInfo->video_title . " - Balerom!";
		$data['videoInfo'] = $videoInfo;
		
		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('video_view', $data);
		$this->load->view('footer');

	}

	public function insert()
	{
		$video_data = array(
			'video_title' => $this->input->post('video_title'),
			'video_year' => $this->input->post('video_year'),
			'video_price' => $this->input->post('video_price')
		);

		/* Insert the video and retrieve the video ID */
		$video_id = $this->video_model->add($video_data);
		$file_name = $video_data['video_title'];


		/* Create directory for file upload */
		$path = "data/music/videos/$video_id";
		if (!is_dir($path) ) {
			mkdir($path, 755); // Create the video directory
		}
		/* Load the Upload class */
		$this->load->library('upload');
		/* Upload the video cover */
		$this->upload_cover($path);
		/* Upload the file list */
		$this->upload_videofile($file_name, $path);
		
		/* Proceed to upload videos in the editor */
		header("Location: " . base_url() . "admin/videos/");
	}

	public function update($video_id)
	{
		$data = array(
			'video_id' => $video_id,
			'video_price' => $this->input->post('video_price')
		 );

		$this->video_model->update($data);
		$path = "data/music/videos/$video_id";
		
		/* Load the Upload class */
		$this->load->library('upload');
		$this->upload_cover($path);

		header("Location: " . base_url() . "admin/videos/");
	}

	public function delete($video_id)
	{
		# Load the Model to delete Order Items
		$this->load->model("order_model");

		$this->video_model->delete($video_id);
		$this->order_model->delete_item(4 , $video_id);

		if ($this->delete_folder($video_id)) {
			header("Location: " . base_url() . "admin/videos");
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

	public function upload_videofile($file_name, $path)
	{
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';
		$config['file_name'] = $file_name . '.mp4';
		$this->upload->initialize($config);
        $this->upload->do_upload('video_file');
	}

	/* Delete directory and files within */
	public function delete_folder($video_id)
	{
		$this->load->helper("file"); // load the helper
		$path = "data/music/videos/$video_id";
		if (is_dir($path) ) {
			delete_files($path, true); // delete all files/folders
			return rmdir($path); // delete directory
		}
	}

}