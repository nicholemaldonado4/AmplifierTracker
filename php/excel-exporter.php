<?php
require_once dirname(__DIR__)."/database-connector.php";
session_start();
class ExcelExporter {
    function export($query, $header) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new DatabaseConnector();
            $result = $db->connect();
            if ($result === "") {
                if ($result = $db->getCon()->query($query)) {
                    $filename = "website_data_" . date('Ymd') . ".csv";

                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    header("Content-Type: text/csv");

                    $out = fopen("php://output", 'w');
                    fputcsv($out, $header);
                    while($row = $result->fetch_assoc()) {
                        fputcsv($out, $row);
                    }
                    fclose($out);
                    mysqli_free_result($result);
                }
                else {
                    echo $db->getCon()->error;
                }

            }
        }
    }
}
    $exporter = new ExcelExporter();
    $query = "SELECT MaintenanceLog.Barcode, ProbDescription, DateAdded, Problem FROM MaintenanceLog LEFT JOIN AmpsAndAnt ON MaintenanceLog.Barcode = AmpsAndAnt.Barcode";
    if (isset($_SESSION["POST_search"])) {
        $query = $query." WHERE ".$_SESSION["POST_search"];
    }
    $exporter->export($query, array("Barcode", "Problem Description", "Date Added", "Problem"));


?>
