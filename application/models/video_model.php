<?php
class Video_model extends CI_Model {

    /* Get the video information from the database */
	public function getVideoById($videoId = 0)
	{	
        $query = $this->db->get_where('db_video', array('video_id' => $videoId));
        return $query->row(); 
	}

    /* Default methods */
    public function add($items = null)
    {    
        return $this->db->insert('db_video', $data);
    }

    public function delete($id)
    {
        $this->db->delete('', array('' => $id));
    }
}
?>
