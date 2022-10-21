<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

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

        echo $this->view->render("profile",[
            "user" => $user
        ]);
    }

    public function profileUpdate(array $data) : void
    {
        if(!empty($data)){
            $user = new User(
                $_SESSION["user"]["id"],
                $data["name"],
                $data["email"],
                null ,
                null
            );
            $user->update();
            echo json_encode($data);
        }
    }

}