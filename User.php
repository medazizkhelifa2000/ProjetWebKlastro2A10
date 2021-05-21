<?php
class User
{
    private	$id;
    private $nom_user;
    private $prenom;
    private $mail;
    private $mdp;
    private $role;
    private $username;
    private $location;

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
    function __construct($id,$nom_user,$prenom,$mail,$mdp,$role,$username,$location)
    {
        $this->id=$id;
        $this->nom_user=$nom_user;
        $this->prenom=$prenom;
        $this->mail=$mail;
        $this->mdp=$mdp;
        $this->role=$role;
        $this->username=$username;
        $this->location=$location;
    }



    public function getid(){return $this->id;}
    public function getnom(){return $this->nom_user;}
    public function getprenom(){return $this->prenom;}
    public function getmail(){return $this->mail;}
    public function getmdp(){return $this->mdp;}
    public function getrole(){return $this->role;}
    public function getusername(){return $this->username;}
    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_nom($nom_user)
    {
        $this->nom = $nom_user;
    }
    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function set_mail($mail)
    {
        $this->mail = $mail;
    }
    public function set_mdp($mdp)
    {
        $this->mdp = $mdp;
    }
    public function set_role($role)
    {
        $this->role = $role;
    }
    public function set_username($username)
    {
        $this->username = $username;
    }
}

?>