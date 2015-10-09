<?php
class Song extends CI_Controller {

	public function index($songId = 0) {

		$this->load->model('song_model');
		$this->load->model('artist_model');

		/*
		Retrieves the song information from the database
		@params: ID of the song.
		@returns: Array of stdClass Objects (Song)
		*/
		$songInfo = $this->song_model->getSongById($songId);
		/*
		Retrieves the information of the song's artist.
		@params: ID of the artist.
		@returns: Array of stdClass Objects (Artist)
		*/
		$artistInfo = $this->artist_model->getArtistById($songInfo->song_artist);

		/* Set the data for the view */
		$data['title'] = $songInfo->song_title . " - " . $artistInfo->artist_name;
		$data['songInfo'] = $songInfo;
		$data['artistInfo'] = $artistInfo;
		
		/* Load the view files */
		$this->load->view('static/header', $data);
		$this->load->view('song/index', $data);
		$this->load->view('static/footer');

	}
}