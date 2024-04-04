<?php ob_start();

foreach($requete->fetchAll() as $acteur){
  ?>
<p>
  <?= $acteur["full_name"] ?>
</p>
<?php } ?>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "templates/template.php";