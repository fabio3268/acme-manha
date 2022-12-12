<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq;

class Adm
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }

    public function home () : void
    {
        echo $this->view->render("home");
    }

    public function faqRegister(array $data) : void
    {
        if(!empty($data)){
            $data = filter_var_array($data, FILTER_DEFAULT);

            if(in_array("",$data)){
                $response = [
                    "type" => "error",
                    "message" => "Informe Pergunta e Resposta!"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $faq = new Faq(
                $data["question"],
                $data["answer"]
            );
            $faq->insert();
            $response = [
                "type" => "success",
                "message" => $faq->getMessage()
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        echo $this->view->render("faq-register");
    }

}