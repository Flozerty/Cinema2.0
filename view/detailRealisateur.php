<?php ob_start(); 
$detailsActeur = $requete->fetch();

echo $detailsActeur["nom"];

$titre = "détail Acteur";
$titre_secondaire = $detailsActeur["prenom"]." ".$detailsActeur["nom"];
$contenu = ob_get_clean();
require "view/template.php";