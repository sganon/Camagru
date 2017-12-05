<?php
    require_once('../config/setup.php');
    require_once('./model.php');

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data["requestType"] == "login") {
        $login = new Login($dbh);
        $user = $data["user"];
        $user["pwd"] = hash('whirlpool', $user["pwd"]);
        $dbUser = $login->auth($user);
        if (isset($dbUser["ID"])) {
            unset($dbUser["password"]);
            $dbUser["token"] = hash('ripemd160', $dbUser["ID"] + $dbUser["email"]);
        }
        echo json_encode($dbUser);
    }
?>