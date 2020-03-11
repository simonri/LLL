<div class="page-title">Burgers</div>
<div class="page-subtitle">Sorted by votes</div>

<div class="burger-list">

  <?php foreach ($data as $burger) : ?>
    <a href="/burgers/<?= $burger["id"] ?>" class="burger-item">
      <img src="<?= $burger["image"] ?>" />

      <div class="burger-info">
        <div class="title"><?= $burger["name"] ?></div>
        <div class="description"><?= $burger["description"] ?></div>
      </div>

    </a>
  <?php endforeach; ?>

</div>