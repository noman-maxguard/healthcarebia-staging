document.addEventListener("DOMContentLoaded", () => {
  // Button click handler
  document.addEventListener("click", (e) => {
    const btn = e.target.closest("#iv-quiz-btn");
    if (!btn) return;

    const modalEl = document.getElementById("iv-quiz-modal");
    if (!modalEl) {
      console.warn("iv-quiz-modal not found in DOM");
      return;
    }

    if (
      typeof bootstrap !== "undefined" &&
      modalEl.classList.contains("modal")
    ) {
      const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
      bsModal.show();
    } else {
      modalEl.style.display = "flex";
    }
  });

  function byId(id) {
    return document.getElementById(id);
  }
  function qs(sel, root = document) {
    return root.querySelector(sel);
  }

  const modal = byId("iv-quiz-modal");
  if (!modal) return;

  const close = qs(".btn-outline-secondary", modal);
  const next = byId("nextButton");
  const prev = byId("prevButton");
  const progressBar = byId("progressBar");
  const currentStep = byId("currentStep");

  let currentQuestion = 1;
  let answers = { gender: "", age: "", symptoms: [] };

  // Close events
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      hideModal();
      restartQuiz();
    }
  });
  if (close) {
    close.addEventListener("click", () => {
      hideModal();
      restartQuiz();
    });
  }

  function hideModal() {
    if (typeof bootstrap !== "undefined" && modal.classList.contains("modal")) {
      const bsModal = bootstrap.Modal.getOrCreateInstance(modal);
      bsModal.hide();
    } else {
      modal.style.display = "none";
    }
  }

  // Navigation
  if (next && prev && progressBar && currentStep) {
    next.addEventListener("click", () => {
      if (currentQuestion < 3) {
        swapSlide(currentQuestion, currentQuestion + 1);
      } else {
        showResults();
      }
    });
    prev.addEventListener("click", () => {
      if (currentQuestion > 1) swapSlide(currentQuestion, currentQuestion - 1);
    });
  }

  const q1 = byId("question1");
  if (q1)
    q1.querySelectorAll(".option-button").forEach((b) =>
      b.addEventListener("click", () => selectOption(b, "gender"))
    );

  const q2 = byId("question2");
  if (q2)
    q2.querySelectorAll(".option-button").forEach((b) =>
      b.addEventListener("click", () => selectOption(b, "age"))
    );

  const q3 = byId("question3");
  if (q3) {
    q3.querySelectorAll(".checkbox-item").forEach((item) => {
      item.addEventListener("click", (e) => {
        if (e.target.type !== "checkbox") {
          const cb = item.querySelector('input[type="checkbox"]');
          if (cb) {
            cb.checked = !cb.checked;
            updateSymptomSelection();
          }
        }
      });
    });
    q3.querySelectorAll('input[type="checkbox"]').forEach((cb) =>
      cb.addEventListener("change", updateSymptomSelection)
    );
  }

  function swapSlide(from, to) {
    const a = byId(`question${from}`);
    const b = byId(`question${to}`);
    if (a && b) {
      a.classList.remove("active");
      b.classList.add("active");
      currentQuestion = to;
      updateProgress();
      updateNavigation();
    }
  }

  function selectOption(el, field) {
    el.parentNode
      .querySelectorAll(".option-button")
      .forEach((b) => b.classList.remove("selected"));
    el.classList.add("selected");
    answers[field] = el.dataset.value;
    updateNavigation();
  }

  function updateSymptomSelection() {
    const selected = [];
    document
      .querySelectorAll('#question3 input[type="checkbox"]:checked')
      .forEach((cb) => selected.push(cb.value));
    answers.symptoms = selected;
    document.querySelectorAll("#question3 .checkbox-item").forEach((item) => {
      const cb = item.querySelector('input[type="checkbox"]');
      item.classList.toggle("selected", cb && cb.checked);
    });
    updateNavigation();
  }

  function updateProgress() {
    if (!progressBar || !currentStep) return;
    const pct = (currentQuestion / 3) * 100;
    progressBar.style.width = pct + "%";
    currentStep.textContent = String(currentQuestion);
  }

  function updateNavigation() {
    if (!next || !prev) return;
    prev.style.display = currentQuestion > 1 ? "flex" : "none";
    next.textContent = currentQuestion === 3 ? "Get Results ✨" : "Next →";
    let valid = false;
    if (currentQuestion === 1) valid = !!answers.gender;
    if (currentQuestion === 2) valid = !!answers.age;
    if (currentQuestion === 3) valid = answers.symptoms.length > 0;
    next.disabled = !valid;
  }

  function showResults() {
    const active = byId(`question${currentQuestion}`);
    if (active) active.classList.remove("active");
    const nav = document.querySelector(".quiz-navigation");
    if (nav) nav.style.display = "none";
    if (progressBar) progressBar.style.width = "100%";
    if (currentStep) currentStep.textContent = "3";
    const iv = calculateRecommendation();
    const descs = {
      "Energy Drip":
        "Perfect for combating fatigue and boosting your energy levels naturally. This IV contains essential vitamins and minerals to revitalize your body.",
      "Immunity Booster":
        "Strengthen your immune system with this powerful blend of vitamins C, zinc, and antioxidants to help fight off illness and speed recovery.",
      "Jetlag Drip":
        "Specially formulated to help reset your body clock and combat the effects of jet lag and sleep deprivation.",
      "Myer's Cocktail":
        "Our signature wellness blend that addresses multiple concerns including fatigue, general wellness, and detoxification.",
      "NAD+":
        "The ultimate performance optimizer that enhances cellular energy production and cognitive function for peak performance.",
    };
    const imgs = {
      "Energy Drip": "<?= base_url() ?>assets/frontend/img/energy-iv-drip.webp",
      "Jetlag Drip":
        "<?= base_url() ?>assets/frontend/img/jet-lag-iv-drip.webp",
      "Immunity Booster":
        "<?= base_url() ?>assets/frontend/img/immune-booster-iv-drip.webp",
      "Myer's Cocktail":
        "<?= base_url() ?>assets/frontend/img/myers-cocktail.webp",
      "NAD+": "<?= base_url() ?>assets/frontend/img/nad-iv-drip.webp",
    };
    const nameEl = byId("recommendedIV");
    const descEl = byId("ivDescription");
    const imgEl = byId("ivImage");
    if (nameEl) nameEl.textContent = iv;
    if (descEl)
      descEl.textContent = descs[iv] || "A custom IV tailored to your needs.";
    if (imgEl) imgEl.src = imgs[iv] || "";
    const results = byId("results");
    if (results) results.style.display = "block";
  }

  function calculateRecommendation() {
    if (!answers.symptoms.length) return "Myer's Cocktail";
    const key = answers.symptoms.sort().join(", ");
    const pick = {
      "Fatigued or Low on Energy": "Energy Drip",
      "Sick or Recovering": "Immunity Booster",
      "Jetlagged or Sleep Deprived": "Jetlag Drip",
      "Want to Prevent Illness": "Immunity Booster",
      "Looking to Optimize Performance": "NAD+",
    };
    const prio = [
      "Sick or Recovering",
      "Want to Prevent Illness",
      "Looking to Optimize Performance",
      "Fatigued or Low on Energy",
      "Jetlagged or Sleep Deprived",
    ];
    if (pick[key]) return pick[key];
    for (let s of prio) if (answers.symptoms.includes(s)) return pick[s];
    return "Myer's Cocktail";
  }

  function restartQuiz() {
    answers = { gender: "", age: "", symptoms: [] };
    currentQuestion = 1;
    document
      .querySelectorAll(".question-slide")
      .forEach((slide) => slide.classList.remove("active"));
    const q1 = byId("question1");
    if (q1) q1.classList.add("active");
    const nav = document.querySelector(".quiz-navigation");
    if (nav) nav.style.display = "flex";
    document
      .querySelectorAll(".option-button.selected")
      .forEach((b) => b.classList.remove("selected"));
    document
      .querySelectorAll("#question3 .checkbox-item.selected")
      .forEach((i) => i.classList.remove("selected"));
    document
      .querySelectorAll('#question3 input[type="checkbox"]')
      .forEach((cb) => (cb.checked = false));
    updateProgress();
    updateNavigation();
  }

  updateProgress();
  updateNavigation();
});
