<div class="carroussel">
  <i class="fa-solid fa-circle-arrow-left arrow arrow-left"></i>

  <div class="carroussel-wrapper">
    <div class="cards-container">
      <?php foreach( $films as $film) {

            require "templates/filmCard.php";
         } ?>
    </div>
  </div>

  <i class="fa-solid fa-circle-arrow-right arrow arrow-right"></i>
</div>