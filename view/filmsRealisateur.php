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
      <td><?= $film["nom_film"] ?></td>
      <td><?= $film["date_sortie"] ?></td>
    </tr>
    <?php $rea = $film["prenom_realisateur"]." ".$film["nom_realisateur"]; } ?>
  </tbody>
</table>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films de ".$rea;
$contenu = ob_get_clean();
require "templates/template.php";