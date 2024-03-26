<?php 

use Controller\CinemaController;

spl_autoload_register(function ($class) {
  include $class .".php";
});

$ctrlCinema = new CinemaController();

$id= (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
  switch($_GET["action"]){
    case "listFilms": $ctrlCinema->listFilms();break;
    case "detailFilm": $ctrlCinema->detailFilm($id);break;
    // case "listActeurs": $ctrlCinema->listActeurs();break;
    case "detailActeur": $ctrlCinema->detailActeur($id);break;
  }
}