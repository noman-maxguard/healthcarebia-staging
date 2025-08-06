const createOdometer = (el, value) => {
  const odometer = new Odometer({
    el: el,
    value: 0,
  });

  let hasRun = false;

  const options = {
    threshold: [0, 0.9],
  };

  const callback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (!hasRun) {
          odometer.update(value);
          hasRun = true;
        }
      }
    });
  };

  const observer = new IntersectionObserver(callback, options);
  observer.observe(el);
};

const clients = document.querySelector(".count-clients");
createOdometer(clients, 1000);

const professionals = document.querySelector(".count-professionals");
createOdometer(professionals, 10);

const team = document.querySelector(".count-team");
createOdometer(team, 100);

document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".myTestimonials", {
    loop: true, // infinite scroll
    slidesPerView: 1,
    spaceBetween: 32,
    navigation: {
      nextEl: "#next",
      prevEl: "#prev",
    },
    autoplay: {
      delay: 7000,
      disableOnInteraction: false,
    },
  });
});
