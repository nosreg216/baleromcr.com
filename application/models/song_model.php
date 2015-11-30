<?php
class Song_model extends CI_Model {

    /* Get the song information from the database */
	public function getSongById($songId = 0)
	{	
        $query = $this->db->get_where('db_song', array('song_id' => $songId));
        return $query->row(); 
	}

    public function getSongList(){
        $this->db->from('db_song');
        $query = $this->db->get();
        return $query->result();
    }

    /* Default methods */
    public function add($song_data = null)
    {    
        /* Default ID (First) */
        $song_id = 1;

        /* Get the ID of the last inserted song */
        $this->db->limit(1);
        $this->db->select('song_id');
        $this->db->order_by('song_id DESC');
        $query = $this->db->get('db_song');

        /* Validate if table was empty */
        if ($query->num_rows() != 0) {
            $result = $query->row();
            $song_id = $result->song_id + 1;
        }
        
        /* Define the data before insert */
        $data['song_id'] = $song_id;
        $data['song_title'] = $song_data['song_title'];
        $data['song_year'] = $song_data['song_year'];
        $data['song_price'] = $song_data['song_price'];

        /* Perform the actual insert */
        $this->db->insert('db_song', $data);

        /* Returns the new song's ID*/
        return $song_id;
    }

    public function delete($id)
    {
        $this->db->delete('db_song', array('song_id' => $id));
    }

    public function update($data)
    {
        $this->db->update('db_song', $data, array('song_id' => $data['song_id']));  
    }

    public function getCount()
    {
        return $this->db->count_all_results('db_song');
    }
}


