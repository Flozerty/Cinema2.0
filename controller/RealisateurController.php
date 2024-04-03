<?php

namespace Controller;
use Model\Connect;

class RealisateurController {
  
  //////////// VIEW DE LA PAGE listRealisateurs ////////////
  public function listRealisateurs() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("
    SELECT *, CONCAT(nom, ' ', prenom) AS full_name
    FROM realisateur r
    INNER JOIN personne p ON p.id_personne = r.id_personne
    ");

    require "view/listRealisateurs.php";
  }

  //////////// VIEW DE LA PAGE detailRealisateur ////////////
  public function detailRealisateur($id) {
    $pdo = Connect::seConnecter();

// requete infos du realisateur
    $requeteRea = $pdo->prepare('
    SELECT id_realisateur, CONCAT(p.prenom, " ", p.nom) AS rea, sexe, date_naissance, photo 
    FROM realisateur 
    INNER JOIN personne p ON p.id_personne = realisateur.id_personne
    WHERE id_realisateur = :id');

    $requeteRea->execute(["id" => $id]);

// requete films du realisateur
    $requeteFilms = $pdo->prepare('
    SELECT nom_film, CONCAT(p.prenom, " ", p.nom) AS rea, date_sortie 
    FROM film
    INNER JOIN realisateur r ON film.id_realisateur = r.id_realisateur
    INNER JOIN personne p ON r.id_personne = p.id_personne 
    WHERE r.id_realisateur = :id');

    $requeteFilms->execute(["id" => $id]);

    require "view/detailRealisateur.php";
  }
}