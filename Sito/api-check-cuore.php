<?php
require_once("./bootstrap.php");
 /****************************** Check permission **********************************/
$result = false;
 if(isset($_POST["idevento"]) && isset($_SESSION["id"])){
    $result = $dbh->checkInteresseAdEvento($_POST["idevento"], $_SESSION["id"]); 
}
/**********************************************************************************/
$arr = array();
if($result == true){
    $arr["Esito"] = "Positivo";
} else {
    $arr["Esito"] = "Negativo";
}
print_r(json_encode($arr));
?>