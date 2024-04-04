<?php ob_start(); 
$detailsActeur = $requete->fetch();

echo $detailsActeur["nom"];

$titre = "détail Acteur";
$titre_secondaire = $detailsActeur["nom"]." ".$detailsActeur["prenom"];
$contenu = ob_get_clean();
require "templates/template.php";