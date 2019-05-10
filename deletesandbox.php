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
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/obpaccount/headers/v1.3/sandbox/REPLACE_SANDBOX_ID",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_HTTPHEADER => array(
    "Client-Id: REPLACE_THIS_VALUE"
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
