<?php
session_start();
include('../class/config.php');
$getUsername = $_GET['username'];
$getPassword = $_GET['password'];

header('Content-Type: application/json');

if($username == $getUsername && $password == $getPassword){
	$array = array(
			    "output" => "Success"
			);
			echo json_encode($array);
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
else{

	$array = array(
			    "output" => "Failed"
			);
			echo json_encode($array);
		}
?>