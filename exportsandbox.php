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

        <h1 style="text-align:center;">Export Sandbox call Page - <span style="color:#006e80;">PHP Sandbox Calls Test Website</span></h1>
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
Request sample in PHP. For requests in other programming languages visit developers.nbg.gr
-->
      		<textarea class="textareacss" name="myTextarea" id="myTextarea" cols="100" rows="100">
                <?php
                include_once ("variables.php");
                $curl = curl_init();
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
                ));

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
