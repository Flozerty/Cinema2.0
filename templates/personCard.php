<?php 
switch($type){
  case("acteur"): 
    $href = "index.php?action=detailActeur&id=".$person['id_acteur'];
    break;
  case("realisateur"):
    $href = "index.php?action=detailRealisateur&id=".$person['id_realisateur'];
    break;
}
?>

<a href="<?= $href ?>">
  <figure>
    <img src="<?= $person["photo"] ?>" alt="Photo de <?= $person["fullName"] ?>">

    <figcaption class="subtitle">
      <?= $person["fullName"] ?>
    </figcaption>
  </figure>
</a>