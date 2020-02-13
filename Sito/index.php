<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/homepage_content.php";
    $templateParams["hide_search_bar"] = "y";
    $templateParams["rand_categories"] = $dbh->getRandomCategories();
    $templateParams["eventi"] = $dbh->getAllEvents();
    require_once("./template/base.php");
?>