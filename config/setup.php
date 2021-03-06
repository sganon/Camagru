<?php
	require_once("database.php");
	try {
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$dbh->exec("USE camagru;");
		$query = "CREATE TABLE `user` (
			`ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`firstname` varchar(50) NOT NULL,
			`lastname` varchar(50) NOT NULL,
			`login` varchar(50) NOT NULL UNIQUE,
			`password` varchar(255) NOT NULL,
			`email` varchar(255) NOT NULL UNIQUE,
			`is_validated` tinyint NOT NULL DEFAULT 0,
			`created_at` datetime DEFAULT NOW(),
			`updated_at` datetime DEFAULT NOW()
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$dbh->exec($query);

		session_start();
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>