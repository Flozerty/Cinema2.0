<?php ob_start();

$films = $requeteFilmsGenre->fetchAll();
?>

<section id="filmsGenre">
  <div class="cards-container">

    <?php foreach ($films as $film) { ?>

    <figure>
      <img src="<?= $film["affiche"]; ?>" alt="affiche du film  <?= $film["nom_film"]; ?>">
      <figcaption>
        <?= $film["nom_film"]; ?>
      </figcaption>

    </figure>
    <?php } ?>

  </div>
</section>
<?php
$titre = $films[0]["nom_genre"];
$titre_secondaire = "Les films du genre ".$films[0]["nom_genre"];
$contenu = ob_get_clean();
require "templates/template.php";