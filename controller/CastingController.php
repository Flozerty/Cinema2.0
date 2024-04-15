<?php

namespace Controller;
use Model\Connect;

class CastingController {

  public function supprimerCastingFilm($id) {
      $pdo = Connect::seconnecter();

    $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_NUMBER_INT);

      $requete = $pdo->prepare("
      DELETE FROM casting
      WHERE id_film = :id
      AND id_role = $role
      ");
      $requete->execute(["id"=>$id]);

      header("Location:index.php?action=detailFilm&id=$id");
    }

  public function supprimerCastingActeur($id) {
    $pdo = Connect::seconnecter();

  $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_NUMBER_INT);

    $requete = $pdo->prepare("
    DELETE FROM casting
    WHERE id_acteur = :id
    AND id_role = $role
    ");
    $requete->execute(["id"=>$id]);

    header("Location:index.php?action=detailActeur&id=$id");
  }
}