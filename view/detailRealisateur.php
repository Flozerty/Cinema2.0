<?php ob_start(); 
$detailRealisateur = $requeteRea->fetch();
$reaFilms = $requeteFilms->fetchAll(); ?>

<h3><?= $detailRealisateur["fullName"] ?></h3>

<!-- infos du realisateur -->
<section id="personInfos">
  <figure>
    <img src="<?= $detailRealisateur["photo"] ?>" alt="photo de <?= $detailRealisateur["fullName"] ?>">
    <figcaption>
      <p>
        <?= $detailRealisateur["fullName"] ?> est
        <!-- vérification du sexe -->
        <?php switch ( $detailRealisateur["sexe"] ) {
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

        le <?= $detailRealisateur["date_naissance"] ?>.
      </p>
    </figcaption>
  </figure>
</section>

<hr>
<!-- Films du realisateur -->
<section id="personFilms">
  <h4>Ses réalisations :</h4>
  <p class="subtitle">Il a réalisé <?= $requeteFilms->rowCount() ?> films :</p>

  <table>
    <thead>
      <tr>
        <th colspan="2">TITRE</th>
        <th>DATE SORTIE</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($reaFilms as $film) { 
        $href = "index.php?action=detailFilm&id=".$film["id_film"];
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
          <?= $film["date_sortie"] ?>
        </td>
      </tr>

      <?php  } ?>
    </tbody>
  </table>
</section>
<?php
$titre = "détail Realisateur";
$titre_secondaire = $detailRealisateur["fullName"];
$contenu = ob_get_clean();
require "templates/template.php";