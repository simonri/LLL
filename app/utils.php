<?php

session_start();

function redirect($page)
{
  header("location: " . "/" . $page);
}

function isLoggedIn()
{
  if (isset($_SESSION["userId"]) && isset($_SESSION["userFirstName"]) && isset($_SESSION["userLastName"]) && isset($_SESSION["userEmail"])) {
    return true;
  } else {
    return false;
  }
}
