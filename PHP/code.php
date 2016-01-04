<?php
// with this php script we get the code to open the box.

// take variables from url
$email = ($_GET["email"]);
$password = ($_GET["password"]);
$boxid = ($_GET["boxid"]);

// make the url
$service_url = 'https://api2.parcelhome.com/v1/Api.Mailboxes.svc/mailboxes/" . $boxid . "/receivecode';

$curl = curl_init($service_url); // init curl
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // set basic http auth
curl_setopt($curl, CURLOPT_USERPWD, $email . ":" . $password ); // give credentials
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_GET, true); // do a get request
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // verify ssl certificate
$curl_response = curl_exec($curl); // execute curl request

// decode json reply
$response = json_decode($curl_response, TRUE);

// close curl
curl_close($curl);

// decode array
$var = $response[response];
$var2 = $var[result];
$var3 = $var2[code];

// output to page
echo "code ";
echo $var3;

?>