<?php

namespace Controller;
use Model\Connect;

class GenresController {

// Liste des genres

  public function listGenres() {
    $pdo = Connect::seConnecter();

    $requeteGenres = $pdo->query("
    SELECT * FROM genre
    ORDER BY nom_genre
    ");

    require "view/listGenres.php";
  }
// Liste des Films d'1 genre
  public function filmsGenre($id) {
    $pdo = Connect::seConnecter();
    $requeteFilmsGenre = $pdo->prepare("
    SELECT * 
    FROM genre
    INNER JOIN filmotheque f ON f.id_genre = genre.id_genre
    INNER JOIN film ON film.id_film = f.id_film
    WHERE genre.id_genre = :id
    ORDER BY date_sortie DESC
    ");

    $requeteFilmsGenre->execute(["id" => $id]);
    require "view/filmsGenre.php";
  }

  // Formulaire ajout genre
  public function ajouterGenre($nom_genre) {

    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
    INSERT INTO genre (nom_genre)
    VALUES (:nom_genre)
    ");
    $requete->execute(["nom_genre"=>$nom_genre]);
  }

  // Formulaire suppression genre
  public function supprimerGenre($nom_genre) {

    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
    DELETE FROM genre
    WHERE nom_genre = :nom_genre
    ");
    $requete->execute(["nom_genre"=>$nom_genre]);
  }
}