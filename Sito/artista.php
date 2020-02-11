<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/artista_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    require_once("./template/base.php");

    /* Fare la get dell'id dell'artista che si vuole visualizzare */
?>