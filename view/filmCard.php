<a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
  <figure>
    <img src="<?= $film["affiche"] ?>" alt="Affiche du film <?= $film["nom_film"] ?>">
    <figcaption class="subtitle"><?= $film["nom_film"] ?></figcaption>
    <div class="note">
      <?= $film["note"] ?>
      <i class="fa-solid fa-star"></i>
    </div>
  </figure>
</a>