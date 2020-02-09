<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(isset($_SESSION["id"])){
    header('Location: ./homepage.php');
}
/**********************************************************************************/
if (isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(empty($email) || empty($password) && !isset($_SESSION["autorizzazione"])){
        /* Non sono state inserite tutte le informazioni -> mostrare interfaccia di login con errore */
        $_SESSION["autorizzazione"]="NON LOGGATO";
        $templateParams["loginErrorMessage"]="Inserisci email e password!";
    }else if($dbh->checkAmministratore($email, $password)=="OK"){
        /* E' un amministratore -> mostrare interfaccia amministratore */
        $_SESSION["autorizzazione"]="AMMINISTRATORE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        header('Location: ./homepage.php');
    }else if($dbh->checkOrganizzatore($email, $password)=="OK"){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
        $_SESSION["autorizzazione"]="ORGANIZZATORE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        header('Location: ./homepage.php');
    }else if($dbh->checkUtente($email, $password)=="OK"){
        /* E' un utente standard -> mostrare interfaccia utente standard */
        $_SESSION["autorizzazione"]="UTENTE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        header('Location: ./homepage.php');
    }else{
        /* Non è registrato -> mostrare interfaccia di login con errore */
        $_SESSION["autorizzazione"]="NON LOGGATO";
        $templateParams["msg"]="Accesso negato, credenziali sconosciute!";
    }
} else {
    $templateParams["msg"]="Inserisci email e password!";
}
$templateParams["error"]="s";
require_once("./login.php");
?>
