<?php

namespace Controller;
use Model\Connect;

class ActeurController {

  public function detailActeur($id) {
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
    SELECT id_acteur, nom, prenom, sexe, date_naissance, photo 
    FROM acteur 
    INNER JOIN personne p ON p.id_personne = acteur.id_personne
    WHERE id_acteur = :id");

    $requete->execute(["id" => $id]);

    // // requete filmo acteur
    // $requeteFilmo = $pdo->prepare("
    // WHERE id_acteur = :id");

    // $requeteFilmo->execute(["id" => $id]);


    require "view/detailActeur.php";
  }

  public function listActeurs() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("
    SELECT *, CONCAT(nom, ' ', prenom) AS full_name
    FROM acteur
    INNER JOIN personne p ON p.id_personne = acteur.id_personne
    ORDER BY nom
    ");

    require "view/listActeurs.php";
  }
}