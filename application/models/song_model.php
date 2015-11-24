<?php
class Song_model extends CI_Model {

    /* Get the song information from the database */
	public function getSongById($songId = 0)
	{	
        $query = $this->db->get_where('db_song', array('song_id' => $songId));
        return $albumInfo = $query->row(); 
	}

    /* Default methods */
    public function add($items = null)
    {    
        return $this->db->insert('', $data);
    }

    public function delete($id)
    {
        $this->db->delete('', array('' => $id));
    }
    public function getCount()
    {
        return $this->db->count_all_results('db_song');
    }
}


