<?php
    include "../entities/Categorie.php";
    include "../core/config.php";

    class CategorieCRUD{
        public static function ajouter($categories){
            $sql = "INSERT INTO `categories` (`id_cat`, `nom_cat`) 
                    VALUES (NULL, :nom_cat)";
            $db = config::getConnexion();
            try{
                $req = $db->prepare($sql);
                $req->bindValue(':nom_cat',$categories->getnom_cat());
                

                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        public static function afficher(){
            $sql="SELECT * FROM `categories`";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function afficherUn($id_cat){
            $sql = 'SELECT * FROM `categories` WHERE `id_cat` = '.$id_cat;
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function modifier($categories){
            $sql = "UPDATE `categories` SET `nom_cat` = :nom_cat, `id_cat` = :id_cat WHERE `categories`.`id_cat` = :id_cat; ";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':nom_cat',$categories->getnom_cat());
                $req->bindValue(':id_cat',$categories->getId_cat());
                
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        public static function supprimer($id_cat){
            $sql = "DELETE FROM `categories` WHERE id_cat = :id_cat";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':id_cat',$id_cat);
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }
    }
    ?>