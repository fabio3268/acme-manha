<?php

namespace Source\Models;

use Source\Core\Connect;

class Project
{
    private $id;
    private $title;
    private $abstract;
    private $text;
    private $idCategory;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return int|null
     */
    public function getIdCategory(): ?int
    {
        return $this->idCategory;
    }

    /**
     * @param $id
     * @param $title
     * @param $abstract
     * @param $text
     * @param $idCategory
     */
    public function __construct(
        int $id = null,
        string $title = null,
        string $abstract = null,
        string $text = null,
        int $idCategory = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->abstract = $abstract;
        $this->text = $text;
        $this->idCategory = $idCategory;
    }

    public function findByCategory(int $idCategory)
    {
        $query = "SELECT * FROM projects WHERE idCategory = :idCategory";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idCategory",$idCategory);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function insert() : bool
    {
        $query = "INSERT INTO projects (title, abstract, text, idCategory) 
                  VALUES (:title, :abstract, :text, :idCategory)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":abstract", $this->abstract);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":idCategory", $this->idCategory);
        $stmt->execute();
        $this->id = Connect::getInstance()->lastInsertId(); // armazena o id do projeto incluido
        $this->message = "Projeto cadastrado com sucesso!";
        return true;
    }

    public function findById()
    {
        $query = "SELECT * FROM projects WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $project = $stmt->fetch();
            $this->title = $project->title;
            $this->abstract = $project->abstract;
            return true;
        }
    }

    public function findByidUser(int $idUser)
    {
        $query = "SELECT * 
                  FROM projects 
                  JOIN write_projects ON projects.id = write_projects.idProject 
                  JOIN categories ON projects.idCategory = categories.id
                  WHERE write_projects.idUser = :idUser";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idUser", $idUser);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }

    }
}

