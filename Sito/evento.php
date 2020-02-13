<?php
    require_once("./bootstrap.php");
    if(isset($_GET["IDEvento"]) && !empty($_GET["IDEvento"])){
        $templateParams["informazioniEvento"] = $dbh->ottieniInformazioniDiUnEvento($_GET["IDEvento"]);
        $templateParams["artisti"] = $dbh->getArtistsFromEvent($templateParams["informazioniEvento"]["IDEvento"]);
        if($templateParams["informazioniEvento"]["EliminatoSN"] == 's'){
            $templateParams["msg"] = "Questo evento è stato rimosso dal sito";
            $templateParams["error"] = "s";
        } else if(substr($templateParams["informazioniEvento"]["DataEvento"], 0, 10) <= date("Y-m-d")){
            $templateParams["msg"] = "Questo evento non è più disponibile";
            $templateParams["error"] = "s";
        }
        $templateParams["page_content"] = "./template/evento_content.php";
    } else {
        header('Location: ./page_something_goes_wrong.php');
    }
    require_once("./template/base.php");
?>
