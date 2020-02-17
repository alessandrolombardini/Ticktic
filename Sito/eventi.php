<?php
        require_once("./bootstrap.php");
        $templateParams["page_content"] = "./template/eventi_content.php";
        $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
        $templateParams["eventi"] = $dbh->getAllEventsNameOrdered("ASC");
        
        require_once("./template/base.php");
?>