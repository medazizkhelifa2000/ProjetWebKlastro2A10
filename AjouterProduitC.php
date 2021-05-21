<?php

include_once(__DIR__ . "/../services/ProduitService.php");
include_once(__DIR__ . "/../Entities/Produit.php");
include_once(__DIR__ . "/../services/CategorieService.php");



if(isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['description'])  and isset($_POST['quantite']) and isset($_POST['nom_categorie']) and isset($_POST['image']) )
{
    session_start();

    $Produit = new Produit(0,$_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['image'],$_POST['nom_categorie'],$_POST['quantite']);


    $ProduitC=new ProduitService();
    $ProduitC->ajouterproduit($Produit);
    $CatService = new CategorieService();

    $result=$CatService->recuperercategorienom($_POST['nom_categorie']);

    foreach($result as $row){
        $id =$row->id;
        $nom=$row->nom;
        $description=$row->description;


    }
    $number_of_products = $CatService->numberofProducts($id);
    $cat = new categorie($id,$nom,$description,$number_of_products);
    $CatService->modifiercategorie($cat,$id);

    header('Location: ../Views/back/AfficherProduit.php');
}
else{
    echo "verifier les champs";
}

?>