<?php
include_once(__DIR__ . "/../Util/DataSource.php");

class  PanierService{

    function AjouterProduit($Produit)
    {

        $sql="INSERT INTO `Panier`( `id_user`, `id_produit`, `quantite_panier`, `prix_panier`) VALUES (:id_user,:id_produit,:quantite,:prix)";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);

            $id_user=$Produit->getIdUser();
            $id_produit=$Produit->getIdProduit();
            $quantite=$Produit->getQuantite();
            $prix=$Produit->getPrix();

            $req->bindValue(':id_user',$id_user);
            $req->bindValue(':id_produit',$id_produit);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':prix',$prix);

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }
    function CalculateTotalPrix($id){
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
        $sql ="SELECT SUM(prix_panier) AS total FROM panier where id_user='$id';  ";
        $result1 = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result1,MYSQLI_NUM);
        return $row[0];

    }

    function AfficherPanier($id_user){

        $sql ="SELECT p.id_produit,e.quantite, p.id_panier,e.image,p.quantite_panier,p.prix_panier,e.nom,e.nom_categorie,u.nom_user,u.prenom,u.mail FROM `panier` p INNER JOIN user u INNER join produit e where p.id_user=:id_user and p.id_produit=e.id_produit GROUP by p.id_panier";
            $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id_user',$id_user);
            $req->execute();
            $liste=$req->fetchALL();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function PanierExists($id_produit,$id_user){
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
        $sql ="select count(*) from panier  where id_produit = '$id_produit' and id_user='$id_user' ";

        $result1 = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result1,MYSQLI_NUM);
        return $row[0];
        }


    function modifierpanier($Produit,$id_produit)
    {
        $db = DataSource::getConnexion();
        $sql="UPDATE `panier` SET `id_produit`=:id_produit,`id_user`=:id_user,`prix_panier`=:prix_panier,`quantite_panier`=:quantite_panier WHERE `id_produit`='$id_produit'";
        try{

        $req=$db->prepare($sql);
            $id_user=$Produit->getIdUser();
            $id_produit=$Produit->getIdProduit();
            $quantite_panier=$Produit->getQuantite();
            $prix_panier=$Produit->getPrix();

        $req->bindValue(':id_produit',$id_produit);
        $req->bindValue(':id_user',$id_user);
        $req->bindValue(':quantite_panier',$quantite_panier);
        $req->bindValue(':prix_panier',$prix_panier);



        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
    }

    function findProduct($id){
        $sql="SELECT * FROM `panier` WHERE  id_panier=:id ";
        $db = DataSource::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            $req->execute();
            $list= $req->fetchALL(PDO::FETCH_OBJ);
            return $list;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function incrementQuantity($id,$quantite){
        $db = DataSource::getConnexion();
        $ProduitService= new ProduitService();
        $Prix = $ProduitService->returnPrix($_POST['id_produit']);

        $sql="UPDATE `panier` SET `quantite_panier`=:quantite_panier ,`prix_panier`=:TotalPrice WHERE `id_panier`='$id'";

        try{

            $req=$db->prepare($sql);
            $quantite_panier=$quantite+1;
            $TotalPrice = ($Prix * $quantite_panier);
            $req->bindValue(':quantite_panier',$quantite_panier);
            $req->bindValue(':TotalPrice',$TotalPrice);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }

    }function decrementQuantity($id,$quantite){
        $db = DataSource::getConnexion();
        $ProduitService= new ProduitService();
        $Prix = $ProduitService->returnPrix($_POST['id_produit']);

        $sql="UPDATE `panier` SET `quantite_panier`=:quantite_panier ,`prix_panier`=:TotalPrice WHERE `id_panier`='$id'";

        try{

            $req=$db->prepare($sql);
            $quantite_panier=$quantite-1;
            $TotalPrice = ($Prix * $quantite_panier);
            $req->bindValue(':quantite_panier',$quantite_panier);
            $req->bindValue(':TotalPrice',$TotalPrice);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }

    }
    function SupprimerPanier($id){

        $sql="DELETE  from panier where  id_panier=:id ";
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
    function ViderPanier($id){

        $sql="DELETE  from panier where  id_user=:id ";
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