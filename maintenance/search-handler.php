<?php
    require_once dirname(__DIR__)."/database-connector.php";

    class SearchHandler {
        private String $prob = "";
        private String $probDescrip = "";
        
        
        function search() {
            $prob = trim($_POST["prob"]);
            $probDescrip = trim($_POST["prob-descrip"]);
            $newQuery = "";
            if ($prob === "" && $probDescrip === "") {
                return;
            }
            if ($prob !== "") {
                $newQuery = "Problem='{$prob}'";
            }
            if ($probDescrip !== "") {
                if ($newQuery !== "") {
                    $newQuery = $newQuery." AND ";
                }
                $newQuery = $newQuery."ProbDescription REGEXP '\\\b{$probDescrip}\\\b'";
            }
            session_start();
            $_SESSION["POST_search"] = $newQuery;
            header("Location: search.php");
            die();
        }
        
        function resetForm() {
            session_start();
            unset($_SESSION["POST_search"]);
            header("Location: search.php");
            die();
        }
        
        function checkSearch() {
            if (isset($_POST)) {
                if (isset($_POST["search-btn"])) {
                    $this->search();
                }
                if (isset($_POST["reset-btn"])) {
                    $this->resetForm();
                }
            }
            
        }
    }
    
    $searchHandler = new SearchHandler();
    $searchHandler->checkSearch();
?>