<?php 
    function typeVaries() {
        return isset($_SESSION) && isset($_SESSION["POST_type"]) && $_SESSION["POST_type"] === "";
    }

    function getExcelHeaders() {
        $headers = array("Barcode", "Frequency Range", "Model Number", "Manufacturer", "Serial Number");
        if (typeVaries()) {
            $headers[] = "Type";
        }
        return $headers;
    }
    
    if (isset($_POST)) {
        require_once dirname(__DIR__)."/php/excel-exporter.php";
        require_once __DIR__."/display-util.php";

        session_start();
        $exporter = new ExcelExporter();
        $ending = typeVaries() ? ", Type" : "";
        $exporter->export(getQuery(
                ("Barcode, StartFrequencyRange, ModelNumber, Manufacturer, SerialNumber".$ending)), getExcelHeaders());
    }
?>