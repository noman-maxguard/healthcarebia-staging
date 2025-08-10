const nav = document.getElementById("header");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
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
  { threshold: 0.1 }
);

document.querySelectorAll(".animate").forEach((el) => observer.observe(el));
