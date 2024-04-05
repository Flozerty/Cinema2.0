<?php ob_start(); 

$filmFavori = $requeteFilmFavori->fetch();
$acteursFilmFav = $requeteActeursFilmFav->fetchAll();
$filmsMoment = $requeteFilmsMoment->fetchAll();
?>

<!------------------------------------------------>
<!---------------------- UNE --------------------->
<!------------------------------------------------>

<section id="une">
  <h3>À la une :</h3>
  <article>
    <figure id="afficheFilmFav">
      <img src="<?= $filmFavori["affiche"] ?>" alt="Affiche du film <?= $filmFavori["nom_film"] ?>">
    </figure>
    <aside>
      <p class="title">
        <?= $filmFavori["nom_film"] ?>
      </p>

      <p class="subtitle">
        un film de
        <span class="link">
          <a href="index.php?action=detailRealisateur&id=<?= $filmFavori["id_realisateur"] ?>">
            <?= $filmFavori["rea"] ?>
          </a>
        </span>
      </p>

      <p class="synopsis">
        <?= $filmFavori["synopsis"] ?>

        <span class="link">
          <a href="index.php?action=detailFilm&id=<?= $filmFavori["id_film"] ?>">
            voir plus ->
          </a>
        </span>
      </p>

      <div class="acteurs">
        <p>Avec nos vedettes :</p>
        <div class='cards-container'>
          <?php 
            foreach($acteursFilmFav as $acteur) {
       
          require "templates/acteurCard.php";

      } ?>
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

<section id="dernieresSorties">
  <h3>Les dernières sorties :</h3>
  <div class=cards-container>
    <?php 
    foreach($filmsMoment as $film) {
   
    require "templates/filmCard.php";
   } ?>
  </div>
</section>

<hr>

<!------------------------------------------------>
<!-------------------- GENRES -------------------->
<!------------------------------------------------>

<section id="genres-accueil">
  <div id="genres-header">
    <h3>Parcourez nos genres :</h3>
    <a href="index.php?action=listGenres">
      voir les genres ->
    </a>
  </div>

  <div id="genres-content">

    <?php $genresFavoris = [
      "action" => "action",
      "famille" => "film pour enfants",
      "science-fiction" => "science-fiction"];

$filmsAction = $requeteAction->fetchAll();
$filmsFamille = $requeteFamille->fetchAll();
$filmsSf = $requeteSF->fetchAll();

    foreach($genresFavoris as $key => $value) { 

      switch($key) {
        case 'action':
          $films = $filmsAction;
          break;
      case 'famille':
          $films = $filmsFamille;
          break;
      case 'science-fiction':
          $films = $filmsSf;
          break;
      } ?>

    <article id="accueil-<?= $key ?>">
      <h4>Les films du genre <?= ucwords($key) ?> :</h4>

      <div class="carroussel">
        <i class="fa-solid fa-circle-arrow-left arrow arrow-left"></i>

        <div class="cards-container">
          <?php foreach( $films as $film) {

            require "templates/filmCard.php";
         } ?>
        </div>

        <i class="fa-solid fa-circle-arrow-right arrow arrow-right"></i>
      </div>
    </article>

    <?php } ?>

</section>

<?php
$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "templates/template.php";