<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplifier Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php 
        require_once 'header.php';
        require_once 'site-finder.php'
    ?>
    <form id="loc-form" action="amps-ants/display.php" method="POST">
        <input list="loc-drop" name="loc">
        <datalist id="loc-drop">
            <?php getSites(); ?>
        </datalist>
        <button type="submit" name="type" value="Amplifier">Amplifiers</button>
        <button type="submit" name="type" value="Antenna">Antennas</button>
        <button type="submit" name="type" value="">All</button>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/amps-ants-script.js"></script>
</body>
</html>