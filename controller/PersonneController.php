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
    $sex = filter_input(INPUT_POST,'sex');
    $date = filter_input(INPUT_POST,'date_naissance');
    $photo = filter_input(INPUT_POST,'photo', FILTER_SANITIZE_URL);

    $isReaActeur = $_GET['$reaActeur'];

    // $requete = $pdo->query('');

    var_dump($isReaActeur);

    // header("Location:index.php?action=accueil");
  }
}