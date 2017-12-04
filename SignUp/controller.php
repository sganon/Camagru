<?php
    require_once('../config/setup.php');
    require_once('./model.php');

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data["requestType"] == "creation") {
        $signUp = new SignUp($dbh);
        $user = $data["user"];
        $user["pwd"] = password_hash($user["pwd"], PASSWORD_BCRYPT, array("cost" => 11));
        $dbUser = $signUp->createUser($user);
        if (isset($dbUser["ID"])) {
            unset($dbUser["password"]);
            $dbUser["token"] = hash('ripemd160', $dbUser["ID"] + $dbUser["email"]);
        }
        echo json_encode($dbUser);
    }
?>