<?php ob_start();

$films = $requeteFilmsGenre->fetchAll();
$otherFilms = $requeteOtherFilms->fetchAll();
?>

<section id="filmsGenre">

  <p class="subtitle">
    Parcourez les films du genre <?= $films[0]["nom_genre"] ?> :
  </p>

  <div class='buttons'>
    <a href="index.php?action=creerFilm&genre=<?= $films[0]["id_genre"] ?>">
      <button class="createButton">créer un film</button>
    </a>

    <div class="addFilmContainer">
      <button class="addButton">ajouter un film</button>

      <!-- insertion des films nonexistants dans la liste -->
      <form id="addFilm" action="">
        <select name="film" required>
          <option selected="true" value="" disabled="disabled">
            Choisissez un film
          </option>
          <?php foreach($otherFilms as $film) { ?>

          <option value="<?= $film["nom_film"] ?>">
            <?= $film["nom_film"] ?>
          </option>

          <?php } ?>
        </select>
        <input type="submit" value="valider">
      </form>
    </div>

    <div class="removeFilmContainer">
      <button class="removeButton">retirer un film</button>

      <!-- insertion des films existants dans la liste -->
      <form id="removeFilm" action="">
        <select name="film" required>
          <option selected="true" value="" disabled="disabled">
            Choisissez un film
          </option>
          <?php foreach($films as $film) { ?>

          <option value="<?= $film["nom_film"] ?>">
            <?= $film["nom_film"] ?>
          </option>

          <?php } ?>
        </select>
        <input type="submit" value="valider">
      </form>
    </div>
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