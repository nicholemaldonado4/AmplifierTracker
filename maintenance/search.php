<?php 
    require_once '../php/setup-session.php';
    SessionSetter::setupMaintenaceSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplifier Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans|Staatliches|Patua+One" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/maintenance/search.css">
    <link rel="stylesheet" href="../css/amps-ants/table.css">
</head>
<body>
    <div class="page-container">
        <?php 
            require_once '../header.php'; 
            require_once 'search-util.php';
        ?>
        <section class="title-sect">
            <h2>Maintenance Search</h2>
        </section>
            <div class="record-title-grid">
                    <div class="grid-item"><h3>Barcode</h3></div>
                    <div class="grid-item"><h3>Serial Number</h3></div>
                    <div class="grid-item"><h3>Problem</h3></div>
                    <div class="grid-item"><h3>Problem Description</h3></div>
                    <div class="grid-item"><h3>Date Added</h3></div>
                    <div class="grid-item"><h3>Location</h3></div>
            </div>
            <div class="record-grid-container">
                <?php getAllMaintenance(); ?>
            </div>
            <div class="hidden"><form method="POST" class="hidden" action="../php/excel-exporter.php" id="excel-form"></form></div>
    
            <footer>
                <div class="footer-part left">
                    <form method="POST" action="search-handler.php" id="search-form">
                        <div class="left-align"><label for="prob">Problem</label></div>
                        <div><input type="text" name="prob" class="space-divider"></div>
                        <div class="left-align"><label for="prob-descrip">Problem Description</label></div>
                        <div><input type="text" name="prob-descrip"></div>
                    </form>
                </div>
                <div class="footer-part right">
                    <button  name="search-btn" type="submit" value="Search" form="search-form">
                        <span class="btn-text">Search</span>
                        <span class="btn-img"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                    <button name="reset-btn" type="submit" value="Reset" form="search-form">
                        <span class="btn-text">Reset</span>
                        <span class="btn-img"><i class="fas fa-backspace" aria-hidden="true"></i></span>
                    </button>
                    <button name="export-btn" type="submit" value="Export" form="excel-form">
                        <span class="btn-text">Export</span>
                        <span class="btn-img"><i class="far fa-file-excel" aria-hidden="true"></i></span>
                    </button>
                </div>
                
            </footer>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/header.js"></script>
    <script src="search.js"></script>
</body>
</html>