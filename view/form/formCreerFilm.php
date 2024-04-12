<?php ob_start(); 
$realisateurs = $requeteRealisateurs->fetchAll();
$genres = $requeteGenres->fetchAll();

// Récupération des données en fonction du type de GET
if(isset($_GET["genre"])) {
  $genreGet = $requeteGetGenre->fetch();
}
if(isset($_GET["rea"])) {
  $reaGet = $requeteGetRea->fetch();
}
if(isset($_GET["acteur"])) {
  $acteurGet = $requeteGetActeur->fetch();
} ?>

<form id="create" action="index.php?action=creationFilm" method="post">

  <fieldset id="globalFormInfo">
    <legend>Merci de renseigner tous les champs</legend>

    <div id="formNom">
      <label for="nom_film">Nom du film :</label>
      <input type="text" name="nom_film" required>
    </div>

    <div id="formDuree">
      <label for="duree">Durée en minutes :</label>
      <input type="number" name="duree">
    </div>

    <div id="formDate">
      <label for="date_sortie">Date de sortie :</label>
      <input type="date" name="date_sortie">
    </div>

    <div id="formSynopsis">
      <label for="synopsis">Synopsis :</label>
      <textarea name="synopsis" rows="6" placeholder="Ecrivez une courte synopsis"></textarea>
    </div>

    <div id="formImg">
      <label for="affiche">url de l'affiche :</label>
      <input type="text" name="affiche">
    </div>

    <div id="formNote">
      <label for="note">Note :</label>
      <input type="number" min="0" max="5" name="note">
    </div>

    <div id="formRea">

      <label for="realisateur">Réalisateur :</label>

      <!-- Si on créait un film à partir d'un réa -->
      <?php if(isset($_GET["rea"])) { ?>
      Vous avez sélectionné <?= $reaGet["fullName"] ?>.

      <!-- Si non on récupère tous les réa-->
      <?php } else { ?>
      <select name="realisateur" required>

        <!-- value="" permet de forcer un autre choix avec le required -->
        <option selected="true" value="" disabled="disabled">
          Qui est le réalisateur ?
        </option>

        <?php foreach($realisateurs as $rea) { ?>

        <option value="<?= $rea["fullName"] ?>">
          <?= $rea["fullName"] ?>
        </option>

        <?php } ?>
      </select>

      <?php } ?>
    </div>
  </fieldset>

  <fieldset id="formGenres">

    <legend>Sélectionnez les genres</legend>

    <!-- Récupération des genres -->
    <?php foreach($genres as $genre) {?>
    <span>
      <!-- Création de chaque box et vérification d'un possible id dans l'url -->
      <input type="checkbox" name="<?= $genre["nom_genre"]?>" <?php if(isset($genreGet)){
        echo ($genre["id_genre"] == $genreGet["id_genre"] ) ? "checked" : "";
      } ?> />

      <label for="<?= $genre["nom_genre"]?>"><?= $genre["nom_genre"]?></label>
    </span>
    <?php } ?>

  </fieldset>

  <fieldset id="castingsFormFilm">
    <legend>Listez les acteurs et rôles</legend>
  </fieldset>

  <input type="submit" value="Créer nouveau film" class="submit-button">
</form>

<?php
$titre = "Création Film";
$titre_secondaire = "Créer un film";
$contenu = ob_get_clean();
require "templates/template.php";