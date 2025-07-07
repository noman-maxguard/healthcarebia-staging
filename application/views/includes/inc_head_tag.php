<?php
$whatsappPhoneString = !empty($settings->whatsapp) ? $settings->whatsapp : '';
$whatsappMessage = !empty($settings->whatsapp_msg) ? $settings->whatsapp_msg : 'Hi, I contacted you through your website.';

$whatsappHref = $this->MDL_Settings->renderWhatsappLink($whatsappPhoneString, $whatsappMessage);

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url() ?>assets/frontend/img/favicon.svg" type="image/svg+xml" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- <link href="css/bootstrap.min.css" rel="stylesheet" media='all' defer as="style"> -->

<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">

<link href="<?= base_url() ?>assets/frontend/css/fancybox.css" rel="stylesheet" media='all' defer as="style">
<link href="<?= base_url() ?>assets/frontend/css/library.css" rel="stylesheet" media='all' defer as="style">
<link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet" media='all' defer as="style">
<link href="<?= base_url() ?>assets/frontend/css/responsive.css" rel="stylesheet" media='all' defer as="style">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1280000576857900');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1280000576857900&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<title><?= !empty($commonData->meta_title) ? $commonData->meta_title : '' ?></title>
<meta name="description" content="<?= !empty($commonData->meta_description) ? $commonData->meta_description : '' ?>"/>
<meta name="keywords" content="<?= !empty($commonData->meta_keywords) ? $commonData->meta_keywords : '' ?>"/>


<?= !empty($settings->script_header) ? $settings->script_header : '' ?>



<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "qo6ygd4kdx");
</script>