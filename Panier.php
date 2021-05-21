<?php


class Panier
{
    private $id;
    private $id_user;
    private $id_produit;
    private $quantite;
    private $prix;

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
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }

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
    public function setIdProduit($id_produit): void
    {
        $this->id_produit = $id_produit;
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
    public function setQuantite($quantite): void
    {
        $this->quantite = $quantite;
    }


    /**
     * Panier constructor.
     * @param $id
     * @param $id_user
     * @param $id_produit
     * @param $quantite
     * @param $prix
     */
    public function __construct($id, $id_user, $id_produit, $quantite, $prix)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_produit = $id_produit;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }

}