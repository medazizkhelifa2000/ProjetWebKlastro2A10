<?php

include_once(__DIR__ . "/../services/CategorieService.php");
include_once(__DIR__ . "/../entities/Categorie.php");




if( isset($_POST['nom']) )
{
    session_start();

    $categorie = new categorie(0,$_POST['nom'],$_POST['description'],NULL);


    $CategorieC=new CategorieService();
    $CategorieC->ajoutercategorie($categorie);
    header('Location: ../Views/back/AfficherCategorie.php');
}
else{
    echo "verifier les champs";
}

?>