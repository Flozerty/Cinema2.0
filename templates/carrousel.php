<div class="carroussel">
  <i class="fa-solid fa-circle-arrow-left arrow arrow-left"></i>

  <div class="carroussel-wrapper">
    <div class="cards-container">
      <?php switch($typeCarrousel) {

        case "films" :

          // Carrousel Films
          foreach( $films as $film) {
            
            require "templates/filmCard.php";
          }
          break;

        case "acteurs" :

          // Carrousel Acteurs
          foreach( $acteurs as $acteur) { ?>

      <div class="acteurCard">
        <!-- import cartes -->
        <?php require "templates/acteurCard.php"; ?>

        <div class="castingRole">
          <p>Dans le rôle de :</p>
          <p class="subtitle"><?= $acteur["nom_role"] ?></p>
        </div>
      </div>
      <?php } 
          break;
        } ?>
    </div>
  </div>

  <i class="fa-solid fa-circle-arrow-right arrow arrow-right"></i>
</div>