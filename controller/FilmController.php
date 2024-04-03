<?php

namespace Controller;
use Model\Connect;

class FilmController {
  
  public function listFilms() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("
    SELECT *, YEAR(date_sortie) AS annee_sortie
    FROM film
    ORDER BY date_sortie DESC
    ");

    require "view/listFilms.php";
  }

  public function detailFilm($id) {
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare('
      SELECT nom_film, date_sortie, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree, CONCAT(p.prenom, " ", p.nom) AS rea
      FROM film
      INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
      INNER JOIN personne p ON p.id_personne = r.id_personne
      WHERE film.id_film = :id
      ');
      
    $requete->execute(["id" => $id]);
    require "view/detailFilm.php";
  }

}