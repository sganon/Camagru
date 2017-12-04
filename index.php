<?php
	include 'config/setup.php';
	
	if (isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])) {
		
		$stmt = $dbh->prepare("SELECT * FROM user WHERE id=" . "\"" . $_COOKIE["user_id"] . "\"");
		$stmt->execute();
		$fetchedUser = $stmt->fetch();
		if (hash('ripemd160', $fetchedUser["ID"] + $fetchedUser["email"]) == $_COOKIE["token"]) {
			$_SESSION["logguedUser"] = $fetchedUser["login"];
		}
	}
	
	if (empty($_SESSION["logguedUser"])) {
		if ($_GET["signup"] == "true") {
			require "SignUp/view.php";
		} else {
			require 'Login/view.php';
		}
	} else {
		require 'Home/view.php';		
	}
?>