<?php ob_start(); 

$filmFavori = $requeteFilmFavori->fetch()
?>

<section id="une">
  <h3>A la une :</h3>
  <article>
    <figure>
      <img src="#" alt="Affiche du film <?= $filmFavori["nom_film"] ?>">
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
          acteur 1 & 2
        </div>
      </div>

      <div class="note">
        4.5/5
        <i class="fa-solid fa-star"></i>
      </div>
    </aside>
  </article>
</section>


<hr>

<section id="filmsMoment">
  <h3>Les films du moment :</h3>
  <div class=cards-container>
    films 1 & 2
  </div>
</section>

<hr>

<section id="genresAccueil">
  <div id="genres-header">
    <h3>Parcourez nos genres :</h3>
    <a href="#">
      voir les genres ->
    </a>
  </div>

  <div id="genres-content">
    <article class="action">
      <h4>Les films d'action :</h4>
      <div class="carroussel">
        Carroussel des films
      </div>
    </article>

    <article class="famille">
      <h4>Les films pour toute la famille :</h4>
      <div class="carroussel">
        Carroussel des films
      </div>
    </article>
  </div>

</section>

<?php
$titre = "Accueil";
$titre_secondaire = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";