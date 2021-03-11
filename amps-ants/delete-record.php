<?php
    require_once dirname(__DIR__)."/database-connector.php";
    
    class RecordHandler {
        function deleteRecord() {
            $db = new DatabaseConnector();
                $result = $db->connect();
                if ($result === "") {
                    $query = "DELETE FROM AmpsAndAnt WHERE Barcode='".$_POST["record_selector"]."'";
                    $result = $db->getCon()->query($query);
                    // TODO: returns true or false here. Figure out what to do if it fails.
    //                 echo $result;
                }
        }
        
        function determineDeleteOrMaintain() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $loc = "display.php";
                if (isset($_POST["delete"])) {
                    $this->deleteRecord();
                }
                
                else if (isset($_POST["maintenance"]) && isset($_POST["equip-type"]) && $_POST["equip-type"] == "Amplifier") {
                    session_start();
                    $_SESSION["POST_equip_barcode"] = $_POST["record_selector"];
                    $loc = "maintenance-log.php";
                }
                header("Location: ".$loc);
                die();
            }
        }
    }

    $recHandler = new RecordHandler();
    $recHandler->determineDeleteOrMaintain();
?>