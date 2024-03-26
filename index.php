<?php

use Controller\CinemaController;

spl_autoload_register(function ($class) {
  include $class .".php";
});

$ctrlCinema = new CinemaController();

if(isset($_GET["action"])){
  switch($_GET["action"]){
    case "listFilms": $ctrlCinema->listFilms();break;
    case "listActeurs": $ctrlCinema->listActeurs();break;
  }
}