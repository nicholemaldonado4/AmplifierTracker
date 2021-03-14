<?php
    require_once dirname(__DIR__)."/database-connector.php";

//    function determineAmpOrAnt() {        
//        if ($_SERVER["REQUEST_METHOD"] == "POST") {
//            $_SESSION["POST_loc"] = $_POST["loc"];
//            $_SESSION["POST_type"] = $_POST["type"];
//            header("Location: display.php");
//        }
//    }
    
// TODO: determine what to do if we can't connect ($result != "") and when can't query
    function getAllMaintenance() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = "SELECT * FROM MaintenanceLog LEFT JOIN AmpsAndAnt ON MaintenanceLog.Barcode = AmpsAndAnt.Barcode";
                if (isset($_SESSION["POST_search"])) {
                    $query = $query." WHERE ".$_SESSION["POST_search"];
                }
                if ($result = $db->getCon()->query($query)) {
                    $makeAccent = true;
                    while($row = $result->fetch_assoc()) {
                        $rowColor = $makeAccent ? "accent-row" : "reg-row";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["Barcode"]}</div>";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["SerialNumber"]}</div>";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["Problem"]}</div>";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["ProbDescription"]}</div>";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["DateAdded"]}</div>";
                        echo "<div class=\"grid-item {$rowColor}\">{$row["Location"]}</div>";
                        $makeAccent = !$makeAccent;
                    }
                    mysqli_free_result($result);
                }
                else {
                    echo $db->getCon()->error;
                }

            }
        }
    }
//    
//    function getHeading() {
//        return (($_SESSION["POST_type"] === "") ? "Amplifiers and Antennas" : $_SESSION["POST_type"]."s").": ".$_SESSION["POST_loc"];
//    }
//    
//    function showType() {
//        return (isset($_SESSION["POST_type"]) && $_SESSION["POST_type"] === "") ? " extra-grid" : "";
//    }
//
//    function getEquipType() {
//        return isset($_SESSION["POST_type"]) ? $_SESSION["POST_type"] : "";
//    }
//
//    function getLocation() {
//        return isset($_SESSION["POST_loc"]) ? $_SESSION["POST_loc"] : "";
//    }
//
//    function addTypeCol() {
//        if (isset($_SESSION["POST_type"]) && $_SESSION["POST_type"] === "") {
//            return "<div class=\"grid-item\"><h3>Type</h3></div>";
//        }
//        return "";
//    }

?>