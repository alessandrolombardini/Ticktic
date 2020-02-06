<?php 
    require_once("bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $templateParams["page_content"] = "./template/utente/ordini_content.php";

    $templateParams["ordini"] = $dbh -> getOrdiniDiUtente($_SESSION["id"]);
    $templateParams["eventiinordine"] = array();
    $templateParams["artistiinevento"] = array();
    foreach($templateParams["ordini"] as $ordinekey => $ordine){
        $totalebiglietti = 0;
        $eventi = $dbh->getEventiDiOrdine($ordine["IDOrdine"]);
        $templateParams["eventiinordine"][$ordine["IDOrdine"]] = $eventi;
        foreach($eventi as $eventokey => $evento){
            $artisti = $dbh->getArtistsFromEvent($evento["IDEvento"]);
            $templateParams["artistiinevento"][$evento["IDEvento"]] = $artisti;
            $totaleevento = $evento["PrezzoBiglietto"] * $evento["NumeroBiglietti"];
            $totalebiglietti += $totaleevento;
            $templateParams["eventiinordine"][$ordine["IDOrdine"]][$eventokey]["SpesaBiglietti"] = $totaleevento;
        }
        $spedizione = $ordine["TotaleSpesa"] - $totalebiglietti;
        $templateParams["ordini"][$ordinekey]["Spedizione"] = $spedizione;
    }
    require_once("./template/base.php");
?>