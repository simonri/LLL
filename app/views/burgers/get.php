<div class="burger-view">
  <div class="image-large">
    <img src="<?= $data["image"] ?>" />
  </div>
  <div class="burger-info">
    <div class="title">
      <?= $data["name"] ?>
      <div class="restaurant"><?= $data["restaurant"] ?></div>
    </div>
    <div class="description"><?= $data["description"] ?></div>
    <div class="addedby">Added by: <?= $data["addedBy"] ?></div>
    <div class="desc-buttons">
      <div class="button votes">Votes: <?= $data["votes"] ?></div>
      <?php if ($data["hasVoted"]) : ?>
        <a class="button">You have voted</a>
      <?php else : ?>
        <a class="button" href="/burgers/vote/<?= $data["id"] ?>">Vote here</a>
      <?php endif; ?>
    </div>

  </div>
</div>