<?php
    class Login {
        protected $_dbh;

        public function __construct($dbh) {
            $this->_dbh = $dbh;
        }

        function auth($user) {
            try {
                    $stmt = $this->_dbh->prepare("SELECT * FROM user WHERE login=" . "\"" . $user["login"] . "\"");
                    if (!$stmt->execute()) {
                        return $stmt->errorInfo();
                    } else {
                        $fetchedUser = $stmt->fetch();
                        if ($user["pwd"] == $fetchedUser["password"]) {
                            return $fetchedUser;
                        }
                        return false; 
                    }
            } catch (Exception $e) {
                echo $e->getMessage();
                return e;
            }
        }
    }
?>