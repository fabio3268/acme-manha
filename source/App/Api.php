<?php

namespace Source\App;

use Source\Models\Project;
use Source\Models\User;

class Api
{

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();
        if(empty($headers["Email"]) || empty($headers["Password"]) || empty($headers["Rule"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe E-mail, Senha e Tipo de Usuário para acessar"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $this->user = new User();
        if(!$this->user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "E-mail ou Senha inválidos"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function getUser()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getProjects()
    {
        if($this->user->getId() != null){
            $projects = new Project();

            if(!$projects->findByidUser($this->user->getId())){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Autor não tem projetos cadastrados"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Projetos encontrados com sucesso",
                "projects" => $projects->findByidUser($this->user->getId())
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getProject(array $data) : void
    {
        if(!empty($data)){
            $project = new Project($data["idProject"]);

            if(!$project->findByid()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Projeto não cadastrado"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Projeto encontrado com sucesso",
                "project" => [
                    "id" => $project->getId(),
                    "title" => $project->getTitle(),
                    "abstract" => $project->getAbstract(),
                ]
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }
}