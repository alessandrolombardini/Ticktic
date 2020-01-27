<?php
require_once("./bootstrap.php");
if (isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($dbh->checkAmministratore($email, $password)==1){
        /* E' un amministratore -> mostrare interfaccia amministratore */
        $_SESSION["autorizzazione"]="AMMINISTRATORE";
        require_once("./area_amministratore.php");
    }else if($dbh->checkOrganizzatore($email, $password)==1){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
        $_SESSION["autorizzazione"]="ORGANIZZATORE";
        require_once("./area_gestore.php");
    }else if($dbh->checkUtente($email, $password)==1){
        /* E' un utente standard -> mostrare interfaccia utente standard */
        $_SESSION["autorizzazione"]="UTENTE";
        require_once("./index.php");
    }else{
        /* Non è registrato -> mostrare interfaccia di login con errore */
        $_SESSION["autorizzazione"]="NON LOGGATO";
        $templateParams["loginErrorMessage"]="Accesso negato, non sei registrato!";
        require_once("./login.php");
    }
}
?>