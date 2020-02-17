<?php
    session_start();
    define("UPLOAD_DIR", "./images/");
    require_once("utils/functions.php");
    require_once("db/db.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "ticktic");
    $templateParams["categories"] = $dbh->getRandomCategories(); /* For Footer Links */
    /* Usare questa istruzione per trovare la propria password  */
    /* var_dump(password_hash("alessandro", PASSWORD_DEFAULT)); */
?>