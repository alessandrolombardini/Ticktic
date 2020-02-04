<?php
require_once("./bootstrap.php");
    $count = 0;
    while (isset($_POST["event_".$count]) && isset($_POST["tickets_".$count])){
        $event = $dbh -> getEvent($_POST["event_".$count]);
        if ($event["NumeroPosti"]-$event["BigliettiVenduti"] < $_POST["tickets_".$count]){
            $msg = "Errore! La quantità di biglietti che si desidera acquistare per l'evento " . $event["NomeEvento"] . " non è disponibile.";
            //header("./area_utente?msg=" . $msg);
        } else {
            $bigliettivenduti = $event["BigliettiVenduti"] + $_POST["tickets_".$count];
            $dbh -> updateBigliettiVenduti($event["IDEvento"], $bigliettivenduti); //da controllare
            
            //andare avanti qui!
        }
        $count++;
    }
    

    $id = $dbh->insertCategoriaNonValutata($nome);
    if($id!=false){
        $msg = "Richiesta inoltrata.";
    }
    else{
        $msg = "Errore in inserimento!";
    }

    header("location: area_gestore.php?msg=".$msg);
?>