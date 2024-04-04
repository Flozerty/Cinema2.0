<?php ob_start(); 
$detailRealisateur = $requeteRea->fetch();

echo $detailRealisateur["rea"];
?>
<p>Il y a <?= $requeteFilms->rowCount() ?> films</p>

<table>
  <thead>
    <tr>
      <th>TITRE</th>
      <th>DATE SORTIE</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($requeteFilms->fetchAll() as $film) { ?>
    <tr>
      <td><?= $film["nom_film"] ?></td>
      <td><?= $film["date_sortie"] ?></td>
    </tr>
    <?php  } ?>
  </tbody>
</table>
<?php
$titre = "détail Realisateur";
$titre_secondaire = $detailRealisateur["rea"];
$contenu = ob_get_clean();
require "templates/template.php";