<?php
    require_once dirname(__DIR__)."/database-connector.php";

    function getMaintenanceLog() {
        if (isset($_SESSION["POST_equip_barcode"])) {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = "SELECT * FROM MaintenanceLog WHERE Barcode=\"{$_SESSION["POST_equip_barcode"]}\"";
                if ($result = $db->getCon()->query($query)) {
                    $makeAccent = true;
                    while($row = $result->fetch_assoc()) {
                        $rowColor = $makeAccent ? "accent-row" : "reg-row";
                        echo "<div class=\"dot-container {$row["LogId"]} grid-item\"><input class=\"radio-btn\" id=\"log-{$row["LogId"]}\" type=\"radio\" name=\"log-id\" value=\"{$row["LogId"]}\"><div class=\"dot-selector {$row["LogId"]} selector-dim\"><div class=\"inner-dot\"></div></div></div>";
                        echo "<div class=\"grid-item {$row["LogId"]} {$rowColor}\">{$row["Barcode"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]} {$rowColor}\">{$row["DateAdded"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]} {$rowColor}\">{$row["Problem"]}</div>";
                        echo "<div class=\"grid-item {$row["LogId"]} {$rowColor}\">{$row["ProbDescription"]}</div>";
                        $makeAccent = !$makeAccent;
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