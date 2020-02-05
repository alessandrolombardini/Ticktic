<?php
    require_once("./bootstrap.php");
    if(isset($_GET["IDEvento"])){
        $templateParams["IDEvento"] = $_GET["IDEvento"];
        $templateParams["page_content"] = "./template/notifiche/crea_notifica_organizzatore_content.php";    
    }
    require_once("./template/base.php");
?>