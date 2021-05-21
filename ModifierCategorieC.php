<?php

include_once(__DIR__ . "/../services/CategorieService.php");
include_once(__DIR__ . "/../entities/Categorie.php");



if(isset($_POST['id'])  and isset($_POST['nom']) and isset ($_POST['description']) )
{
    session_start();

    $CategorieC=new CategorieService();
    $number_of_products = $CategorieC->numberofProducts($_POST['id']);
    $categorie = new Categorie($_POST['id'],$_POST['nom'],$_POST['description'],$number_of_products );


    $CategorieC=new CategorieService();
    $CategorieC->modifiercategorie($categorie,$_POST['id'] );
    header('Location: ../Views/back/AfficherCategorie.php');

}
else{
    echo "verifier les champs";
}

?>