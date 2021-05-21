<?php

include_once(__DIR__ . "/../services/UserService.php");
include_once(__DIR__ . "/../entities/User.php");





if( isset($_POST['nom'])  and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['username']) and isset($_POST['mdp']) )
{
    session_start();

    $user = new user(0,$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp'],'role_admin',$_POST['username']);



    $UserC=new UserService();
    $UserC->modifieruser($user,$_SESSION['id'] );
    header('Location: ../Views/back/AfficherUser.php');
}
else{
    echo "verifier les champs" ;
}

?>