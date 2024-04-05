<a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>">
  <figure>
    <img src="<?= $acteur["photo"] ?>" alt="Photo de <?= $acteur["fullName"] ?>">

    <figcaption class="subtitle"><?= $acteur["fullName"] ?></figcaption>

  </figure>
</a>