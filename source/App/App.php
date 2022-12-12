<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\User;
use Source\Models\Project;
use Source\Models\WriteProject;

class App
{
    private $view;

    public function __construct()
    {
        if(empty($_SESSION["user"]) || empty($_COOKIE["user"])){
            header("Location:http://www.localhost/acme-manha/login");
        }
        setcookie("user","Logado",time()+60*60,"/");
        $this->view = new Engine(CONF_VIEW_APP,'php');
    }

    public function home () : void 
    {
        echo $this->view->render("home");

    }

    public function list () : void 
    {
        require __DIR__ . "/../../themes/app/list.php";
    }

    public function createPDF () : void
    {
       require __DIR__ . "/../../themes/app/create-pdf.php";
    }

    public function logout()
    {
        session_destroy();
        setcookie("user","",time()-3600,"/");
        header("Location:http://www.localhost/acme-manha/login");
    }

    public function profile()
    {
        // buscar as informações do usuário da SESSION.
        // $user = $_SESSION["user"];
        // buscar as informações do usuário no BD
        $user = new User($_SESSION["user"]["id"]);
        $user->findById();

        //var_dump($user);

        echo $this->view->render("profile",[
            "user" => $user
        ]);
    }

    public function profileUpdate(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $userJson = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($userJson);
                return;
            }

            if(!empty($_FILES['photo']['tmp_name'])) {
                $upload = uploadImage($_FILES['photo']);
                //unlink($_SESSION["user"]["photo"]);
            } else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
                $upload = $_SESSION["user"]["photo"] ? : NULL;
            }

            $user = new User(
                $_SESSION["user"]["id"],
                $data["name"],
                $data["email"],
                null ,
                null,
                $upload
            );
            $user->update();
            $userJson = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "photo" => $user->getPhoto() ? url($user->getPhoto()) : NULL
            ];
            echo json_encode($userJson);
        }
    }

    public function projectRegister(array $data) : void
    {
        $categories = new Category();
        $categoriesList = $categories->selectAll();

        if(!empty($data)){
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $project = new Project(
                null,
                $data["title"],
                $data["abstract"],
                $data["text"],
                $data["category"]
            );

            $project->insert();

            $writeProject = new WriteProject(
                NULL,
                $project->getId(),
                $_SESSION["user"]["id"]
            );

            $writeProject->writeProjectInsert();

            $json = [
                "message" => "",
                "type" => "",
                "id" => $project->getId(),
                "titulo" => $data["title"],
                "abstract" => $data["abstract"],
                "category" => $data["category"]
            ];

            echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        echo $this->view->render("project-register",[
            "categoriesList" => $categoriesList
        ]);
    }

}