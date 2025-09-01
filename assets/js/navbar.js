const hamburgerButton = document.querySelector(".hamburger-icon");
const crossButton = document.querySelector(".cross-icon");
const menu = document.querySelector(".menu");

hamburgerButton.addEventListener("click", () => {
  menu.style.display = "flex";
  hamburgerButton.style.display = "none";
  crossButton.style.display = "block";
});
crossButton.addEventListener("click", () => {
  menu.style.display = "none";
  hamburgerButton.style.display = "block";
  crossButton.style.display = "none";
});

document.querySelectorAll(".dropdown .dropdown-block").forEach((block) => {
  block.addEventListener("click", (e) => {
    // const link = block.querySelector("a[href]");
    // if (link) e.preventDefault();

    const dropdown = block.closest(".dropdown");
    const nowOpen = dropdown.classList.toggle("open");

    document.querySelectorAll(".dropdown.open").forEach((dd) => {
      if (dd !== dropdown) dd.classList.remove("open");
    });
  });
});
document.addEventListener("click", (e) => {
  if (!e.target.closest(".dropdown")) {
    document.querySelectorAll(".dropdown.open").forEach((dd) => dd.classList.remove("open"));
  }
});
