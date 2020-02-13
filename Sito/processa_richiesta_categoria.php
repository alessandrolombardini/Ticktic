<?php
require_once("./bootstrap.php");

    $nome = $_POST["nome"];
    
    $id = $dbh->insertCategoriaNonValutata($nome);
    if($id!=false){
        $msg = "Richiesta inoltrata.";
        $error = 'n';
        header("location: area_gestore.php?msg=".$msg."&error=".$error);
    }
    else{
        $msg = "Errore in inserimento!";
        $error = 's';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "?msg=". $msg."&error=".$error);
    }
?>