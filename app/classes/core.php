<?php

class Core
{
  function __construct()
  {
    $this->controller = "pages";
    $this->method = "index";
    $this->params = array();

    if (isset($_GET["url"])) {
      $this->url = explode("/", $_GET["url"]);

      if (isset($this->url[0])) {
        if (file_exists("../app/controllers/" . $this->url[0] . ".php")) {
          $this->controller = $this->url[0];
          if (isset($this->url[1])) {
            $this->method = $this->url[1];
          }
        } else {
          $this->method = $this->url[0];
        }

        unset($this->url[0]);
      }
    }

    require_once("../app/controllers/" . $this->controller . ".php");
    $this->controller = new $this->controller;

    if (!method_exists($this->controller, $this->method)) {
      $this->method = "index";
    } else {
      unset($this->url[1]);
    }

    $this->params = $this->url ? array_values($this->url) : [];
    call_user_func_array([$this->controller, $this->method], $this->params);
  }
}
