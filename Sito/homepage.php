<?php
    require_once("./bootstrap.php");
    if($_SESSION["autorizzazione"]=="AMMINISTRATORE"){
        /* E' un amministratore -> mostrare interfaccia amministratore */
        require_once("./area_amministratore.php");
    }else if($_SESSION["autorizzazione"]=="ORGANIZZATORE"){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
        require_once("./area_gestore.php");
    }else if($_SESSION["autorizzazione"]=="UTENTE"){
        /* E' un utente standard -> mostrare interfaccia utente standard */
        require_once("./index.php");
    }else{
        /* Non è registrato -> mostrare interfaccia di login con errore */
        $templateParams["loginErrorMessage"]="Accesso negato, non sei registrato!";
        require_once("./login.php");
    }
}
?>