<?php

namespace Source\App;

use Source\Models\Project;
use Source\Models\User;

/**
 *
 */
class Api
{
    /** @var User */
    private $user;
    /** @var array|false */
    private $headers;

    /**
     * construct
     */
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();
        if($headers["Rule"] == "N"){
           $this->headers = $headers;
           return;
        } 
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

    /**
     * @return void
     * http://www.localhost/acme-manha/api/user/name/fabio/email/fabio@gmail.com/password/1234567
     */
    public function createUser(array $data)
    {
        //var_dump($data);

        $user = new User(
            NULL,
            $data["name"],
            $data["email"],
            $data["password"]
        );

        //$user->insert();
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário cadastrado com sucesso...",
            "user" => $user->getArray()
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return void
     */
    public function updateUser()
    {
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Alterando um usuário..."
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return void
     */
    public function getUser()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @return void
     */
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

    /**
     * @param array $data
     * @return void
     */
    public function getProject(array $data) : void
    {
        if($this->user->getId() != null){
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
}