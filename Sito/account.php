<?php
require_once("bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} 
/**********************************************************************************/
if (isset($_GET["msg"]) && isset($_GET["error"])){
    $templateParams["msg"] = $_GET["msg"];
    $templateParams["error"] = $_GET["error"];
}
$templateParams["page_content"] = "./template/account_content.php";
$templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
require_once("./template/base.php");
?>
