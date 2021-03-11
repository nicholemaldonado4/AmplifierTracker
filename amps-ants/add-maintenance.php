<?php
    require_once dirname(__DIR__)."/database-connector.php";

    class MaintenanceAdder {
        private const BARCODE = "barcode";
        private const DATE_ADDED = "date-added";
        private const PROBLEM = "prob";
        private const PROB_DESCRIP = "prob-descrip";
        
        private String $barcode;
        private String $dateAdded;
        private String $prob;
        private String $probDescrip;
        
        function parsePostData() {
            if (!isset($_POST)) {
                return "Invalid form request";
            }
            if (!isset($_POST[self::BARCODE]) || ($this->barcode = trim($_POST[self::BARCODE])) === "") {
                return "Invalid barcode";
            }
            if (!isset($_POST[self::DATE_ADDED])) {
                return "Invalid date added";
            }
            if (!isset($_POST[self::PROBLEM]) || ($this->prob = trim($_POST[self::PROBLEM])) === "") {
                return "Invalid problem";
            }
            if (!isset($_POST[self::PROB_DESCRIP]) || ($this->probDescrip = trim($_POST[self::PROB_DESCRIP])) === "") {
                return "Invalid problem";
            }
            $this->dateAdded = $_POST[self::DATE_ADDED];
            return true;
        }
        
        function addToDB() {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = "INSERT INTO MaintenanceLog (Barcode, ProbDescription, DateAdded, Problem) " .
                        "VALUES (\"{$this->barcode}\", \"{$this->probDescrip}\", \"{$this->dateAdded}\", " .
                        "\"{$this->prob}\")";
                if($db->getCon()->query($query) === False){
                    echo $db->getCon()->error;
                }
            }
        }
        
        function addMaintenance() {
            if (($result = $this->parsePostData()) !== true) {
                echo $result;
                return;
            }
            
            $this->addToDB(); 
        }
    }
    
    $mainAdder = new MaintenanceAdder;
    $mainAdder->addMaintenance();
?>