<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/amministratore/verifica_nuovi_organizzatori_content.php";
    $templateParams["organizzatoriDaAnalizzare"] = $dbh->ottieniOrganizzatoriNonValutati();
    require_once("./template/base.php");
?>