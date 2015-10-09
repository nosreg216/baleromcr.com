<?php
class Artist_model extends CI_Model {

    /* Get the artist information from the database */
	public function getArtistById($artistId = 0)
	{	
        $query = $this->db->get_where('db_artist', array('artist_id' => $artistId));
        return $albumArtist = $query->row(); 
	}
    
    /* Get the album list from the database */
    public function getAlbumListById($artistId){
        $query = $this->db->get_where('db_album', array('album_artist' => $artistId));
        return $query->result();
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
}
?>
