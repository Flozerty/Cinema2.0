<?php ob_start(); 
$films = $requete->fetchAll();
?>

<section id="listFilms">

  <p class="nbInfo">Il y a <?= $requete->rowCount() ?> films dans la base de données.</p>

  <div class='buttons'>
    <a href="index.php?action=creerFilm">
      <button class="createButton">créer un film</button>
    </a>

    <a href="index.php?action=ajouterFilm">
      <button class="addButton">ajouter un film</button>
    </a>

    <a href="index.php?action=supprimerFilm?>">
      <button class="removeButton">retirer un film</button>
    </a>
  </div>

  <p class="subtitle">Sélectionnez un film :</p>

  <table class="tableFilms">
    <thead>
      <tr>
        <th colspan="2">TITRE</th>
        <th>DATE SORTIE</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($films as $film) { 
        $href = "index.php?action=detailFilm&id=".$film["id_film"];
        ?>

      <tr>
        <td class="afficheTableFilm">
          <div class="link">
            <a class href="<?= $href ?>">
              <img src="<?= $film["affiche"] ?>" alt="affiche du film <?= $film["nom_film"] ?>">
            </a>
          </div>
        </td>

        <td class="filmTableNom">
          <div class="link subtitle">
            <a href="<?= $href ?>">
              <?= $film["nom_film"] ?>
            </a>
          </div>
        </td>

        <td class="filmTableDate">
          <?= $film["date_sortie"] ?>
        </td>
      </tr>

      <?php  } ?>
    </tbody>
  </table>
</section>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "templates/template.php";