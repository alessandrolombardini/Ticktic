<?php
    require_once("./bootstrap.php");
    $templateParams["informazioni_gestore"] = $dbh->ottieniInformazioniOrganizzatore($_GET["id"]);
    if(isset($_GET["id"]) && $_SESSION["autorizzazione"]=="AMMINISTRATORE"){
        $templateParams["page_content"] = "./template/amministratore/verifica_singolo_organizzatore_content.php";
    } else {
        $templateParams["page_content"] = "./template/page_not_allowed.php";
    }
    require_once("./template/base.php");
?>