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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require_once 'header.php';?>
    <section class="modal">
        <div class="modal-content">
            <div>
                <form id="loginForm" method="POST">
                    <h2>Login</h2>
                    <input type="text" placeholder="Enter Username" name="username" required>
                    <input type="password" placeholder="Enter Password" name="pass" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        
        </div>
    </section>

<!--<button type="button">Amplifiers and Antennas</button>-->
<!--<button type="button">Maintenance Search</button>-->


<!--$servername = "127.0.0.1";-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>