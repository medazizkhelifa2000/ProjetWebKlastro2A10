<?php

require_once(__DIR__ . "/../Util/DataSource.php");



class  ParticipationC {



    function participerEvent($participer)
    {

        $sql="INSERT INTO `participation`( `id_User`, `id_event`) VALUES (:id_User,:id_event)";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);

            $id_User=$participer->getid_User();

            $id_event=$participer->getid_event();





            $req->bindValue(':id_event',$id_event);
            $req->bindValue(':id_User',$id_User);


            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }

    function affichermesparticipation($id_User){

        $sql="SELECT  p.id,e.titre,e.description,e.image,e.emplacement,e.nom_categorie,e.date_debut,e.date_fin,e.places,u.nom_user,u.prenom,u.mail FROM `participation` p INNER JOIN user u INNER join event e where p.id_User=:id_User and p.id_event=e.id_event GROUP by p.id";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':id_User',$id_User);
            $req->execute();
            $liste=$req->fetchALL();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherlesparticipation_event($id_event){

        $sql="SELECT  p.id,titre,description,image,emplacement,nom_categorie,date_debut,date_fin,places,nom_user,prenom,mail FROM `participation` p INNER JOIN  `user` u INNER join event e where p.id_User=u.id and p.id_event=:id_event GROUP by p.id";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id_event',$id_event);

            $req->execute();
            return $req->fetchALL();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }





    function recupererparticipation_user($id){
        $sql="SELECT * FROM `participation` WHERE  id=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $reservation_hotel_user= $req->fetchALL(PDO::FETCH_OBJ);
            return $reservation_hotel_user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function Supprimerparticipation_user($id){

        $sql="DELETE  from participation where  id=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }





}


?>