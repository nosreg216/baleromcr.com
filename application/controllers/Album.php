<?php
class Album extends CI_Controller {

	/* Displays the information of an album*/
	public function view_album($albumId = 1){

		$this->load->model('album_model');
		
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
		$this->load->model('album_model');
		$albumList = $this->album_model->getAlbumList();

		$data['title'] = "Todo el Contenido | Balerom";
		$data['albumList'] = $albumList;

		/* Load the view files */
		$this->load->view('header', $data);
		$this->load->view('album_list', $data);
		$this->load->view('footer');
	}
}