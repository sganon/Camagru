<?php
	require_once("./classes/user.php");
	require_once("../config/setup.php");
	header('Content-Type: application/json');

	$data = json_decode(file_get_contents('php://input'), true);

	$hash = password_hash($data["pwd"], PASSWORD_BCRYPT, array("cost" => 11));
	$data["pwd"] = $hash;
	$user = new User($dbh, $data);
	try {
		$createdUser = $user->create();
		if (isset($createdUser["ID"])) {
			http_response_code(200);
		} else {
			http_response_code(500);
		}
		echo json_encode($createdUser);
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
	}
?>