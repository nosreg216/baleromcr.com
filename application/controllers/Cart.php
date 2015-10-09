<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

/* Displays the Shopping Cart */
	public function display(){

		// Load the view files
		$data['title'] = 'Carrito de Compra';
		$this->load->view('static/header', $data);
		$this->load->view('cart/index', $data);
		$this->load->view('static/footer');
	}

	public function add_single($songId){
		/*
		Retrieves the song information from the database
		@params: ID of the song.
		@returns: Array of stdClass Objects (Song)
		*/
		$this->load->model('song_model');
		$songInfo = $this->song_model->getSongById($songId);

		/* Insert the data to the cart session */
		$data = array(
		    'id'      => $songId,
		    'qty'     => 1,
		    'price'   => $songInfo->song_price,
		    'name'    => $songInfo->song_title,
		    'type'    => '1'
		);
		$this->cart->insert($data);
		//header("Location: " . base_url() . "song/$song_id?ac=1");
		//header("Location: " . base_url() . "cart");
	}

	public function add_album($albumId){
		/*
		Retrieves the album information from the database.
		@params: ID of the album.
		@returns: Array of stdClass Objects (Album).
		*/
		$this->load->model('album_model');
		$albumInfo = $this->album_model->getAlbumById($albumId);

		/* Insert the data to the cart session */
		$data = array(
		    'id'      => $albumId,
		    'qty'     => 1,
		    'price'   => $albumInfo->album_price,
		    'name'    => $albumInfo->album_title,
		    'type'    => '2'
		);
		$this->cart->insert($data);
		header("Location: " . base_url() . "cart");
	}

	public function delete($id){
		$this->cart->remove($id);
		header("Location: " . base_url() . "cart");
	}

	public function clean(){
		$this->cart->destroy();
		header("Location: " . base_url() . "cart");
	}



}