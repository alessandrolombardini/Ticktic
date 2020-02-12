<?php
require_once("bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else {
    if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"){
        $templateParams["account"] = $dbh->ottieniInformazioniOrganizzatore($_SESSION["id"]);
    } else if ($_SESSION["autorizzazione"] == "UTENTE") {
        $templateParams["account"] = $dbh->getUtente($_SESSION["id"]);
    } else if ($_SESSION["autorizzazione"] == "AMMINISRATORE") {
        $templateParams["account"] = $dbh->ottieniInformazioniAmministratore($_SESSION["id"]);
    }
}
/**********************************************************************************/
$templateParams["page_content"] = "./template/modifica_informazioni_account_content.php";
require_once("./template/base.php");
?>