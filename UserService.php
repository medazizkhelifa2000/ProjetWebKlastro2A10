<?php

include (__DIR__ . "/../Util/DataSource2.php");


class   UserService {



    function ajouteruser($user)
    {

        $sql="INSERT INTO `user`( `nom_user`, `prenom`, `mail`, `mdp`, `role`, `username`, `location`) VALUES (:nom,:prenom,:mail,:mdp,:role,:username, :location)";
        $db = DataSource2::getConnexion();
        try{
            $req=$db->prepare($sql);
            $nom=$user->getnom();
            $mdp=$user->getmdp();
            $prenom=$user->getprenom();
            $mail=$user->getmail();
            $role=$user->getrole();
            $username=$user->getusername();
            $location=$user->getLocation();
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':mdp',$mdp);
            $req->bindValue(':role',$role);
            $req->bindValue(':username',$username);
            $req->bindValue(':location',$location);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }
    function afficherlist_user(){

        $sql="SELECT * From user";
        $db = DataSource2::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifieruser($user,$id)
    {
        $db = DataSource2::getConnexion();
        $sql="UPDATE `user` SET `nom_user`=:nom,`prenom`=:prenom,`mail`=:mail,`mdp`=:mdp,`username`=:username,`location`=:location WHERE `id`=:id";
        try{

            $req=$db->prepare($sql);
            $nom=$user->getnom();
            $mdp=$user->getmdp();
            $prenom=$user->getprenom();
            $mail=$user->getmail();
            $username=$user->getusername();
            $location=$user->getLocation();
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':mail',$mail);
            $req->bindValue(':mdp',$mdp);
            $req->bindValue(':username',$username);
            $req->bindValue(':location',$location);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }
    function GrantAdmin($id){
        $db = DataSource2::getConnexion();
        $sql="UPDATE `user` SET role='role_admin' WHERE `id`='$id'";
        try{

            $req=$db->prepare($sql);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }

    }
    function RemoveAdmin($id){
        $db = DataSource2::getConnexion();
        $sql="UPDATE `user` SET role='role_user' WHERE `id`='$id'";
        try{

            $req=$db->prepare($sql);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }

    }



    function recupereruser($id){
        $sql="SELECT * FROM `user` WHERE  id=:id ";
        $db = DataSource2::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $user= $req->fetchALL(PDO::FETCH_OBJ);
            return $user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function Supprimeruser($id){
        $sql="DELETE  from user where  id=:id ";
        $db = DataSource2::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function verifierLogin($login,$mdp)
    {
        $db = DataSource2::getConnexion();
        $sql = 'SELECT id, nom_user, prenom, mail, mdp, role, username, COUNT(*) AS count FROM user WHERE ( mail  = :mail OR username = :username )  AND mdp = :mdp  LIMIT 1';
        $req = $db->prepare($sql);
        $req->bindValue(':mail',$login);
        $req->bindValue(':username',$login);
        $req->bindValue(':mdp',$mdp);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        return $result;
    }




}


?>