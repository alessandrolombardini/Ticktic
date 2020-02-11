<?php
    $templateParams["page_content"] = "./template/page_something_goes_wrong_content.php";
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    require_once("./template/base.php");
?>