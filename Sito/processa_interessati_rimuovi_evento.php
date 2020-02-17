<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
$arr = [];
if(!isset($_SESSION["id"])){
    $arr["Esito"] = "Non loggato";
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    $arr["Esito"] = "Non utente";
} else if (isset($_POST["IDEvento"]) && !empty($_POST["IDEvento"])){
    $dbh->rimuoviInteressePerUtente($_POST["IDEvento"], $_SESSION["id"]);
    $arr["Esito"] = "OK";
} 
print_r(json_encode($arr));
?>