<?php
    class SignUp {
        protected $_dbh;

        public function __construct($dbh) {
            $this->_dbh = $dbh;
        }

        function createUser($user) {
            try {
                $stmt = $this->_dbh->prepare("INSERT INTO user(firstname,lastname,login,email,password)".
                    " VALUES (:firstname,:lastname,:login,:email,:password)");
                $stmt->bindValue('firstname', $user["firstname"], PDO::PARAM_STR);
                $stmt->bindValue('lastname', $user["lastname"], PDO::PARAM_STR);
                $stmt->bindValue('login', $user["login"], PDO::PARAM_STR);
                $stmt->bindValue('email', $user["email"], PDO::PARAM_STR);
                $stmt->bindValue('password', $user["pwd"], PDO::PARAM_STR);
                if (!$stmt->execute()) {
                    return $stmt->errorInfo();
                } else {
                    $stmt = $this->_dbh->prepare("SELECT * FROM user WHERE email=" . "\"" . $user["email"] . "\"");
                    $stmt->execute();
                    return !$stmt->execute() ? $stmt->errorInfo() : $stmt->fetch();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                return e;
            }
        }
    }
?>