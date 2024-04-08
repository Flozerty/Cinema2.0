<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
  <thead>
    <tr>
      <th>TITRE</th>
      <th>DATE SORTIE</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($requete->fetchAll() as $film) { ?>
    <tr>
      <td>
        <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
          <?= $film["nom_film"] ?>
        </a>
      </td>
      <td>
        <?= $film["annee_sortie"] ?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "templates/template.php";