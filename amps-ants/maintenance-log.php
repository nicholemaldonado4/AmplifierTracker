<?php 
    require_once '../php/setup-session.php';
    SessionSetter::setupAfterAntAmp("maintenance-log", array("POST_equip_barcode"=>Null));
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
    <link rel="stylesheet" href="../css/amps-ants/maintenance.css">
    <link rel="stylesheet" href="../css/amps-ants/table.css">
</head>
<body>
    <div class="page-container">
        <?php require_once '../header.php'; ?>
        <?php require_once 'maintenance-util.php'; ?>
        <section class="title-sect">
            <h2>Maintenance Log: <?=getHeading();?></h2>
        </section>
            <div class="record-title-grid">
                    <div class="grid-item selector-dim"></div>
                    <div class="grid-item"><h3>Barcode</h3></div>
                    <div class="grid-item"><h3>Problem</h3></div>
                    <div class="grid-item"><h3>Problem Description</h3></div>
                    <div class="grid-item"><h3>Date Added</h3></div>
            </div>
            <form class="record-grid-container" id="record-form">
                <?php getMaintenanceLog(); ?>
            </form>
            <section class="add-modal">
                <div class="add-modal-content">
<!--
                    <div class="inner-modal">
                        <div id="close-box"><i class="fas fa-times"></i></div>
-->
                        <form id="add-maintenance-form" method="POST">
                            <div class="hide"><input class="full" type="text" name="barcode" value="<?=getHeading();?>"></div>
                            <div><label for="date-added">Date Added</label></div>
                            <div><input class="full" type="text" name="date-added"></div>
                            <div><label for="prob">Problem</label></div>
                            <div><input class="full" type="text" name="prob"></div>
                            <div><label for="prob-descrip">Problem Description</label></div>
                            <div><input class="full" type="text" name="prob-descrip"></div>
                            <button type="submit" id="add-maintenance-btn">Add Record</button>
                        </form>
<!--                    </div>-->
                </div>
            </section>
            <footer>
                <button name="delete" type="submit" value="Delete Record" form="record-form">
                    <span class="btn-text">Delete Record</span>
                    <span class="btn-img"><i class="fa fa-trash" aria-hidden="true"></i></span>
                </button>
                <button id="add-btn">
                    <span class="btn-text">Add Record</span>
                    <span class="btn-img"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </button>
            </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/amps-ants/maintenance.js"></script>
</body>
</html>