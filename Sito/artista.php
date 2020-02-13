<?php
    require_once("./bootstrap.php");
    
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    if(isset($_GET["IDArtista"]) && !empty($_GET["IDArtista"])){
        $templateParams["artista"] = $dbh->getArtistFromID($_GET["IDArtista"])[0];
        $templateParams["eventi"] = $dbh->getEventsFromIDArtista($_GET["IDArtista"]);
        $templateParams["page_content"] = "./template/artista_content.php";
    } else {
        header('Location: ./page_something_goes_wrong.php');
    }

    require_once("./template/base.php");
?>