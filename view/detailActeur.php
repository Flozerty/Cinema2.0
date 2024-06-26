<?php ob_start(); 
$detailActeur = $requete->fetch();
$acteurFilms = $requeteFilms->fetchAll();
$films = $requeteAllFilms->fetchAll(); ?>

<h3><?= $detailActeur["fullName"] ?></h3>

<!-- infos du realisateur -->
<section id="personInfos">
  <figure>
    <img src="<?= $detailActeur["photo"] ?>" alt="photo de <?= $detailActeur["fullName"] ?>">
    <figcaption>
      <p>
        <?= $detailActeur["fullName"] ?> est
        <!-- vérification du sexe -->
        <?php switch ( $detailActeur["sexe"] ) {
          case "Homme": 
            echo "un homme, né";
            break;
          case "Femme": 
            echo "une femme, née";
            break;
          default:
            echo "quelqu'un né";
            break;
        } ?>

        le <?= $detailActeur["date_naissance"] ?>.
      </p>
    </figcaption>
  </figure>
</section>

<div class="buttons">
  <a href="index.php?action=modifActeurForm&id=<?= $detailActeur["id_acteur"] ?>">
    <button><i class="fa-solid fa-pen editButton"></i>
      modifier les infos
    </button>
  </a>
</div>

<hr>
<!-- Films avec l'acteur -->
<section>
  <h4>Ses participations :</h4>
  <p class="subtitle">
    <?php switch($detailActeur["sexe"]) {
      case "Homme" : echo "Il a"; break;
      case "Femme" : echo "Elle a"; break;
      default : echo "A"; break;
    }
    ?>
    joué dans <?= $requeteFilms->rowCount() ?> films :
  </p>

  <div class='buttons'>

    <div class="addContainer">
      <button class="addButton">ajouter un casting</button>

      <form id="addCasting" action="index.php?action=creerCastingActeur&id=<?= $detailActeur["id_acteur"] ?>"
        method="post">

        <!-- choix film -->
        <select name="film" required>
          <option selected="true" value="" disabled="disabled">
            Choisissez un film
          </option>
          <?php foreach($films as $film) { ?>

          <option value="<?= $film["id_film"] ?>">
            <?= $film["nom_film"] ?>
          </option>
          <?php } ?>
        </select>

        <!-- choix role -->
        <div id="castingRole">
          <label for="role">Quel rôle joué ?</label>
          <input type="text" id="role" name="role" required>
        </div>

        <input type="submit" value="valider">
      </form>
    </div>

    <div class="removeContainer">
      <button class="removeButton">retirer un casting</button>

      <form id="removeCasting" class="divWarning"
        action="index.php?action=supprimerCastingActeur&id=<?= $detailActeur["id_acteur"] ?>" method="post">
        <select name="role" class="warner" required>
          <option selected="true" value="" disabled="disabled">
            Choisissez un role
          </option>
          <?php foreach($acteurFilms as $casting) { ?>

          <option value="<?= $casting["id_role"] ?>">
            <?= $casting["nom_role"] ?>
          </option>

          <?php } ?>
        </select>
        <span class="warningMessage warningCache">Supprimer ce role?</span>
        <input type="submit" value="valider">
      </form>
    </div>
  </div>

  <table class="tableFilms">
    <thead>
      <tr>
        <th colspan="2">TITRE</th>
        <th>ROLE</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($acteurFilms as $film) { 
        $href = "index.php?action=detailFilm&id=".$film["id_film"]
        ?>

      <tr>
        <td class="affichePersonFilm">
          <div class="link">
            <a class href="<?= $href ?>">
              <img src="<?= $film["affiche"] ?>" alt="affiche du film <?= $film["nom_film"] ?>">
            </a>
          </div>
        </td>

        <td class="filmPersonNom">
          <div class="link subtitle">
            <a href="<?= $href ?>">
              <?= $film["nom_film"] ?>
            </a>
          </div>
        </td>

        <td class="filmPersonDate">
          <?= $film["nom_role"] ?>
        </td>
      </tr>

      <?php  } ?>
    </tbody>
  </table>
</section>

<?php
$titre = "détail Acteur";
$titre_secondaire = $detailActeur["nom"]." ".$detailActeur["prenom"];
$contenu = ob_get_clean();
require "templates/template.php";