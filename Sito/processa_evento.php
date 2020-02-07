<?php
require_once("./bootstrap.php");

if($_POST["action"]==1){
    $error='s';
    $luogo = $_POST["luogo"];
    $numeroPosti = $_POST["biglietti"];
    $prezzoBiglietto = $_POST["prezzo"]; 
    $dataEvento = $_POST["year"] . "-" . $_POST["month"] . "-". $_POST["day"] . " " . $_POST["orario"] . ":00";
    $noteEvento = $_POST["note"];
    $descrizioneEvento = $_POST["descrizione"]; 
    $nomeEvento = $_POST["nome"];
    $IDCategoria = $_POST["categoria"]; 
    $IDOrganizzatore = $_SESSION["id"];;

    $artisti = array();
    $count = 1;
    while (isset($_POST["artisti_".$count]) && $_POST["artisti_".$count] != "none"){
        array_push($artisti, $_POST["artisti_".$count]);
        $count++;
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR."eventi/", $_FILES["eventimg"]);
    if($result != 0){
        $immagineEvento = $msg;
        $id = $dbh->insertEvent($luogo, $numeroPosti, $prezzoBiglietto, $immagineEvento, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore);
        if($id!=false){
            foreach($artisti as $artista){
                $ris = $dbh->insertArtistiOnEvent(intval($artista), $id);
            }
            $msg = "Inserimento completato correttamente!";
            $error='n';
            header("location: area_gestore.php?msg=".$msg."&error=".$error);
        }
        else{
            $msg = "Errore in inserimento!";
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg."&error=".$error);
        }
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg."&error=".$error);
    }
} 

if($_POST["action"]==2){
    $error='s';
    $luogo = $_POST["luogo"];
    $numeroPosti = $_POST["biglietti"];
    $prezzoBiglietto = $_POST["prezzo"]; 
    $dataEvento = $_POST["year"] . "-" . $_POST["month"] . "-". $_POST["day"] . " " . $_POST["orario"] . ":00";
    $noteEvento = $_POST["note"];
    $descrizioneEvento = $_POST["descrizione"]; 
    $nomeEvento = $_POST["nome"];
    $IDCategoria = $_POST["categoria"]; 
    $IDOrganizzatore = $_SESSION["id"];
    $IDEvento = $_POST["eventid"];

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

    $newartisti = array();
    $count = 1;
    while (isset($_POST["artisti_".$count]) && $_POST["artisti_".$count] != "none"){
        array_push($newartisti, $_POST["artisti_".$count]);
        $count++;
    }
   
    $dbh->updateEvent($luogo, $numeroPosti, $prezzoBiglietto, $img, $dataEvento, $noteEvento, $descrizioneEvento, $nomeEvento, $IDCategoria, $IDOrganizzatore, $IDEvento);
    $dbh->deleteArtistiOnEvent($IDEvento);
    foreach($newartisti as $newartista){
        $id = $dbh->insertArtistiOnEvent(intval($newartista), $IDEvento);
        if($id === false){
            $msg = "Errore in inserimento!";
            //header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg."&error=".$error);
            //break;
        }
    } 

    $msg = "Modifica completata correttamente!";
    $error='n';
    //header("location: area_gestore.php?msg=".$msg."&error=".$error);
}

?>