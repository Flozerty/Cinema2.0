const divWarning = document.querySelectorAll('.divWarning')

divWarning.forEach(element => {

  const warningMessage = element.querySelector('.warningMessage');
  const warner = element.querySelector('.warner');

  console.log(warner, warningMessage)

  warner.addEventListener('change', () => {
    warningMessage.classList.remove('warningCache')
  })
});



