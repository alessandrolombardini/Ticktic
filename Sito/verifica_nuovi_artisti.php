<?php
    require_once("./bootstrap.php");
    $templateParams["artistiDaAnalizzare"] = $dbh->ottieniArtistiNonValutati();
    $templateParams["page_content"] = "./template/amministratore/verifica_nuovi_artisti_content.php";
    require_once("./template/base.php");
?>