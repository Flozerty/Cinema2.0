<?php ob_start();


$listGenres = $requeteGenres->fetchAll();


foreach($listGenres as $genre){ ?>

<a href="index.php?action=filmsGenre&id=<?= $genre["id_genre"] ?>">
  <?= $genre["nom_genre"]; ?>
</a>

<?php }

$titre = "liste genres";
$titre_secondaire = "liste des genres";
$contenu = ob_get_clean();
require "view/template.php";