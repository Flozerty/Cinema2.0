const container = document.querySelector('.addFilmContainer');

if (container) {
  const button = container.querySelector('.addButton')
  console.log(button)

  //   button.addEventListener('click', () => {
  //     const content = document.createElement('div');

  //     content.innerHTML = `
  // <select name="film" required>
  //   <option selected="true" value="" disabled="disabled">
  //     Choisissez un film
  //   </option>
  //   <?php foreach($films as $film) { ?>

  //   <option value="<?= $film["nom_film"] ?>">
  //     <?= $film["nom_film"] ?>
  //   </option>

  //   <?php } ?>
  // </select>
  // `;

  //     container.appendChild(content)
  //   })
}