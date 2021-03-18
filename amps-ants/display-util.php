<?php
    require_once dirname(__DIR__)."/database-connector.php";

    function determineAmpOrAnt() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $_SESSION["POST_loc"] = $_POST["loc"];
            $_SESSION["POST_type"] = $_POST["type"];
            header("Location: display.php");
        }
    }

    function getQuery($col="*") {
        $query = "SELECT %s FROM AmpsAndAnt";
        if (isset($_SESSION)) {
            $typeSet = isset($_SESSION["POST_type"]);
            $locSet = isset($_SESSION["POST_loc"]);
            if ($typeSet || $locSet) {
                $query = $query." WHERE";
            }
            if ($locSet) {
                $query = $query." Location='{$_SESSION["POST_loc"]}'";
            }
            if ($typeSet && $_SESSION["POST_type"] !== "") {
                $query = $query.($locSet ? " AND " : " ")."Type='{$_SESSION["POST_type"]}'";
            }
            return sprintf($query, $col);
        }
        return sprintf($query, $col);
    }

//    function getQuery() {
//        $query = "SELECT * FROM AmpsAndAnt";
//        if (isset($_SESSION)) {
//            $typeSet = isset($_SESSION["POST_type"]);
//            $locSet = isset($_SESSION["POST_loc"]);
//            if ($typeSet || $locSet) {
//                $query = $query." WHERE";
//            }
//            if ($locSet) {
//                $query = $query." Location='{$_SESSION["POST_loc"]}'";
////                        unset($_SESSION["POST_loc"]);
//            }
//            if ($typeSet) {
//                if ($_SESSION["POST_type"] !== "") {
//                    $query = $query.($locSet ? " AND " : " ")."Type='{$_SESSION["POST_type"]}'";
//                }
////                        unset($_SESSION["POST_type"]);
//            }
//
//        }
//        return $query;
//    }
    
// TODO: determine what to do if we can't connect ($result != "") and when can't query
    function getAmpsOrAnt() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = getQuery();
                $typeSet = isset($_SESSION["POST_type"]);
                $hideType = (!$typeSet || ($typeSet && $_SESSION["POST_type"] === "")) ? "" : " hide";
                if ($result = $db->getCon()->query($query)) {
                    $makeAccent = true;
                    while($row = $result->fetch_assoc()) {
                        $rowColor = $makeAccent ? "accent-row" : "reg-row";
                        echo "<div class=\"dot-container {$row["Barcode"]} grid-item\"><input class=\"radio-btn\" id=\"rec-{$row["Barcode"]}\" type=\"radio\" name=\"record_selector\" value=\"{$row["Barcode"]}\"><div class=\"dot-selector {$row["Barcode"]} selector-dim\"><div class=\"inner-dot\"></div></div></div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}\">{$row["Barcode"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}\">{$row["StartFrequencyRange"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}\">{$row["ModelNumber"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}\">{$row["Manufacturer"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}\">{$row["SerialNumber"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]} {$rowColor}{$hideType}\">{$row["Type"]}</div>";
                        echo "<div class=\"loc-radio-btn {$rowColor}\"><input id=\"loc-{$row["Barcode"]}\" type=\"radio\" name=\"equip-type\" value=\"{$row["Type"]}\"></div>";
                        $makeAccent = !$makeAccent;
                    }
                    mysqli_free_result($result);
                }

            }
        }
    }
    
    function getHeading() {
        return ($_SESSION["POST_type"] !== "" ? $_SESSION["POST_type"]."s" : "Amplifiers and Antennas").": ".$_SESSION["POST_loc"];
    }
    
// If type set, 
    function showType() {
        return $_SESSION["POST_type"] !== "" ? "" : " extra-grid";
    }

    function getEquipType() {
        return $_SESSION["POST_type"];
    }

    function getLocation() {
        return $_SESSION["POST_loc"];
    }

    function addTypeCol() {
//        if (!isset($_SESSION["POST_type"]) || (isset($_SESSION["POST_type"]) && $_SESSION["POST_type"] === "")) {
//            echo "<div class=\"grid-item\"><h3>Type</h3></div>";
//        }
        return $_SESSION["POST_type"] === "" ? "<div class=\"grid-item\"><h3>Type</h3></div>" : "";
    }

?>