<?php
/**
 *
 */
class Produit
{
    private $id_produit;
    private $nom;
    private $prix;
    private $description;
    private $image;
    private $nom_categorie;
    private $quantite;

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->id_produit;
    }

    /**
     * @param mixed $id_produit
     */
    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getNomCategorie()
    {
        return $this->nom_categorie;
    }

    /**
     * @param mixed $nom_categorie
     */
    public function setNomCategorie($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }



    /**
     * Produit constructor.
     * @param $id_produit
     * @param $nom
     * @param $prix
     * @param $description
     * @param $image
     * @param $nom_categorie
     * @param $quantite
     */
    public function __construct($id_produit, $nom, $prix, $description, $image, $nom_categorie, $quantite)
    {
        $this->id_produit = $id_produit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->image = $image;
        $this->nom_categorie = $nom_categorie;
        $this->quantite = $quantite;
    }


}
?>
