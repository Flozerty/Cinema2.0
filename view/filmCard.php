<figure>
  <img src="<?= $film["affiche"] ?>" alt="Affiche du film <?= $film["nom_film"] ?>">
  <figcaption><?= $film["nom_film"] ?></figcaption>
  <div class="note">
    <?= $film["note"] ?>
    <i class="fa-solid fa-star"></i>
  </div>
</figure>