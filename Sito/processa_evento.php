<?php
require_once("./bootstrap.php");

if($_POST["action"]==1){
    $anteprima = $_POST["anteprima"];
    $luogo = $_POST["luogo"];
    $numeroPosti = $_POST["biglietti"];
    $prezzoBiglietto = $_POST["prezzo"]; 
    $dataEvento = $_POST["year"] . "-" . $_POST["month"] . "-". $_POST["day"] . " " . $_POST["orario"] . ":00";
    var_dump("$dataEvento");
    $noteEvento = $_POST["note"];
    $descrizioneEvento = $_POST["descrizione"]; 
    $nomeEvento = $_POST["nome"];
    $IDCategoria = $_POST["categoria"]; 
    $IDOrganizzatore = /*$_SESSION["id"];*/ "1";

    $artisti = array();
    $count = 1;
    while (isset($_POST["artisti_".$count]) && $_POST["artisti_".$count] != "none"){
        array_push($artisti, $_POST["artisti_".$count]);
        $count++;
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR."eventi/", $_FILES["eventimg"]);
    if($result != 0){
        $immagineEvento = $msg;
        $id = $dbh->insertEvent($anteprima, $luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore);
        if($id!=false){
            foreach($artisti as $artista){
                $ris = $dbh->insertArtistiOnEvent($artista, $id);
            }
            $msg = "Inserimento completato correttamente!";
            header("location: area_gestore.php?msg=".$msg);
        }
        else{
            $msg = "Errore in inserimento!";
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg);
        }
    } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg);
    }
} 

if($_POST["action"]==2){
    $anteprima = $_POST["anteprima"];
    $luogo = $_POST["luogo"];
    $numeroPosti = $_POST["biglietti"];
    $prezzoBiglietto = $_POST["prezzo"]; 
    $dataEvento = $_POST["year"] . "-" . $_POST["month"] . "-". $_POST["day"] . " " . $_POST["orario"] . ":00";
    $noteEvento = $_POST["note"];
    $descrizioneEvento = $_POST["descrizione"]; 
    $nomeEvento = $_POST["nome"];
    $IDCategoria = $_POST["categoria"]; 
    $IDOrganizzatore = /*$_SESSION["id"];*/ "1";
    $IDEvento = $_POST["eventid"];

    $artisti = array();
    $count = 1;
    while (isset($_POST["artisti_".$count]) && $_POST["artisti_".$count] != "none"){
        array_push($artisti, $_POST["artisti_".$count]);
        $count++;
    }

    if(isset($_FILES["eventimg"]) && strlen($_FILES["eventimg"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR."eventi/", $_FILES["eventimg"]);
        if($result == 0){
            header("location: area_gestore.php?msg=".$msg);
        } else {
            $img = $msg;
        }
    }
    else{
        $img = $_POST["oldimg"];
    }
   
    $dbh->updateEvent($anteprima, $luogo, $numeroPosti, $prezzoBiglietto, $img, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore, $IDEvento);
    $dbh->deleteArtistiOnEvent($IDEvento);
    foreach($artisti as $artista){
        $id = $dbh->insertArtistiOnEvent($artista, $IDEvento);
        if($id==false){
            $msg = "Errore in inserimento!";
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg);
            break;
        }
    } 

    $msg = "Modifica completata correttamente!";
    header("location: area_gestore.php?msg=".$msg);
}

?>