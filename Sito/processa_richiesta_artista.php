<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $nome = $_POST["nome"];
    $descrizione = $_POST["descrizione"];
    
    list($result, $msg) = uploadImage(UPLOAD_DIR."artisti/", $_FILES["artistimg"]);
    if($result != 0){
        $immagineArtista = $msg;
        $id = $dbh->insertArtistaNonValutato($nome, $descrizione, $immagineArtista);
        if($id!=false){
            $IDNotifica = $dbh -> inserisciNotificaOrganizzatorePerArtistaECategorie("Richiesta di inserimento artista.", "Un organizzatore ha richiesto l'inserimento dell'artista " . $nome, $_SESSION["id"]);
            $dbh -> pubblicaNotificaATuttiGliAmministratori($IDNotifica);
            $msg = "Richiesta inoltrata.";
            $error = 'n';
            header("location: area_gestore.php?msg=".$msg."&error=".$error);
        }
        else{
            $msg = "Errore in inserimento!";
            $error = 's';
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "?msg=". $msg."&error=".$error);
        }
    } else {
        $msg = "Errore nel caricamento immagine.";
        $error = 's';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "?msg=". $msg."&error=".$error);
    }
?>