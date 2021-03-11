<?php
    class SessionSetter {
        private String $currPage;
        private array $keepKeys;
        
        function __construct($currPage, $keepKeys=array()) {
            session_start();
            $this->currPage = $currPage;
            $this->keepKeys = $keepKeys;
        }
        
        function setPast() {
            $_SESSION["past"] = $this->currPage;
        }
        
        function checkLogin() {

            if (!isset($_SESSION["userID"])) {
                $this->setPast();
                header("Location: ../index.php");
                die();
            }
        }
        
        function deleteKeys() {
            $sessionKeys = array_keys($_SESSION);
            foreach ($sessionKeys as $sessionKey) {
                if ($sessionKey !== "userID" && $sessionKey !== "name" && $sessionKey !== "past" && !array_key_exists($sessionKey, $this->keepKeys)) {
                    unset($_SESSION[$sessionKey]);
                }
            }
        }
        
        function addTypeAndLoc() {
            $this->keepKeys["POST_loc"] = Null;
            $this->keepKeys["POST_type"] = Null;
        }
        
        // For index.php, amps-ants.php
        function setupSessionAndClear($checkLogin) {
            if ($checkLogin) {
                $this->checkLogin();
            }
            
            $this->deleteKeys();
            $this->setPast();
        }
        
        function checkHasKeys() {
            $keepKeys = array_keys($this->keepKeys);
            foreach ($keepKeys as $keepKey) {
                if (!isset($_SESSION[$keepKey])) {
                    return false;
                }
            }
            return true;
        }
        
        static function setupMaintenaceSession() {
            $sessionSetter = new SessionSetter("maintenance", array("POST_search"=>Null));
            $sessionSetter->checkLogin();
            if (!isset($_SESSION["past"]) || $_SESSION["past"] !== "maintenance") {
                $sessionSetter->deleteKeys();
            }
            else {
                $sessionSetter->deleteKeys();
            }
            $sessionSetter->setPast();
        }
        
        static function setupAfterAntAmp($currPage, $keepKeys = array()) {
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $sessionSetter = new SessionSetter($currPage, $keepKeys);
                $sessionSetter->checkLogin();
                if (!isset($_SESSION["POST_loc"]) || !isset($_SESSION["POST_type"])) {
                    header("Location: ../amps-ants.php");
                    die();
                }
                if (!$sessionSetter->checkHasKeys()) {
                    header("Location: ../amps-ants/display.php");
                    die();
                }
                $sessionSetter->addTypeAndLoc();
                $sessionSetter->deleteKeys();
            }
        }        
    }
  

    

    

    
?>