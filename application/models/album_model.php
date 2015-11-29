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

    public function getCount()
    {
        return $this->db->count_all_results('db_album');
    }

    public function add($items = null)
    {    
        /* Default ID (First) */
        $album_id = 0;

        /* Get the ID of the last inserted album */
        $this->db->limit(1);
        $this->db->select('album_id');
        $this->db->order_by('album_id DESC');
        $query = $this->db->get('db_album');

        /* Validate if table was empty */
        if ($query->num_rows() != 0) {
            $result = $query->row();
            $album_id = $result->album_id + 1;
        }
        
        /* Define the data before insert */
        $data['album_id'] = $album_id;
        $data['album_title'] = $items['album_title'];
        $data['album_year'] = $items['album_year'];
        $data['album_price'] = $items['album_price'];

        /* Perform the actual insert */
        $this->db->insert('db_album', $data);

        /* Returns the new album's ID*/
        return $album_id;
    }


    public function add_track($track_data)
    {    
        /* Default ID (First) */
        $track_id = 0;

        /* Get the ID of the previous song */
        $this->db->limit(1);
        $this->db->select('track_id');
        $this->db->order_by('track_id DESC');
        $query = $this->db->get('db_album_track');

        /* Validate if table is not empty */
        if ($query->num_rows() == 1) {
            $result = $query->row();
            $track_id = $result->track_id + 1;
        }
        
        /* Define the data before insert */
        $data['track_id'] = $track_id;
        $data['track_album'] = $track_data['track_album'];
        $data['track_title'] = $track_data['track_title'];
        $data['track_price'] = $track_data['track_price'];

        /* Perform the actual insert */
        $this->db->insert('db_album_track', $data);
    }

    public function delete($id)
    {
    	$this->db->delete('db_album', array('album_id' => $id));
    }
}
?>
