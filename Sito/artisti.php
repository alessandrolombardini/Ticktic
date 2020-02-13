<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/artisti_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
    $templateParams["artist"] = $dbh->getArtisti();

    require_once("./template/base.php");
?>