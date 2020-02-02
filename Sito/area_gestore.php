<?php 
$templateParams["page_content"] = "./template/gestore/area_gestore_content.php";
if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}
require_once("./template/base.php");
?>