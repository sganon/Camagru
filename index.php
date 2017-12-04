<?php
	include 'config/setup.php';
	session_start();
	
	if (empty($_SESSION["token"])) {
		if ($_GET["signup"] == "true") {
			require "SignUp/view.php";
		} else {
			require 'Login/view.php';
		}
	} else {
		require 'Home/view.php';		
	}
?>