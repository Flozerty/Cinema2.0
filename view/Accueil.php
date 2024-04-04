<?php ob_start(); 

$filmFavori = $requeteFilmFavori->fetch();
$acteursFilmFav = $requeteActeursFilmFav->fetchAll();
$filmsMoment = $requeteFilmsMoment->fetchAll();
$filmsAction = $requeteAction->fetchAll();
$filmsFamille = $requeteFamille->fetchAll();

?>

<section id="une">
  <h3>A la une :</h3>
  <article>
    <figure>
      <img src="<?= $filmFavori["affiche"] ?>" alt="Affiche du film <?= $filmFavori["nom_film"] ?>">
    </figure>
    <aside>
      <p class="title"><?= $filmFavori["nom_film"] ?></p>
      <p class="subtitle">
        un film de
        <a href="index.php?action=detailRealisateur&id=<?= $filmFavori["id_realisateur"] ?>">
          <?= $filmFavori["rea"] ?>
        </a>
      </p>
      <p class="synopsis"><?= $filmFavori["synopsis"] ?></p>
      <div class="see-more">
        <a href="index.php?action=detailFilm&id=<?= $filmFavori["id_film"] ?>">
          voir plus ->
        </a>
      </div>
      <div class="acteurs">
        <p>Avec nos vedettes :</p>
        <div class='cards-container'>
          <?php 
            foreach($acteursFilmFav as $acteurFav) {
          ?>
          <img src="<?= $acteurFav["photo"] ?>" alt="Photo de <?= $acteurFav["fullName"] ?>">

          <?php } ?>
        </div>
      </div>

      <div class="note">
        <?= $filmFavori["note"] ?>
        <i class="fa-solid fa-star"></i>
      </div>
    </aside>
  </article>
</section>


<hr>

<section id="filmsMoment">
  <h3>Les films du moment :</h3>
  <div class=cards-container>
    <?php 
    foreach($filmsMoment as $film) {
    ?>
    <img src="<?= $film["affiche"] ?>" alt="Affiche du film <?= $film["nom_film"] ?>">
    <?php } ?>
  </div>
</section>

<hr>

<section id="genresAccueil">
  <div id="genres-header">
    <h3>Parcourez nos genres :</h3>
    <a href="index.php?action=listGenres">
      voir les genres ->
    </a>
  </div>

  <div id="genres-content">

    <article class="action">
      <h4>Les films d'action :</h4>

      <div class="carroussel">
        <i class="fa-solid fa-circle-arrow-left arrow arrow-left"></i>

        <div class="cards-container">
          <?php foreach($filmsAction as $film) {
            require "view/filmCard.php";
         } ?>
        </div>

        <i class="fa-solid fa-circle-arrow-right arrow arrow-right"></i>
      </div>
    </article>

    <article class="famille">
      <h4>Les films pour toute la famille :</h4>

      <div class="carroussel">
        <i class="fa-solid fa-circle-arrow-left arrow arrow-left"></i>

        <div class="cards-container">
          <?php foreach($filmsFamille as $film) {
            require "view/filmCard.php";
          } ?>
        </div>

        <i class="fa-solid fa-circle-arrow-right arrow arrow-right"></i>
      </div>
    </article>
  </div>

</section>

<?php
$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";