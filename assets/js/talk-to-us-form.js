document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("talkToUsForm");
  const submitBtn = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new URLSearchParams(new FormData(form)).toString();

    const prevText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending...";

    try {
      const res = await fetch("/talk-to-us", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          Accept: "application/json",
        },
        body: formData,
      });

      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      submitBtn.textContent = "Thank you!";
    } catch (err) {
      console.error(`Submit failed:${err}`);
    } finally {
      submitBtn.disabled = false;
      setTimeout(() => {
        submitBtn.textContent = prevText;
      }, 3000);
      form.reset();
    }
  });
});
