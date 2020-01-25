<?php
    if($templateParams["loginError"]==true){
        $templateParams["page_content"] = "./template/login_content.php";
        $templateParams["loginError"]=false;
    }else{
        $templateParams["loginErrorMessage"]="";
        $templateParams["page_content"] = "./template/login_content.php";
    }
    require_once("./template/base.php");
?>