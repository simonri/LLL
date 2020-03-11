<?php

class Controller
{
  function model($model)
  {
    require_once "../app/models/" . $model . ".php";
    return new $model();
  }

  function view($view, $data = [])
  {
    require_once("../app/views/templates/header.php");
    require_once("../app/views/" . $view . ".php");
    require_once("../app/views/templates/footer.php");
  }
}
