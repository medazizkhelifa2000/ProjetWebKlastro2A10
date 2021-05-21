<?php


class Categorie{
    private $id_cat;
    private $nom_cat;

    public function __construct($id_cat, $nom_cat)
    {
        $this->id_cat = $id_cat;
        $this->nom_cat = $nom_cat;
    }

    public function getId_cat(){
        return $this->id_cat;
    }

    public function setId_cat($id_cat): void{
        $this->id_cat = $id_cat;
    }


    public function getnom_cat(){
        return $this->nom_cat;
    }

    public function setnom_cat($nom_cat): void{
        $this->nom_cat = $nom_cat;
    }


}