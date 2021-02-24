<?php
    require_once dirname(__DIR__)."/database-connector.php";

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
    
    deleteRecord();

?>