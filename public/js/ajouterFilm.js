const addContainer = document.querySelector('.addFilmContainer');
const removeContainer = document.querySelector('.removeFilmContainer');

if (addContainer) {
  const addButton = addContainer.querySelector('.addButton')
  const form = addContainer.querySelector('form')

  addButton.addEventListener('click', () => {
    form.style.display = "contents";
  })
}

if (removeContainer) {
  const removeButton = removeContainer.querySelector('.removeButton')
  const form = removeContainer.querySelector('form')

  removeButton.addEventListener('click', () => {
    form.style.display = "contents";
  })
}