<?php
require_once("./bootstrap.php");
if(isset($_POST["IDNotificaPersonale"])){
    $idNotificaPersonale = $_POST["IDNotificaPersonale"];
    $dbh->segnaNotificaPersonaComeVisualizzata($idNotificaPersonale);
}
?>