<?php
class Order extends CI_Controller {

	public function checkout()
	{
		require(APPPATH.'libraries/Paypal.php');

        /*
        Creates a new Order with the CI Cart data
        @returns: ID of the new Order.
        */
        $email = $this->input->post('email');
        $orderId = $this->create($email);

        if ($orderId === -1 ) {
        	header("Location: cart");
        }

        /* Hash number to identify the order */
        $token = md5($orderId);

		$settings = array(
		'business' => 'nosreg216@gmail.com',       							//paypal email address
		'currency' => 'USD',                       							//paypal currency
		'cursymbol'=> '&dollar;',                   						//currency symbol
		'location' => 'CR',                        							//location code  (ex GB)
		'returnurl'=> "http:127.0.0.1/baleromcr.com/order/update/$token",	//where to go back when the transaction is done.
		'returntxt'=> 'Volver al sitio',         							//What is written on the return button in paypal
		'cancelurl'=> "http:127.0.0.1/baleromcr.com/order/cancel/$token",	//Where to go if the user cancels.
		'shipping' => 0,		                							//Shipping Cost
		'custom'   => ''                           							//Custom attribute
		);

		/* Initialize Paypal Instance */
		$pp = new Paypal($settings);

		/* Read the CI cart to create items suitable for paypal */
        foreach ($this->cart->contents() as $ci_item){
        	$pp_item = array(
			    "name" => $ci_item['name'],
			    "price" => $ci_item['price'],
			    "quantity" => (int)$ci_item['qty'],
			    "shipping" => 0
        	);
        	/*Add the item to the paypal cart */
        	$pp->addSimpleItem($pp_item);
        }

        /* Cleans the CI Shopping Cart*/
        $this->cart->destroy();

        /* Setup the final checkout form */
		$data['summary'] = $pp->getCartContentAsHtml();
		$data['checkout'] = $pp->getCheckoutForm();

		/* Load the view files */
		$data['title'] = 'Finalizar la Compra';
		$this->load->view('header', $data);
		$this->load->view('order_review', $data);
		$this->load->view('footer');
	}

	public function create($email)
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		if ($this->cart->total_items() > 0) {
			/* Create a new order and returns its ID */
			$orderId = $this->order_model->create($email);

			/* Reads the Shopping Cart and adds its items to the order */
	        foreach ($this->cart->contents() as $item){
	        	$this->order_model->add_item($orderId, $item);
	        }
	        return $orderId;
		} else {
			/* Generic Error Code */
			return -1;
		}
	}

	/* Update the order status to 'complete' */
	public function complete($token = null)
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		/* Get the Order ID for further references */
		$orderId = $this->order_model->getRealID($token);

		/* Sets the order as complete */
        $data = array('order_status' => 1);
		$this->order_model->update($orderId, $data);

		/* Get the Order Information to prepare the Email */
		$orderInfo = $this->order_model->request($orderId);

		/* Prepares the email to be sent*/
		//$this->email_notify($orderInfo->order_email);

		header("Location: " . base_url() . "order/$token");
	}

	public function cancel($token = null)
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		/* Sets the order as complete */
		$this->order_model->delete($token);

	}

	public function email_notify($email = 'nosreg216@outlook.com')
	{
		$this->load->library('email');

		$this->email->from('nosreg216@gmail.com', 'Gerson Rodriguez');
		$this->email->to($email);
		$this->email->subject('Comprobante de Compra | Baleromcr.com');
		$this->email->message('Mensaje');
		
		if ($this->email->send()) {
			echo 'Sent.';
		} else {
			echo $this->email->print_debugger();
		}
	}


	public function display($orderToken)
	{

		$this->load->model('order_model');
		$this->load->model('album_model');
		$this->load->model('song_model');

		$orderID = $this->order_model->getRealID($orderToken);
		
		/* This list does not have the item names yet */
		$itemList = $this->order_model->requestItemList($orderID);

		/* Set the titles of the items for display */
        foreach ($itemList as $item) {
            switch ($item->item_type) {
              case '1':
              	$info = $this->album_model->getAlbumById($item->item_id);
              	$item->item_name = $info->album_title;
              	break;
              case '2':
              	$info = $this->album_model->getTrackById($item->item_id);
              	$item->item_name = $info->track_title;
              	break;
              case '3':
              	$info = $this->song_model->getSongById($item->item_id);
              	$item->item_name = $info->song_title;
              	break;
              case '4':
              	$info = $this->album_model->getVideoById($item->item_id);
              	$item->item_name = $info->video_title;
              	break;
              case '5':
              	$info = $this->album_model->getBundleById($item->item_id);
              	$item->item_name = $info->bundle_title;
              	break;
            }
        }

		/*Set the data for the view*/
		$data['title'] = "Order de compra #$orderID";
		$data['order_token'] = $orderToken;
		$data['itemList'] = $itemList;
		
		/*Load the view files*/
		$this->load->view('header', $data);
		$this->load->view('order_display', $data);
		$this->load->view('footer');
	}
	
	public function download()
	{
		$this->load->model('download_model');

		$itemType = $this->input->post('item_type');
		$itemId = $this->input->post('item_id');
		$orderId = $this->input->post('order_id');

		$downloaded = $this->download_model->validate($itemType, $itemId, $orderId);

		if ($downloaded < ITEM_MAX_DOWNLOADS) {

			/* Increase the download counter +1 */
        	$this->download_model->register_download($itemType, $itemId, $orderId, $downloaded);

			/* Call the apropiate zip method */
			switch ($itemType) {
				case 1: $this->download_model->zip_album($itemId);	break;
				case 2: $this->download_model->zip_track($itemId);	break;
				case 3: $this->download_model->zip_song($itemId);	break;
				case 4: $this->download_model->zip_video($itemId);	break;
				case 5: $this->download_model->zip_bundle($itemId);	break;
			}
			
		} else {
			$token = $this->input->post('order_token');
			header("Location: " . base_url() . "order/$token");
		}
	}
}

