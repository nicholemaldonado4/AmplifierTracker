<?php
    require_once __DIR__."/php/login-verifier.php";
    $verifier = new LoginVerifier();
    $verifier->verifyLogin();
?>