<?php ob_start(); 
?>

<form id="create" action="index.php?action=creerPersonne" method="post">

  <fieldset id="globalFormInfo">
    <legend>Merci de renseigner tous les champs</legend>

    <div id="formNom">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" required>
    </div>
    <div id="formPrenom">
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" required>
    </div>

    <div id="formSex">
      <label for="sex">Sexe :</label>

      <select name="sex" required>

        <!-- value="" permet de forcer un autre choix avec le required -->
        <option selected="true" value="" disabled="disabled">
          Quel sexe ?
        </option>
        <option value="homme">
          Homme
        </option>
        <option value="femme">
          Femme
        </option>
        <option value="other">
          Autre
        </option>
      </select>
    </div>

    <div id="formDate">
      <label for="date_naissance">Date de naissance :</label>
      <input type="date" name="date_naissance">
    </div>

    <div id="formImg">
      <label for="affiche">url d'une photo :</label>
      <input type="text" name="affiche">
    </div>

    <div id="isReaActeur">
      <span>
        <input type="checkbox" name="ReaActeur">

        <!-- Vérification si acteur & réalisateur -->
        <label for="ReaActeur">
          Cochez la case si c'est également un
          <?php
          echo ($type == "acteur" ? "réalisateur": "acteur")
          ?>
        </label>

      </span>
    </div>

  </fieldset>

  <input type="submit" value="Créer nouveau <?= $type ?>" class="submit-button">
</form>

<?php
$titre ="Création ".$type;
$titre_secondaire = "Créer un ".$type;
$contenu = ob_get_clean();
require "templates/template.php";