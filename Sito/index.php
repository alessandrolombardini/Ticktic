<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/homepage_content.php";
    $templateParams["hide_search_bar"] = "y";
    $templateParams["rand_categories"] = $dbh->getRandomCategories();
    require_once("./template/base.php");
?>