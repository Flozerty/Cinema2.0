<?php ob_start();


$listGenres = $requeteGenres->fetchAll();
?>

<ul id="genres-list">

  <?php foreach($listGenres as $genre){ ?>

  <li class="link genre-card">
    <a href="index.php?action=filmsGenre&id=<?= $genre["id_genre"] ?>">
      <?= $genre["nom_genre"]; ?>
    </a>
  </li>

  <?php } ?>

</ul>

<?php
$titre = "liste genres";
$titre_secondaire = "liste des genres";
$contenu = ob_get_clean();
require "templates/template.php";