<?php

namespace Source\App;

use Source\Models\User;

class Api
{
    // header('Content-Type: application/json; charset=UTF-8');

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function getUser()
    {
        //echo "Olá, Usuário";
        $headers = getallheaders();

        if(empty($headers["Email"]) || empty($headers["Password"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe Email e Senha!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $user = new User();

        if(!$user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "E-mail ou Senha não cadastrados!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }
}