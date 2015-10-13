<?php
class Order_model extends CI_Model {

		public function request($orderID)
		{	
            $query = $this->db->get_where('db_order', array('order_id' => $orderID));
            return $query->row(); 
		}

        public function create($email)
        {   
            /* Default order ID (First Order) */
            $lastId = 1024;

            /* Get the ID of the previous order */
            $this->db->limit(1);
            $this->db->select('order_id');
            $this->db->order_by('order_id DESC');
            $query = $this->db->get('db_order');

            /* Validate if table is not empty */
            if ($query->num_rows() == 1) {
                $lastId = $query->row();
                $lastId = $lastId->order_id + 1;
            }
            
            /* Define a new ID */
            $data['order_id'] = $lastId;
            $data['order_email'] = $email;
            $data['order_token'] = md5($lastId);

            /* Perform the actual insert */
            $this->db->insert('db_order', $data);

            /* Returns the new order's ID*/
            return $lastId;
        }

        public function add_item($orderID, $item = null)
        {   
            $data['order_id'] = $orderID;
            $data['item_id'] = $item['id'];
            $data['item_type'] = $item['type'];
            $data['item_subtotal'] = $item['price'];
            return $this->db->insert('db_order_item', $data);
        }

        public function update($token = null)
        {
            /* Update the order status to 'complete' */
            $data = array('order_status' => 1);
            $this->db->where('order_token', $token);
            $this->db->update('db_order', $data);
        }

        public function delete($token = null)
        {
            $this->db->delete('db_order', array('order_token' => $token));
        }
}
?>
