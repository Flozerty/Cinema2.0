<?php ob_start();
$acteurs = $requete->fetchAll();
?>
<section id="listActeurs">

  <div class='buttons'>
    <a href="index.php?action=creerFormActeur">
      <button class="addButton">créer un acteur</button>
    </a>

    <a href="#">
      <button class="removeButton">supprimer un acteur</button>
    </a>
  </div>

  <div class="cards-container">

    <?php foreach($acteurs as $person){
      $type = "acteur";

require "templates/personCard.php";
} ?>

  </div>
</section>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "templates/template.php";