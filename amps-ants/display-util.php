<?php
    require_once dirname(__DIR__)."/database-connector.php";

    function determineAmpOrAnt() {        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION["POST_loc"] = $_POST["loc"];
            $_SESSION["POST_type"] = $_POST["type"];
            header("Location: display.php");
        }
    }
    
// TODO: determine what to do if we can't connect ($result != "") and when can't query
    function getAmpsOrAnt() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                $query = "SELECT * FROM AmpsAndAnt";
                if (isset($_SESSION)) {
                    $typeSet = isset($_SESSION["POST_type"]);
                    $locSet = isset($_SESSION["POST_loc"]);
                    if ($typeSet || $locSet) {
                        $query = $query." WHERE";
                    }
                    if ($locSet) {
                        $query = $query." Location='{$_SESSION["POST_loc"]}'";
//                        unset($_SESSION["POST_loc"]);
                    }
                    if ($typeSet) {
                        if ($_SESSION["POST_type"] !== "") {
                            $query = $query.($locSet ? " AND " : " ")."Type='{$_SESSION["POST_type"]}'";
                        }
//                        unset($_SESSION["POST_type"]);
                    }
                    
                }
                if ($typeSet && $_SESSION["POST_type"] === "") {
                    echo "<div class=\"grid-item\"><h3>Type</h3></div>";
                }
                if ($result = $db->getCon()->query($query)) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div ><input class=\"radio-btn\" id=\"{$row["Barcode"]}\" type=\"radio\" name=\"record_selector\" value=\"{$row["Barcode"]}\"><div class=\"rect-selector {$row["Barcode"]}\"></div></div>";
                        echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["Barcode"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["StartFrequencyRange"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["ModelNumber"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["Manufacturer"]}</div>";
                        echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["SerialNumber"]}</div>";
                        if ($typeSet && $_SESSION["POST_type"] === "") {
                            echo "<div class=\"grid-item {$row["Barcode"]}\">{$row["Type"]}</div>";
                        }
                    }
                    mysqli_free_result($result);
                }

            }
        }
    }
    
    function getHeading() {
        return (($_SESSION["POST_type"] === "") ? "Amplifiers and Antennas" : $_SESSION["POST_type"]."s").": ".$_SESSION["POST_loc"];
    }
    
    function showType() {
        return (isset($_SESSION["POST_type"]) && $_SESSION["POST_type"] === "") ? " extra-grid" : "";
    }

    function getEquipType() {
        return isset($_SESSION["POST_type"]) ? $_SESSION["POST_type"] : "";
    }

    function getLocation() {
        return isset($_SESSION["POST_loc"]) ? $_SESSION["POST_loc"] : "";
    }

?>