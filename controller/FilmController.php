<?php

namespace Controller;
use Model\Connect;

class FilmController {

  //////////// VIEW DE LA PAGE listFilms ////////////
  public function listFilms() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("
    SELECT *, YEAR(date_sortie) AS annee_sortie
    FROM film
    ORDER BY date_sortie DESC
    ");

    require "view/listFilms.php";
  }

  //////////// VIEW DE LA PAGE detailFilm ////////////
  public function detailFilm($id) {
    $pdo = Connect::seConnecter();

    // LEFT JOIN pour remédier a la 
    // non-existance d'un realisateur
    $requeteFilm = $pdo->prepare('
      SELECT *, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree, CONCAT(p.prenom, " ", p.nom) AS rea
      FROM film
      LEFT JOIN realisateur r ON r.id_realisateur = film.id_realisateur
      LEFT JOIN personne p ON p.id_personne = r.id_personne
      WHERE film.id_film = :id
      ');

    $requeteFilm->execute(["id" => $id]);

    // requete des genres du film
    $requeteGenres = $pdo->prepare("
      SELECT *
      FROM filmotheque f
      INNER JOIN film ON film.id_film = f.id_film
      INNER JOIN genre ON genre.id_genre = f.id_genre
      WHERE film.id_film = :id
      ORDER BY nom_genre
    ");
    $requeteGenres->execute(["id" => $id]);

    // requete des castings
    $requeteActeurs = $pdo->prepare("
    SELECT *, CONCAT(prenom, ' ', nom) AS fullName
    FROM casting c 
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN personne p ON p.id_personne = a.id_personne
    INNER JOIN film ON c.id_film = film.id_film
    INNER JOIN role ON role.id_role = c.id_role
    WHERE film.id_film = :id
    ORDER BY nom
    ");
    $requeteActeurs->execute(["id" => $id]);

    $requeteActeursAll = $pdo->query("
    SELECT id_acteur, CONCAT(prenom, ' ', nom) AS fullName
    FROM acteur
    INNER JOIN personne p ON p.id_personne = acteur.id_personne 
    ");

    require "view/detailFilm.php";
  }

  ////////// VIEW DE LA PAGE DU FORMULAIRE //////////
  function creerFilmForm(){
    $pdo = Connect::seconnecter();

    // Récupération de tous les réalisateurs
    $requeteRealisateurs = $pdo->query("
      SELECT *, CONCAT(p.prenom, ' ', p.nom) AS fullName
      FROM realisateur r
      INNER JOIN personne p ON p.id_personne = r.id_personne
      ORDER BY nom");

    // Récupération de tous les genres
    $requeteGenres = $pdo->query("
      SELECT *
      FROM genre
      ORDER BY nom_genre");

    // On vérifie l'existance des attributs dans le GET
    // (il n'y en aura qu'un et $id prendra sa valeur)

    // Récupération du rea si dans url
    if (isset($_GET["rea"])) { 
      $id = $_GET["rea"];

      $requeteGetRea = $pdo->prepare("
        SELECT *, CONCAT(prenom, ' ', nom) AS fullName
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = r.id_personne
        WHERE id_realisateur = :id
        ");
      $requeteGetRea->execute(["id" => $id]);
    }

    // Récupération du genre si dans url
    if (isset($_GET["genre"])) { 
      $id = $_GET["genre"];

      $requeteGetGenre = $pdo->prepare("
        SELECT *
        FROM genre
        WHERE id_genre = :id
        ");
      $requeteGetGenre->execute(["id" => $id]);
    }

    // Récupération du acteur si dans url
    if (isset($_GET["acteur"])) { 
      $id = $_GET["acteur"];

      $requeteGetActeur = $pdo->prepare("
        SELECT *, CONCAT(prenom, ' ', nom) AS fullName
        FROM acteur a
        INNER JOIN personne p ON p.id_personne = a.id_personne
        WHERE id_acteur = :id
        ");
      $requeteGetActeur->execute(["id" => $id]);
    }

    require "view/form/formCreerFilm.php";
  }

  // Création du film
  function creationFilm(){
    $pdo = Connect::seconnecter();

    $nom = filter_input(INPUT_POST, "nom_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
    $date = filter_input(INPUT_POST, "date_sortie");
    $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_URL);
    $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT);
    $reaId = filter_input(INPUT_POST, "realisateur");
    
    $requeteCreation = $pdo->prepare("
    INSERT INTO film 
    (nom_film, duree, date_sortie, synopsis, affiche, note, id_realisateur)
    VALUES (:nom, :duree, :date, :synopsis, :affiche, :note, :reaId)
    ");
    $requeteCreation->execute([
      "nom" => $nom,
      "duree" => $duree,
      "date" => $date,
      "synopsis" => $synopsis,
      "affiche" => $affiche,
      "note" => $note,
      "reaId" => $reaId,
  ]);

// A VOIR PLUS TARD POUR LES GENRES!!!
// $genres = filter_input(INPUT_POST, "genre");

    header("Location:index.php?action=listFilms");
  }

  // supprimer un film
  function supprimerFilm() {
    $pdo = Connect::seconnecter();

    $id = filter_input(INPUT_POST, "film");

    $requete = $pdo->prepare("
    DELETE FROM filmotheque
    WHERE id_film = :id;

    DELETE FROM casting
    WHERE id_film = :id;

    DELETE FROM film
    WHERE id_film = :id;");

    $requete->execute(["id" => $id]);
    
    header("Location:index.php?action=listFilms");
  }

  // Formulaire modification de film
  public function modifFilmForm($id) {
    $pdo = Connect::seconnecter();

    // Récupération de tous les réalisateurs
    $requeteRealisateurs = $pdo->query("
      SELECT *, CONCAT(p.prenom, ' ', p.nom) AS fullName
      FROM realisateur r
      INNER JOIN personne p ON p.id_personne = r.id_personne
      ORDER BY nom");

    // Récupération de tous les genres
    $requeteGenres = $pdo->query("
      SELECT *
      FROM genre
      ORDER BY nom_genre");

    // récupération du film
    $requeteFilm = $pdo->prepare("
    SELECT *
    FROM film
    WHERE id_film = :id
    ");

    $requeteFilm->execute(["id" => $id]);

    $modif = true;

    require "view/form/formCreerFilm.php";    
  }

  // Mise a jour du film
  public function modifFilm($id) {
    $pdo = Connect::seconnecter();
    
    $nom = filter_input(INPUT_POST, "nom_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
    $date = filter_input(INPUT_POST, "date_sortie");
    $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_URL);
    $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT);
    $reaId = filter_input(INPUT_POST, "realisateur");
   
    $requete = $pdo->prepare("
    UPDATE film
    SET
        nom_film = :nom,
        duree = :duree,
        date_sortie = :date,
        synopsis = :synopsis,
        affiche = :affiche,
        note = :note,
        id_realisateur = :reaId
    WHERE id_film = :id
    ");
    $requete->execute([
      "nom" => $nom,
      "duree" => $duree,
      "date" => $date,
      "synopsis" => $synopsis,
      "affiche" => $affiche,
      "note" => $note,
      "reaId" => $reaId,
      "id" => $id,
  ]);

    header("Location:index.php?action=listFilms");
  }
}