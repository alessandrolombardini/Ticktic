<?php
    require_once("./bootstrap.php");
    if(isset($_POST["IDEvento"])){
        $templateParams["IDEvento"] = $_POST["IDEvento"];
        $templateParams["page_content"] = "./template/notifiche/crea_notifica_organizzatore_content.php";    
    }
    require_once("./template/base.php");
?>