<?php

namespace Controller;
use Model\Connect;

class CinemaController {
  public function listFilms() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("
    SELECT nom_film, YEAR(date_sortie) AS annee_sortie
    FROM film
    ");
    require "view/film/listFilms.php";
  }

  public function detailActeur($id) {
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
    SELECT id_acteur, nom, prenom, sexe, date_naissance, photo 
    FROM acteur 
    INNER JOIN personne p ON p.id_personne = acteur.id_personne
    WHERE id_acteur = :id");
    $requete->execute(["id" => $id]);
    require "view/acteur/detailActeur.php";
  }

  public function detailFilm($id) {
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare('
      SELECT nom_film, date_sortie, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree, p.nom
      FROM film
      INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
      INNER JOIN personne p ON p.id_personne = r.id_personne
      WHERE film.id_film = :id');
    $requete->execute(["id" => $id]);
    require "view/film/detailFilm.php";
  }
}