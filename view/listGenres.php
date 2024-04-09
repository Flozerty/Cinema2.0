<?php ob_start();
$listGenres = $requeteGenres->fetchAll();
?>
<h3> Les genres </h3>
<p class="subtitle">Sélectionnez un genre :</p>
<ul id="genres-list">

  <?php foreach($listGenres as $genre){ ?>

  <li class="genre-card">
    <a href="index.php?action=filmsGenre&id=<?= $genre["id_genre"] ?>">
      <?= $genre["nom_genre"]; ?>
    </a>
  </li>

  <?php } ?>
</ul>

<hr>

<!-- Formulaires Genre -->
<section id="formsGenre">

  <!-- ajouter -->
  <form id="addGenre" action="traitement.php?action=addGenre" method="post">
    <label for="nom_genre" class="subtitle"> Ajouter un genre </label>
    <input type="text" name="nom_genre" id="nom_genre">
    <input type="submit" value="ajouter" class="buttonForm" />
  </form>

  <!-- supprimer -->
  <form id="removeGenre" action="traitement.php?action=removeGenre" method="post">
    <label for="nom_genre" class="subtitle"> Supprimer un genre </label>

    <select name="nom_genre" id="genres-select">
      <option value="default">Choisissez un genre</option>

      <?php foreach($listGenres as $genre){ ?>

      <option value="<?= $genre["nom_genre"]; ?>">
        <?= $genre["nom_genre"]; ?>
      </option>
      <?php } ?>
    </select>

    <input type="submit" value="supprimer" class="buttonForm" />

  </form>
</section>

<?php
$titre = "liste genres";
$titre_secondaire = "liste des genres";
$contenu = ob_get_clean();
require "templates/template.php";