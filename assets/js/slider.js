window.addEventListener("load", () => initSlider(".mSlider_disp", 1500, 0.4)); // (selector, autoplay-ms, transition-s)

function initSlider(displaySel, autoMs = 0, speed = 0.4) {
  /* ----------- grab elements ----------- */
  const disp = document.querySelector(displaySel);
  const track = disp.querySelector(".mSlider_list");
  const slides = Array.from(track.children);
  const prevBtn = document.querySelector(".mSlider-arrow-prev");
  const nextBtn = document.querySelector(".mSlider-arrow-next");

  /* ----------- helpers ----------- */
  const slidesPerView = () =>
    +getComputedStyle(document.documentElement).getPropertyValue("--slides");

  let index = 0; // which logical slide is showing?
  const move = () => {
    const step = 100 / slidesPerView();
    track.style.transitionDuration = speed + "s";
    track.style.transform = `translateX(-${index * step}%)`;
  };

  /* ----------- nav controls ----------- */
  const next = () => {
    index = (index + 1) % slides.length;
    move();
  };
  const prev = () => {
    index = (index - 1 + slides.length) % slides.length;
    move();
  };

  nextBtn.addEventListener("click", next);
  prevBtn.addEventListener("click", prev);

  /* scroll wheel for desktop */
  disp.addEventListener(
    "wheel",
    (e) => {
      e.preventDefault();
      e.deltaY > 0 ? next() : prev();
    },
    { passive: false }
  );

  /* touch swipe for mobile */
  let startX = null;
  disp.addEventListener("touchstart", (e) => (startX = e.touches[0].clientX), {
    passive: true,
  });
  disp.addEventListener("touchend", (e) => {
    const diff = e.changedTouches[0].clientX - startX;
    const thresh = disp.clientWidth * 0.15; // ~15 % swipe
    if (diff > thresh) prev();
    if (diff < -thresh) next();
  });

  /* keep everything aligned when window is resized */
  window.addEventListener("resize", move);

  /* optional autoplay */
  let timer = null;
  const startAuto = () => autoMs && (timer = setInterval(next, autoMs));
  const stopAuto = () => timer && clearInterval(timer);
  disp.addEventListener("mouseenter", stopAuto);
  disp.addEventListener("mouseleave", startAuto);
  startAuto();

  move(); // initial draw
}

// $(document).ready(function () {
//   $(".carousel-slick").slick({
//     slidesToShow: 3,
//     autoplay: true,
//     autoplaySpeed: 2000,
//     dots: true,
//     arrows: false,
//     centerMode: false,
//     infinite: true,
//     touchMove: true,
//     touchThreshold: 10,
//     responsive: [
//       {
//         breakpoint: 1190,
//         settings: {
//           slidesToShow: 2,
//           centerMode: false,
//         },
//       },
//       {
//         breakpoint: 720,
//         settings: {
//           slidesToShow: 1,
//           centerMode: false,
//         },
//       },
//     ],
//   });
// });
