<?php
include('config.php');

class Verify{
	function checkSession(){
	
		$test = new Config;
		var_dump($test->username);
	}	
}
?>