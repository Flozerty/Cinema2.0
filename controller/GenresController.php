<?php

namespace Controller;
use Model\Connect;

class GenresController {

////////// View ListGenres //////////
  public function listGenres() {
    $pdo = Connect::seConnecter();

    $requeteGenres = $pdo->query("
    SELECT * FROM genre
    ORDER BY nom_genre
    ");
    require "view/listGenres.php";
  }
  
  ///////// View FilmsGenre /////////

// Liste des Films d'un genre
  public function filmsGenre($id) {
    $pdo = Connect::seConnecter();

    $requeteGenre = $pdo->prepare("
      SELECT *
      FROM genre
      WHERE id_genre = :id
      ");
    $requeteGenre->execute(["id" => $id]);

    $requeteFilmsGenre = $pdo->prepare("
      SELECT * 
      FROM genre
      INNER JOIN filmotheque f ON f.id_genre = genre.id_genre
      INNER JOIN film ON film.id_film = f.id_film
      WHERE genre.id_genre = :id
      ORDER BY date_sortie DESC
      ");
    $requeteFilmsGenre->execute(["id" => $id]);

    // Liste des films qui ne sont pas dans le genre
    $requeteOtherFilms = $pdo->prepare("
      SELECT nom_film, id_film
      FROM film
      WHERE film.id_film NOT IN (
        SELECT film.id_film
        FROM film
        INNER JOIN filmotheque f ON f.id_film = film.id_film
        INNER JOIN genre ON genre.id_genre = f.id_genre
        WHERE genre.id_genre = :id
      )
      ORDER BY nom_film
      ");
    $requeteOtherFilms->execute(["id" => $id]);

    require "view/filmsGenre.php";
  }
  
      /////////////////////////////////////////////
      /////////// CREATION & SUPPRESSION //////////
      /////////////////////////////////////////////

    //////////// Formulaire ajout genre ////////////
  public function ajouterGenre() {
    $pdo = Connect::seConnecter();

    // récupération du genre
    $nom_genre = filter_input(INPUT_POST,'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $requete = $pdo->prepare("
      INSERT INTO genre (nom_genre)
      VALUES ('$nom_genre')
      ");
    $requete->execute();

    header('Location:index.php?action=listGenres');
  }

  ////////// Formulaire suppression genre //////////
  public function supprimerGenre() {
    $pdo = Connect::seConnecter();

    $id_genre = filter_input(INPUT_POST,'genre', FILTER_SANITIZE_NUMBER_INT);

    // Suppression des films associés avant de supprimer le genre
    $requeteDel = $pdo->prepare("
      DELETE FROM filmotheque
      WHERE id_genre = :id;

      DELETE FROM genre
      WHERE id_genre = :id;
    ");

    $requeteDel->execute(['id' => $id_genre]);

    header('Location:index.php?action=listGenres');
  }

        /////////////////////////////////////////////
        ////////////// GENRES D'1 FILM //////////////
        /////////////////////////////////////////////

  /////////////// Ajouter le genre d'un film ///////////////
  public function ajouterGenreFilm($id) {
    $pdo = Connect::seconnecter();

    $film = filter_input(INPUT_POST,'film', FILTER_VALIDATE_INT);

    $requete = $pdo->prepare("
      INSERT INTO filmotheque (id_film, id_genre)
      VALUES ('$film', :id) 
      ");
    $requete->execute(["id" => $id]);

    header('Location:index.php?action=filmsGenre&id='.$id);
  }

  ////////////// Supprimer le genre d'un film //////////////
  public function supprimerGenreFilm($id) {
    $pdo = Connect::seconnecter();

    $film = filter_input(INPUT_POST,'film', FILTER_VALIDATE_INT);

    $requete = $pdo->prepare("
      DELETE FROM filmotheque
      WHERE id_genre = :id
      AND id_film = '$film'
      ");
    $requete->execute(["id" => $id]);

    header('Location:index.php?action=filmsGenre&id='.$id);
  }
}