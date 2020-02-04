<?php
    require_once("./bootstrap.php");
    $IDArtista = $_GET["id"];
    $templateParams["informazioni_artista"] = $dbh->ottieniInformazioniArtista($IDArtista);
    if(isset($_GET["id"]) && $_SESSION["autorizzazione"]=="AMMINISTRATORE"){
        $templateParams["page_content"] = "./template/amministratore/verifica_singolo_artista_content.php";
    } else {
        $templateParams["page_content"] = "./template/page_not_found.php";
    }
    require_once("./template/base.php");
?>