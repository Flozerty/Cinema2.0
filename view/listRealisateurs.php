<?php ob_start();

foreach($requete->fetchAll() as $rea){
  ?>
<p>
  <?= $rea["full_name"] ?>
</p>
<?php } ?>

<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "templates/template.php";