<?php
    class User {
        public $_user;
        
        public $_dbh;

        public function __construct($dbh, $user) {
            $this->_user = $user;
            $this->_dbh = $dbh;
        }

        public function getByEmail() {
            $stmt = $this->_dbh->prepare("SELECT * FROM `user` WHERE `email`= :email;");
            $stmt->bindValue('email', $this->_user["email"], PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch();
            return $rows;
        }

        public function create() {
            try {
                $stmt = $this->_dbh->prepare("INSERT INTO user(login,email,password) VALUES (:login,:email,:password)");
                $stmt->bindValue('login', $this->_user["login"], PDO::PARAM_STR);
                $stmt->bindValue('email', $this->_user["email"], PDO::PARAM_STR);
                $stmt->bindValue('password', $this->_user["pwd"], PDO::PARAM_STR);
                if (!$stmt->execute()) {
                    return $stmt->errorInfo();
                } else {
                    return $this->getByEmail();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                return e;
            }

        }
    }
?>