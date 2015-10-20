<?php
class Video extends CI_Controller {

	public function view_video($songId = 0) {

		$this->load->model('video_model');

		/*
		Retrieves the video information from the database
		@params: ID of the song.
		@returns: Array of stdClass Objects (Song)
		*/
		$videoInfo = $this->video_model->getVideoById($videoId);

		/* Set the data for the view */
		$data['title'] = $videoInfo->video_title . " - Balerom!";
		$data['videoInfo'] = $videoInfo;
		
		/* Load the view files */
		$this->load->view('static/header', $data);
		$this->load->view('video/video_view', $data);
		$this->load->view('static/footer');

	}

}