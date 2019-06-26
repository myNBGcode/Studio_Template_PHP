<!doctype html>
<html>
	<head>
		<meta charset="utf8" />
		<title>Create Sandbox User call Page | PHP Sandbox Calls Test Website</title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
    <body style="margin:20px;" onload="load()">

          <?php
        include ("header.php");
      ?>

        <h1 class="weight center" style="margin-top:35px;">Create Sandbox User call Page - PHP Test Website</h1>
        <div id="testcalls">
            <hr class="divider">
        <h3 style="font-size:32px;" class="weight center">
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
Status code pop up content. Feel free to add it in your new requests, in order to show the Status Code of your calls.
-->
            <textarea class="textareacss" name="myTextarea" id="myTextarea" cols="100" rows="100">

                <?php
                include_once ("variables.php");

                $curl = curl_init();


                if($tokencheck==="1"){

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://apis.nbg.gr/sandbox/$api/oauth2/$apiversion/sandbox/$sandbox_id/users",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\"username\":\"$username\",\"isAdmin\":false}",
                    CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: $token",
                    "content-type: application/json",
                    "client-id: $client_id",
    				"request_id: $myguid"

                    ),
                ));
                }

                else {

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://apis.nbg.gr/sandbox/$api/headers/$apiversion/sandbox/$sandbox_id/users",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\"username\":\"$username\",\"isAdmin\":false}",
                    CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "content-type: application/json",
                    "Client-Id: $client_id"
                ),
                ));
                }

                $response = curl_exec($curl);
                $err = curl_error($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                }


                else {


                 $json_pretty = json_encode(json_decode($response), JSON_PRETTY_PRINT);
                echo $json_pretty;

                    if(trim($json_pretty)==='null'){echo ' - Check the documentation of the API you are using, in case the request you are trying to send is not even available. If it is available, validate the code of the call in createsandboxuser.php file';}
                }

                ?>
            </textarea>



        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>  <?php
                    echo '<span style="color:#006e80;">Status code: </span>' . $httpcode; ?> </h2>
                <a class="close" href="#">&times;</a>
                <div class="content">

                </div>
            </div>
        </div>
<!--
Script for Status Code pop up
-->
        <script type="text/javascript">
            function load()
            {
                window.location.href = "/createsandboxuser.php#popup1";
            }
        </script>
<!--
Script for formating the json Response Samples
-->
        <script>var textedJson = JSON.stringify(response, undefined, 4);
            $('#myTextarea').text(textedJson); </script>

        <?php
        include ("footer.php");
        ?>

    </body>
</html>
