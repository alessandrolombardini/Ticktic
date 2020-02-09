<?php
    require_once("./bootstrap.php");
    if(isset($_GET["IDEvento"]) && !empty($_GET["IDEvento"])){
        $templateParams["informazioniEvento"] = $dbh->getEvent($_GET["IDEvento"]);
        $templateParams["artisti"] = $dbh->getArtistsFromEvent($templateParams["informazioniEvento"]["IDEvento"]);
        $templateParams["page_content"] = "./template/evento_content.php";
    } else {
        header('Location: ./page_something_goes_wrong.php');
    }
    require_once("./template/base.php");
?>
