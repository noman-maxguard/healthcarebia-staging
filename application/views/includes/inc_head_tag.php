<?php
$whatsappPhoneString = !empty($settings->whatsapp) ? $settings->whatsapp : '';
$whatsappMessage = !empty($settings->whatsapp_msg) ? $settings->whatsapp_msg : 'Hi, I contacted you through your website.';
$whatsappHref = $this->MDL_Settings->renderWhatsappLink($whatsappPhoneString, $whatsappMessage);

$v_style      = filemtime(FCPATH.'assets/frontend/css/style.css');
$v_resp       = filemtime(FCPATH.'assets/frontend/css/responsive.css');
$v_library    = filemtime(FCPATH.'assets/frontend/css/library.css');
$v_fancybox   = filemtime(FCPATH.'assets/frontend/css/fancybox.css');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5SZRK93F');
</script>
<!-- End Google Tag Manager -->

<link rel="icon" href="<?= base_url() ?>assets/frontend/img/favicon.svg" type="image/svg+xml" sizes="16x16">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/vendor/bootstrap.min.css') ?>">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Noto+Serif+Display:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/css/fancybox.css?v='.$v_fancybox) ?>">

<!-- Library CSS -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/css/library.css?v='.$v_library) ?>">

<!-- Main Style -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css?v='.$v_style) ?>">

<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/css/responsive.css?v='.$v_resp) ?>" media="(max-width: 1300px)">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('assets/frontend/vendor/fontawesome/css/all.min.css') ?>">

<title><?= !empty($commonData->meta_title) ? $commonData->meta_title : '' ?></title>
<meta name="description" content="<?= !empty($commonData->meta_description) ? $commonData->meta_description : '' ?>"/>
<meta name="keywords" content="<?= !empty($commonData->meta_keywords) ? $commonData->meta_keywords : '' ?>"/>

<?= !empty($settings->script_header) ? $settings->script_header : '' ?>

<!-- Microsoft Clarity -->
<script type="text/javascript">
(function(c,l,a,r,i,t,y){
    c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
    t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
    y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
})(window, document, "clarity", "script", "qo6ygd4kdx");
</script>

<!-- JSON-LD Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": [
    "Organization",
    "MedicalBusiness",
    "LocalBusiness"
  ],
  "name": "Healthcare",
  "url": "https://healthcarebia.ae",
  "logo": "https://healthcarebia.ae/assets/frontend/img/logo.webp",
  "image": "https://healthcarebia.ae/assets/frontend/img/logo.webp",
  "telephone": "+971547077476",
  "email": "care@healthcarebia.ae",
  "address": {
        "@type": "PostalAddress",
        "streetAddress": "91 Sheikh Zayed Rd – Trade Centre – DIFC",
        "addressLocality": "Dubai",
        "addressRegion": "Dubai",
        "postalCode": "00000",
        "addressCountry": "AE"
      },
  "areaServed": {
    "@type": "City",
    "name": "Dubai"
  },
  "priceRange": "$$$",
  "sameAs": [
    "https://www.facebook.com/healthcarebia",
    "https://www.linkedin.com/company/healthcarebia",
    "https://www.instagram.com/healthcarebia",
    "https://goo.gl/maps/abcdefghijkl"
  ],
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
      ],
      "opens": "00:00",
      "closes": "23:59"
    }
  ],
  "contactPoint": [
    {
      "@type": "ContactPoint",
      "contactType": "customer service",
      "telephone": "+971547077476",
      "areaServed": "AE",
      "availableLanguage": [
        "English",
        "Arabic"
      ]
    }
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Healthcarebia Services",
    "itemListElement": [
      {
        "@type": "OfferCatalog",
        "name": "IV Therapy",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "NAD+ IV Drip",
              "url": "https://www.healthcarebia.ae/iv-drip-dubai#nad"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Myer’s Cocktail IV",
              "url": "https://www.healthcarebia.ae/iv-drip-dubai#myers"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Immune Boost IV",
              "url": "https://www.healthcarebia.ae/iv-drip-dubai#immune"
            }
          }
        ]
      },
      {
        "@type": "OfferCatalog",
        "name": "Lab Testing at Home",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "STD Panels",
              "url": "https://www.healthcarebia.ae/std-testing"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "MedicalTest",
              "name": "Female Hormone Profile",
              "url": "https://www.healthcarebia.ae/female-hormone-profile"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Custom Blood Test",
              "url": "https://www.healthcarebia.ae/custom-blood-test"
            }
          }
        ]
      }
    ]
  }
}
</script>
