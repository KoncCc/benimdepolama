<?php
mb_internal_encoding("UTF-8");

header('Content-Type: application/json; charset=utf-8');

$imei = isset($_GET['imei']) ? $_GET['imei'] : '';

if (empty($imei)) {
    $result = array(
        "success" => false,
        "message" => "Hata! Lütfen IMEI numarası girin."
    );

    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return;
}

function getUserAgent()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://iplogger.org/useragents/?device=chrome&count=1");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_VERBOSE, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $getUserAgent = curl_exec($curl);
    curl_close($curl);

    $dom = new DOMDocument;
    @$dom->loadHTML($getUserAgent);
    $xpath = new DOMXPath($dom);
    $userAgentFind = $xpath->query("//*[contains(@class, 'copy')]");

    foreach ($userAgentFind as $getUserAgents) {
        return $getUserAgents->nodeValue;
    }
}

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.turkiye.gov.tr/imei-sorgulama");
curl_setopt($curl, CURLOPT_USERAGENT, getUserAgent());
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_VERBOSE, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cerez.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cerez.txt');
$content = curl_exec($curl);
preg_match('/<input type="hidden" name="token" value="(.*?)"/', $content, $getToken);
curl_close($curl);

$postData = array(
    "txtImei" => $imei,
    "token" => $getToken[1]
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.turkiye.gov.tr/imei-sorgulama?submit");
curl_setopt($curl, CURLOPT_USERAGENT, getUserAgent());
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($curl, CURLOPT_VERBOSE, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cerez.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cerez.txt');
$getData = curl_exec($curl);
curl_close($curl);

$dom = new DOMDocument;
@$dom->loadHTML($getData);
$xpath = new DOMXPath($dom);
$dataFinder = $xpath->query("//*[contains(@class, 'resultContainer')]");

$setArrayMarka = array();
$setArrayModel = array();

foreach ($dataFinder as $setData) {
    $parserData = explode(":", $setData->nodeValue);
    $key = trim($parserData[0]);
    $marka = trim($parserData[1]);
    $model = trim($parserData[2]);
    $setArrayMarka[$key] = $marka;
    $setArrayModel[$key] = $model;
}

$OPStringMarka = json_encode($setArrayMarka, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$OPStringModel = json_encode($setArrayModel, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// Satırları parçala
$linesMarka = explode('\n', $OPStringMarka);
$linesModel = explode('\n', $OPStringModel);
$partsMarka = explode('"', $linesMarka[9]);
$partsMarkaIc = explode(' ', $partsMarka[2]);
$partsModel = explode('": "', $linesModel[9]);

// Dizi tanımlama
$data = array(
    "IMEI" => trim($linesMarka[1]),
    "Durum" => trim($linesMarka[3]),
    "Kaynak" => trim($linesMarka[5]),
    'Marka' => trim($partsMarkaIc[0]),
    'Model' => trim($partsModel[1])
);

$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

print_r($jsonData);

?>