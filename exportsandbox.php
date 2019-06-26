<!doctype html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Export Sandbox call Page | PHP Sandbox Calls Test Website</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body style="margin:20px;" onload="load()">

          <?php
        include ("header.php");
      ?>

        <h1 style="margin-top:35px;" class="weight center">Export Sandbox call Page - PHP Test Website</h1>
        <div id="testcalls">
            <hr class="divider">
        <h3 style="font-size:32px;" class="center weight">
            Request <span style="color:#015563">Samples:</span>
        </h3> </div>
        <div id="showbuttons" style="text-align:center;margin-bottom:55px;margin-top:25px;" >
        <ol style="font-size: 14px;" >
            <li style="display:inline-block;"> <a href="/createsandbox.php"><button class="button">Create Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/exportsandbox.php"><button class="button">Export Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/deletesandbox.php"><button class="button">Delete Sandbox call</button></a></li>
            <li style="display:inline-block;"><a href="/createsandboxuser.php"><button class="button">Create Sandbox User call</button></a></li>

 <!--           <li style="display:inline-block;"><a href="/yourNextCall.php"><button class="button">Your Next Call</button></a></li>
            <li style="display:inline-block;"><a href="/yourNextCall2.php"><button class="button">Your Next Call 2</button></a></li>       ---->
        </ol>
        </div>

        <h3 style="font-size: 24px;margin-bottom:10px;" class="weight">
            Response Samples:
        </h3>

<?php  function generate_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0C2f ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
    );

}
       $myguid = generate_uuid();
        ?>

<!--
Request sample in PHP. For requests in other programming languages visit developers.nbg.gr
-->
      		<textarea class="textareacss" name="myTextarea" id="myTextarea" cols="100" rows="100">
                <?php
                include_once ("variables.php");

                 $curl = curl_init();


                  if(($tokencheck==="1") and ($api==="confirmation.funds")){

               curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/confirmation.funds/oauth2/v1.3/sandbox/$sandbox_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: $token",
    "client-id: $client_id",
    "content-type: application/json"
  ),
));

            } else if(($tokencheck==="1") and ($api==="uk.openbanking.accountinfo")){

                curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/uk.openbanking.accountinfo/oauth2/v3.1.1/sandbox/$sandbox_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: $token",
    "client-id: $client_id",
    "content-type: application/json"
  ),
));

            }
/*
else if($tokencheck==="1"){

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://apis.nbg.gr/sandbox/$api/oauth2/$apiversion/sandbox",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\"sandbox_Id\":\"$sandbox_id\"}",
                    CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: $token",
                    "content-type: application/json",
                    "client-id: $client_id",
    				"request_id: $client_id"
                ),
                ));

            }*/
                else if($api==="account.info"){

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/account.info/oauth2/v1.3/sandbox/$sandbox_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: $token",
    "client-id: $client_id",
    "content-type: application/json",
    "request-id: $myguid"
  ),
)); }




               else if(($tokencheck==="2") and ($api==="obpcard")){
                curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/obpcard/headers/v1.3/sandbox/%7Bsandbox_id%7D",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "client-id: $client_id",
    "content-type: application/json",
    "request_id: $myguid"
  ),
));}

                else if ($api==="ocr"){

               curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/ocr/headers/v1.2/sandbox/$sandbox_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "client-id: $client_id",
    "content-type: application/json"
  ),
)); }

                 else if ($api==="biometrics"){ echo 'biometrics inconsistency of POSTFIELD sandbox-id and URL';

               curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apis.nbg.gr/sandbox/biometrics/headers/v1.3/api/sandbox/$sandbox_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "client-id: $client_id",
    "content-type: application/json"
  ),
)); }

                else {

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://apis.nbg.gr/sandbox/$api/headers/$apiversion/sandbox/$sandbox_id",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "client-id: $client_id",
                    "content-type: application/json"
                ),
                )); }

                $response = curl_exec($curl);
                $err = curl_error($curl);
				$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE); /* Returns status code */
                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {

                };


                 $json_pretty = json_encode(json_decode($response), JSON_PRETTY_PRINT);
                echo $json_pretty;
                ?>

            </textarea>


<!--
Status code pop up content
-->
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>  <?php
                    echo '<span style="color:#006e80;">Status code: </span>' . $httpcode ?> </h2>
                <a class="close" href="#">&times;</a>
                <div class="content">

                </div>
            </div>
        </div>
<!--
Script for Status Code pop up. Remember to change the href url according to your needs.
-->
        <script type="text/javascript">
            function load()
            {
                window.location.href = "/exportsandbox.php#popup1";
            }
        </script>
<!--
Script for formating the json Response Samples
-->
        <script>var textedJson = JSON.stringify(response, undefined, 4);
            $('#myTextarea').text(textedJson);
        </script>

        <?php include ("footer.php");  ?>
    </body>
</html>
