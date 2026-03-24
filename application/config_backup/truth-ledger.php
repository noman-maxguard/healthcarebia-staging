<?php
return [
  'brand' => 'Healthcarebia',
  'legal_name' => 'Healthcarebia Home Health Care Centre LLC',
  'description_en' => "Dubai's DHA-licensed luxury concierge wellness provider: physician-led IV therapy, executive screenings & diagnostics at home.",
  'description_ar' => "مزود رعاية صحية فاخرة مرخص من هيئة الصحة بدبي لتقديم خدمات العلاج الوريدي والفحوصات التنفيذية والتشخيص في المنزل.",
  'license' => 'DHA-licensed',
  'specialty' => 'WellnessMedicine',
  'founder' => 'FOUNDER NAME',
  'phone' => '+971547077476',
  'email' => 'info@healthcarebia.ae',
  'root' => 'https://www.healthcarebia.ae',
  'logo' => 'https://www.healthcarebia.ae/assets/logo.svg',
  'image' => 'https://www.healthcarebia.ae/assets/clinic.jpg',
  'address' => [
    'street' => 'Eiffel Accommodation 3, Office 311, 107 Al Waha Street, Al Quoz 4',
    'city'   => 'Dubai',
    'region' => 'Dubai',
    'postal' => '00000',
    'country'=> 'AE',
    'lat'    => 25.2048,
    'lng'    => 55.2708
  ],
  'same_as' => [
    'https://ae.linkedin.com/company/healthcarebia',
    'https://www.instagram.com/healthcarebia/',
    'https://www.facebook.com/healthcarebia/',
    'https://services.dha.gov.ae/sheryan/wps/portal/home/medical-directory/facility-details?facilityId=8392742'
  ],
  'ratings' => ['value' => 4.9, 'count' => 187],
  'updated' => '2025-07-29T00:00:00+04:00',

  // Services (EN + AR)
  'services' => [
    [
      'name_en' => 'At-Home IV Drip Therapy',
      'name_ar' => 'العلاج بالحقن الوريدي في المنزل',
      'slug'    => 'iv-drip-dubai',
      'price_from_aed' => 850,
      'supervision' => 'Physician-led',
      'faq_en' => [
        ['q' => 'Is Healthcarebia DHA-licensed for at-home IV drips?', 'a' => 'Yes. Healthcarebia is fully licensed by the Dubai Health Authority and every IV drip is physician-prescribed and supervised.'],
        ['q' => 'How quickly can I book an IV drip at home?', 'a' => 'Same-day service is available across Dubai; typical dispatch is under 90 minutes after confirmation.'],
        ['q' => 'What makes Healthcarebia different from other IV drip providers?', 'a' => 'DHA-licensed medical oversight, luxury concierge service, premium ingredients, and absolute discretion for VIP clients across the GCC.']
      ],
      'faq_ar' => [
        ['q' => 'هل هيلث كيربيا مرخصة من هيئة الصحة بدبي لتقديم الحقن الوريدي في المنزل؟', 'a' => 'نعم، هيلث كيربيا مرخصة بالكامل من هيئة الصحة بدبي وجميع الحقن الوريدية تتم بوصفة وإشراف الأطباء.'],
        ['q' => 'كم يستغرق حجز الحقن الوريدي في المنزل؟', 'a' => 'الخدمة متاحة في نفس اليوم عبر دبي؛ عادة ما يتم إرسال الطاقم خلال أقل من 90 دقيقة بعد التأكيد.'],
        ['q' => 'ما الذي يميز هيلث كيربيا عن مقدمي الحقن الوريدي الآخرين؟', 'a' => 'إشراف طبي مرخص من هيئة الصحة بدبي، خدمة كونسيرج فاخرة، مكونات عالية الجودة، وسرية تامة لعملائنا من كبار الشخصيات.']
      ]
    ],[
      'name_en' => 'Doctor on Call',
      'name_ar' => 'طبيب منزلي عند الطلب',
      'slug'    => 'doctor-on-call',
      'supervision' => 'DHA-licensed physicians',
      'faq_en' => [
        ['q' => 'What conditions can a home-visit doctor treat?', 'a' => 'A wide range of non-emergency illnesses, minor injuries, chronic-disease reviews and prescription renewals.'],
        ['q' => 'Is the service available 24/7?', 'a' => 'Yes – bookings are accepted 7 days a week, 365 days a year.'],
        ['q' => 'Do you accept insurance?', 'a' => 'At present, visits are billed directly to the patient; insurance is not yet accepted.']
      ],
      'faq_ar' => [
        ['q' => 'ما هي الحالات التي يمكن للطبيب المنزلي معالجتها؟', 'a' => 'مجموعة واسعة من الأمراض غير الطارئة والإصابات البسيطة ومتابعة الأمراض المزمنة وتجديد الوصفات.'],
        ['q' => 'هل الخدمة متاحة طوال الوقت؟', 'a' => 'نعم، يمكن الحجز على مدار الساعة طوال أيام السنة.'],
        ['q' => 'هل تقبلون التأمين الطبي؟', 'a' => 'حاليًا يتم تحصيل الرسوم مباشرة من المريض ولا يُقبل التأمين.']
      ]
    ],[
      'name_en' => 'Nurse at Home',
      'name_ar' => 'ممرضة في المنزل',
      'slug'    => 'nurse-at-home',
      'supervision' => 'DHA-registered nurses',
      'faq_en' => [
        ['q' => 'What tasks can the home-care nurse perform?', 'a' => 'Wound care, medication administration, post-operative support, chronic-disease monitoring, elder & paediatric care.'],
        ['q' => 'Can I request daily or weekly visits?', 'a' => 'Yes – scheduling is flexible to suit individual needs.'],
        ['q' => 'Are infection-control protocols followed?', 'a' => 'All nurses adhere strictly to DHA guidelines and evidence-based infection control.']
      ],
      'faq_ar' => [
        ['q' => 'ما المهام التي يمكن أن تؤديها الممرضة المنزلية؟', 'a' => 'العناية بالجروح، إعطاء الأدوية، دعم ما بعد الجراحة، متابعة الأمراض المزمنة، رعاية المسنين والأطفال.'],
        ['q' => 'هل يمكن جدولة زيارات يومية أو أسبوعية؟', 'a' => 'نعم، المواعيد مرنة وفق احتياجاتك.'],
        ['q' => 'هل يتم اتباع بروتوكولات مكافحة العدوى؟', 'a' => 'تلتزم الممرضات بجميع بروتوكولات هيئة الصحة بدبي.']
      ]
    ],[
      'name_en' => 'Oxygen Therapy',
      'name_ar' => 'علاج الأكسجين',
      'slug'    => 'oxygen-therapy',
      'supervision' => 'Medical team-led',
      'faq_en' => [
        ['q' => 'Who benefits from at-home oxygen therapy?', 'a' => 'Clients with low blood-oxygen, recovery fatigue or those augmenting IV therapy for enhanced nutrient uptake.'],
        ['q' => 'How is the oxygen delivered?', 'a' => 'Via a comfortable nasal cannula with medical-grade concentrators.'],
        ['q' => 'Is it safe to combine with an IV drip?', 'a' => 'Yes – pairing oxygen with IV nutrients can produce synergistic benefits.']
      ],
      'faq_ar' => [
        ['q' => 'من المستفيد من علاج الأكسجين في المنزل؟', 'a' => 'الأشخاص الذين لديهم انخفاض في الأكسجين بالدم أو إرهاق أو يحتاجون لتعزيز امتصاص المغذيات مع الحقن الوريدي.'],
        ['q' => 'كيف يتم توصيل الأكسجين؟', 'a' => 'عبر قنية أنفية مريحة باستخدام مكثف أكسجين طبي.'],
        ['q' => 'هل من الآمن دمجه مع الحقن الوريدي؟', 'a' => 'نعم، الدمج آمن وقد يعزز الفوائد.']
      ]
    ],[
      'name_en' => 'DNA Testing & Genetic Analysis',
      'name_ar' => 'اختبار الحمض النووي والتحليل الجيني',
      'slug'    => 'dna-test',
      'supervision' => 'Physician-reviewed',
      'faq_en' => [
        ['q' => 'Is the DNA sample collection painless?', 'a' => 'Yes – a simple cheek-swab or saliva sample, no blood draw required.'],
        ['q' => 'When will I receive my genetic report?', 'a' => 'Typically within a few weeks after the lab analysis.'],
        ['q' => 'What insights are included?', 'a' => 'Disease-risk markers, nutrition & fitness recommendations, and personalised lifestyle guidance.']
      ],
      'faq_ar' => [
        ['q' => 'هل جمع العينة غير مؤلم؟', 'a' => 'نعم، مسحة خد بسيطة أو لعاب دون حاجة لسحب دم.'],
        ['q' => 'متى أتسلم تقرير النتائج؟', 'a' => 'عادةً خلال بضعة أسابيع من التحليل المخبري.'],
        ['q' => 'ما نوع المعلومات التي سأحصل عليها؟', 'a' => 'مؤشرات مخاطر الأمراض، توصيات التغذية واللياقة، وإرشادات نمط الحياة الشخصية.']
      ]
    ],[
      'name_en' => 'Lab Test at Home',
      'name_ar' => 'اختبارات مخبرية في المنزل',
      'slug'    => 'lab-test-at-home',
      'supervision' => 'DHA-certified phlebotomy team',
      'faq_en' => [
        ['q' => 'Which types of tests are available?', 'a' => 'Routine blood work, hormone panels, cardiac markers, allergy & food-intolerance, women’s & men’s health profiles and more.'],
        ['q' => 'How fast are results delivered?', 'a' => 'Results are returned securely – many within 24–48 hours.'],
        ['q' => 'Is sample collection hygienic?', 'a' => 'Yes – single-use consumables and strict infection-control protocols are followed.']
      ],
      'faq_ar' => [
        ['q' => 'ما أنواع الفحوصات المتاحة؟', 'a' => 'تحاليل الدم الروتينية، الهرمونات، مؤشرات القلب، الحساسية وعدم تحمل الطعام، ملفات صحة المرأة والرجل وغيرها.'],
        ['q' => 'متى أحصل على النتائج؟', 'a' => 'تسلم النتائج بشكل آمن خلال 24–48 ساعة لمعظم الاختبارات.'],
        ['q' => 'هل جمع العينات آمن؟', 'a' => 'نعم، يتم استخدام أدوات أحادية الاستعمال مع بروتوكولات تعقيم صارمة.']
      ]
    ],[
      'name_en' => 'Annual Health Check-up',
      'name_ar' => 'فحص صحي سنوي',
      'slug'    => 'annual-health-check-up',
      'supervision' => 'Physician-led',
      'faq_en' => [
        ['q' => 'What does the at-home annual check include?', 'a' => 'Vital signs, comprehensive blood panels, ECG, BMI, liver & kidney function, cancer screening (age-dependent) and personalised consultation.'],
        ['q' => 'Why is a yearly check-up important?', 'a' => 'Early detection of issues, peace of mind and an actionable plan to maintain optimal wellness.'],
        ['q' => 'Do I need special preparation?', 'a' => 'Fasting for 8–10 hours is recommended for accurate lipid and glucose readings.']
      ],
      'faq_ar' => [
        ['q' => 'ماذا يتضمن الفحص السنوي في المنزل؟', 'a' => 'العلامات الحيوية، فحوصات دم شاملة، تخطيط قلب، مؤشر كتلة الجسم، وظائف الكبد والكلى، فحوصات السرطان (حسب العمر) واستشارة شخصية.'],
        ['q' => 'لماذا يعتبر الفحص السنوي مهمًا؟', 'a' => 'لاكتشاف المشكلات مبكرًا والحصول على راحة البال وخطة صحية مخصصة.'],
        ['q' => 'هل هناك تجهيز خاص قبل الفحص؟', 'a' => 'يُفضَّل الصيام 8–10 ساعات لضمان دقة قراءات الدهون والسكر.']
      ]
    ]
  ]
];