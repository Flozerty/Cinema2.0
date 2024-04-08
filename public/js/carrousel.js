const carrousel = document.querySelectorAll('.carroussel');

carrousel.forEach(container => {

  const nextButton = container.querySelector('.arrow-right'),
    previousButton = container.querySelector('.arrow-left'),
    cardsContainer = container.querySelector('.cards-container');

  // console.log(cardsContainer.querySelectorAll(".acteurCard").length)
  // console.log(cardsContainer.children[0].offsetWidth)

  let translateValue = 0

  // Valeur de translateX en fonction de la width du 1er enfant (card)
  const widthValue = cardsContainer.children[0].offsetWidth

  // défilement à gauche

  previousButton.addEventListener("click", () => {
    if (translateValue < 0) {
      translateValue += widthValue
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  })

  // défilement à droite

  nextButton.addEventListener("click", () => {
    // console.log(cardsContainer.offsetWidth - ((cardsContainer.children.length) * 200))
    if (translateValue > (cardsContainer.offsetWidth - (cardsContainer.children.length * widthValue))) {
      translateValue -= widthValue
      cardsContainer.style.transform = `translateX(${translateValue}px)`
    }
  });
});
