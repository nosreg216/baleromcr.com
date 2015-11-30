<?php
class Video_model extends CI_Model {

    /* Get the video information from the database */
	public function getVideoById($videoId = 0)
	{	
        $query = $this->db->get_where('db_video', array('video_id' => $videoId));
        return $query->row(); 
	}

    /* Default methods */

    public function getVideoList(){
        $this->db->from('db_video');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($video_data = null)
    {    
        /* Default ID (First) */
        $video_id = 1;

        /* Get the ID of the last inserted video */
        $this->db->limit(1);
        $this->db->select('video_id');
        $this->db->order_by('video_id DESC');
        $query = $this->db->get('db_video');

        /* Validate if table was empty */
        if ($query->num_rows() != 0) {
            $result = $query->row();
            $video_id = $result->video_id + 1;
        }
        
        /* Define the data before insert */
        $data['video_id'] = $video_id;
        $data['video_title'] = $video_data['video_title'];
        $data['video_year'] = $video_data['video_year'];
        $data['video_price'] = $video_data['video_price'];

        /* Perform the actual insert */
        $this->db->insert('db_video', $data);

        /* Returns the new video's ID*/
        return $video_id;
    }

   public function update($data)
    {
        $this->db->update('db_video', $data, array('video_id' => $data['video_id']));  
    }

    public function delete($id)
    {
        $this->db->delete('db_video', array('video_id' => $id));
    }
    
    public function getCount()
    {
        return $this->db->count_all_results('db_video');
    }
}

