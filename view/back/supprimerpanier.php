<?php
include 'model/panier.php';
include 'controller/pan.php';


if (isset($_GET["id"]))
{

    $panierC=new panierC();
   
    $panierC->supprimerPanier($_GET["id"]);
 

    header('Location: afficherpanier.php');
}

?>