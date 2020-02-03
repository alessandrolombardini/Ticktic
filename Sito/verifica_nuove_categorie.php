<?php
    require_once("./bootstrap.php");
    $templateParams["categorieDaAnalizzare"] = $dbh->ottieniCategorieNonValutate();
    $templateParams["page_content"] = "./template/amministratore/verifica_nuove_categorie_content.php";
    require_once("./template/base.php");
?>