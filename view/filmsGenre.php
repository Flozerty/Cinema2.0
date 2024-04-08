<?php ob_start();

$films = $requeteFilmsGenre->fetchAll();
?>

<section id="filmsGenre">
  <h3><?= $films[0]["nom_genre"] ?></h3>
  <p class="subtitle">
    Parcourez les films du genre <?= $films[0]["nom_genre"] ?> :
  </p>
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