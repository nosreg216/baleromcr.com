<?php
class Album extends CI_Controller {

	/* Displays the information of an album*/
	public function index($albumId = 1){

		$this->load->model('album_model');
		$this->load->model('artist_model');
		
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

		/*
		Retrieves the artist information from the database.
		@params: ID of the artist.
		@returns: Array of stdClass Objects (Artist).
		*/
		$albumArtist = $this->artist_model->getArtistById($albumInfo->album_artist);

		/* Set the data for the view */
		$data['title'] = $albumInfo->album_title;
		$data['albumInfo'] = $albumInfo;
		$data['songList'] = $songList;
		$data['albumArtist'] = $albumArtist;

		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('album_view', $data);
/*################################################################################*/
    	$this->load->view('related', $data);
/*################################################################################*/
		$this->load->view('footer');
	}
}