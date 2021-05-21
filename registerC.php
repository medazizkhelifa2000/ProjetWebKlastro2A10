<?php

include(__DIR__ . "/../Entities/User.php");
include(__DIR__ . "/../services/UserService.php");



if(isset($_POST['nom'])  and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['username']) and isset($_POST['mdp']) and isset($_POST['gouvernorat']) and isset($_POST['zip']) )
{

    $location = $_POST['gouvernorat']." ".$_POST['zip'];
    $user = new user(0,$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp'],'role_user',$_POST['username'],$location);
    $UserService=new UserService();
    $UserService->ajouteruser($user);
    header('Location: ../Views/login.html');
}
else{
    echo "verifier les champs";
}

?>