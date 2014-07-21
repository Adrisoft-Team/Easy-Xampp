<?php
include('config.php');
session_start();
if($_SESSION){
	if($_SESSION['username'] == $username && $_SESSION['password'] == $password){
		
	}else{
		header('Location: ../login.php');
	}
}else{
		header('Location: ../login.php');
}

?>