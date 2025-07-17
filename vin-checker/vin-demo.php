<?php
$ip = $_SERVER['REMOTE_ADDR'];
$limit = 5;
$window = 60;

$rateFile = __DIR__ . 'rate-limit.json';

if (!file_exists($rateFile)) file_put_contents($rateFile, '{}');
$data = json_decode(file_get_contents($rateFile), true);

if (!isset($data[$ip])) {
    $data[$ip] = [];
}

if (count($data[$ip]) >= $limit) {
    http_response_code(429);
    echo json_encode(['success' => false, 'error' => 'Rate limit exceeded. Try again later.']);
    exit;
}

$data[$ip][] = time();
file_put_contents($rateFile, json_encode($data));

$data[$ip] = array_filter($data[$ip], function($t) use ($window) {
    return ($t > time() - $window);
});

if (!isset($data[$ip])) {
    $data[$ip] = [];
}


header('Content-Type: application/json');

// Get VIN from POST
$vin = isset($_POST['vin']) ? trim($_POST['vin']) : '';
if (!$vin || strlen($vin) !== 17) {
    echo json_encode(['success' => false, 'error' => 'Invalid VIN']);
    exit;
}

// Prepare the API request
$api_url = 'http://13.202.231.8:9000/check-vin';
$token = 'YfzNhqUPgByMJQYyWLVMjrEW6di04CYenWVBVfW0My4tALwXt51y6A';

$body = json_encode(['vin' => $vin]);

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'accept: application/json',
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
if ($response === false) {
    echo json_encode(['success' => false, 'error' => 'API error']);
    exit;
}
curl_close($ch);

$api_result = json_decode($response, true);

if (isset($api_result['year'])) {
    echo json_encode([
        'success' => true,
        'year' => $api_result['year'],
        'make' => $api_result['make'],
        'model' => $api_result['model']
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'VIN not found']);
}
