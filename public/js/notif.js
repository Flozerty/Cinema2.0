let notifDiv = document.querySelectorAll('.notification');

let timeouts = [];

affichageElements()

// affichage des elements

function affichageElements() {
  let i = 0;

  notifDiv.forEach(element => {
    const message = element.querySelector('p');
    const xmark = element.querySelector('i');

    xmark.addEventListener('click', () => {
      element.parentNode.removeChild(element);
      // notifDiv.forEach(el => {
      //   clearTimeout(timeout);
      // });

      timeouts.forEach(timeout => {
        clearTimeout(timeout);
      });

      redimensionner();
    })

    element.style.bottom = 50 + 70 * i + "px";

    let timeout = setTimeout(() => {
      element.classList.add('disappear')

      setTimeout(() => {
        element.parentNode.removeChild(element);
      }, 1500)

    }, 1500 * ((notifDiv.length - i) + 1));

    timeouts.push(timeout)
    i++;
  })
}
// const notifs = setInterval(notifDisplay, 2500)

// function notifDisplay() {
//   element = notifDiv[i];

//   if (!element) {
//     clearInterval()
//   }
//   setTimeout(() => {
//     element.parentNode.removeChild(element)
//   }, 2500);
// }

function redimensionner() {
  notifDiv = document.querySelectorAll('.notification');
  console.log(notifDiv)
  affichageElements()
}
