<div class="page-title">Burgers</div>
<div class="page-subtitle">Sorted by votes</div>

<div class="burger-list">

  <?php foreach ($data as $burger) : ?>
    <a href="/burgers/<?= $burger["id"] ?>" class="burger-item">
      <div class="image-holder">
        <img src="<?= $burger["image"] ?>" />
      </div>

      <div class="burger-info">
        <div class="title"><?= $burger["name"] ?></div>
        <div class="description"><?= $burger["description"] ?></div>
      </div>

    </a>
  <?php endforeach; ?>

</div>