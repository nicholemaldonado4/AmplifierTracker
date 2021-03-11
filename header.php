<?php
    function userWelcome() {
        if (isset($_SESSION) && isset($_SESSION["name"])) {
            return "Hello, ".$_SESSION["name"];
        }
        return "";
    }

    function showWelcome() {
        if (!isset($_SESSION) || !isset($_SESSION["name"])) {        
            return " hide";
        }
        return "";
    }

    function hideLogin() {
        if (isset($_SESSION) && isset($_SESSION["name"])) {
            return " hide";
        }
        return "";
    }
?>

<nav>
    <div class="logo-holder">
        <span class="logo">Amplifier Tracker</span>
        <span class="toggle drop-down"><i class="fa fa-bars fa-3x"></i></span>
    </div>
    <!-- TODO: fix class k. Right now toggling for active. which hides/displays nav-->
    <ul class="nav_bar_list">
<!--        <li class="logo"><a href="#">Amplifier Tracker</a></li>-->
        <li class="item"><a href="/index.php">Home</a></li>
        <li class="item<?=showWelcome();?>"><a href="/amps-ants.php">Antennas and Amplifiers</a></li>
        <li class="item<?=showWelcome();?>"><a href="/maintenance/search.php">Maintenance Search</a></li>
        <li class="item<?=hideLogin() ?>" id="loginBtn"><a href="#">Log In</a></li>
        <li class="item has_submenu dropdown<?=showWelcome() ?>">
            <span><?=userWelcome()?></span>
            <ul class="submenu">
                <li class="subitem" id="logOutBtn"><a href="#">Sign Out</a></li>
            </ul>
        </li>
<!--        <li class="toggle"><a href="#"><i class="fa fa-bars fa-3x"></i></a></li>-->
    </ul>
</nav>