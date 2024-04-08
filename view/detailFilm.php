<?php ob_start();
$detailFilm = $requeteFilm->fetch();
$genresFilm = $requeteGenres->fetchAll();
$acteurs = $requeteActeurs->fetchAll();
?>

<h3 class="title">
  <?=$detailFilm["nom_film"]; ?>
</h3>

<article id="detailFilm">
  <section id="detailFilm-details">
    <p>
      <b>Réalisateur : </b>
      <span class="link">
        <a href="index.php?action=detailRealisateur&id=<?= $detailFilm["id_realisateur"] ?>">
          <?= $detailFilm["rea"] ?>
        </a>
      </span>
    </p>

    <p>
      <b>Date de sortie : </b>
      <span>
        <?= $detailFilm["date_sortie"] ?>
      </span>
    </p>

    <p id="filmGenres">
      <b>Genres : </b>
      <?php
      for($i=0; $i<count($genresFilm); $i++) {
        ?>

      <span class="link">
        <a href="index.php?action=filmsGenre&id=<?= $genresFilm[$i]["id_genre"] ?>">
          <?= $genresFilm[$i]["nom_genre"]; ?>
        </a>
      </span>

      <?php
        if ($i == count($genresFilm)-1) {
          echo ".";
        } else {
          echo ", ";
        }
      } ?>
    </p>
  </section>

  <figure id="detailFilm-affiche">
    <img src="<?= $detailFilm["affiche"] ?>" alt="">
    <figcaption class="detailFilm-note">
      <?= $detailFilm["note"] ?>
      <i class="fa-solid fa-star"></i>
    </figcaption>
  </figure>

  <section id="detailFilm-synopsis">
    <p class="synopsis">
      <b>Synopsis : </b> <br>
      <?= $detailFilm["synopsis"] ?>
    </p>
  </section>
</article>

<hr>

<h4>Les acteurs :</h4>
<?php $typeCarrousel = "acteurs";
        require "templates/carrousel.php";
      ?>

<?php

$titre = $detailFilm["nom_film"];
$titre_secondaire = $detailFilm["nom_film"];
$contenu = ob_get_clean();
require "templates/template.php";