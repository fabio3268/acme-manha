<?php

ob_start();

require __DIR__ . "/../vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

// USERS
// get dos dados do usuário
$route->get("/user","Api:getUser");

// get dos projetos de um usuário
$route->get("/user/projects","Api:getProjects");
// get de um único projeto
$route->get("/user/project/{idProject}","Api:getProject");

// cadastra um novo usuário
$route->post("/user","Api:createUser");
$route->put("/user","Api:updateUser");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();