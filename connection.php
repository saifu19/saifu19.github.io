<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'BitMoney';
    $mysqli = mysqli_connect($host, $username, $password, $database);
	if(mysqli_connect_error()) {
		die();
	}
    // $email = "saifullahpk4@gmail.com";
    // $password = md5($email.'password');
    // $query = "INSERT INTO `admin`(`email`, `password`) VALUES ('".$email."', '".$password."')";
    // mysqli_query($mysqli, $query);
?>