<?php 

use Controller\ActeurController;
use Controller\CastingController;
use Controller\CinemaController;
use Controller\FilmController;
use Controller\GenresController;
use Controller\PersonneController;
use Controller\RealisateurController;

spl_autoload_register(function ($class) {
  include $class .".php";
});

$ctrlCinema = new CinemaController();
$ctrlActeur = new ActeurController();
$ctrlRea = new RealisateurController();
$ctrlFilm = new FilmController();
$ctrlGenre = new GenresController();
$ctrlPersonne = new PersonneController();
$ctrlCasting = new CastingController();

$id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
  switch($_GET["action"]){

    ///////////// VIEWS /////////////
    case "accueil": $ctrlCinema->Accueil();break;

    case "listFilms": $ctrlFilm->listFilms();break;
    case "detailFilm": $ctrlFilm->detailFilm($id);break;

    case "listActeurs": $ctrlActeur->listActeurs();break;
    case "detailActeur": $ctrlActeur->detailActeur($id);break;

    case "listRealisateurs": $ctrlRea->listRealisateurs(); break;
    case "detailRealisateur": $ctrlRea->detailRealisateur($id); break;

    case "listGenres": $ctrlGenre->listGenres();break;
    case "filmsGenre": $ctrlGenre->filmsGenre($id);break;

    ////////// Formulaires //////////

    // genre
    case "ajouterGenre": $ctrlGenre->ajouterGenre();break;
    case "supprimerGenre": $ctrlGenre->supprimerGenre();break;

    // genre film
    case "ajouterGenreFilm": $ctrlGenre->ajouterGenreFilm($id);break;
    case "supprimerGenreFilm": $ctrlGenre->supprimerGenreFilm($id);break;

    // créer film
    case "creerFilm": $ctrlFilm->creerFilmForm();break;
    case "creationFilm": $ctrlFilm->creationFilm();break;  

    // créer personne
    case "creerFormActeur": $ctrlPersonne->creerFormPersonne("acteur");break;
    case "creerFormRealisateur": $ctrlPersonne->creerFormPersonne("realisateur");break;  
    case "creerPersonne": $ctrlPersonne->creerPersonne();break;

    // suppression
    case "supprimerActeur": $ctrlActeur->supprimerActeur();break;
    case "supprimerRealisateur": $ctrlRea->supprimerRealisateur();break;
    case "supprimerCastingFilm": $ctrlCasting->supprimerCastingFilm($id);break;
    case "supprimerCastingActeur": $ctrlCasting->supprimerCastingActeur($id);break;
  }
}