<!doctype html>
<html>
	<head>
		<meta charset="utf8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
    <body>
              <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/public/sandbox/obp.account.sandbox/v1/sandbox/REPLACE_SANDBOX_ID",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_HTTPHEADER => array(
    "application_id: REPLACE_THIS_VALUE",
    "provider: REPLACE_THIS_VALUE",
    "provider_id: REPLACE_THIS_VALUE",
    "provider_username: REPLACE_THIS_VALUE",
    "request_id: REPLACE_THIS_VALUE",
    "sandbox_id: REPLACE_SANDBOX_ID",
    "x-ibm-client-id: REPLACE_THIS_KEY"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}; ?>
	</body>
</html>
