<?php
include "./Controllers/Controller.php";


if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "./Controllers/$fichier";

?>