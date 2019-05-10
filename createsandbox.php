<!doctype html>
<html>
	<head>
		<meta charset="utf8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
    <body>
        <h2>Save this information</h2>
       <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/obpaccount/headers/v1.3/sandbox",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"sandbox_id\":\"REPLACE_SANDBOX_ID\"}",
  CURLOPT_HTTPHEADER => array(
    "accept: text/json",
    "content-type: text/json",
    "Client-Id: REPLACE_THIS_KEY"
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
