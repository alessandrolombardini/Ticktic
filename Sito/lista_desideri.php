<?php
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
/* Redirigere alla lista dei desideri */
?>