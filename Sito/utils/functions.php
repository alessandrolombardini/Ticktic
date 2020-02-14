<?php
  function in_str($str, $find) {
    foreach ($find as $ch) {
      if (strpos($str, $ch) !== false) {
        return true;
      }
    }
    return false;
  }
  
  $symbols = array(',', '.', ':', '?', '!');
  $digits = array();
  for ($i = 0; $i < 10; $i++) {
    array_push($digits, chr(48 + $i));
  }
  $lowercases = array();
  for ($i = 0; $i < 26; $i++) {
    array_push($lowercases, chr(97 + $i));
  }
  $uppercases = array();
  for ($i = 0; $i < 26; $i++) {
    array_push($uppercases, chr(65 + $i));
  }

function checkBaseParams($email, $sesso, $nome, $cognome, $datanascita, $indirizzo, $cap, $citta){
    return filter_var($email, FILTER_VALIDATE_EMAIL)
           && ($sesso == "m" || $sesso == "f" || $sesso == "a")
           && !empty($nome)
           && !empty($cognome)
           && !empty($datanascita)
           && !empty($indirizzo)
           && !empty($cap)
           && !empty($citta);
}

function checkOrganizzatoreParams($iban){
    return isset($iban) && !empty($iban);
}

function checkAmministratoreParams($email, $nome, $cognome){
    return filter_var($email, FILTER_VALIDATE_EMAIL)
           && !empty($nome)
           && !empty($cognome);
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 5000;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}


function getAltFromImageName($image_name){
    $lower_case  = strtolower($image_name);
    $name = explode(".", $lower_case)[0];
    return str_replace("_", " ", $name);
}

?>