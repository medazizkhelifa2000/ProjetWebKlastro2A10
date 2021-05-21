<?php

include_once(__DIR__ . "/../services/ProduitService.php");
include_once(__DIR__ . "/../Entities/Produit.php");




if(  isset($_POST['id'])  and isset($_POST['nom'])  and isset($_POST['prix']) and isset($_POST['description'])  and isset($_POST['quantite']) and isset($_POST['nom_categorie']) and isset($_POST['image']) )
{
    session_start();

    $Produit = new Produit(0,$_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['image'],$_POST['nom_categorie'],$_POST['quantite']);



    $PC=new ProduitService();
    $PC->modifierproduit($Produit,$_POST['id'] );
    header('Location: ../Views/back/AfficherProduit.php');
}
else{
    echo "verifier les champs" ;
}

?>