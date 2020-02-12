<?php 
require_once("./bootstrap.php");
$msg = "Modifica eseguita correttamente";
$error = 'n';

if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"])){
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    if(strlen($_POST['nome']) > 0 && !in_str($_POST['nome'], $digits) && strlen($_POST['cognome']) > 0 && !in_str($_POST['cognome'], $digits)){
        if ($_SESSION["autorizzazione"] != "AMMINISTRATORE"){
            if (isset($_POST["sesso"]) && isset($_POST["data"]) && isset($_POST["indirizzo"]) && isset($_POST["citta"]) && isset($_POST["CAP"])){
                $sesso = $_POST["sesso"];
                $datanascita = $_POST["data"];
                $indirizzo = $_POST["indirizzo"];
                $citta = $_POST["citta"];
                $cap = $_POST["CAP"];
                if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"){
                    if (isset($_POST["IBAN"]) || (checkBaseParams($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta) && checkOrganizzatoreParams($iban))){
                        $dbh ->updateOrganizzatore($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $IBAN, $_SESSION["id"]);
                    } else {
                        $msg = "Campi non completamente compilati";
                        $error = 's';
                    }
                } else if ($_SESSION["autorizzazione"] == "UTENTE"){
                    if(checkBaseParams($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta)){
                        $dbh -> updateUtente($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $_SESSION["id"]);
                    } else {
                        $msg = "Campi non completamente compilati";
                        $error = 's';
                    } 
                }
            } else{
                $msg = "Campi non completamente compilati";
                $error = 's';
            }
        } else {
            if(checkAmministratoreParams($email, $nome, $cognome)){
                $dbh -> updateAmministratore($email, $nome, $cognome, $_SESSION["id"]);
            } else {
                $msg = "Campi non completamente compilati";
                $error = 's';
            }
        }
    } else {
        $msg = "Nome e cognome possono contenere solo lettere";
        $error = 's';
    }
} else {
    $msg = "Email già in uso";
    $error = 's';
}

if ($error == 's') {
    header('location: ' . $_SERVER['HTTP_REFERER'] . "?msg=" . $msg."&error=".$error);
} else {
    header("location: informazioni_account.php?msg=" . $msg."&error=".$error);
}


?>