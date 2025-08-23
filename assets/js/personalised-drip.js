document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("iv-quiz-btn");
  const modal = document.getElementById("iv-quiz-modal");
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      restartQuiz();
    }
  });
  const close = modal.querySelector(".btn-outline-secondary"); // “Take Quiz Again” button
  const next = document.getElementById("nextButton");
  const prev = document.getElementById("prevButton");
  const progressBar = document.getElementById("progressBar");
  const currentStep = document.getElementById("currentStep");

  let currentQuestion = 1;
  let answers = { gender: "", age: "", symptoms: [] };

  // open modal
  btn.addEventListener("click", () => (modal.style.display = "flex"));

  // close modal when user clicks “Take Quiz Again”
  close.addEventListener("click", () => {
    modal.style.display = "none";
    restartQuiz();
  });

  // navigation
  next.addEventListener("click", () => {
    if (currentQuestion < 3) {
      document.getElementById(`question${currentQuestion}`).classList.remove("active");
      currentQuestion++;
      document.getElementById(`question${currentQuestion}`).classList.add("active");
      updateProgress();
      updateNavigation();
    } else {
      showResults();
    }
  });
  prev.addEventListener("click", () => {
    if (currentQuestion > 1) {
      document.getElementById(`question${currentQuestion}`).classList.remove("active");
      currentQuestion--;
      document.getElementById(`question${currentQuestion}`).classList.add("active");
      updateProgress();
      updateNavigation();
    }
  });

  // answer selection
  document.querySelectorAll("#question1 .option-button").forEach((btn) => {
    btn.addEventListener("click", () => {
      selectOption(btn, "gender");
    });
  });
  document.querySelectorAll("#question2 .option-button").forEach((btn) => {
    btn.addEventListener("click", () => {
      selectOption(btn, "age");
    });
  });
  document.querySelectorAll("#question3 .checkbox-item").forEach((item) => {
    item.addEventListener("click", (e) => {
      if (e.target.type !== "checkbox") {
        const cb = item.querySelector('input[type="checkbox"]');
        cb.checked = !cb.checked;
        updateSymptomSelection();
      }
    });
  });
  document.querySelectorAll('#question3 input[type="checkbox"]').forEach((cb) => {
    cb.addEventListener("change", updateSymptomSelection);
  });

  // helper funcs
  function selectOption(el, field) {
    // clear siblings
    el.parentNode.querySelectorAll(".option-button").forEach((b) => b.classList.remove("selected"));
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
    // visual toggle
    document.querySelectorAll("#question3 .checkbox-item").forEach((item) => {
      const cb = item.querySelector('input[type="checkbox"]');
      item.classList.toggle("selected", cb.checked);
    });
    updateNavigation();
  }

  function updateProgress() {
    const pct = (currentQuestion / 3) * 100;
    progressBar.style.width = pct + "%";
    currentStep.textContent = currentQuestion;
  }

  function updateNavigation() {
    prev.style.display = currentQuestion > 1 ? "flex" : "none";
    next.textContent = currentQuestion === 3 ? "Get Results ✨" : "Next →";
    // only enable “Next” if current step is answered
    let valid = false;
    if (currentQuestion === 1) valid = !!answers.gender;
    if (currentQuestion === 2) valid = !!answers.age;
    if (currentQuestion === 3) valid = answers.symptoms.length > 0;
    next.disabled = !valid;
  }

  function showResults() {
    document.getElementById(`question${currentQuestion}`).classList.remove("active");
    document.querySelector(".quiz-navigation").style.display = "none";
    progressBar.style.width = "100%";
    currentStep.textContent = "3";
    // compute
    const iv = calculateRecommendation();
    document.getElementById("recommendedIV").textContent = iv;
    document.getElementById("ivDescription").textContent =
      ivDescriptions[iv] || "A custom IV tailored to your needs.";
    document.getElementById("ivImage").src = ivImages[iv] || "";
    document.getElementById("results").style.display = "block";
  }

  function calculateRecommendation() {
    if (!answers.symptoms.length) return "Myer's Cocktail";
    const key = answers.symptoms.sort().join(", ");
    if (ivRecommendations[key]) return ivRecommendations[key];
    // fallback priority
    const prio = [
      "Sick or Recovering",
      "Want to Prevent Illness",
      "Looking to Optimize Performance",
      "Fatigued or Low on Energy",
      "Jetlagged or Sleep Deprived",
    ];
    for (let s of prio) if (answers.symptoms.includes(s)) return ivRecommendations[s];
    return "Myer's Cocktail";
  }

  function restartQuiz() {
    answers = { gender: "", age: "", symptoms: [] };
    currentQuestion = 1;
    document
      .querySelectorAll(".question-slide")
      .forEach((slide) => slide.classList.remove("active"));
    document.getElementById("question1").classList.add("active");
    document.querySelector(".quiz-navigation").style.display = "flex";
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

  const ivRecommendations = {
    "Fatigued or Low on Energy": "Energy Drip",
    "Sick or Recovering": "Immunity Booster",
    "Jetlagged or Sleep Deprived": "Jetlag Drip",
    "Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
    "Want to Prevent Illness": "Immunity Booster",
    "Looking to Optimize Performance": "NAD+",
    "Need a Skin or Detox Reset": "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering": "Immunity Booster",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived": "Jetlag Drip",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
    "Fatigued or Low on Energy, Want to Prevent Illness": "Immunity Booster",
    "Fatigued or Low on Energy, Looking to Optimize Performance": "NAD+",
    "Fatigued or Low on Energy, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived": "Immunity Booster",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
    "Sick or Recovering, Want to Prevent Illness": "Immunity Booster",
    "Sick or Recovering, Looking to Optimize Performance": "NAD+",
    "Sick or Recovering, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
    "Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
    "Jetlagged or Sleep Deprived, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Myer's Cocktail",
    "Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
    "Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
    "Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness": "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Looking to Optimize Performance": "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Need a Skin or Detox Reset": "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness":
      "Immunity Booster",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
    "Fatigued or Low on Energy, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Immunity Booster",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Sick or Recovering, Want to Prevent Illness, Need a Skin or Detox Reset": "Immunity Booster",
    "Sick or Recovering, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
    "Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "NAD+",
    "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Immunity Booster",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "NAD+",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "NAD+",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "NAD+",
    "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Immunity Booster",
    "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
    "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset":
      "Myer's Cocktail",
  };

  const ivDescriptions = {
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

  // drip to image URL mapping
  const ivImages = {
    "Energy Drip": "/assets/img/energy-iv-drip.webp",
    "Jetlag Drip": "/assets/img/jet-lag-iv-drip.webp",
    "Immunity Booster": "/assets/img/immune-booster-iv-drip.webp",
    "Myer's Cocktail": "/assets/img/myers-cocktail.webp",
    "NAD+": "/assets/img/nad-iv-drip.webp",
  };

  // initialize UI
  updateProgress();
  updateNavigation();
});
