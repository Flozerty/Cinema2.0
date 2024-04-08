const carrousel = document.querySelectorAll('.carroussel');

carrousel.forEach(container => {

  const nextButton = container.querySelector('.arrow-right'),
    previousButton = container.querySelector('.arrow-left'),
    cardsContainer = container.querySelector('.cards-container');

  let translateValue = 0

  // Value changera en fonction du type de carrousel (acteur/film/role...)
  const translateNb = 200

  // défilement à gauche

  previousButton.addEventListener("click", () => {
    if (translateValue < 0) {
      translateValue += translateNb
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  })

  // défilement à droite

  nextButton.addEventListener("click", () => {
    // console.log(cardsContainer.offsetWidth - ((cardsContainer.children.length) * 200))
    if (translateValue > (cardsContainer.offsetWidth - (cardsContainer.children.length * 200))) {

      translateValue -= translateNb
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  });
});
