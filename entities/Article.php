<?php


class Article{
    private $id;
    private $lib;
    private $id_cat;
    private $prix;
    private $description;
    private $image;
    private $qnt;

    public function __construct($id, $lib, $id_cat, $prix, $description, $image, $qnt)
    {
        $this->id = $id;
        $this->lib = $lib;
        $this->id_cat = $id_cat;
        $this->prix = $prix;
        $this->description = $description;
        $this->image = $image;
        $this->qnt = $qnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void{
        $this->id = $id;
    }

    public function getLib(){
        return $this->lib;
    }

    public function setLib($lib): void{
        $this->lib = $lib;
    }

    public function getIdCat(){
        return $this->id_cat;
    }

    public function setIdCat($id_cat): void{
        $this->id_cat = $id_cat;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function setPrix($prix): void{
        $this->prix = $prix;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description): void{
        $this->description = $description;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image): void{
        $this->image = $image;
    }

    public function getQnt(){
        return $this->qnt;
    }

    public function setQnt($qnt): void{
        $this->qnt = $qnt;
    }
}
