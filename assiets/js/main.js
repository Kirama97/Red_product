
if (typeof WOW !== 'undefined') {
  new WOW().init();
} else {
  console.error("WOW.js n'a pas été chargé correctement.");
}

const burguer = document.querySelector(".burguer");
const nav = document.querySelector("nav");


burguer.addEventListener("click", () => {
  
  nav.classList.toggle("active");
  burguer.classList.toggle("active");
});




function counterUp(element, options) {
  let start = 0;
  let end = parseInt(element.textContent);
  let duration = options.time || 2000;
  let delay = options.delay || 5;
  let stepTime = Math.abs(Math.floor(duration / (end / delay)));
  
  function updateCounter() {
      if (start < end) {
          start += delay;
          element.textContent = start;
          setTimeout(updateCounter, stepTime);
      } else {
          element.textContent = end; 
      }
  }

  updateCounter();
}


document.addEventListener("DOMContentLoaded", function () {
  let counters = document.querySelectorAll('[data-toggle="counter-up"]');
  counters.forEach(counter => {
      counterUp(counter, { delay: 5, time: 1000 });
  });
});
