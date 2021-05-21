<?php


class Reclamation
{
    /**
     * @return mixed
     */
    public function getIdReclamation()
    {
        return $this->id_reclamation;
    }

    /**
     * @param mixed $id_reclamation
     */
    public function setIdReclamation($id_reclamation): void
    {
        $this->id_reclamation = $id_reclamation;
    }

    /**
     * @return mixed
     */
    public function getIdUserRec()
    {
        return $this->id_user_rec;
    }

    /**
     * @param mixed $id_user_rec
     */
    public function setIdUserRec($id_user_rec): void
    {
        $this->id_user_rec = $id_user_rec;
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
    public function setDescription($description): void
    {
        $this->description = $description;
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
    private $id_reclamation ;
    private $id_user_rec;
    private $description ;
    private $status ;

    /**
     * Reclamation constructor.
     * @param $id_reclamation
     * @param $id_user_rec
     * @param $description
     * @param $status
     */
    public function __construct($id_reclamation, $id_user_rec, $description, $status)
    {
        $this->id_reclamation = $id_reclamation;
        $this->id_user_rec = $id_user_rec;
        $this->description = $description;
        $this->status = $status;
    }

}