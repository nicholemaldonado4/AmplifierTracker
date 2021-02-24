<?php
   require_once "database-connector.php";

    class LoginVerifier {
        private const USER_TABLE = "Users";
        private const POST_USER = "username";
        private const POST_PASS = "pass";
        private $db;
        function checkCredentials() {
            
            $query = "SELECT * FROM ".self::USER_TABLE." WHERE Email='".$_POST[self::POST_USER]."'";
            if ($result = $this->db->getCon()->query($query)) {
                while($row = $result->fetch_assoc()) {
                    if ($row["Password"] === $_POST[self::POST_PASS]) {
                        session_start();
                        $_SESSION['userID'] = $row["Id"];
                        $_SESSION["name"] = $row["FirstName"];
                        mysqli_free_result($result);
                        return "";
                    }
                }
                mysqli_free_result($result);
                return "Incorrect login credentials.";
            }

            return "Incorrect login credentials.";
        }
        
        function checkCredsExist() {
            $_POST[self::POST_USER] = trim($_POST[self::POST_USER]);
            $_POST[self::POST_PASS] = trim($_POST[self::POST_PASS]);
            if ($_POST[self::POST_USER] === "" || $_POST[self::POST_PASS] === "") {
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
                    echo $this->checkCredentials();
                    $this->db->close();
                    return;
                }
                echo $response;
            }
        }
    }

    $verifier = new LoginVerifier();
    $verifier->verifyLogin();
?>