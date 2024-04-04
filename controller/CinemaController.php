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

    $requeteActeursFilmFav = $pdo->query("
    SELECT *, CONCAT(prenom, ' ', nom) AS fullName
    FROM acteur
    INNER JOIN personne p ON p.id_personne = acteur.id_personne
    INNER JOIN casting ON casting.id_acteur = acteur.id_acteur
    WHERE casting.id_film = 9
    ");

    $requeteFilmsMoment = $pdo->query("
    SELECT *
    FROM film
    ORDER BY date_sortie DESC
    LIMIT 2
    ");

    $requeteAction = $pdo->query("
    SELECT *
    FROM film
    INNER JOIN filmotheque f ON f.id_film = film.id_film
    INNER JOIN genre ON f.id_genre = genre.id_genre
    WHERE nom_genre = 'action'
    ");

    $requeteFamille = $pdo->query("
    SELECT *
    FROM film
    INNER JOIN filmotheque f ON f.id_film = film.id_film
    INNER JOIN genre ON f.id_genre = genre.id_genre
    WHERE nom_genre = 'Film pour enfants'
    ");

    require "view/Accueil.php";
  }

}