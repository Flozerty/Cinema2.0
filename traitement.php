<?php

use Controller\GenresController;

spl_autoload_register(function ($class) {
  include $class .".php";
});

$ctrlGenre = new GenresController();

 ob_start();

if(isset($_GET['action'])) {
  switch($_GET['action']) {

    /////////////////// GENRES ///////////////////
    case 'addGenre': 
      $genre = filter_input(INPUT_POST,'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
      $ctrlGenre->ajouterGenre($genre);

      header('Location:index.php?action=listGenres');
      break;
      
    case 'removeGenre':
      $genre = filter_input(INPUT_POST,'nom_genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
      $ctrlGenre->supprimerGenre($genre);

      header('Location:index.php?action=listGenres');
      break;
  }
}

$contenu = ob_get_clean();