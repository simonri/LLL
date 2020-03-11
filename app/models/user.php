<?php

class User
{
  function __construct()
  {
    $this->db = new Database;
  }

  function register($firstName, $lastName, $phone, $email, $password)
  {
    $this->db->query("INSERT INTO users (firstName, lastName, phone, email, password) values (:firstName, :lastName, :phone, :email, :password)");

    $this->db->bind(":firstName", $firstName);
    $this->db->bind(":lastName", $lastName);
    $this->db->bind(":phone", $phone);
    $this->db->bind(":email", $email);
    $this->db->bind(":password", $password);

    return $this->db->execute();
  }

  function login($email, $password)
  {
    $this->db->query("SELECT * from users where email = :email");
    $this->db->bind(":email", $email);

    $row = $this->db->single();
    $hashed_password = $row->password;

    return password_verify($password, $hashed_password) ? $row : false;
  }

  function getUserByEmail($email)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");

    $this->db->bind(":email", $email);
    $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    }

    return false;
  }

  function getUserById($id)
  {
    $this->db->query("SELECT * FROM users WHERE id = :id");
    $this->db->bind(":id", $id);

    $row = $this->db->single();
    return $this->db->rowCount() > 0 ? $row : false;
  }

  function getUsers()
  {
    $this->db->query("SELECT * FROM users");
    return $this->db->resultSet();
  }
}
