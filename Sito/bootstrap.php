<?php
    session_start();
    define("UPLOAD_DIR", "./images/");
    require_once("utils/functions.php");
    require_once("db/db.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "ticktic");
?>