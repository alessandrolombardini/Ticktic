<?php
require_once("./bootstrap.php");
 /****************************** Check permission **********************************/
if(isset($_POST["dataAggiornamento"]) && !empty($_POST["dataAggiornamento"])){
    if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"){
        $result = $dbh->ottieniNotificheNonVisteByIDUtenteDaData($_SESSION["id"], $_POST["dataAggiornamento"]);
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"){
        $result = $dbh->ottieniNotificheNonVisteByIDOrganizzatoreDaData($_SESSION["id"], $_POST["dataAggiornamento"]);
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"){
        $result = $dbh->ottieniNotificheNonVisteByIDAmministratoreDaData($_SESSION["id"], $_POST["dataAggiornamento"]);
    }
    $arr = array($result,date("Y-m-d G:i:s"));
    if(count($result) > 0){
        print_r(json_encode($arr));
    }
}
/**********************************************************************************/
?>
