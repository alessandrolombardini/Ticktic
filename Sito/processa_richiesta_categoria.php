<?php
require_once("./bootstrap.php");
$nome = $_POST["nome"];
$id = $dbh->insertCategoriaNonValutata($nome);
if($id!=false){
    $IDNotifica = $dbh -> inserisciNotificaOrganizzatorePerArtistaECategorie("Richiesta di inserimento categoria.", "Un organizzatore ha richiesto l'inserimento della categoria " . $nome, $_SESSION["id"]);
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
?>