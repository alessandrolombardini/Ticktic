<?php
require_once("bootstrap.php");

/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
}
/**********************************************************************************/

$templateParams["page_content"] = "./template/account/modifica_password_content.php";
require_once("./template/base.php");
?>