<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    
    
    list($result, $immagineEvento) = uploadImage(UPLOAD_DIR."categorie/", $_POST["categimg"]);
    $id = $dbh->insertCategoria($_POST["nome"], $immagineEvento);

    if($id == false){
        $templateParams["msg"] = "Errore: categoria non inserita.";
        $templateParams["error"] = 's';
    } else {
        $templateParams["msg"] = "Congratulazioni: categoria inserita.";
        $templateParams["error"] = 'n';    
    }
    require_once("./inserisci_nuova_categoria.php");
?>