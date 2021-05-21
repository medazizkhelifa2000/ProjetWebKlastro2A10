<?php

include '../entities/event.php';
include '../services/EventC.php';



if(isset($_POST['titre'])  and isset($_POST['emplacement']) and isset($_POST['description']) and isset($_POST['date_debut']) and isset($_POST['date_fin']) and isset($_POST['places']) and isset($_POST['nom_categorie']) and isset($_POST['image']) )
{
    session_start();

    $event = new event(0,$_POST['titre'],$_POST['description'],$_POST['image'],$_POST['emplacement'],$_POST['nom_categorie'],$_POST['date_debut'],$_POST['date_fin'],$_POST['places']);


    $EventC=new EventC();
    $EventC->ajouterevent($event);
    header('Location: AfficherEvent.php');
}
else{
    echo "verifier les champs";
}

?>