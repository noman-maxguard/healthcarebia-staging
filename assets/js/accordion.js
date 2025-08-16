const heads = document.querySelectorAll(".test-accordion-head");
heads.forEach((head) => {
  head.addEventListener("click", (e) => {
    const self = e.currentTarget;
    const icon = self.querySelector("img");
    const body = self.nextElementSibling?.matches(".test-accordion-body")
      ? self.nextElementSibling
      : self.parentElement.querySelector(".test-accordion-body");
    icon && icon.classList.toggle("rotate");
    body && body.classList.toggle("visible");
  });
});
