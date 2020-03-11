<?php

class Burger
{
  function __construct()
  {
    $this->db = new Database();
  }

  function addBurger($name, $restaurant, $image, $description)
  {
    $this->db->query("INSERT INTO hamburgers (name, restaurant, image, description, userId) values (:name, :restaurant, :image, :description, :userId)");

    $this->db->bind(":name", $name);
    $this->db->bind(":restaurant", $restaurant);
    $this->db->bind(":image", $image);
    $this->db->bind(":description", $description);
    $this->db->bind(":userId", $_SESSION["userId"]);

    return $this->db->execute();
  }

  function getBurgers()
  {
    $this->db->query("SELECT * FROM hamburgers");
    return $this->db->resultSet();
  }

  function getBurgerById($id)
  {
    $this->db->query("SELECT * FROM hamburgers WHERE id = :id");
    $this->db->bind(":id", $id);

    $row = $this->db->single();
    return $this->db->rowCount() > 0 ? $row : false;
  }
}
