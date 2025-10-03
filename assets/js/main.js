// main.js
//
document.addEventListener("DOMContentLoaded", function () {
  const nav = document.getElementById("header");
  if (!nav) return;
  const path = window.location.pathname.replace(/\/+$/, "");
  const isHome = path === "" || path === "/" || path === "/index.html";
  const isCorporateWellness = path === "/corporate-wellness";
  const isPartnerShip = path === "/partnership";

  if (!isHome) {
    nav.classList.add("color");
  }

  if (isCorporateWellness) {
    nav.classList.add("brown");
  }

  if (isPartnerShip) {
    nav.classList.add("brown");
  }

  const applyScrollState = () => {
    const isMobile = window.innerWidth <= 412;
    if (isMobile) {
      nav.classList.remove("scrolled");
      nav.classList.add("mobile-scrolled");
      // dropDowns.forEach((dd) => dd.classList.remove("scrolled"));
      return;
    }

    const scrolled = window.scrollY > 50;
    nav.classList.toggle("scrolled", scrolled);
    // dropDowns.forEach((dd) => dd.classList.toggle("scrolled", scrolled));
  };

  applyScrollState();
  window.addEventListener("scroll", applyScrollState, { passive: true });
  window.addEventListener("resize", applyScrollState);
});

document.querySelectorAll(".video-thumbnail").forEach((thumbnail) => {
  thumbnail.addEventListener("click", function () {
    const videoId = this.getAttribute("data-video-id");
    const iframe = document.createElement("iframe");
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
    iframe.title = "YouTube video player";
    iframe.frameBorder = "0";
    iframe.allow =
      "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    iframe.allowFullscreen = true;
    iframe.className = "testimonial-video";
    this.replaceWith(iframe);
  });
});
// Animations
const START = 0.4;
const observer = new IntersectionObserver(
  (entries, obs) => {
    entries.forEach((entry) => {
      const animation = entry.target.getAttribute("data-animation");

      if (entry.isIntersecting && entry.intersectionRatio >= START) {
        entry.target.classList.add(animation);
        obs.unobserve(entry.target);
      }
    });
  },
  {
    root: null,
    threshold: START,
    rootMargin: "0px 0px -10% 0px",
  },
);
document.querySelectorAll(".animate").forEach((el) => observer.observe(el));

// const START = 0.4;
// const RESET = 0.2;
// const observer = new IntersectionObserver(
//   (entries) => {
//     entries.forEach((entry) => {
//       const animation = entry.target.getAttribute("data-animation");
//       if (entry.isIntersecting && entry.intersectionRatio >= START) {
//         entry.target.classList.add(animation);
//         unObserve()
//       }
//       // if (entry.intersectionRatio <= RESET) {
//       //   entry.target.classList.remove(animation);
//       // }
//     });
//   },
//   {
//     root: null,
//     threshold: [RESET, START, 1],
//     rootMargin: "0px 0px -10% 0px",
//   },
// );
// const animateElements = document.querySelectorAll(".animate");
// animateElements.forEach((el) => observer.observe(el));
