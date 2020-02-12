<?php 
$templateParams["msg"] = "Modifica eseguita correttamente";
$templateParams["error"] = 'n';

if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"])){
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    if(!$dbh->controllaSeEsisteMailAmministratore($email) && !$dbh->controllaSeEsisteMailOrganizzatore($email) && !$dbh->controllaSeEsisteMailUtente($email)){
        if(strlen($_POST['nome']) > 0 && !in_str($_POST['nome'], $digits) && strlen($_POST['cognome']) > 0 && !in_str($_POST['cognome'], $digits)){
            if ($_SESSION["autorizzazione"] != "AMMINISRATORE"){
                if (isset($_POST["sesso"]) && isset($_POST["data"]) && isset($_POST["indirizzo"]) && isset($_POST["citta"]) && isset($_POST["CAP"])){
                    $sesso = $_POST["sesso"];
                    $datanascita = $_POST["data"];
                    $indirizzo = $_POST["indirizzo"];
                    $citta = $_POST["citta"];
                    $cap = $_POST["CAP"];
                    if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"){
                        if (isset($_POST["IBAN"]) || (checkBaseParams($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta) && checkOrganizzatoreParams($iban))){
                            /inseri/sci orga
                        } else {
                            $templateParams["msg"] = "Campi non completamente compilati";
                            $templateParams["error"] = 's';
                        }
                    } else {
                        if(checkBaseParams($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta)){
                            $dbh -> updateUtente($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta, $_GET[""])
                        } else {
                            $templateParams["msg"] = "Campi non completamente compilati";
                            $templateParams["error"] = 's';
                        } 
                    }
                } else{
                    $templateParams["msg"] = "Campi non completamente compilati";
                    $templateParams["error"] = 's';
                }
            } else {
                if(checkAmministratoreParams($email, $nome, $cognome)){
                    //inserisci amminstr
                } else {
                    $templateParams["msg"] = "Campi non completamente compilati";
                    $templateParams["error"] = 's';
                }
            }
        } else {
            $templateParams["msg"] = "Nome e cognome possono contenere solo lettere";
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

if ( $templateParams["error"] == 's') {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . "&msg=" . $msg."&error=".$error);
} else {
    header('informazioni_account.php' ."&msg=" . $msg."&error=".$error);
}

?>