<?php
    $templateParams["page_content"] = "./template/page_not_allowed_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    require_once("./template/base.php");
?>