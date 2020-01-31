<?php
require_once("./bootstrap.php");
if (isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($dbh->checkAmministratore($email, $password)=="OK"){
        /* E' un amministratore -> mostrare interfaccia amministratore */
        $_SESSION["autorizzazione"]="AMMINISTRATORE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        require_once("./homepage.php");
    }else if($dbh->checkOrganizzatore($email, $password)=="OK"){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
        $_SESSION["autorizzazione"]="ORGANIZZATORE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        require_once("./homepage.php");
    }else if($dbh->checkUtente($email, $password)=="OK"){
        /* E' un utente standard -> mostrare interfaccia utente standard */
        $_SESSION["autorizzazione"]="UTENTE";
        $_SESSION["id"]=$dbh->ottieniIDPersona($email);
        require_once("./homepage.php");
    }else{
        /* Non è registrato -> mostrare interfaccia di login con errore */
        $_SESSION["autorizzazione"]="NON LOGGATO";
        $templateParams["loginErrorMessage"]="Accesso negato, non sei registrato!";
        require_once("./login.php");
    }
}
?>