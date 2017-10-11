<?php
	require_once("./classes/user.php");
	require_once("../config/setup.php");
	header('Content-Type: application/json');

	$data = json_decode(file_get_contents('php://input'), true);

	$hash = password_hash($data["pwd"], PASSWORD_BCRYPT, array("cost" => 11));
	$data["pwd"] = $hash;
	$user = new User($dbh, $data);
	$fetchedUser = $user->getByEmail();
	if ($fetchedUser == NULL) {
		$createdUser = $user->create();
		http_response_code(200);
		echo json_encode($createdUser);
	} else {
		http_response_code(409);
		echo json_decode(array("message" => "User already exist"));
	}
?>