<?php ob_start();

foreach($requete->fetchAll() as $rea){
  ?>
<p>
  <a href="index.php?action=detailRealisateur&id=<?= $rea['id_realisateur'] ?>">
    <?= $rea["full_name"] ?>
  </a>
</p>
<?php } ?>

<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "templates/template.php";