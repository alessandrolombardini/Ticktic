<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/amministratore/verifica_nuovi_artisti_content.php";
    $templateParams["artistiDaAnalizzare"] = $dbh->ottieniArtistiNonValutati();
    var_dump($templateParams["artistiDaAnalizzare"]);
    require_once("./template/base.php");
?>