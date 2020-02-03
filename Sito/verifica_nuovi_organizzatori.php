<?php
    require_once("./bootstrap.php");
    $templateParams["organizzatoriDaAnalizzare"] = $dbh->ottieniOrganizzatoriNonValutati();
    $templateParams["page_content"] = "./template/amministratore/verifica_nuovi_organizzatori_content.php";
    require_once("./template/base.php");
?>