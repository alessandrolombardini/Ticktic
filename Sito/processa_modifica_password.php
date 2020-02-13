<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} 
/**********************************************************************************/
if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"){
    $templateParams["password"] = $dbh->ottieniInformazioniOrganizzatore($_SESSION["id"])["Password"];
} else if ($_SESSION["autorizzazione"] == "UTENTE") {
    $templateParams["password"] = $dbh->getUtente($_SESSION["id"])["Password"];
} else if ($_SESSION["autorizzazione"] == "AMMINISTRATORE") {
    $templateParams["password"] = $dbh->ottieniInformazioniAmministratore($_SESSION["id"])["Password"];
}
if(isset($_POST["password"]) && isset($_POST["ripetipassword"]) && isset($_POST["oldpassword"]) && !empty($_POST["password"]) && !empty($_POST["ripetipassword"]) && !empty($_POST["oldpassword"])){
    $inserimentoCorretto = false;
    if(password_verify($_POST["oldpassword"], $templateParams["password"])){
        $password = $_POST["password"];
        $ripetipassword = $_POST["ripetipassword"];
        if($password == $ripetipassword){
            if(strlen($_POST['password']) >= 9 && in_str($_POST['password'], $digits) &&
               in_str($_POST['password'], $symbols) && in_str($_POST['password'], $uppercases) && in_str($_POST['password'], $lowercases)){
                $dbh->updatePassword($password, $_SESSION["autorizzazione"], $_SESSION["id"]);           
            } else {
                $templateParams["msg"] = "La password deve essere di almeno 9 caratteri e deve contenere almeno una lettera minuscola, una lettera maiuscola, un numero e un carattere tra i seguenti ,;.:?!";
                $templateParams["error"] = 's';
            }
        } else {
            $templateParams["msg"] = "La password non corrisponde";
            $templateParams["error"] = 's';
        }
    } else {
        $templateParams["msg"] = "La password inserita non è corretta";
        $templateParams["error"] = 's';    
    }
} else {
    $templateParams["msg"] = "Campi non completamente compilati";
    $templateParams["error"] = 's';
}

if($inserimentoCorretto == true){
    $templateParams["msg"] = "Complimenti, sei ora parte della nostra comunity";
    $templateParams["error"] = 'n';
    require_once("./informazioni_account.php");
} else {
    require_once("./modifica_password.php");
}

?>