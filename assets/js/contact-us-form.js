document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm");
  const successMsg = document.getElementById("success");
  const errorMsg = document.getElementById("error");
  const submitBtn = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new URLSearchParams(new FormData(form)).toString();
    console.log(formData);

    const prevText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending...";

    try {
      const res = await fetch("/contact", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          Accept: "application/json",
        },
        body: formData,
      });

      if (!res.ok) throw new Error(`HTTP ${res.status}`);

      form.reset();
      if (window.grecaptcha && grecaptcha.reset) grecaptcha.reset();
      successMsg.style.display = "block";
      errorMsg.style.display = "none";
    } catch (err) {
      console.error(`Submit failed:${err}`);
      errorMsg.style.display = "block";
      successMsg.style.display = "none";
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = prevText;
    }
  });
});
