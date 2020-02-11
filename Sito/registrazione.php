<?php
    $templateParams["page_content"] = "./template/registrazione_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    require_once("./template/base.php");
?>