<?php
include_once(__DIR__ . "/../Util/DataSource.php");


class CommandeService
{
    function passerCommande($commande){
        $sql="INSERT INTO commande (id_commande , id_user_cm , date_cm , status , prix_commande , location) values (:id_commande , :id_user_cm , :date_cm , :status , :prix_commande ,  :location) ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
          $id_commande= $commande->getIdCommande();
          $id_user_cm = $commande->getIdUserCm();
          $date_cm = $commande->getDateCm();
          $status = $commande->getStatus();
          $prix_commande = $commande->getPrixCommande();
          $location = $commande->getLocation();

            $req->bindValue(':id_commande',$id_commande);
            $req->bindValue(':id_user_cm',$id_user_cm);
            $req->bindValue(':date_cm',$date_cm);
            $req->bindValue(':status',$status);
            $req->bindValue(':prix_commande',$prix_commande);
            $req->bindValue(':location',$location);
              $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function panierList ($id_user){
        $sql = "Delete FROM panier  where id_user=:id";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id_user);
            $req->execute();
            $produits= $req->fetchALL(PDO::FETCH_OBJ);
            return $produits;

        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    } function getLocation ($id_user){
        $sql = "select location from user  where id=:id";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id_user);
            $req->execute();
            $location= $req->fetchALL(PDO::FETCH_OBJ);
            return $location;

        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function resetPanier($id){
        $sql = "Delete from panier where id_user=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();


        }catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function AfficheCommande($id_user){

        $sql = "Select c.id_commande, c.date_cm , c.status, c.prix_commande , c.location , u.nom_user , u.prenom,c.id_user_cm, u.mail from commande c inner join user u on u.id =:id group by c.id_commande";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id_user);
            $req->execute();
            $liste=$req->fetchALL();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getCommande($id_commande){

        $sql = "Select c.id_commande, c.date_cm , c.status, c.prix_commande , c.location , u.nom_user , u.prenom, u.mail from commande c inner join user u on c.id_commande =:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id_commande);
            $req->execute();
            $liste=$req->fetchALL();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}