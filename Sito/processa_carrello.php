<?php
    require_once("./bootstrap.php");
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
            $dbh -> updateBigliettiVenduti($event["IDEvento"], $bigliettivenduti); //da controllare
            $insertOrdine = true;
            array_push($eventiAcquistati, $event);
        }
        $count++;
    }

    if ($insertOrdine == true){
        $dataOrdine = date("Y-m-d");
        $IDUtente = /*$_SESSION["id"]*/ "1";
        $id = $dbh->insertOrdine($dataOrdine, $IDUtente);
        if($id!=false){
            $dbh->resetCarrello($IDUtente);
            foreach ($eventiAcquistati as $evento){
                $idcomprende = $dbh->insertEventiOnOrdine($id, $evento["IDEvento"], $evento["bigliettiacquistati"]);
                if ($id == false){
                    $msg = "Errore in inserimento!";
                    break;
                } else {
                    $msg = "Inserimento completato correttamente.";
                    $error = 'n';
                }
            }
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }
    header("location: area_gestore.php?msg=".$msg."&error?".$error);
?>