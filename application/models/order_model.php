<?php
class Order_model extends CI_Model {

		public function request($orderID)
		{	
            $query = $this->db->get_where('db_order', array('order_id' => $orderID));
            return $query->row(); 
		}

        /*
        @description: Get the list of items the Order.
        @param: Order Token (public ID)
        @return: Array of Objects (order_Item stClass).
        */
        public function requestItemList( $orderID )
        {   
            /* Get the item list */

            $query = $this->db->get_where('db_order_item', array('order_id' => $orderID));
            return $itemList =  $query->result();
        } 

        /*
        @description: Get the ID of the  Order.
        @param: Order Token (public ID)
        @return: Order ID number (Integer).
        */
        public function getRealID( $orderToken )
        {   
            /* Get the ID of the Order. */
            $query = $this->db->get_where('db_order', array('order_token' => $orderToken));
            $order = $query->row();
            return $order->order_id;
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

        public function update($orderId, $data)
        {
            $this->db->where('order_id', $orderId);
            $this->db->update('db_order', $data);
        }

        public function update_item($orderId, $data)
        {
            $this->db->where('order_id', $orderId);
            $this->db->update('db_order_item', $data);
        }

        public function delete($token = null)
        {
            $this->db->delete('db_order', array('order_token' => $token));
        }

        public function delete_item($item_type, $item_id)
        {
         $this->db->delete('db_order_item', array('item_id' => $item_id, 'item_type' => $item_type));   
        }
}
?>
