<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $count = 0;
    $insertOrdine = false;
    $eventiAcquistati = array();
    $error='s';

    while (isset($_POST["event_".$count]) && isset($_POST["tickets_".$count])){
        $event = $dbh -> getEvent($_POST["event_".$count]);
        $event["bigliettiacquistati"] = $_POST["tickets_".$count];
        if ($event["NumeroPosti"]-$event["BigliettiVenduti"] < $event["bigliettiacquistati"] ){
            $msg = "Errore! La quantità di biglietti che si desidera acquistare per l'evento " . $event["NomeEvento"] . " non è disponibile.";
            header("./area_utente?msg=".$msg."&error?".$error);
        } else {
            $bigliettivenduti = $event["BigliettiVenduti"] + $event["bigliettiacquistati"] ;
            $dbh -> updateBigliettiVenduti($event["IDEvento"], $bigliettivenduti);
            $insertOrdine = true;
            array_push($eventiAcquistati, $event);
            if ($bigliettivenduti == $event["NumeroPosti"]){
                $id = $dbh -> inserisciNotificaSistema("SOLD OUT", "Sono stati venduti tutti i bigletti per l'evento.", $event["IDEvento"]);
                $dbh-> pubblicaNotificaAdOrganizzatore($id, $event["IDOrganizzatore"]);
            }
        }
        $count++;
    }

    if ($insertOrdine == true){
        $dataOrdine = date("Y-m-d");
        $IDUtente = $_SESSION["id"];
        $SpesaTotale = $_POST["totale-spesa"];

        $id = $dbh->insertOrdine($dataOrdine, $IDUtente, $SpesaTotale);
        if($id!=false){
            $dbh->resetCarrello($IDUtente);
            foreach ($eventiAcquistati as $evento){
                $idcomprende = $dbh->insertEventiOnOrdine($id, $evento["IDEvento"], $evento["bigliettiacquistati"]);
                if ($id == false){
                    $msg = "Errore in inserimento!";
                    $error = 's';
                    break;
                } else {
                    $msg = "Ordine effettuato.";
                    $error = 'n';
                }
            }
        }
        else{
            $msg = "Errore in inserimento!";
            $error = 's';
        }
    }
    header("location: area_utente.php?msg=".$msg."&error?".$error);
?>