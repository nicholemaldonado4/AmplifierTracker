<?php 
    require_once 'php/setup-session.php';
    $sessionSetter = new SessionSetter("index");
    $sessionSetter->setupSessionAndClear(false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amplifier Tracker</title>
    <link
     href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans|Staatliches|Patua+One"
     rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <?php require_once 'header.php';?>
<!--
    <section>
        <img src="imgs/radar-dish.jpeg" alt="Satellite">
    </section>
-->
    <section class="modal">
        <div class="modal-content">
            
            <div class="inner-modal">
                <div id="close-box"><i class="fas fa-times"></i></div>
                    <div class="modal-tabs">
                        <div class="tab" id="login-tab"><span>Login</span></div>
                        <div class="tab tinted" id="signup-tab"><span>Sign Up</span></div>
                    </div>
                    <div class="modal-form" id="login-div">
                        <form id="loginForm" method="POST">
                            <input type="text" placeholder="Enter Email" name="username" required>
                            <input type="password" placeholder="Enter Password" name="pass" required>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                    <div class="modal-form hide" id="signup-div">
                        <form id="signup-form" method="POST">
                            <input type="text" placeholder="Enter First Name" name="first-name" required>
                            <input type="text" placeholder="Enter Last Name" name="last-name" required>
                            <input type="text" placeholder="Email" name="email" required>
                            <input type="password" placeholder="Password" name="pass" required>
                            <button type="submit">Sign Up</button>
                        </form>
                    </div>
            </div>
        </div>
    </section>
<!--$servername = "127.0.0.1";-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/main.js"></script>
    <script src="js/header.js"></script>
</body>
</html>