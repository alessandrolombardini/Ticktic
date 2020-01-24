<?php
require_once 'bootstrap.php';

if($_POST["action"]==1){
    //Inserisco

    $anteprima = $_POST["anteprima"];
    $luogo = $_POST["luogo"];
    $numeroPosti = $_POST["biglietti"];
    $prezzoBiglietto = $_POST["prezzo"]; 
    $dataEvento = $_POST["data"];
     $noteEvento = $_POST["note"];
     $descrizioneEvento = $_POST["descrizione"]; 
     $nomeEvento = $_POST["nome"];
     
     $IDCategoria = $_POST["categoria"]; 
     echo $IDCategoria;
     $IDOrganizzatore = $_SESSION["IDOrganizzatore"];
     $artisti;
    
    $titoloarticolo = $_POST["titoloarticolo"];
    $testoarticolo = $_POST["testoarticolo"];
    $anteprimaarticolo = $_POST["anteprimaarticolo"];
    $dataarticolo = date("Y-m-d");
    $autore = $_SESSION["idautore"];

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
    if($result != 0){
        $immagineEvento = $msg;
        $id = $dbh->insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        if($id!=false){
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfArticle($id, $categoria);
            }
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
        
    }
    header("location: area_gestore.php?msg=".$msg);
}
?>