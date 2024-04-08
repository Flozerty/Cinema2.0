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
    $requeteFilm = $pdo->prepare('
      SELECT *, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree, CONCAT(p.prenom, " ", p.nom) AS rea
      FROM film
      INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
      INNER JOIN personne p ON p.id_personne = r.id_personne
      WHERE film.id_film = :id
      ');
      
    $requeteFilm->execute(["id" => $id]);

    $requeteGenres = $pdo->prepare("
      SELECT *
      FROM filmotheque f
      INNER JOIN film ON film.id_film = f.id_film
      INNER JOIN genre ON genre.id_genre = f.id_genre
      WHERE film.id_film = :id
    ");
    $requeteGenres->execute(["id" => $id]);

    $requeteActeurs = $pdo->prepare("
    SELECT *, CONCAT(prenom, ' ', nom) AS fullName
    FROM casting c 
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN personne p ON p.id_personne = a.id_personne
    INNER JOIN film ON c.id_film = film.id_film
    INNER JOIN role ON role.id_role = c.id_role
    WHERE film.id_film = :id
    ");
    $requeteActeurs->execute(["id" => $id]);

    
    require "view/detailFilm.php";
  }

}