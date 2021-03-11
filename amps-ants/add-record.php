<?php
    require_once dirname(__DIR__)."/database-connector.php";

    class RecordAdder {
        private const BARCODE = "barcode";
        private const FREQ_START = "freq-start";
        private const FREQ_END = "freq-end";
        private const MODEL_NUM = "model-num";
        private const MANUFACTURER = "manufacturer";
        private const SN = "sn";
        private const TYPE = "type";
        private const LOC = "loc";
        
        private String $barcode;
        private int $freqStart;
        private int $freqEnd;
        private int $modelNum;
        private String $manufacturer;
        private int $sn;
        private String $type;
        private String $loc;
        
        
        function parsePostData() {
            
            if (!isset($_POST)) {
                return "Invalid form request";
            }
            if (!isset($_POST[self::BARCODE]) || ($this->barcode = trim($_POST[self::BARCODE])) === "") {
                return "Invalid barcode";
            }
            
            if (!isset($_POST[self::FREQ_START]) || !isset($_POST[self::FREQ_END]) || 
                    !is_numeric($_POST[self::FREQ_START]) || !is_numeric($_POST[self::FREQ_END])) {
          
                return "Invalid start or end frequency";
            }
            if (!isset($_POST[self::MODEL_NUM]) || !is_numeric($_POST[self::MODEL_NUM])) {
                return "Invalid model number";
            }
            if (!isset($_POST[self::MANUFACTURER])) {
                return "Invalid manufacturer";
            }
            if (!isset($_POST[self::SN]) || !is_numeric($_POST[self::SN])) {
                return "Invalid model number";
            }
            if (!isset($_POST[self::TYPE]) || ($this->type = trim($_POST[self::TYPE])) === "") {
                return "Invalid equpitment type";
            }
            if (!isset($_POST[self::LOC]) || ($this->loc = trim($_POST[self::LOC])) === "") {
                return "Invalid location";
            }
            
            $this->freqStart = intval($_POST[self::FREQ_START]);
            $this->freqEnd = intval($_POST[self::FREQ_END]);
            $this->modelNum = intval($_POST[self::MODEL_NUM]);
            $this->manufacturer = $_POST[self::MANUFACTURER];
            $this->sn = intval($_POST[self::SN]);
            $this->type = $_POST[self::TYPE];
            $this->loc = $_POST[self::LOC];
            return true;
        }
        
        function addToDB() {
            $db = new DatabaseConnector();
            $result = $db->connect();
            
            if ($result === "") {
                $query = "INSERT INTO AmpsAndAnt (Barcode, StartFrequencyRange, EndFrequencyRange, " .
                        "ModelNumber, Manufacturer, SerialNumber, Type, Location) VALUES (\"{$this->barcode}\", " .
                        "{$this->freqStart}, {$this->freqEnd}, {$this->modelNum}, \"{$this->manufacturer}\", {$this->sn}, \"{$this->type}\", " .
                        "\"{$this->loc}\")";
                if($db->getCon()->query($query) === False){
                    echo $db->getCon()->error;
                }
            }
        }
        
        function addRecord() {
            if (($result = $this->parsePostData()) !== true) {
                echo $result;
                return;
            }
            
            $this->addToDB(); 
        }
    }
    
    $recordAdder = new RecordAdder;
    $recordAdder->addRecord();

?>