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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/maintenance/search.css">
</head>
<body>
    <div class="page-container">
        <?php 
            require_once '../header.php'; 
            require_once 'search-util.php';
        ?>
        <section>
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
    
            <footer>
                <form method="POST" action="search-handler.php">
                    <label for="prob">Problem</label>
                    <input type="text" name="prob">
                    <label for="prob-descrip">Problem Description</label>
                    <input type="text" name="prob-descrip">
                    <input type="submit" name="search-btn" value="Search">
                    <input type="submit" name="reset-btn" value="Reset">
                    <button>Export</button>
                </form>
            </footer>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="search.js"></script>
</body>
</html>