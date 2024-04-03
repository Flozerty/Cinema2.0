<?php 

use Controller\ActeurController;
use Controller\CinemaController;
use Controller\FilmController;
use Controller\RealisateurController;

spl_autoload_register(function ($class) {
  include $class .".php";
});

$ctrlCinema = new CinemaController();
$ctrlActeur = new ActeurController();
$ctrlRea = new RealisateurController();
$ctrlFilm = new FilmController();

$id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
  switch($_GET["action"]){

    case "accueil": $ctrlCinema->Accueil();break;


    case "listFilms": $ctrlFilm->listFilms();break;
    case "detailFilm": $ctrlFilm->detailFilm($id);break;

    case "listActeurs": $ctrlActeur->listActeurs();break;
    case "detailActeur": $ctrlActeur->detailActeur($id);break;

    case "listRealisateurs": $ctrlRea->listRealisateurs(); break;
    case "detailRealisateur": $ctrlRea->detailRealisateur($id); break;
  }
}