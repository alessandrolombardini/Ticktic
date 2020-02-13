<?php
require_once("./bootstrap.php");
 /****************************** Check permission **********************************/
if(isset($_POST["idevento"])){
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