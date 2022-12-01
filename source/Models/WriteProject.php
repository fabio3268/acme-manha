<?php

namespace Source\Models;

use Source\Core\Connect;

class WriteProject
{
    private $id;
    private $idProject;
    private $idUser;

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
    public function getIdProject()
    {
        return $this->idProject;
    }

    /**
     * @param mixed $idProject
     */
    public function setIdProject($idProject): void
    {
        $this->idProject = $idProject;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @param $id
     * @param $idProject
     * @param $idUser
     */
    public function __construct($id = NULL, $idProject, $idUser)
    {
        $this->id = $id;
        $this->idProject = $idProject;
        $this->idUser = $idUser;
    }

    public function writeProjectInsert()
    {
        $query = "INSERT INTO write_projects (id, idProject, idUser) 
                  VALUES (NULL, :idProject, :idUser)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idProject", $this->idProject);
        $stmt->bindParam(":idUser", $this->idUser);
        $stmt->execute();
    }

}