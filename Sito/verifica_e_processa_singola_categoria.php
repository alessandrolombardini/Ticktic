<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
if(isset($_GET["id"]) && isset($_GET["valutazione"]) && !empty($_GET["id"]) && !empty($_GET["valutazione"])){
    $dbh->deleteCategoria($_GET["id"]);   
    header('Location: ./verifica_nuove_categorie.php'); 
} else {
    header('Location: ./page_something_goes_wrong.php');
}
?>