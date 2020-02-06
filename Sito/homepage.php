<?php
    require_once("./bootstrap.php");
    if($_SESSION["autorizzazione"]=="AMMINISTRATORE"){
        /* E' un amministratore -> mostrare interfaccia amministratore */
        header('Location: ./area_amministratore.php');
    }else if($_SESSION["autorizzazione"]=="ORGANIZZATORE"){
        /* E' un organizzatore -> mostrare interfaccia organizzatore */
        header('Location: ./area_gestore.php');
    }else if($_SESSION["autorizzazione"]=="UTENTE"){
        /* E' un utente standard -> mostrare interfaccia utente standard */
        header('Location: ./index.php');
    }else {
        /* Non è loggato -> mostrare interfaccia utente saltuario */
        header('Location: ./index.php');
    }

?>