const form = document.getElementById("ebookForm");
const button = document.getElementById("ebookSubmit");
const ebookUrl = "ebooks/Healthcarebia-ebook.pdf";
form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const fd = new FormData(form);
  try {
    // const res = await fetch("/ebooks/submit", { method: "POST", body: fd });
    // if (!res.ok) throw new Error("Submit failed");
    const a = document.createElement("a");
    a.href = ebookUrl;
    a.download = "Healthcarebia-ebook.pdf";
    document.body.appendChild(a);
    a.click();
    a.remove();
  } catch (err) {
    console.log(err);
    button.innerText = "Something went wrong. Please try again.";
  }
});
