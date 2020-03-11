<?php

class Vote
{
  function __construct()
  {
    $this->db = new Database();
  }

  function getVotesById($hamburgerId)
  {
    $ret = array();

    $this->db->query("SELECT * FROM votes WHERE hamburgerId = :hamburgerId");
    $this->db->bind(":hamburgerId", $hamburgerId);

    $this->db->execute();

    $ret["votes"] = $this->db->rowCount();

    $this->db->query("SELECT * FROM votes WHERE hamburgerId = :hamburgerId AND userId = :userId");
    $this->db->bind(":hamburgerId", $hamburgerId);
    $this->db->bind(":userId", $_SESSION["userId"]);

    $this->db->execute();

    $rows = $this->db->rowCount();

    $ret["hasVoted"] = (int) $rows > 0 ? 1 : 0;

    return $ret;
  }

  function getOnlyVotesById($hamburgerId)
  {
    $ret = array();

    $this->db->query("SELECT * FROM votes WHERE hamburgerId = :hamburgerId");
    $this->db->bind(":hamburgerId", $hamburgerId);

    $this->db->execute();

    return $this->db->rowCount();
  }

  function voteBurger($id)
  {
    $this->db->query("SELECT * FROM votes WHERE userId = :userId AND hamburgerId = :hamburgerId");
    $this->db->bind(":userId", $_SESSION["userId"]);
    $this->db->bind(":hamburgerId", $id);

    $this->db->execute();

    if ($this->db->rowCount() > 0) {
      return;
    } else {
      $this->db->query("INSERT INTO votes (userId, hamburgerId) values (:userId, :hamburgerId)");

      $this->db->bind(":userId", $_SESSION["userId"]);
      $this->db->bind(":hamburgerId", $id);

      return $this->db->execute();
    }
  }
}
