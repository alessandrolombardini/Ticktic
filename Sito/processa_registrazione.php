<?php
require_once("./bootstrap.php");
$inserimentoCorretto = false;
function in_str($str, $find) {
  foreach ($find as $ch) {
    if (strpos($str, $ch) !== false) {
      return true;
    }
  }
  return false;
}

$symbols = array(',', '.', ':', '?', '!');
$digits = array();
for ($i = 0; $i < 10; $i++) {
  array_push($digits, chr(48 + $i));
}
$lowercases = array();
for ($i = 0; $i < 26; $i++) {
  array_push($lowercases, chr(97 + $i));
}
$uppercases = array();
for ($i = 0; $i < 26; $i++) {
  array_push($uppercases, chr(65 + $i));
}
if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["sesso"]) && isset($_POST["password"]) &&
   isset($_POST["ripetipassword"]) && isset($_POST["data"]) && isset($_POST["indirizzo"]) && isset($_POST["citta"]) && isset($_POST["CAP"])){
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
    if(checkBaseParams($email, $sesso, $password, $ripetipassword, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta)){
        if(!$dbh->controllaSeEsisteMailOrganizzatore($email) && !$dbh->controllaSeEsisteMailUtente($email)){
            if($password == $ripetipassword){
                if(strlen($_POST['nome']) > 0 && !in_str($_POST['nome'], $digits) && strlen($_POST['cognome']) > 0 && !in_str($_POST['cognome'], $digits)){
                  if(strlen($_POST['password']) >= 9 && in_str($_POST['password'], $digits) &&
                     in_str($_POST['password'], $symbols) && in_str($_POST['password'], $uppercases) && in_str($_POST['password'], $lowercases)){
                       /* Se devo aggiungere un utente */
                       if(!isset($_POST["gestore"])){
                         $dbh->inserisciNuovoUtente($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta);
                         $inserimentoCorretto = true;
                       }
                       /* Se devo aggiungere un gestore */
                       else {
                         if(checkOrganizzatoreParams($_POST["iban"])){
                           $iban = $_POST["iban"];
                           $dbh->inserisciNuovoOrganizzatore($email, $sesso, $password, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $iban);
                           $inserimentoCorretto = true;
                         }
                       }
                  } else {
                      $templateParams["msg"] = "La password deve essere di almeno 9 caratteri e deve contenere almeno una lettera minuscola, una lettera maiuscola, un numero e un carattere tra i seguenti ,;.:?!.";
                      $templateParams["error"] = 's';
                  }
                } else {
                    $templateParams["msg"] = "Nome e cognome possono contenere solo lettere";
                    $templateParams["error"] = 's';
                }
            } else {
                $templateParams["msg"] = "La password non corrisponde";
                $templateParams["error"] = 's';
            }
        } else {
            $templateParams["msg"] = "Email già in uso";
            $templateParams["error"] = 's';
        }
    } else {
        $templateParams["msg"] = "Campi non completamente compilati";
        $templateParams["error"] = 's';
    }
} else {
    $templateParams["msg"] = "Campi non completamente compilati";
    $templateParams["error"] = 's';
}

if($inserimentoCorretto == true){
    $templateParams["msg"] = "Complimenti, sei ora parte della nostra comunity";
    $templateParams["error"] = 'n';
    session_unset();
    session_destroy();
    require_once("./login.php");
} else {
    require_once("./registrazione.php");
}

function checkBaseParams($email, $sesso, $password, $ripetipassword, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta){
    return !empty($password)
           && !empty($ripetipassword)
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
    return isset($iban) && !empty($iban);
}

?>
