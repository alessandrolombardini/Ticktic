<?php
require_once("./bootstrap.php");
    $nome = $_POST["nome"];
    
    $id = $dbh->insertCategoriaNonValutata($nome);
    if($id!=false){
        $msg = "Richiesta inoltrata.";
    }
    else{
        $msg = "Errore in inserimento!";
    }

    header("location: area_gestore.php?msg=".$msg);
?>