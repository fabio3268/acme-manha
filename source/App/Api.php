<?php

namespace Source\App;

use Source\Models\Project;
use Source\Models\User;

class Api
{
    private $user;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();
        $this->user = new User();

        if($headers["Rule"] === "N"){
            return;
        }

        if(empty($headers["Email"]) || empty($headers["Password"]) || empty($headers["Rule"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Por favor, informe Email e Senha!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        if(!$this->user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => $this->user->getMessage()
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

    }

    public function getUser()
    {
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateUser(array $data) : void
    {
        if($this->user->getId() != null){
            $this->user->setName($data["name"]);
            $this->user->setEmail($data["email"]);
            $this->user->setDocument($data["document"]);
            $this->user->update();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário alterado com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }
    // api/user/type/W/name/Fábio/email/fabio@gmail.com/password/12345678
    public function createUser(array $data)
    {

        if($this->user->findByEmail($data["email"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "E-mail já cadastrado"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->user->setType($data["type"]);
        $this->user->setName($data["name"]);
        $this->user->setEmail($data["email"]);
        $this->user->setPassword($data["password"]);
        $this->user->insert();
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário cadastrado com sucesso"
        ];
        echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function getProject(array $data)
    {
        if(!empty($data["idProject"])){
            $project = new Project($data["idProject"]);
            if(!$project->findById()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Projeto não cadastrado..."
                ];
                echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Projeto encontrado...",
                "project" => [
                    "id" => $project->getId(),
                    "title" => $project->getTitle(),
                    "abstract" => $project->getAbstract()
                ]
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getProjects()
    {
       $project = new Project();

       if(!$project->findByidUser($this->user->getId())){
           $response = [
               "code" => 400,
               "type" => "bad_request",
               "message" => "Esse usário não possui projetos ainda..."
           ];
           echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
           return;
       }

       $response = [
           "code" => 200,
           "type" => "success",
           "message" => "Projetos encontrado com sucesso...",
           "projects" => $project->findByidUser($this->user->getId())
       ];
        echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}