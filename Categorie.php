<?php
class Categorie
{
    private  $id;
    private $nom;
    private $description;
    private $nombre_produit;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getNombreProduit()
    {
        return $this->nombre_produit;
    }

    /**
     * @param mixed $nombre_produit
     */
    public function setNombreProduit($nombre_produit)
    {
        $this->nombre_produit = $nombre_produit;
    }


    /**
     * Categorie constructor.
     * @param $id
     * @param $nom
     * @param $description
     * @param $nombre_produit
     */
    public function __construct($id, $nom, $description, $nombre_produit)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        if ($nombre_produit !=NULL ){ $this->nombre_produit = $nombre_produit;}

    }

}