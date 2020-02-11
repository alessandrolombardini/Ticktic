<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/homepage_content.php";
    $templateParams["hide_search_bar"] = "y";
    $templateParams["rand_categories"] = $dbh->getRandomCategories();
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
    require_once("./template/base.php");
?>