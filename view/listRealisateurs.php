<?php ob_start();
$realisateurs = $requete->fetchAll() ?>

<section id="listActeurs">

  <div class='buttons'>
    <a href="index.php?action=creerFormRealisateur">
      <button class="addButton">créer un réalisateur</button>
    </a>

    <a href="#">
      <button class="removeButton">supprimer un réalisateur</button>
    </a>
  </div>


  <div class="cards-container">

    <?php foreach($realisateurs as $person){
      $type = "realisateur";
      require "templates/personCard.php";
    } ?>

  </div>
</section>
<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "templates/template.php";