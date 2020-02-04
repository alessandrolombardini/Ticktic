<?php
require_once("./bootstrap.php");
    $nome = $_POST["nome"];
    $descrizione = $_POST["descrizione"];
    
    list($result, $msg) = uploadImage(UPLOAD_DIR."artisti/", $_FILES["artistimg"]);
    if($result != 0){
        $immagineArtista = $msg;
        $id = $dbh->insertArtistaNonValutato($nome, $descrizione, $immagineArtista);
        if($id!=false){
            $msg = "Richiesta inoltrata.";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    } else {
        $msg = "Errore nel caricamento immagine.";
    }
    header("location: area_gestore.php?msg=".$msg);
?>