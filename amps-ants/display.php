<?php 
    session_start();
    require_once "display-util.php";
    determineAmpOrAnt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplifier Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/amps-ants/display.css">
</head>
<body>
    <div class="page-container">
                
        <?php require_once '../header.php'; ?>
<!--        <form method="POST" id="record-form">-->
        <section>
            <h2><?=getHeading();?></h2>
        </section>
<!--        <section class="content-wrapper">-->
            <form class="record-grid-container<?=showType();?>" id="record-form">
<!--                <form method="POST" id="record-form">-->
                    <div class="grid-item"></div>
                    <div class="grid-item"><h3>Barcode</h3></div>
                    <div class="grid-item"><h3>Frequency Range</h3></div>
                    <div class="grid-item"><h3>Model Number</h3></div>
                    <div class="grid-item"><h3>Manufacturer</h3></div>
                    <div class="grid-item"><h3>Serial Number</h3></div>
                    <?php getAmpsOrAnt(); ?>
<!--                </form>-->
            </form>
            <section class="add-modal">
                <div class="add-modal-content">
                    <form id="add-rec-form" method="POST">
                        <div><label for="barcode">Barcode</label></div>
                        <div><input class="full" type="text" name="barcode"></div>
                        <div><label for="freq-start">Frequency Range</label></div>
                        <div>
                            <input class="half" type="text" name="freq-start" placeholder="Start">
                            <input class="half" type="text" name="freq-end" placeholder="End">
                        </div>
                        <div><label for="model-num">Model Number</label></div>
                        <div><input class="full" type="text" name="model-num"></div>
                        <div><label for="manufacturer">Manufacturer</label></div>
                        <div><input class="full" type="text" name="manufacturer"></div>
                        <div><label for="sn">Serial Number</label></div>
                        <div><input class="full" type="text" name="sn"></div>
                        <div><label for="type">Type</label></div>
                        <div><input class="full" type="text" name="type" value="<?=getEquipType()?>"></div>
                        <div><label for="loc">Location</label></div>
                        <div><input class="full" type="text" name="loc" value="<?=getLocation()?>"></div>
                        <button type="submit" id="add-rec-btn">Add Record</button>
                    </form>
                </div>
            </section>
            <footer>
                <button>Export to Excel</button>
                <button>Maintenance</button>
                <button type="submit" value="delete" form="record-form">Delete Record</button>
                <button id="add-btn">Add Record</button>
            </footer>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/amps-ants/display-script.js"></script>
</body>
</html>