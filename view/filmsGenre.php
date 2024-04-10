<?php ob_start();

$films = $requeteFilmsGenre->fetchAll();
?>

<section id="filmsGenre">

  <p class="subtitle">
    Parcourez les films du genre <?= $films[0]["nom_genre"] ?> :
  </p>

  <div class='buttons'>
    <a href="index.php?action=creerFilm&genre=<?= $films[0]["id_genre"] ?>">
      <button class="createButton">créer un film</button>
    </a>

    <a href="index.php?action=ajouterFilm&genre=<?= $films[0]["id_genre"] ?>">
      <button class="addButton">ajouter un film</button>
    </a>

    <a href="index.php?action=supprimerFilm&genre=<?= $films[0]["id_genre"] ?>">
      <button class="removeButton">retirer un film</button>
    </a>
  </div>

  <div class="cards-container">

    <?php foreach ($films as $film) {
      require "templates/filmCard.php";
    } ?>

  </div>
</section>

<?php
$titre = $films[0]["nom_genre"];
$titre_secondaire = $films[0]["nom_genre"];
$contenu = ob_get_clean();
require "templates/template.php";