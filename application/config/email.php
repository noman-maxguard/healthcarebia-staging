<?php
<?php
$config = [
    'protocol'    => 'smtp',
    'smtp_host'   => 'smtp.gmail.com',
    'smtp_user'   => 'forms@mmzholdings.com',
    'smtp_pass'   => 'pmeelwucehbchapk',   // 16-char app password
    'smtp_port'   => 587,
    'smtp_crypto' => 'tls',               // tells CI to issue STARTTLS
    'mailtype'    => 'html',
    'charset'     => 'utf-8',
    'newline'     => "\r\n",
    'crlf'        => "\r\n",
    'smtp_timeout'=> 10
];

//Always keep this file in git ignore
