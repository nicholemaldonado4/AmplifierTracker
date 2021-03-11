<?php 
    require_once 'php/setup-session.php';
    $sessionSetter = new SessionSetter("amps-ants");
    $sessionSetter->setupSessionAndClear(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplifier Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link
     href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans|Staatliches|Patua+One"
     rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/amps-ants.css">
</head>
<body>
    <?php 
        require_once 'header.php';
        require_once 'site-finder.php'
    ?>
    <form id="loc-form" action="amps-ants/display.php" method="POST">
        <input list="loc-drop" name="loc">
      
            <datalist id="loc-drop">
<!--                <option value="" selected hidden disabled>Select a Location</option>-->
                <?php getSites(); ?>
            </datalist>
   
        <button type="submit" name="type" value="Amplifier">Amplifiers</button>
        <button type="submit" name="type" value="Antenna">Antennas</button>
        <button type="submit" name="type" value="">All</button>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/header.js"></script>
<script src="js/amps-ants-script.js"></script>
</body>
</html>