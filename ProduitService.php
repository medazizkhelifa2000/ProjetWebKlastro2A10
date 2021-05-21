<?php
require_once(__DIR__ . "/../Util/DataSource.php");
include (__DIR__ . "/../Entities/Categorie.php");
class ProduitService{
    function ajouterproduit($produit)
    {

        $sql="INSERT INTO `produit`( `nom`,`prix`, `description`, `image`, `nom_categorie`, `quantite`) VALUES (:nom,:prix,:description,:image,:nom_categorie,:quantite)";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);

            $nom=$produit->getNom();
            $prix=$produit->getPrix();
            $description=$produit->getDescription();
            $image=$produit->getImage();
            $nom_categorie=$produit->getNomCategorie();
            $quantite=$produit->getQuantite();
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':description',$description);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':image',$image);
            $req->bindValue(':nom_categorie',$nom_categorie);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }
    function afficherlist_produit(){

        $sql="SElECT * From produit";
        $db = DataSource::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function
    modifierproduit($produit,$id)
    {
        $db = DataSource::getConnexion();
        $sql="UPDATE `produit` SET `nom`=:nom,`description`=:description,`image`=:image,`nom_categorie`=:nom_categorie,`quantite`=:quantite WHERE `id_produit`=:id";
        try{

            $req=$db->prepare($sql);

            $nom=$produit->getNom();
            $description=$produit->getDescription();
            $image=$produit->getImage();
            $nom_categorie=$produit->getNomCategorie();
            $quantite=$produit->getQuantite();
            $req->bindValue(':nom',$nom);
            $req->bindValue(':description',$description);
            $req->bindValue(':image',$image);
            $req->bindValue(':nom_categorie',$nom_categorie);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':id',$id);

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }



    function recuperproduit($id){
        $sql="SELECT * FROM `produit` WHERE  id_produit=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $produit= $req->fetchALL(PDO::FETCH_OBJ);
            return $produit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function Supprimerproduit($id){
        $sql="DELETE  from produit where  id_produit=:id ";
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

    function returnPrix($id_produit){
        $servername = "localhost";
        $username = "root";
        $password = "";/* Put your password */
        $dbname = "projetweb";/* Put your database name */

        /* Create connection */
        $conn = new mysqli($servername, $username, $password, $dbname);
        /* Check connection*/
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql ="SELECT prix from produit where id_produit='$id_produit' ";
        $query_run = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array(($query_run));
        $prix = $row[0];
        return $prix;


    }
    function incrementerproduit($id){
        $sql="SELECT * FROM `produit` WHERE  id_produit=:id ";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $produit= $req->fetchALL(PDO::FETCH_OBJ);

            $quantite=$produit[0]->quantite + 1;
            var_dump($quantite);
            $produitt=$quantite[0];
            $newproduit = new Produit(0,$produitt->nom,$produitt->description,$produitt->image,$produitt->nom_categorie,$produitt);

            $this->modifierproduit($newproduit,$id);



            return $newproduit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function decrmenterevent($id , $qtt){
        $sql="SELECT * FROM `produit` WHERE  id_produit=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $produit= $req->fetchALL(PDO::FETCH_OBJ);

            $quantite=$produit[0]->quantite - $qtt;

            $produitt=$produit[0];
            $newproduit = new Produit(0,$produitt->nom,$produitt->description,$produitt->image,$produitt->nom_categorie,$quantite);

            $this->modifierproduit($newproduit,$id);



            return $newproduit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>