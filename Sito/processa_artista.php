<?php
require_once("./bootstrap.php");
    $nome = $_POST["nome"];
    $descrizione = $_POST["descrizione"];
    
    list($result, $msg) = uploadImage(UPLOAD_DIR."artisti/", $_FILES["artistimg"]);
    if($result != 0){
        $immagineArtista = $msg;
        $id = $dbh->insertArtistaNonValutato($nome, $descrizione, $immagineArtista, "n");
        if($id!=false){
            $msg = "Richiesta inoltrata.";
            header("location: area_gestore.php?msg=".$msg);
        }
        else{
            $msg = "Errore in inserimento!";
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg);
        }
    } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg);
    }
?>