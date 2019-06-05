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

        <h1 style="text-align:center;">Create Sandbox User call Page - <span style="color:#006e80;">PHP Sandbox Calls Test Website</span></h1>
        <div id="testcalls" >
        <h3 style="font-size:32px;text-align:center;" >
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

         <h3 style="font-size: 24px;margin-bottom:10px;">
            Response Samples:
        </h3>
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
    				"request_id: $client_id"

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

                    if(trim($json_pretty)==='null'){echo ' - Check the documentation of the API you are using, in case the request you are trying to send is not even available!';}
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
