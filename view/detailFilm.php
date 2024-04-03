<?php ob_start();

$detailFilm = $requete->fetch();

echo $detailFilm["nom_film"];

$titre = $detailFilm["nom_film"];
$titre_secondaire = $detailFilm["nom_film"];
?>
<p><?= $detailFilm["rea"] ?></p>
<?php
$contenu = ob_get_clean();
require "view/template.php";