<?php 
require_once("./bootstrap.php");

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$sesso = $_POST["sesso"];
$password = $_POST["password"];
$ripetipassword = $_POST["ripetipassword"];
$datanascita = $_POST["data"];
$indirizzo = $_POST["indirizzo"];
$citta = $_POST["citta"];
$cap = $_POST["CAP"];
$inserimentoCorretto = false;
/*
var_dump($nome);
var_dump($cognome);
var_dump($email);
var_dump($sesso);
var_dump($password);
var_dump($ripetipassword);
var_dump($datanascita);
var_dump($indirizzo);
var_dump($citta);
var_dump($cap);
*/
if(checkBaseParams($email, $sesso, $password, $ripetipassword, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta)){
    //$password = password_hash($password, PASSWORD_DEFAULT);
    /* Se devo aggiungere un utente */
    if(!isset($_POST["gestore"])){
        $dbh->inserisciNuovoUtente($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta);
        $inserimentoCorretto = true;
    }
    /* Se devo aggiungere un gestore */
    else {
        $iban = $_POST["iban"];
        if(checkOrganizzatoreParams($iban)){
            $dbh->inserisciNuovoOrganizzatore($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $iban);
            $inserimentoCorretto = true;
        } 
    }
}

if($inserimentoCorretto == true){
    require_once("./login.php");
} else { 
    require_once("./registrazione.php");
}

function checkBaseParams($email, $sesso, $password, $ripetipassword, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta){
    return !empty($password) 
           && !empty($ripetipassword)
           && $password == $ripetipassword
           && filter_var($email, FILTER_VALIDATE_EMAIL)
           && ($sesso == "m" || $sesso == "f" || $sesso == "a")
           && !empty($nome) 
           && !empty($cognome) 
           && !empty($datanascita) 
           && !empty($indirizzo) 
           && !empty($cap)
           && !empty($citta);
}

function checkOrganizzatoreParams($iban){
    return !empty($iban);
}

?>