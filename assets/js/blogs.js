const blogs = [
  {
    i: 19,
    title: "Rapid Relief: At-Home IV for Acidity & Digestive Health",
    category: "Health",
    description:
      "DHA-certified at-home IV therapy to quickly ease acidity, indigestion, and bloating—restoring balance and gut comfort.",
    time: 0,
    date: "August 18, 2025",
    link: "iv-for-digestive-relief",
  },
  {
    i: 18,
    title: "Mythbusting IV Therapy – Separating Fact from Fiction",
    category: "Health",
    description:
      "Uncover the truth behind common IV drip misconceptions—pain, safety, necessity—and learn who truly benefits from this cutting-edge therapy.",
    time: 0,
    date: "August 18, 2025",
    link: "iv-therapy-mythbusting",
  },
  {
    i: 17,
    title: "Blood Test to Bespoke Drip: Your Precision Wellness Plan",
    category: "Health",
    description:
      "See how Healthcarebia transforms lab panels into custom-mixed IV drips for precision hydration and nutrient delivery at home.",
    time: 0,
    date: "August 18, 2025",
    link: "bespoke-iv-therapy",
  },
  {
    i: 16,
    title: "Sleep Like a Baby: IV Drips for Better Rest",
    category: "Health",
    description:
      "Discover how DHA-approved IV drips for sleep support target stress, hydration, and nutrient gaps to promote deep, restorative rest.",
    time: 0,
    date: "August 18, 2025",
    link: "iv-drips-for-sleep",
  },
  {
    i: 15,
    title: "IV Drip Therapy Dubai – Science, Luxury & Benefits",
    category: "Health",
    description:
      "DHA-approved IV therapy at home in the UAE—hydration, vitamins, and antioxidants that boost energy and support radiant skin.",
    time: 0,
    date: "August 18, 2025",
    link: "iv-drip-therapy-dubai",
  },
  {
    i: 14,
    title: "Hydrate or Crash: Ultimate Summer Recovery with IV Drips",
    category: "Health",
    description:
      "Dubai’s 45 °C heat is no joke discover how DHA licensed, NABIDH compliant at home IV drips keep you safe, balanced, and energized.",
    time: 0,
    date: "August 4,2025",
    link: "hydrate-or-crash-blog",
  },
  {
    i: 13,
    title: "Is IV Drip Therapy Safe and Legal in Dubai?",
    category: "Health",
    description:
      "Separate myth from fact learn DHA regulations, safety tips, and what makes IV therapy safe and compliant in Dubai.",
    time: 0,
    date: "August 1,2025",
    link: "iv-drip-therapy-safe-legal-dubai-blog",
  },
  {
    i: 12,
    title: "Vitamin D Deficiency in Dubai: Why Testing Matters",
    category: "Health",
    description:
      "Discover why vitamin D is low, even with Dubai sunshine. Learn the risks, symptoms, and book a quick home blood test today.",
    time: 0,
    date: "August 1,2025",
    link: "vitamin-d-deficiency-dubai-blog",
  },
  {
    i: 11,
    title: "Athletic IV Drip: Boost Performance & Speed Recovery",
    category: "Health",
    description:
      "Hydrate, recover, and perform at your best with our DHA-licensed IV therapy for athletes in Dubai.",
    time: 0,
    date: "August 1,2025",
    link: "athletic-iv-drip-performance-recovery-blog",
  },
  {
    i: 10,
    title:
      "Jet Lag IV Drip: Relieve Fatigue, Rehydrate & Restore Your Body Clock",
    category: "Health",
    description:
      "Beat jet lag fatigue and reset your circadian rhythm with our nurse-delivered IV therapy service in Dubai.",
    time: 0,
    date: "August 1,2025",
    link: "jet-lag-iv-drip-blog",
  },
  {
    i: 9,
    title: "NAD+ IV Therapy for CEOs: Enhance Focus & Cognitive Performance",
    category: "Health",
    description:
      "Learn how NAD+ infusion helps CEOs maintain mental clarity, combat fatigue, and excel at multitasking",
    time: 0,
    date: "August 1,2025",
    link: "nad-iv-therapy-for-ceos-blog",
  },
  {
    i: 8,
    title: "Beauty from the Inside Out: IV Therapy for Healthy Skin and Hair",
    category: "Health",
    description:
      "In the pursuit of radiant skin, lustrous hair, and overall beauty, many people turn to topical treatments and cosmetic procedures.",
    time: 0,
    date: "August 1,2025",
    link: "iv-therapy-skin-hair-blog",
  },
  {
    i: 7,
    title: "The Power of NAD+ IV Drips: Enhancing Cellular Health and Energy",
    category: "Health",
    description:
      "In the realm of healthcare advancements, scientists and researchers are constantly uncovering new ways to optimize our well-being.",
    time: 0,
    date: "August 1,2025",
    link: "nad-iv-drips-cellular-health-blog",
  },
  {
    i: 6,
    title: "Harnessing the Power of IV Drips for Immune Enhancement",
    category: "Health",
    description:
      "In recent years, the use of intravenous (IV) drips for immune enhancement has gained significant popularity.",
    time: 0,
    date: "August 1,2025",
    link: "immune-enhancement-iv-drips-blog",
  },
  {
    i: 5,
    title:
      "Saying Goodbye to Hangovers: How IV Drip Therapy Provides Quick Relief",
    category: "Health",
    description:
      "Hangovers can be a dreaded aftermath of a night of indulgence and celebration.",
    time: 0,
    date: "August 1,2025",
    link: "hangover-iv-drip-relief-blog",
  },
  {
    i: 4,
    title:
      "Confidential and Convenient: At-Home STD Testing for Your Peace of Mind",
    category: "Health",
    description:
      "Taking care of our sexual health is crucial for overall well-being, but many individuals feel uncomfortable or hesitant when it comes to getting tested for sexually transmitted diseases (STDs).",
    time: 0,
    date: "August 1,2025",
    link: "at-home-std-testing-dubai-blog",
  },
  {
    i: 3,
    title:
      "The Myers Cocktail IV Drip: A Powerful Vitamin Infusion for Energy & Wellness",
    category: "Health",
    description:
      "Discover how the Myers Cocktail IV drip can boost energy, support immune health, and improve overall wellness.",
    time: 0,
    date: "August 1,2025",
    link: "myers-cocktail-iv-drip-blog",
  },
  {
    i: 2,
    title: "Cold & Flu IV Therapy: Fast Relief and Immune Support",
    category: "Health",
    description:
      "Get rapid relief from cold and flu symptoms with our specialized IV therapy treatment that boosts immunity and rehydrates your body.",
    time: 0,
    date: "August 1,2025",
    link: "cold-flu-iv-therapy-blog",
  },
  {
    i: 1,
    title: "IV Drip Home Service Dubai: What to Expect From Your First Visit",
    category: "Health",
    description:
      "Curious about getting an IV drip at home in Dubai? Discover what happens during your first visit, from consultation to infusion.",
    time: 0,
    date: "August 1,2025",
    link: "iv-drip-home-service-dubai-first-visit-blog",
  },
  {
    i: 0,
    title:
      "Comprehensive Guide to DHA-Certified IV Drip Therapy at Home in Dubai: Procedure, Safety, and Expected Results",
    category: "Health",
    description:
      "Step-by-step process, DHA safety rules, benefits, pricing, and FAQs for professional IV therapy delivered in your home.",
    time: 0,
    date: "August 1,2025",
    link: "dha-certified-iv-therapy-guide-dubai-blog",
  },
];

module.exports = { blogs };
