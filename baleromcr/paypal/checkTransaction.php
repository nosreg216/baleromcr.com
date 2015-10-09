<?php

if($_POST){

	include_once("info.php");

	function CurlMePaypal($url,$post){
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt ($ch, CURLOPT_CAINFO, getcwd() . "/api-3t.paypal.com.crt");
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 10);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	function CurlMePost($url,$post){ 
		// $post is a URL encoded string of variable-value pairs separated by &
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 3); // 3 seconds to connect
		curl_setopt ($ch, CURLOPT_TIMEOUT, 10); // 10 seconds to complete
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	$payerid = urlencode($_POST['PayerID']);
	$token = urlencode($_POST['token']);

	$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
	$baseurl = 'https://api-3t'.$paypalmode.'.paypal.com/nvp';
	 
	$username = urlencode($PayPalApiUsername);
	$password = urlencode($PayPalApiPassword);
	$signature = urlencode($PayPalApiSignature);
	$returnurl = urlencode($PayPalReturnURL ); // where the user is sent upon successful completion
	$cancelurl = urlencode($PayPalCancelURL); // where the user is sent upon canceling the transaction

	$ItemName = $_SESSION['ItemName']; //Item Name
	$ItemPrice = $_SESSION['ItemPrice']; //Item Price
	$ItemNumber = $_SESSION['ItemNumber']; //Item Number
	$ItemDesc = $_SESSION['ItemDesc']; //Item Number
	$ItemQty = $_SESSION['ItemQty'];
	$Amount = $_SESSION['Amount'];

	$post[] = "USER=$username";
	$post[] = "PWD=$password";
	$post[] = "SIGNATURE=$signature";
	$post[] = "VERSION=65.1"; // very important!
	$post[] = "PAYMENTREQUEST_0_CURRENCYCODE=USD"; 
	$post[] = "PAYMENTREQUEST_0_AMT=$Amount";
	$post[] = "L_PAYMENTREQUEST_0_AMT0=$ItemPrice";
	$post[] = "PAYMENTREQUEST_0_PAYMENTACTION=Sale"; // do not alter
	$post[] = "L_PAYMENTREQUEST_0_NAME0=$ItemName"; // use %20 for spaces
	$post[] = "L_PAYMENTREQUEST_0_DESC0=$ItemDesc"; // do not alter
	$post[] = "L_PAYMENTREQUEST_0_QTY0=$ItemQty";
	$post['method'] = "METHOD=DoExpressCheckoutPayment";
	$post['token'] = "TOKEN=$token";
	$post['payerid'] = "PayerID=$payerid";
	$post_str = implode('&',$post);
	$output_str = CurlMePost($baseurl,$post_str);
	parse_str($output_str,$output_array);

	echo json_encode($output_array);

}



?>