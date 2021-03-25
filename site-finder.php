<?php
    require_once "database-connector.php";

    function getSites() {
        $db = new DatabaseConnector();
        $result = $db->connect();
        if ($result === "") {
            if ($result = $db->getCon()->query("SELECT Location FROM Location")) {
                while($row = $result->fetch_assoc()) {
                    echo "<li class=\"search-item {$row["Location"]}\"><input id=\"rec-{$row["Location"]}\" name=\"loc\" type=\"radio\" value=\"{$row["Location"]}\">{$row["Location"]}</li>";
                }
                mysqli_free_result($result);
            }
        }
    }
    

    
// TODO: determine what to do if we can't connect ($result != "") and when can't query
//    function getSites() {
//        $db = new DatabaseConnector();
//        $result = $db->connect();
//        if ($result === "") {
//            if ($result = $db->getCon()->query("SELECT Location FROM Location")) {
//                while($row = $result->fetch_assoc()) {
//                    echo "<option value=\"{$row["Location"]}\">";
//                }
//                mysqli_free_result($result);
//            }
//        }
//    }

//    function determineAmpOrAnt() {
//        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION)) {
//            $_SESSION["POST_loc"] = $_POST["loc"];
//            $_SESSION["POST_query"] = $_POST["query"];
//        }
//        header("Location: ".__DIR__."/amps-ants/display.php");
//    }
?>