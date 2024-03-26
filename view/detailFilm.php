<?php ob_start();

$detailFilm = $requete->fetch();

echo $detailFilm["nom_film"];

$titre = "détail Film";
$titre_secondaire = $detailFilm["nom_film"];
$contenu = ob_get_clean();
require "view/template.php";