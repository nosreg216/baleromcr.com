<?php
class Song extends CI_Controller {

	public function view_song($songId = 0) {

		$this->load->model('song_model');

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
		$this->load->view('static/header', $data);
		$this->load->view('song/song_view', $data);
		$this->load->view('static/footer');
	}
}