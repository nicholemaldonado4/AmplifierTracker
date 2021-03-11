<?php
    require_once "database-connector.php";
    require_once __DIR__."/php/login-verifier.php";

    class SignUpVerifier {
        private const FIRST_NAME = "first-name";
        private const LAST_NAME = "last-name";
        private const EMAIL = "email";
        private const PASSWORD = "pass";
        
        private String $firstName;
        private String $lastName;
        private String $email;
        private String $password;
        
        private function checkFormAttr() {
            $this->firstName = trim($_POST[self::FIRST_NAME]);    
            $this->lastName = trim($_POST[self::LAST_NAME]);
            $this->email = trim($_POST[self::EMAIL]);
            $this->password = trim($_POST[self::PASSWORD]);
            if ($this->firstName === "" || $this->lastName === "" || 
                    $this->email === "" || $this->password === "") {
                echo "Please fill in all fields";
                return false;
            }
            if (strlen($this->password) < 6) {
                echo "Please include a password with at least 6 characters";
                return false;
            }
            return true;
        }
        
        
        function verifySignUp() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($this->checkFormAttr()) {
                    $this->verify();
                }
            }
        }
        
        private function setupSession($db) {
            $verifier = LoginVerifier::createWithDb($this->email, $this->password, $db);
            $verifier->checkCredentials();
        }
        
        private function verify() {
            $db = new DatabaseConnector();
            $response = $db->connect();
            if ($response !== "") {
                echo $response;
                return;
            }
            $query = "Select * from Users WHERE Email='".$this->email."'";
            
            if ($result = $db->getCon()->query($query)) {
                $numRows = $result->num_rows;
                mysqli_free_result($result);
                if ($numRows > 0) {
                    return "Email is already taken";
                }
                $hashedPass = password_hash($this->password, PASSWORD_DEFAULT);
                $query = "INSERT INTO Users (FirstName, LastName, Email, `Password`) VALUES ('{$this->firstName}', '{$this->lastName}', '{$this->email}', '{$hashedPass}')";
                if ($db->getCon()->query($query) === false) {
                    echo $db->getCon()->error;
                    return;
                }
                $this->setupSession($db);
            }
            else {
                echo $db->getCon()->error;
            }
        }
        
    }

    $verifier = new SignUpVerifier();
    $verifier->verifySignUp();
?>