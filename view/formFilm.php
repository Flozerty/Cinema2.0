<?php ob_start(); 
$realisateurs = $requeteRealisateurs->fetchAll();

// Récupération des données en fonction du type de GET
if(isset($_GET["genre"])) {
  $genre = $requeteGetGenre->fetch();
}
if(isset($_GET["rea"])) {
  $rea = $requeteGetRea->fetch();
}
if(isset($_GET["acteur"])) {
  $acteur = $requeteGetActeur->fetch();
} ?>

<form id="addFilm" action="index.php?action=ajouterGenre" method="post">

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
    Vous avez sélectionné <?= $rea["fullName"] ?>.

    <!-- Si non on récupère tous les réa-->
    <?php } else { ?>
    <select name="realisateur">

      <?php foreach($realisateurs as $rea) { ?>

      <option value="<?= $rea["fullName"] ?>">
        <?= $rea["fullName"] ?>
      </option>

      <?php } ?>
    </select>
    <?php } ?>
  </div>

  <div id="formGenres">

  </div>
</form>

<?php
$titre = "ajout Film";
$titre_secondaire = "ajouter un film";
$contenu = ob_get_clean();
require "templates/template.php";