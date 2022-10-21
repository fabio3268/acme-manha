<?php
  //$this->layout("_theme",["categories" => $categories]);
  //var_dump($projects);
  if(!empty($projects)){
      foreach ($projects as $project){
          $title = str_studly_case($project->title);
          $url = url("projeto");
          echo "<div></div><a href='{$url}/{$project->id}/{$title}'>{$title}</a></div>";
      }
  }

  if(!empty($project)){
      //var_dump($project->getTitle());
  }

?>