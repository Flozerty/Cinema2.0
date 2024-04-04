<?php

namespace Controller;
use Model\Connect;

class GenresController {
  public function listGenres() {
    $pdo = Connect::seConnecter();

    $requeteGenres = $pdo->query("
    SELECT * FROM genre
    ORDER BY nom_genre
    ");

    require "view/listGenres.php";
  }

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
}