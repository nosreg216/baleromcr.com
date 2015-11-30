<?php
class Banner_model extends CI_Model {

    /* Default methods */
    public function add($data = null)
    {    
        return $this->db->insert('db_banners', $data);
    }

    public function delete($id)
    {
        $this->db->delete('db_banners', array('banner_id' => $id));
    }

	public function get_all()
	{
		$this->db->order_by('banner_type DESC');
        $query = $this->db->get('db_banners');
        return $query->result(); 
	}
	
}