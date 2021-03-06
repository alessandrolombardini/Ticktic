<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
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
            $error='s';
            header("location: area_gestore.php?msg=".$msg."&error=".$error);
        }
    } else {
        $error='s';
        header("location: area_gestore.php?msg=".$msg."&error=".$error);
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
            $error='s';
            header('Location: ' . $_SERVER['HTTP_REFERER'] . "?msg=". $msg . "&error=" . $error);
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
    }
    $IDNotifica = $dbh -> inserisciNotificaOrganizzatore("MODIFICA", "L'organizzatore dell'evento lo ha modificato, controlla pagina dell'evento per ulteriori informazioni.", $IDOrganizzatore, $IDEvento);
    $dbh->pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento);

    $msg = "Modifica completata correttamente!";
    $error = 'n';
    header("location: area_gestore.php?msg=".$msg."&error=".$error);
}

?>