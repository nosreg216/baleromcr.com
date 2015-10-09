<?php

if($_POST){

	session_start();

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
	/************************************************
	Note: $cost variable must be provided by you.
	In this example, I am sending over only 1 item, 
	thus item cost and total cost are the same.
	************************************************/
	$ItemName 		= $_POST["itemname"]; //Item Name
	$ItemPrice 		= $_POST["itemprice"]; //Item Price
	$ItemNumber 	= $_POST["itemnumber"]; //Item Number
	$ItemDesc 		= $_POST["itemdesc"]; //Item Number
	$ItemQty 		= $_POST["itemqty"]; //Item Number
	$Amount = $ItemPrice * $ItemQty;
	$_SESSION['ItemName'] 			=  $ItemName; //Item Name
	$_SESSION['ItemPrice'] 			=  $ItemPrice; //Item Price
	$_SESSION['ItemNumber'] 		=  $ItemNumber; //Item Number
	$_SESSION['ItemDesc'] 			=  $ItemDesc; //Item Number
	$_SESSION['ItemQty'] 			=  $ItemQty; //Item Number
	$_SESSION['Amount'] 			= $Amount;

	$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
	$baseurl = 'https://api-3t'.$paypalmode.'.paypal.com/nvp';

	$username = urlencode($PayPalApiUsername);
	$password = urlencode($PayPalApiPassword);
	$signature = urlencode($PayPalApiSignature);
	$returnurl = urlencode($PayPalReturnURL ); // where the user is sent upon successful completion
	$cancelurl = urlencode($PayPalCancelURL); // where the user is sent upon canceling the transaction

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
	//$post[] = "LOGOIMG=http://www.wau.edu/templates/beez5/images/logo.gif";
	$post[] = "CARTBORDERCOLOR=FFFFFF";
	$post[] = "ALLOWNOTE=1";

	$post['returnurl'] = "RETURNURL=$returnurl"; // do not alter
	$post['cancelurl'] = "CANCELURL=$cancelurl"; // do not alter
	$post['method'] = "METHOD=SetExpressCheckout"; // do not alter
	$post_str = implode('&',$post);
	$output_str = CurlMePost($baseurl,$post_str);
	parse_str($output_str,$output_array);
	$token = (!empty($output_array['TOKEN'])) ? $output_array['TOKEN'] : '';
	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$token.'';
	echo $paypalurl;	
}



?>