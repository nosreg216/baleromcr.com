<?php
class Account_model extends CI_Model {

	public function getPasswordHash($user = 'balerom')
	{
		$query = $this->db->get_where('db_account', array('acc_username' => $user));
		$result = $query->row();
		return $result->acc_password;
	}
	
}