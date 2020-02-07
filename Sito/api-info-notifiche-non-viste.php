<?php
require_once("./bootstrap.php");
 /****************************** Check permission **********************************/
 if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"){
    $result = $dbh->ottieniNotificheNonVisteByIDUtente($_SESSION["id"]);    
} else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"){
    $result = $dbh->ottieniNotificheNonVisteByIDOrganizzatore($_SESSION["id"]);
} else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"){
    $result = $dbh->ottieniNotificheNonVisteByIDAmministratore($_SESSION["id"]);
}
/**********************************************************************************/
if(count($result) > 0){
    print_r(json_encode(array("nuove_notifiche"=>"true")));
} else {
    print_r(json_encode(array("nuove_notifiche"=>"false")));
}
?>