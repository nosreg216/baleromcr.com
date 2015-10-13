<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Controller {

	/* Displays the album collection of an artist*/
	public function index($artistId = 0){

		$this->load->model('artist_model');
		/*
		Retrieves the artist information from the database
		@params: ID of the artist.
		@returns: Array of Objects (Artist)
		*/
		$artistInfo = $this->artist_model->getArtistById($artistId);
		/*
		Retrieves the album list of a given artist.
		@params: ID of the artist.
		@returns: Array of Objects (Album)
		*/
		$albumList = $this->artist_model->getAlbumListById($artistId);

		/* Set the data for the view */
		$data['title'] = $artistInfo->artist_name;
		$data['artistInfo'] = $artistInfo;
		$data['albumList'] = $albumList;
		
		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('artist_view', $data);
		$this->load->view('footer');

	}
}