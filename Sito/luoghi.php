<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/luoghi_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    require_once("./template/base.php");
?>