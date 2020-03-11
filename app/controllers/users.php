<?php

class Users extends Controller
{
  function __construct()
  {
    $this->userModel = $this->model("User");
  }

  function index()
  {
    if (!isLoggedIn()) redirect("users/login");
    $users = $this->userModel->getUsers();

    $data = ["users" => $users];
    return $this->view("users/index", $data);
  }

  function register()
  {
    if (isLoggedIn()) redirect("");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $password = $_POST["password"];
      $confirmPassword = $_POST["confirmPassword"];
      $error = "";

      if (empty($email) || empty($phone) || empty($firstName) || empty($lastName) || empty($password) || empty($confirmPassword)) {
        $error = "Please fill out all fields";
      } else {
        if ($this->userModel->getUserByEmail($email)) {
          $error = "Email already in use";
        }
      }

      if ($password != $confirmPassword) {
        $error = "Password does not match!";
      }

      if ($error == "") {
        $password = password_hash($password, PASSWORD_DEFAULT);

        if ($this->userModel->register($firstName, $lastName, $phone, $email, $password)) {
          $this->login();
        } else {
          die("Something went wrong");
        }
      } else {
        $this->view("users/register", $error);
      }
    } else {
      $this->view("users/register");
    }
  }

  function login()
  {
    if (isLoggedIn()) redirect("");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $error = "";

      if (empty($email) || empty($password)) $error = "Please fill out all fields";
      if (!$this->userModel->getUserByEmail($email)) $error = "No user found!";

      if (empty($error)) {
        $userAuthenticated = $this->userModel->login($email, $password);

        if ($userAuthenticated) {
          $this->createUserSession($userAuthenticated);
          redirect("");
        } else {
          $error = "Wrong password";
          $this->view("users/login", $error);
        }
      } else {
        $this->view("users/login", $error);
      }
    } else {
      $this->view("users/login");
    }
  }

  function createUserSession($user)
  {
    $_SESSION["userId"] = $user->id;
    $_SESSION["userEmail"] = $user->email;
    $_SESSION["userFirstName"] = $user->firstName;
    $_SESSION["userLastName"] = $user->lastName;
  }

  function logout()
  {
    session_destroy();
    redirect("users/login");
  }
}
