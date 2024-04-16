<?php ob_start(); 

// Sur ce formulaire on aura également récupéré $modif qui est utilisé si on veut modifier des données.
// On utilisera donc beaucoup la ternaire <?= $modif ? "" : "" ? >

$personne = $requete->fetch();
?>

<form id="create" action="index.php?action=<?= $modif ? "modif" : "creer"?>Personne" method="post">

  <fieldset id="globalFormInfo">
    <legend>Merci de renseigner tous les champs</legend>

    <div id="formNom">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" <?= $modif ? "value='".$personne["nom"]."'" : null ?> required>
    </div>
    <div id="formPrenom">
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" <?= $modif ? "value='".$personne["prenom"]."'" : null ?> required>
    </div>

    <div id="formSex">
      <label for="sex">Sexe :</label>

      <select name="sex" required>

        <!-- value="" permet de forcer un autre choix avec le required -->
        <option <?= $personne["sexe"] ? null : 'selected="true"' ?> value="" disabled="disabled">
          Quel sexe ?
        </option>
        <option value="Homme" <?= $personne["sexe"] == "Homme" ? 'selected="true"' : null ?>>
          Homme
        </option>
        <option value="Femme" <?= $personne["sexe"] == "Femme" ? 'selected="true"' : null ?>>
          Femme
        </option>
        <option value="autre" <?= $personne["sexe"] == "autre" ? 'selected="true"' : null ?>>
          Autre
        </option>
      </select>
    </div>

    <div id="formDate">
      <label for="date_naissance">Date de naissance :</label>
      <input type="date" name="date_naissance" <?= $modif ? "value='".$personne["date_naissance"]."'" : null ?>
        required>
    </div>

    <div id="formImg">
      <label for="photo">url d'une photo :</label>
      <input type="text" name="photo" <?= $modif ? "value='".$personne["photo"]."'" : null ?> required>
    </div>

    <!-- On ne demande si c'est un acteur & réalisateur qu'à la création d'une nouvelle personne -->

    <?php if(!$modif) { ?>
    <div id="isReaActeur">
      <span>
        <input type="checkbox" name="reaActeur">

        <!-- Vérification si acteur & réalisateur -->
        <label for="reaActeur">
          Cochez la case si c'est également un
          <?php
          echo ($type == "acteur" ? "réalisateur": "acteur")
          ?>
        </label>

      </span>
    </div>

    <?php } ?>

  </fieldset>
  <!-- envoi caché du type (acteur ou rea) -->
  <input type="hidden" name="type" value="<?= $type ?>">

  <input type="submit" value="<?= $modif ? "Modifier" : "Créer nouveau" ?> <?= $type ?>" class="submit-button">
</form>

<?php
$titre = ($modif ? "Modification " : "Création ").$type;
$titre_secondaire = ($modif ? "Modifier" : "Créer")." un ".$type;
$contenu = ob_get_clean();
require "templates/template.php";