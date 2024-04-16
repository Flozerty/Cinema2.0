<?php

namespace Controller;
use Model\Connect;

class CastingController {
  
  ////////////// SUPPRIMER CASTING //////////////

  // supprimer casting en fonction du film
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

  // supprimer casting en fonction de l'acteur
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
  
  //////////////// CREER CASTING ////////////////
  /////////// en fonction de l'acteur ///////////
  public function creerCastingActeur($idActeur) {
    $pdo = Connect::seconnecter();

    $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idFilm = filter_input(INPUT_POST, "film", FILTER_SANITIZE_NUMBER_INT);

    // on vérifie l'existence du role
    $findRole = $pdo->query("
    SELECT *
    FROM role
    WHERE nom_role = '$role'
    ");
    $roleResult = $findRole->fetch();

    // si le role n'existe pas, on le créait
    if(!$roleResult) {
      $createNewRole = $pdo->prepare("
      INSERT INTO role (nom_role)
      VALUES ('$role')
      ");
      $createNewRole->execute();
      
      $findRole = $pdo->query("
        SELECT *
        FROM role
        WHERE nom_role = '$role'
      ");
      $roleResult = $findRole->fetch();
    }
    // puis, on récupère l'idRole et on a les 3 id.
    $idRole = $roleResult["id_role"];
    
    $creationCasting = $pdo->prepare("
    INSERT INTO casting (id_film, id_acteur, id_role)
    VALUES ('$idFilm', '$idActeur', '$idRole')
    ");
    $creationCasting->execute();

    header("Location:index.php?action=detailActeur&id=$idActeur");
  }
  
  //////////////// CREER CASTING ////////////////
  ///////////// en fonction du film /////////////
  public function creerCastingFilm($idFilm) {
    $pdo = Connect::seconnecter();

    $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idActeur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_NUMBER_INT);

    // on vérifie l'existence du role
    $findRole = $pdo->query("
    SELECT *
    FROM role
    WHERE nom_role = '$role'
    ");
    $roleResult = $findRole->fetch();

    // si le role n'existe pas, on le créait
    if(!$roleResult) {
      $createNewRole = $pdo->prepare("
      INSERT INTO role (nom_role)
      VALUES ('$role')
      ");
      $createNewRole->execute();
      
      $findRole = $pdo->query("
        SELECT *
        FROM role
        WHERE nom_role = '$role'
      ");
      $roleResult = $findRole->fetch();
    }
    // puis, on récupère l'idRole et on a les 3 id.
    $idRole = $roleResult["id_role"];
    
    $creationCasting = $pdo->prepare("
    INSERT INTO casting (id_film, id_acteur, id_role)
    VALUES ('$idFilm', '$idActeur', '$idRole')
    ");
    $creationCasting->execute();

    header("Location:index.php?action=detailFilm&id=$idFilm");
  }
}