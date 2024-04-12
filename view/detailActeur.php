<?php ob_start(); 
$detailActeur = $requete->fetch();
$acteurFilms = $requeteFilms->fetchAll(); ?>

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
    <a href="#">
      <button class="addButton">ajouter un rôle</button>
    </a>

    <a href="#">
      <button class="removeButton">supprimer un rôle</button>
    </a>
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