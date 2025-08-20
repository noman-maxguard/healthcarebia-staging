document.addEventListener("DOMContentLoaded", function () {
  const nav = document.getElementById("header");
  if (!nav) return;
  const dropDowns = document.querySelectorAll(".navbar-expand-lg .navbar-nav .dropdown-menu");
  const path = window.location.pathname.replace(/\/+$/, "");
  const isHome = path === "" || path === "/" || path === "/index.html";

  if (!isHome) {
    nav.classList.add("color");
  }
  const applyScrollState = () => {
    const scrolled = window.scrollY > 50;
    nav.classList.toggle("scrolled", scrolled);
    dropDowns.forEach((dd) => dd.classList.toggle("scrolled", scrolled));
  };

  applyScrollState();
  window.addEventListener("scroll", applyScrollState, { passive: true });
});

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const anim = entry.target.dataset.anim;
        entry.target.classList.add(anim);
      }
      // else {
      //   const anim = entry.target.dataset.anim;
      //   entry.target.classList.remove(anim);
      // }
    });
  },
  { threshold: 0.1 },
);

document.querySelectorAll(".animate").forEach((el) => observer.observe(el));
