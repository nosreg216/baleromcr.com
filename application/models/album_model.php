<?php
class Album_model extends CI_Model {

    /* Get the album information from the database */
	public function getAlbumById($albumId = 0)
	{	
        $query = $this->db->get_where('db_album', array('album_id' => $albumId));
        return $albumInfo = $query->row(); 
	}

    /* Get the album list from the database */
    public function getAlbumList(){
        $this->db->order_by('album_year DESC');
        $query = $this->db->get('db_album');
        return $query->result_array();
    }

    /* Get the album information from the database */
    public function getTrackById($trackId = 0)
    {   
        $query = $this->db->get_where('db_album_track', array('track_id' => $trackId));
        return $query->row(); 
    }

    /* Get the song list from the database */
    public function getSongListById($albumId){
        $this->db->from('db_album_track');
        $this->db->where(array('track_album' => $albumId));
        $query = $this->db->get();
        return $query->result();
    }

    public function add($items = null)
    {    
        /* Default ID (First) */
        $lastId = 4096;

        /* Get the ID of the previous album */
        $this->db->limit(1);
        $this->db->select('album_id');
        $this->db->order_by('album_id DESC');
        $query = $this->db->get('db_album');

        /* Validate if table is not empty */
        if ($query->num_rows() == 1) {
            $lastId = $query->row();
            $newID = $lastId->album_id + 1;
        }
        
        /* Define the data before insert */
        $data['album_id'] = $newID;
        $data['album_title'] = $items['title'];
        $data['album_year'] = $items['year'];
        $data['album_price'] = $items['title'];

        /* Perform the actual insert */
        $this->db->insert('db_album', $data);

        /* Returns the new album's ID*/
        return $newID;
    }


    public function add_song($albumId, $data = null)
    {    
        /* Default ID (First) */
        $lastId = 1024;

        /* Get the ID of the previous order */
        $this->db->limit(1);
        $this->db->select('track_id');
        $this->db->order_by('track_id DESC');
        $query = $this->db->get('db_album_track');

        /* Validate if table is not empty */
        if ($query->num_rows() == 1) {
            $lastId = $query->row();
            $newID = $lastId->track_id + 1;
        }
        
        /* Define the data before insert */
        $data['track_id'] = $newID;
        $data['track_title'] = $data['title'];
        $data['track_price'] = $data['price'];

        /* Perform the actual insert */
        $this->db->insert('db_album_track', $data);

        /* Returns the new order's ID*/
        return $newID;
    }

    public function delete($id)
    {
    	$this->db->delete('', array('' => $id));
    }
}
?>
