<?php
class Search extends CI_Controller {

	/* Displays the Search Results*/
	public function index(){
		
		/* Prevent SQL injection. */
		$search = html_escape($_GET['s']);
		$search = trim($search);

		// Get the album search results from the database
		$query = $this->db->like('album_title', $search);
		$query = $this->db->or_like('album_year', $search);
		$query = $this->db->order_by('album_title ASC');
		$query = $this->db->get('db_album');
		$data['albumList'] = $query->result();
		$data['albumCount'] = $query->num_rows();

		// Get the song search results from the database (singles)
		$query = $this->db->like('song_title', $search);
		$query = $this->db->or_like('song_year', $search);
		$query = $this->db->order_by('song_title ASC');
		$query = $this->db->get('db_song');
		$data['songList'] = $query->result();
		$data['songCount'] = $query->num_rows();

		// Get the song search results from the database (albums)
		$query = $this->db->like('track_title', $search);
		$query = $this->db->order_by('track_title ASC');
		$this->db->from('db_album_track');
		$query = $this->db->get();
		$data['albumSongList'] = $query->result();
		$data['albumSongCount'] = $query->num_rows();

		// Get the videos search results from the database
		$query = $this->db->like('album_title', $search);
		$query = $this->db->or_like('album_year', $search);
		$query = $this->db->get('db_album');
		$data['videoList'] = $query->result();
		$data['videoCount'] = $query->num_rows();

		/* Load the view files */
		$data['title'] = 'Resultados de la busqueda';
		$this->load->view('header', $data);
		$this->load->view('search_results', $data);
		$this->load->view('footer');
	}
}