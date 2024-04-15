<?php ob_start();
$acteurs = $requete->fetchAll();
?>
<section id="listActeurs">

  <div class='buttons'>

    <!-- ajouter acteur -->
    <a href="index.php?action=creerFormActeur">
      <button class="addButton">créer un acteur</button>
    </a>

    <!-- supprimer acteur -->

    <div class="removeContainer">
      <button class="removeButton">retirer un acteur</button>

      <!-- insertion des films existants dans la liste -->
      <form id="removeActeur" action="index.php?action=supprimerActeur" method="post">
        <select name="acteur" required>
          <option selected="true" value="" disabled="disabled">
            Choisissez un acteur
          </option>
          <?php foreach($acteurs as $acteur) { ?>

          <option value="<?= $acteur["id_acteur"] ?>">
            <?= $acteur["fullName"] ?>
          </option>

          <?php } ?>
        </select>
        <input type="submit" value="valider">
      </form>
    </div>
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