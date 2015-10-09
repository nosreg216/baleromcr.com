<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

	include_once('connect.php');
	include_once("info.php");

    $infoArrays[]=array('guestList'=>$_SESSION['guestArray'],'ticketName'=>$_SESSION['ticketName'],'ticketPrice'=>$_SESSION['ticketPrice']);

    $host = array_values($_SESSION['guestArray'])[0];
    $transactionID = $_POST['transactionID'];
    $tokenID = $_POST['tokenID'];
    $hostName = $host->name;
    $hostMail = $host->email;
    $date = date('Y-m-d');
    $ticketPrice = $_SESSION['ticketPrice'];
    $ticketName = $_SESSION['ticketName'];

	$message.= "<h1>Order details</h1>";
	$message.= "<p><strong>PayPalTransaction ID:</strong> $transactionID</p>";
	$message.= "<p><strong>Ticket:</strong> $ticketName</p>";
	$message.= "<p><strong>Transaction amount:</strong> $ $ticketPrice USD</p>";
	$message.= "<p><strong>Guest List</strong></p>";
	$message.= '<table rules="all" style="border-color: #666;" cellpadding="10"><thead><tr style="background: #eee;"><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Food</th></tr></thead><tbody>';

    //Save Invoice
	$sql = "INSERT INTO invoice (transaction_id,token_id,client_name,ticket_name,ticket_amount,invoice_date) VALUES ('$transactionID', '$tokenID', '$hostName', '$ticketName', '$ticketPrice', '$date')";
	mysql_query($sql);	

	//Get last ID
	$sql = "SELECT MAX(id) from invoice";
	$rows = mysql_query($sql);

	while($row=mysql_fetch_array($rows)) {		
		$lastID = $row[0];

	}

	//Save Guests
	$index = 1;
	$guestsList = $_SESSION['guestArray'];
	foreach($guestsList as $guest) {
		$message.= "<tr><td>$index</td><td>$guest->name</td><td>$guest->email</td><td>$guest->phone</td><td>$guest->food</td></tr>";
		$sql = "INSERT INTO invoice_details (id_invoice,guest_name,guest_mail,guest_tel,guest_food) VALUES ('$lastID', '$guest->name', '$guest->email', '$guest->phone', '$guest->food')";
		mysql_query($sql);
		$index = $index + 1;
	}
	$message.= "</tbody></table>";
	$message.= "<a href='http://www.wau.edu/gala/buy-tickets/' target='_blank' alt='Visit the Washington Adventist University website'>Visit the Washington Adventist University website</a>";
	
	//$to = 'gabriel.villalobos@accenture.com';
	$from = 'gala@wau.edu';

	$subject = 'Washington Adventist University - Ticket Invoice';

	$headers = "From: $from\r\n";
	$headers .= "CC: $from\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	mail($hostMail, $subject, $message, $headers);

    echo json_encode($infoArrays);
}

?>