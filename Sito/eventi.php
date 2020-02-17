<?php
        require_once("./bootstrap.php");
        $templateParams["page_content"] = "./template/eventi_content.php";
        $templateParams["eventi"] = $dbh->getAllEventsNameOrdered("ASC");
        
        require_once("./template/base.php");
?>