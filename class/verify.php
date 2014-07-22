<?php
include('config.php');

class VerifySession{
	function checkSession($username,$password){
		session_start();
		if($_SESSION){
			if($_SESSION['username'] == $username && $_SESSION['password'] == $password){
				
			}else{
				header('Location: login.php');
			}
		}else{
			header('Location: login.php');
		}
		
	}	
}

/**
$verify = new Verify;
$test = $verify->checkSession($username,$password);
**/


?>