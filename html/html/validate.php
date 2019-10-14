<?php
	require_once('rfc6238.php');
	$code = $_POST['c'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$secretkey = 'GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ';

	if (TokenAuth6238::verify($secretkey,$code) && $username == "admin" && $password == "admin") {
		echo "Code is valid\n";
	} else {
		echo "Username, password, or code is invalid\n";
		shell_exec("echo " . date("Y-m-d H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " >> /var/www/html/log/fail.txt");
	}

  print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl('','',$secretkey,'My%20App'));
  print TokenAuth6238::getTokenCodeDebug($secretkey,0); 
