<?php
require_once("./bootstrap.php");

if(isset($_POST["filter"])){
    if (isset($_POST["category"]) && $_POST["category"] != ""){
        if($_POST["filter"] == "A-Z"){
                $result = $dbh->getEventsFromIDCategoriaNameOrdered($_POST["category"],"ASC");
        } else if($_POST["filter"] == "Z-A"){
                $result = $dbh->getEventsFromIDCategoriaNameOrdered($_POST["category"],"DESC");
        } else if($_POST["filter"] == "P-ASC"){
                $result = $dbh->getEventsFromIDCategoriaPriceOrdered($_POST["category"],"ASC");
        } else if($_POST["filter"] == "P-DESC"){
                $result = $dbh->getEventsFromIDCategoriaPriceOrdered($_POST["category"],"DESC");
        }
    } else if (isset($_POST["artist"]) && $_POST["artist"] != ""){
        if($_POST["filter"] == "A-Z"){
                $result = $dbh->getEventsFromIDArtistaNameOrdered($_POST["artist"],"ASC");
        } else if($_POST["filter"] == "Z-A"){
                $result = $dbh->getEventsFromIDArtistaNameOrdered($_POST["artist"],"DESC");
        } else if($_POST["filter"] == "P-ASC"){
                $result = $dbh->getEventsFromIDArtistaPriceOrdered($_POST["artist"],"ASC");
        } else if($_POST["filter"] == "P-DESC"){
                $result = $dbh->getEventsFromIDArtistaPriceOrdered($_POST["artist"],"DESC");
        }
    } else {
        if($_POST["filter"] == "A-Z"){
                $result = $dbh->getAllEventsNameOrdered("ASC");
        } else if($_POST["filter"] == "Z-A"){
                $result = $dbh->getAllEventsNameOrdered("DESC");
        } else if($_POST["filter"] == "P-ASC"){
                $result = $dbh->getAllEventsPriceOrdered("ASC");
        } else if($_POST["filter"] == "P-DESC"){
                $result = $dbh->getAllEventsPriceOrdered("DESC");
        }
    }
}

for ($i = 0; $i < count($result); $i++) {
        $result[$i]["DataEvento"] = date("d/m/Y H:m", strtotime(substr($result[$i]["DataEvento"], 0, -3)));
}

$utente = "y";

if (isset($_SESSION["id"]) && ($_SESSION ["autorizzazione"] == "ORGANIZZATORE" || $_SESSION ["autorizzazione"] == "AMMINISTRATORE")){
        $utente = "n";
}

$arr = array($result,$utente);
header("Content-Type: application/json");
print_r(json_encode($arr));

?>
