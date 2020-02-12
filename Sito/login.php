<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(isset($_SESSION["id"])){
    header('Location: ./homepage.php');
} 
/**********************************************************************************/
$templateParams["page_content"] = "./template/login_content.php";
require_once("./template/base.php");
?>