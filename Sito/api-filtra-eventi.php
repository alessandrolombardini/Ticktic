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

/* foreach ($result as $event) {
    $event["DataEvento"].replace(date("d/m/Y h:m", strtotime(substr($event["DataEvento"]))));
}  */
header("Content-Type: application/json");
print_r(json_encode($result));

?>
