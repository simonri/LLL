<?php

class Pages extends Controller
{
  function __construct()
  {
    $this->burgerModel = $this->model("burger");
    $this->voteModel = $this->model("vote");
  }

  function sort($a, $b)
  {
    return $a["votes"] < $b["votes"];
  }

  function index()
  {
    $this->data = $this->burgerModel->getBurgers();

    foreach ($this->data as $index => $burger) {
      $id = $this->data[$index]->id;

      $votes = $this->voteModel->getOnlyVotesById($id);
      $this->data[$index]->votes = $votes;
    }

    $arrayBurgers = json_decode(json_encode($this->data), true);
    usort($arrayBurgers, array($this, "sort"));

    $this->data = $arrayBurgers;

    $this->view("burgers/index", $this->data);
  }
}
