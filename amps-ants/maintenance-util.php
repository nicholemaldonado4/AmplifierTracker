<?php
    require_once dirname(__DIR__)."/database-connector.php";
    
// TODO: determine what to do if we can't connect ($result != "") and when can't query
    function getMaintenanceLog() {
        if (isset($_SESSION["POST_equip_barcode"])) {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = "SELECT * FROM MaintenanceLog WHERE Barcode=\"{$_SESSION["POST_equip_barcode"]}\"";
                if ($result = $db->getCon()->query($query)) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div ><input class=\"radio-btn\" id=\"{$row["LogId"]}\" type=\"radio\" name=\"log-id\" value=\"{$row["LogId"]}\"><div class=\"rect-selector {$row["LogId"]} selector-dim\"></div></div>";
                        echo "<div class=\"grid-item {$row["LogId"]}\">{$row["Barcode"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]}\">{$row["DateAdded"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]}\">{$row["Problem"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]}\">{$row["ProbDescription"]}</div>";
                    }
                    mysqli_free_result($result);
                }
            }
        }
    }
    
    function getHeading() {
        return isset($_SESSION["POST_equip_barcode"]) ? $_SESSION["POST_equip_barcode"] : "" ;
    }
?>