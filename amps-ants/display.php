<?php 
    require_once "display-util.php";
    require_once '../php/setup-session.php';
    determineAmpOrAnt();
    SessionSetter::setupAfterAntAmp("display");
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
    <link rel="stylesheet" href="../css/amps-ants/display.css">
    <link rel="stylesheet" href="../css/amps-ants/table.css">
</head>
<body>
    <div class="page-container">
                
        <?php require_once '../header.php'; ?>
<!--        <form method="POST" id="record-form">-->
        <section class="title-sect">
            <h2><?=getHeading();?></h2>
        </section>
<!--        <section class="content-wrapper">-->
            <div class="record-title-grid<?=showType();?>">
                    <div class="grid-item selector-dim"></div>
                    <div class="grid-item"><h3>Barcode</h3></div>
                    <div class="grid-item"><h3>Frequency Range</h3></div>
                    <div class="grid-item"><h3>Model Number</h3></div>
                    <div class="grid-item"><h3>Manufacturer</h3></div>
                    <div class="grid-item"><h3>Serial Number</h3></div>
                    <?=addTypeCol(); ?>
            </div>
            <form class="record-grid-container<?=showType();?>" id="record-form" method="POST" action="delete-record.php">
<!--                <form method="POST" id="record-form">-->
                    
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
                <div class="footer-part left">
                    <button>
                        <span class="btn-text">Export to Excel</span>
                        <span class="btn-img"><i class="fa fa-table" aria-hidden="true"></i></span>
                    </button>
                    <button name="maintenance" type="submit" value="Maintenance" form="record-form">
                        <span class="btn-text">Maintenance</span>
                        <span class="btn-img"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="footer-part right">
                    <button name="delete" type="submit" value="Delete Record" form="record-form">
                        <span class="btn-text">Delete Record</span>
                        <span class="btn-img"><i class="fa fa-trash" aria-hidden="true"></i></span>
                    </button>
                    <button id="add-btn">
                        <span class="btn-text">Add Record</span>
                        <span class="btn-img"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </button>
                </div>
            </footer>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/amps-ants/display-script.js"></script>
</body>
</html>