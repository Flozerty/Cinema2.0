<?php

namespace Controller;
use Model\Connect;

class PersonneController {

// Création de nouvelle personne
  public function creerFormPersonne($type) {
    $pdo = Connect::seconnecter();
    // $requete = $pdo->query('');
    require "view/form/formCreerPersonne.php";
  }

  public function creerPersonne() {
    $pdo = Connect::seconnecter();

    $nom = filter_input(INPUT_POST,'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST,'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sexe = filter_input(INPUT_POST,'sex');
    $date = filter_input(INPUT_POST,'date_naissance');
    $photo = filter_input(INPUT_POST,'photo', FILTER_SANITIZE_URL);

    $type =  filter_input(INPUT_POST,'type');;
    $isReaActeur = isset($_POST["reaActeur"]) ? true : false;

// On créait la nouvelle personne
    $requetePersonne = $pdo->prepare("
    INSERT INTO personne
    (nom, prenom, sexe, photo, date_naissance)
    VALUES ('$nom', '$prenom', '$sexe', '$photo', '$date')
    ");
    $requetePersonne->execute();

    // On peut récupérer l'id directement!
    $id = $pdo->lastInsertId();

// On créait le nouveau acteur ou réa en fonction du type choisi
    $requeteType = $pdo->prepare("
      INSERT INTO $type (id_personne)
      VALUES ('$id')
      ");
    $requeteType->execute();

// Si c'est les 2 types, alors on le créait dans l'autre table.

    if($isReaActeur) {
      $otherType = (($type == 'acteur') ? "realisateur" : "acteur");
      
      $requeteOtherType = $pdo->prepare("
        INSERT INTO $otherType (id_personne)
        VALUES ('$id')
        ");
      $requeteOtherType->execute();
    }

    // Retour a la page de liste du type sélectionné
    header("Location:index.php?action=list".ucwords($type)."s");
  }
}