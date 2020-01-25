<?php
require_once("./bootstrap.php");
if (isset($_POST["email"]) && isset($_POST["password"])){
    if($dbh->checkAmministratore($_POST["email"], $_POST["password"])==1){
        /* E' un amministratore -> mostrare interfaccia amministratore */
    }else if($dbh->checkOrganizzatore($_POST["email"], $_POST["password"])==1){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
    }else if($dbh->checkUtente($_POST["email"], $_POST["password"])==1){
        /* E' un utente standard -> mostrare interfaccia utente standard */
    }else{
        /* Non è registrato -> mostrare interfaccia di login con errore */
        $templateParams["loginError"] = true;
        $templateParams["loginErrorMessage"]="Accesso negato, non sei registrato!";
        require_once("./login.php");
    }
}
?>