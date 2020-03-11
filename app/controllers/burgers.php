<?php

class Burgers extends Controller
{
  function __construct()
  {
    $this->burgerModel = $this->model("burger");
    $this->voteModel = $this->model("vote");
    $this->userModel = $this->model("user");
  }

  function index($params = [])
  {
    if (!isLoggedIn()) redirect("users/login");

    if (isset($params[0])) {
      $this->data = $this->burgerModel->getBurgerById($params[0]);

      $votes = $this->voteModel->getVotesById($params[0]);
      $this->data = array_merge((array) $this->data, (array) $votes);

      $addedBy = $this->userModel->getUserById($this->data["userId"]);
      $this->data["addedBy"] = $addedBy->firstName . " " . $addedBy->lastName;

      $this->view("burgers/get", $this->data);
    }
  }

  function add($params = [])
  {
    if (!isLoggedIn()) redirect("users/login");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $name = $_POST["name"];
      $restaurant = $_POST["restaurant"];
      $image = $_POST["image"];
      $description = $_POST["description"];
      $error = "";

      if (empty($name) || empty($restaurant) || empty($image) || empty($description)) $error = "Please fill out all fields";

      if (empty($error)) {
        if ($this->burgerModel->addBurger($name, $restaurant, $image, $description)) {
          redirect("");
        } else {
          die("Something went wrong");
        }
      } else {
        $this->view("users/login", $error);
      }
    } else {
      $this->view("burgers/add");
    }
  }

  function vote($params = [])
  {
    if (!isLoggedIn()) redirect("users/login");

    $this->voteModel->voteBurger($params[0]);
    redirect("burgers/" . $params[0]);
  }
}
