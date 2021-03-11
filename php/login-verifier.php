<?php
   require_once "database-connector.php";

    class LoginVerifier {
        private const USER_TABLE = "Users";
        private const POST_USER = "username";
        private const POST_PASS = "pass";
        
        private String $email;
        private String $password;
        private $db;
        
        function setAttr($email, $password, $db) {
            $this->email = $email;
            $this->db = $db;
            $this->password = $password;
        }
        
        static function createWithDb($email, $password, $db) {
            $verifier = new LoginVerifier();
            $verifier->setAttr($email, $password, $db);
            return $verifier;
        }
        
        function checkCredentials() {    
            $query = "SELECT * FROM ".self::USER_TABLE." WHERE Email='".$this->email."'";
            if ($result = $this->db->getCon()->query($query)) {
                while($row = $result->fetch_assoc()) {
                    if (password_verify($this->password, $row["Password"])) {
                        session_start();
                        $_SESSION['userID'] = $row["Id"];
                        $_SESSION["name"] = $row["FirstName"];
                        mysqli_free_result($result);
                        return true;
                    }
                }
                mysqli_free_result($result);
                return "Incorrect login credentials.";
            }

            return "Incorrect login credentials.";
        }
        
        function checkCredsExist() {
            $this->email = trim($_POST[self::POST_USER]);
            $this->password = trim($_POST[self::POST_PASS]);
            if ($this->email === "" || $this->password === "") {
                return "Empty email or password";
            }
            return "";
        }
        
        function verifyLogin() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $response = $this->checkCredsExist();
                if ($response !== "") {
                    echo $response;
                }
                
                $this->db = new DatabaseConnector();
                $response = $this->db->connect();
                if ($response === "") {
                    if (($result = $this->checkCredentials()) !== true) {
                        echo $result;
                    }
                    $this->db->close();
                    return;
                }
                echo $response;
            }
        }
    }
?>