<?php

namespace Controller;
use Model\Connect;

class CinemaController {

  //////////// VIEW DE LA PAGE D'ACCUEIL ////////////
  public function Accueil() {
    $pdo = Connect::seConnecter();
    // infos film favori
    $requeteFilmFavori = $pdo->query("
    SELECT *, CONCAT(p.prenom, ' ', p.nom) AS rea
    FROM film
    INNER JOIN realisateur r ON film.id_realisateur = r.id_realisateur
    INNER JOIN personne p ON r.id_personne = p.id_personne
    WHERE id_film = 9
    ");

    // acteurs du film favori
    $requeteActeursFilmFav = $pdo->query("
    SELECT acteur.id_acteur, nom, prenom, photo, CONCAT(prenom, ' ', nom) AS fullName, COUNT(*) AS nbFilms
    FROM acteur
    INNER JOIN personne p ON p.id_personne = acteur.id_personne
    INNER JOIN casting ON casting.id_acteur = acteur.id_acteur
    WHERE casting.id_film = 9
    GROUP BY acteur.id_acteur
    ORDER BY nbFilms DESC
    LIMIT 2
    ");

    // infos des films du moment
    $requeteFilmsMoment = $pdo->query("
    SELECT *
    FROM film
    ORDER BY date_sortie DESC
    LIMIT 2
    ");

    // liste films d'action
    $requeteAction = $pdo->query("
    SELECT *
    FROM film
    INNER JOIN filmotheque f ON f.id_film = film.id_film
    INNER JOIN genre ON f.id_genre = genre.id_genre
    WHERE nom_genre = 'action'
    ");

    // liste films pour enfant
    $requeteFamille = $pdo->query("
    SELECT *
    FROM film
    INNER JOIN filmotheque f ON f.id_film = film.id_film
    INNER JOIN genre ON f.id_genre = genre.id_genre
    WHERE nom_genre = 'film pour enfants'
    ");

    // liste films de science-fiction
    $requeteSF = $pdo->query("
    SELECT *
    FROM film
    INNER JOIN filmotheque f ON f.id_film = film.id_film
    INNER JOIN genre ON f.id_genre = genre.id_genre
    WHERE nom_genre = 'science-fiction'
    ");

    require "view/accueil.php";
  }

}