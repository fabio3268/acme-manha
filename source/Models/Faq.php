<?php

namespace Source\Models;

use Source\Core\Connect;

class Faq
{
    private $question;
    private $answer;

    /**
     * @param $question
     * @param $answer
     */
    public function __construct($question = null, $answer = null)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function selectAll ()
    {
        $query = "SELECT * FROM faqs";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

}