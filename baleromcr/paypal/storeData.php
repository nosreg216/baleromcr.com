<?php


if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
	$_SESSION['trackID'] = $_POST['trackID'];
	echo $_SESSION['trackID'];
}

?>