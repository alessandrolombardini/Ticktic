<?php
    require_once("./bootstrap.php");
    if(isset($_GET["IDEvento"]) && !empty($_GET["IDEvento"])){
        $templateParams["informazioniEvento"] = $dbh->getEvent($_GET["IDEvento"]);
        $templateParams["page_content"] = "./template/evento_content.php";
    } else {
        /* TODO: pagina di errore */
    }
    require_once("./template/base.php");
?>