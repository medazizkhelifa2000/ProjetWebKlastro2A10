<?php


class Commande
{
    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }
    /**
     * @return mixed
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * @param mixed $produits
     */
    public function setProduits($produits): void
    {
        $this->produits = $produits;
    }
    private $id_commande;
    private $id_user_cm;
    private $date_cm;
    private $status;
    private $prix_commande;
    private $location;
    /**
     * Commande constructor.
     * @param $id_commande
     * @param $id_user_cm
     * @param $date_cm
     * @param $status
     * @param $prix_commande
     * @param $produits
     */
    public function __construct($id_commande, $id_user_cm, $date_cm, $status, $prix_commande,  $location)
    {
        $this->id_commande = $id_commande;
        $this->id_user_cm = $id_user_cm;
        $this->date_cm = $date_cm;
        $this->status = $status;
        $this->prix_commande = $prix_commande;
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->id_commande;
    }

    /**
     * @param mixed $id_commande
     */
    public function setIdCommande($id_commande): void
    {
        $this->id_commande = $id_commande;
    }

    /**
     * @return mixed
     */
    public function getIdUserCm()
    {
        return $this->id_user_cm;
    }

    /**
     * @param mixed $id_user_cm
     */
    public function setIdUserCm($id_user_cm): void
    {
        $this->id_user_cm = $id_user_cm;
    }

    /**
     * @return mixed
     */
    public function getDateCm()
    {
        return $this->date_cm;
    }

    /**
     * @param mixed $date_cm
     */
    public function setDateCm($date_cm): void
    {
        $this->date_cm = $date_cm;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPrixCommande()
    {
        return $this->prix_commande;
    }

    /**
     * @param mixed $prix_commande
     */
    public function setPrixCommande($prix_commande): void
    {
        $this->prix_commande = $prix_commande;
    }

}