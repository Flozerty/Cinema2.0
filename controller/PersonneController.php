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
    // $requete = $pdo->query('');
    header("Location:index.php?action=accueil");
  }
}