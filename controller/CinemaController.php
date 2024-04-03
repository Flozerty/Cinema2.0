<?php

namespace Controller;
use Model\Connect;

class CinemaController {

  //////////// VIEW DE LA PAGE D'ACCUEIL ////////////
  public function Accueil() {
    $pdo = Connect::seConnecter();
    $requeteFilmFavori = $pdo->query("
    SELECT *, CONCAT(p.prenom, ' ', p.nom) AS rea
    FROM film
    INNER JOIN realisateur r ON film.id_realisateur = r.id_realisateur
    INNER JOIN personne p ON r.id_personne = p.id_personne
    WHERE id_film = 9
    ");

    
    require "view/Accueil.php";
  }

}