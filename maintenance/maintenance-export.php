<?php 
    require_once dirname(__DIR__)."/php/excel-exporter.php";

    session_start();
    $exporter = new ExcelExporter();
    $query = "SELECT MaintenanceLog.Barcode, ProbDescription, DateAdded, Problem FROM MaintenanceLog LEFT JOIN AmpsAndAnt ON MaintenanceLog.Barcode = AmpsAndAnt.Barcode";
    if (isset($_SESSION["POST_search"])) {
        $query = $query." WHERE ".$_SESSION["POST_search"];
    }
    $exporter->export($query, array("Barcode", "Problem Description", "Date Added", "Problem"));
?>