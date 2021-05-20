<?php

include '../model/commande.php';
include '../controller/comm.php';


if( isset($_POST['rib']) and isset($_POST['ncb']) and isset($_POST['nce']) )
{
	
$commande = new commande(0,$_POST['rib'],$_POST['ncb'],$_POST['nce']);
	

	$commandeC=new commandeC();
	$commandeC->ajouterCommande($commande);
	header('Location: shop.php');
}


?>
