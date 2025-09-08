document.addEventListener("DOMContentLoaded", function () {
  const nav = document.getElementById("header");
  if (!nav) return;
  const path = window.location.pathname.replace(/\/+$/, "");
  const isHome = path === "" || path === "/" || path === "/index.html";

  if (!isHome) {
    nav.classList.add("color");
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
