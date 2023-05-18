
<?php

require_once "decryptResponse.php";

$tglSep = date("Y-m-d");


// $url = "https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/Peserta/nokartu/$noKartu/tglSEP/$tglSep";
$url = "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/Peserta/nokartu/$noKartu/tglSEP/$tglSep";


// echo"Masuk";

$session = curl_init($url);


// $cid = "11148";
// $ckey = "1uADAB4568";
// $userKey = "5a8db1cacc070e74855b9e2038764535";

$cid = "18972";
$ckey = "9iOB26B9EA";
$userKey = "46c50c7d4893fba33f473862dadab017";



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

<br><br><center><label>Response:</label><br><textarea id="w3review" name="w3review" rows="8" cols="100">
<?php echo $responseAll; ?>
</textarea></center>
<?php








$json = json_decode($responseAll, true);
// var_dump($responseAll);
$debugMessage .=
    '<pre>Cek Peserta By NoKA: '
    . $url . '<br><br>'
    . json_encode($reqHeader, JSON_PRETTY_PRINT) . '<br><br>'
    . json_encode($reqBody, JSON_PRETTY_PRINT) . '<br><br>'
    . $responseAll . '<br><br>'
    . '</pre>';

$kodePeserta = $json['metaData']['code'];
$messagePeserta = $json['metaData']['message'];
$response = $json['response'];

// echo $json['response'];
// var_dump($response);

if (intval($json['metaData']['code']) == 200) {

    // $json['response']=;

    $decryptedResponse = stringDecrypt($cid . $ckey . $timestamp, $response);
    // var_dump(stringDecrypt($cid . $ckey . $timestamp, $response));
   
   

    
    $response = decompress($decryptedResponse);
    $response = json_decode($response, true);
   

    $debugMessage .=
        '<pre>Decoded Response Cek Peserta: <br>'
        . print_r($response, true) . '<br><br>'
        . '</pre>';

    $NamaAsuransi = $response['peserta']['cob']['nmAsuransi'];
    $NomorAsuransi = $response['peserta']['cob']['noAsuransi'];
    $tglTAT1 = $response['peserta']['cob']['tglTAT'];
    $tglTMT1 = $response['peserta']['cob']['tglTMT'];
    $HakKelas = $response['peserta']['hakKelas']['keterangan'];
    $kodeHakKls = $response['peserta']['hakKelas']['kode'];
    $dinsos = $response['peserta']['informasi']['dinsos'];
    $noSKTM = $response['peserta']['informasi']['noSKTM'];
    $prolanisPRB = $response['peserta']['informasi']['prolanisPRB'];
    $keteranganJnsPsrt = $response['peserta']['jenisPeserta']['keterangan'];
    $kodeKtrgnJnsPsrt = $response['peserta']['jenisPeserta']['kode'];
    $noMR = $response['peserta']['mr']['noMR'];
    $noTelepon = $response['peserta']['mr']['noTelepon'];
    $nama = $response['peserta']['nama'];
    $NIK = $response['peserta']['nik'];
    $noKartu = $response['peserta']['noKartu'];
    $pisa = $response['peserta']['pisa'];
    $kdProviderPserta = $response['peserta']['provUmum']['kdProvider'];
    $nmProviderPserta = $response['peserta']['provUmum']['nmProvider'];
    $sex = $response['peserta']['sex'];
    $keteranganStatus = $response['peserta']['statusPeserta']['keterangan'];
    $kode = $response['peserta']['statusPeserta']['kode'];
    $tglCetakKartu = $response['peserta']['tglCetakKartu'];
    $tglLahir = $response['peserta']['tglLahir'];
    $tglTAT2 = $response['peserta']['tglTAT'];
    $tglTMT2 = $response['peserta']['tglTMT'];
    $umurSaatPelayanan = $response['peserta']['umur']['umurSaatPelayanan'];
    $umurSekarang = $response['peserta']['umur']['umurSekarang'];
} else {
    $NamaAsuransi = '';
    $NomorAsuransi = '';
    $tglTAT1 = '';
    $tglTMT1 = '';
    $HakKelas = '';
    $kodeHakKls = '';
    $dinsos = '';
    $noSKTM = '';
    $prolanisPRB = '';
    $keteranganJnsPsrt = '';
    $kodeKtrgnJnsPsrt = '';
    $noMR = '';
    $noTelepon = '';
    $nama = '';
    $NIK = '';
    $noKartu = '';
    $pisa = '';
    $kdProviderPserta = '';
    $nmProviderPserta = '';
    $sex = '';
    $keteranganStatus = '';
    $kode = '';
    $tglCetakKartu = '';
    $tglLahir = '';
    $tglTAT2 = '';
    $tglTMT2 = '';
    $umurSaatPelayanan = '';
    $umurSekarang = '';
}
