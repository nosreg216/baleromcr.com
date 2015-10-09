<?php
class Search extends CI_Controller {

	/* Displays the Search Results*/
	public function index(){
		
		/* Prevent SQL injection. */
		$search = html_escape($_GET['s']);
		$search = trim($search);

		// Get the album list from the database
		$query = $this->db->like('album_title', $search);
		$query = $this->db->or_like('album_year', $search);
		$query = $this->db->order_by('album_title ASC');
		$query = $this->db->get('db_album');
		$data['albumList'] = $query->result();
		$data['albumCount'] = $query->num_rows();

		// Get the song list from the database (singles)
		$query = $this->db->where('isSingle', 1);
		$query = $this->db->like('song_title', $search);
		$query = $this->db->or_like('song_year', $search);
		$query = $this->db->order_by('song_title ASC');
		$query = $this->db->get('db_song');
		$data['songList'] = $query->result();
		$data['songCount'] = $query->num_rows();

		// Get the song list from the database (albums)
		$query = $this->db->where('isSingle', 0);
		$query = $this->db->like('song_title', $search);
		$query = $this->db->or_like('song_year', $search);
		$query = $this->db->order_by('song_title ASC');
		$this->db->from('db_song as dbs');
        $this->db->join('db_song_x_album as dbsxa' , 'dbsxa.song_id = dbs.song_id');
		$query = $this->db->get();
		$data['albumSongList'] = $query->result();
		$data['albumSongCount'] = $query->num_rows();

		// Get the videos list from the database
		$query = $this->db->like('album_title', $search);
		$query = $this->db->or_like('album_year', $search);
		$query = $this->db->get('db_album');
		$data['videoList'] = $query->result();
		$data['videoCount'] = $query->num_rows();

		/* Load the view files */
		$data['title'] = 'Resultados de la busqueda';
		$this->load->view('static/header', $data);
		$this->load->view('global/results', $data);
		$this->load->view('static/footer');
	}
}