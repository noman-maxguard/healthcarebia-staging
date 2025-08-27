const form = document.getElementById("ebookForm");
const button = document.getElementById("ebookSubmit");
const ebookUrl = "ebooks/Healthcarebia-ebook.pdf";
form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const a = document.createElement("a");
  a.href = ebookUrl;
  a.download = "Healthcarebia-ebook.pdf";
  document.body.appendChild(a);
  a.click();
  a.remove();
  button.textContent = "Thank you!";
  const formData = new URLSearchParams(new FormData(form)).toString();
  try {
    const res = await fetch("/ebooks/submit", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Accept: "application/json",
      },
      body: formData,
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
  } catch (err) {
    console.log("Something went wrong. Please try again.", err);
  }
});
