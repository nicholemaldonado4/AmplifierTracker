<?php
    require_once dirname(__DIR__)."/database-connector.php";
    

    function deleteRecord() {
        $db = new DatabaseConnector();
        $result = $db->connect();
        if ($result === "") {
            $query = "DELETE FROM MaintenanceLog WHERE LogId='".$_POST["log-id"]."'";
            if ($db->getCon()->query($query) === False) {
                echo $db->getCon()->error;
            }
        }
    }
        

    
    deleteRecord();
?>