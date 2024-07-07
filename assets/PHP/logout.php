<?php
    session_start();
    unset($_SESSION["name"]);
    unset($_SESSION["cargo"]);
    session_destroy();
    header("Location: ../../index.html");
    exit;