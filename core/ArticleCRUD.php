<?php
    include "../entities/Article.php";
    include "../core/config.php";

    class ArticleCRUD{
        public static function ajouter($article){
            $sql = "INSERT INTO `articles` (`id`, `lib`, `id_cat`, `prix`, `description`, `image`, `qnt`) 
                    VALUES (NULL, :lib, :id_cat, :prix, :description, :image, :qnt)";
            $db = config::getConnexion();
            try{
                $req = $db->prepare($sql);
                $req->bindValue(':lib',$article->getLib());
                $req->bindValue(':id_cat',$article->getIdCat());
                $req->bindValue(':prix',$article->getPrix());
                $req->bindValue(':description',$article->getDescription());
                $req->bindValue(':image',$article->getImage());
                $req->bindValue(':qnt',$article->getQnt());

                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        public static function afficher(){
            $sql="SELECT * FROM `articles`";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function afficherUn($id){
            $sql = 'SELECT * FROM `articles` WHERE `id` = '.$id;
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function modifier($article){
            $sql = "UPDATE `articles` SET `lib` = :lib, `id_cat` = :id_cat, `prix` = :prix, `description` = :description, `image` = :image, `qnt` =  :qnt WHERE `articles`.`id` = :id; ";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':lib',$article->getLib());
                $req->bindValue(':id_cat',$article->getIdCat());
                $req->bindValue(':prix',$article->getPrix());
                $req->bindValue(':description',$article->getDescription());
                $req->bindValue(':image',$article->getImage());
                $req->bindValue(':qnt',$article->getQnt());
                $req->bindValue(':id',$article->getId());
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        public static function supprimer($id){
            $sql = "DELETE FROM `articles` WHERE id = :id";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':id',$id);
                $req->execute();
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }
    }
    ?>