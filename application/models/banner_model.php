<?php
class Banner_model extends CI_Model {

    /* Default methods */
    public function add($banner_data = null)
    {    
        /* Default ID (First) */
        $banner_id = 0;

        /* Get the ID of the last inserted banner */
        $this->db->limit(1);
        $this->db->select('banner_id');
        $this->db->order_by('banner_id DESC');
        $query = $this->db->get('db_banners');

        /* Validate if table was empty */
        if ($query->num_rows() != 0) {
            $result = $query->row();
            $banner_id = $result->banner_id + 1;
        }
        
        /* Define the data before insert */
        $data['banner_id'] = $banner_id;
        $data['banner_type'] = $banner_data['banner_type'];
        $data['banner_desc'] = $banner_data['banner_desc'];

        /* Perform the actual insert */
        $this->db->insert('db_banners', $data);

        /* Returns the new banner's ID*/
        return $banner_id;
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