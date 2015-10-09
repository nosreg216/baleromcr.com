<?php
class Order extends CI_Controller {

	public function checkout()
	{
		require(APPPATH.'libraries/Paypal.php');

        /*
        Creates a new Order with the CI Cart data
        @returns: ID of the new Order.
        */
        $orderId = $this->create();

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
		
		var_dump($settings['cancelurl']);

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
		$this->load->view('static/header', $data);
		$this->load->view('order_review', $data);
		$this->load->view('static/footer');
	}



	public function create()
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		/* Create a new order and returns its ID */
		$orderId = $this->order_model->create();

		/* Reads the Shopping Cart and adds its items to the order */
        foreach ($this->cart->contents() as $item){
        	$this->order_model->add_item($orderId, $item);
        }

        return $orderId;
	}

	public function update($token = null)
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		/* Sets the order as complete */
		$this->order_model->update($token);

	}

	public function cancel($token = null)
	{
		/*Loads the Order data model */
		$this->load->model('order_model');

		/* Sets the order as complete */
		$this->order_model->delete($token);

	}
}