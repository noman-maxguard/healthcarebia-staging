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
  }
);
document.querySelectorAll(".animate").forEach((el) => observer.observe(el));
