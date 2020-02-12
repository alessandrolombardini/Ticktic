<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    
    
    list($result, $msg) = uploadImage(UPLOAD_DIR."categorie/", $_FILES["categimg"]);
    if($result != 0){
        $id = $dbh->insertCategoria($_POST["nome"], $msg);
        if($id == false){
            $templateParams["msg"] = "Errore: categoria non inserita.";
            $templateParams["error"] = 's';
        } else {
            $templateParams["msg"] = "Congratulazioni: categoria inserita.";
            $templateParams["error"] = 'n';    
        }
    } else {
        $templateParams["msg"] = $msg;
        $templateParams["error"] = 's';
    }
    require_once("./inserisci_nuova_categoria.php");
?>