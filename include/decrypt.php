
<?php

require_once "decryptResponse.php";

// $tglSep = date("Y-m-d");


// $url = "https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/Peserta/nokartu/$noKartu/tglSEP/$tglSep";
$url = "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/Peserta/nokartu/$noKartu/tglSEP/$tglSep";


// echo"Masuk";

$session = curl_init($url);


// $cid = "11148";
// $ckey = "1uADAB4568";
// $userKey = "5a8db1cacc070e74855b9e2038764535";

$cid = "18972";
$ckey = "9iOB26B9EA";
$userKey = "7df940159f5ed93866a7be5d2ad9e084";



date_default_timezone_set('UTC');
$timestamp = strval(time() - strtotime('1970-01-01 00:00:00'));
$signature = hash_hmac('sha256', $cid . "&" . $timestamp, $ckey, true);

$encodedSignature = base64_encode($signature);

$reqHeader = [
    "X-cons-id: {$cid}",
    "X-Timestamp: {$timestamp}",
    "X-Signature: {$encodedSignature}",
    'Accept: application/json',
    'Content-Type: Application/x-www-form-urlencoded',
    "user_key: {$userKey}",
];

$reqBody = "";

curl_setopt($session, CURLOPT_URL, $url);
curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($session, CURLOPT_HTTPHEADER, $reqHeader);
curl_setopt($session, CURLOPT_VERBOSE, true);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');

// ------------------------------------VALID SSL------------------------------------
curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
// ------------------------------------VALID SSL------------------------------------

$responseAll = curl_exec($session);




?>

<?php 







$cart=array(
    "metaData"=>array(
        "code"=>"200",
        "message"=>"Sukses"
    ),
    "response"=>$inptValue
);
$responseAll = json_encode($cart);


// var_dump($responseAll);
$json = json_decode($responseAll, true);

$code = $json['metaData']['code'];
$messagePeserta = $json['metaData']['message'];
$response = $json['response'];



if (intval($json['metaData']['code']) == 200) {

    $timestamp=$timestampInput;
    $decryptedResponse = stringDecrypt($cid . $ckey . $timestamp, $response);

    // var_dump($decryptedResponse);



    $response = decompress($decryptedResponse);
    $responseFinal = json_decode($response, true);
    


    // var_dump($response);

    // var_dump($responseFinal);
    // var_dump($decryptedResponse);

}

