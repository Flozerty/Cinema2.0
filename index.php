<?php session_start();

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

$id= (isset($_GET["id"])) ? filter_var(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;

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

    // créer / supprimer film
    case "creerFilm": $ctrlFilm->creerFilmForm();break;
    case "creationFilm": $ctrlFilm->creationFilm();break; 
    case "supprimerFilm": $ctrlFilm->supprimerFilm();break; 

    // films Realisateur
    case "ajouterFilmRea": $ctrlRea->ajouterFilmRea($id);break;
    case "supprimerFilmRea": $ctrlRea->supprimerFilmRea($id);break;

    // créer personne
    case "creerFormActeur": $ctrlPersonne->creerFormPersonne("acteur");break;
    case "creerFormRealisateur": $ctrlPersonne->creerFormPersonne("realisateur");break;  
    case "creerPersonne": $ctrlPersonne->creerPersonne();break;

    // supprimer personne
    case "supprimerActeur": $ctrlActeur->supprimerActeur();break;
    case "supprimerRealisateur": $ctrlRea->supprimerRealisateur();break;
    
    // supprimer casting
    case "supprimerCastingFilm": $ctrlCasting->supprimerCastingFilm($id);break;
    case "supprimerCastingActeur": $ctrlCasting->supprimerCastingActeur($id);break;
  
    // créer casting
    case "creerCastingFilm": $ctrlCasting->creerCastingFilm($id);break;
    case "creerCastingActeur": $ctrlCasting->creerCastingActeur($id);break;
    
    // modif personne
    case "modifActeurForm": $ctrlPersonne->modifPersonneForm($id, "acteur");break;
    case "modifRealisateurForm": $ctrlPersonne->modifPersonneForm($id, "realisateur");break;
    case "modifPersonne": $ctrlPersonne->modifPersonne($id);break;

    // modifFilm
    case "modifFilmForm": $ctrlFilm->modifFilmForm($id);break;
    case "modifFilm": $ctrlFilm->modifFilm($id);break;

    default: $ctrlCinema->Accueil();
  }
} else {
  $ctrlCinema->Accueil();
}