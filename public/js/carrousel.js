const carrousel = document.querySelectorAll('.carroussel');

carrousel.forEach(container => {

  const nextButton = container.querySelector('.arrow-right'),
    previousButton = container.querySelector('.arrow-left'),
    cardsContainer = container.querySelector('.cards-container');

  let translateValue = 0

  // défilement à gauche

  previousButton.addEventListener("click", () => {
    if (translateValue < 0) {
      translateValue += 200
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  })

  // défilement à droite

  nextButton.addEventListener("click", () => {
    // console.log(cardsContainer.offsetWidth - ((cardsContainer.children.length) * 200))
    if (translateValue > (cardsContainer.offsetWidth - (cardsContainer.children.length * 200))) {

      translateValue -= 200
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  });
});
